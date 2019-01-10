<?php

/**
 * 用户设置
 *
 * @author Snake.L
 */
class Controller_Admin_User extends Core_Controller_Action
{
    public $importfields = array(
        '用户名' => 'username',
        '真实姓名' => 'realname',
        '密码' => 'password',
        '手机号码' => 'telephone'
    );

    public $default_img = array(
        0 => 'resource/images/img-lb4.jpg',
        1 => 'resource/images/img-lb5.jpg',
        2 => 'resource/images/img-lb6.jpg',
        3 => 'resource/images/img-lb7.jpg',
        4 => 'resource/images/img-lb8.jpg',
        5 => 'resource/images/img-lb9.jpg',
        6 => 'resource/images/img-lb10.jpg',
        7 => 'resource/images/img-lb11.jpg',
        8 => 'resource/images/img-lb12.jpg',
    );

    /**
     * 添加用户
     */
    public function addAction()
    {
        //queryString加密码
        $securecode = 'adminuseradd';
        $memberModel = new Model_User_Member();
        $groupModel = new Model_User_Group();
        if (trim($this->getParam('action')) == 'add') {
            $conditions['gid'] = trim($this->getParam('gid'));
            $conditions['username'] = trim($this->getParam('username'));
            $conditions['realname'] = trim($this->getParam('realname'));
            $password = trim($this->getParam('password'));
            $conditions['email'] = trim($this->getParam('email'));
            $conditions['tag'] = $this->getParam("tag");
            //将从表单取得的数据拼接到queryString
            $conditionstr = implode('||', $conditions);
            $md5str = md5($conditionstr . $securecode);
            $errorBackUrl = 'admin/user/add/conditions/' . $conditionstr . '/code/' . $md5str . '/';
            //验证表单取得的数据
            $errorMessage = '';
            $checkResult = array();
            $checkResult[] = $this->checkUsername($memberModel, $conditions['username']);
            $checkResult[] = $this->checkNickName($conditions['realname']);
            $checkResult[] = $this->checkPassword($password);
            $checkResult[] = $this->checkEmail($memberModel, $conditions['email']);
            foreach ($checkResult as $result) {
                !empty($result) && $errorMessage .= $result['message'];
            }
            if (empty($errorMessage)) {
                //加密密码
                $salt = $memberModel->getSalt();
                $password = $memberModel->formatPassword($password, $salt);
                $userInfo = array('username' => $conditions['username']
                , 'realname' => $conditions['realname']
                , 'gid' => $conditions['gid']
                , 'password' => $password
                , 'salt' => $salt
                , 'email' => $conditions['email']
                , 'regtime' => Core_Fun::time()
                , 'regip' => Core_Comm_Util::getClientIp()
                , 'lastvisit' => Core_Fun::time()
                , 'lastip' => Core_Comm_Util::getClientIp()
                );
                if ($uid = $memberModel->addUser($userInfo)) {
                    if ($conditions['gid'] == 1) {
                        $accessArr = array(
                            'index_index',
                            'index_home',
                            'login_index',
                            'login_login',
                            'login_logout',
                            'swfupload_upload',
                            'ajax_pic',
                            'swfupload_drop',
                            'swfupload_setindex',
                            'article_autosave',
                            'article_module',
                            'article_softupload',
                            'ajax_locked'
                        );

                        C::M('User_Access')->setAccess($accessArr, $uid);
                    }
                    echo $this->returnJson(1, '添加用户成功');
                } else {
                    echo $this->returnJson(0, '添加用户失败');
                }
            } else {
                echo $this->returnJson(0, $errorMessage);
            }
            exit;
        }
        //从queryString取得数据
        $conditionstr = trim($this->getParam('conditions'));
        $code = trim($this->getParam('code'));
        if (!empty($code) && strlen($conditionstr) > 0 && md5($conditionstr . $securecode) == $code) {
            $tmpconditions = explode('||', $conditionstr);
            $conditions['username'] = trim($tmpconditions[0]);
            $conditions['realname'] = trim($tmpconditions[1]);
            $conditions['email'] = trim($tmpconditions[2]);
        }
        //取得用户组信息列表
        $groupList = $groupModel->getGroupList(null, 'gid');
        foreach ($groupList as $value)
            $usergroups[$value['gid']] = array('type' => $value['type'], 'title' => $value['title']);
        $this->assign('usergroups', $usergroups);
        $this->assign('conditions', $conditions);

        $this->display('admin/user_add.tpl');
    }

    public function loginAction()
    {
        $uid = intval($this->getParam('uid'));
        $_SESSION['userinfo'] = Core_Fun::getuiduserinfo($uid, '*');
        $this->showmsg('', '', 0);
    }

    /**
     * 编辑用户
     */
    public function editAction()
    {

        //queryString加密码
        $securecode = 'adminuseredit';
        $memberModel = new Model_User_Member();
        $groupModel = new Model_User_Group();
        $conditions['uid'] = intval($this->getParam('uid'));
        if (trim($this->getParam('action')) == 'edit') {
            $conditions['username'] = trim($this->getParam('username'));
            $password = trim($this->getParam('password'));
            $conditions['realname'] = trim($this->getParam('realname'));
            $conditions['gid'] = trim($this->getParam('gid'));
            $gender = intval($this->getParam('gender'));
            $marry = intval($this->getParam('marry'));
            $birthyear = intval($this->getParam('birthyear'));
            $birthmonth = intval($this->getParam('birthmonth'));
            $birthday = intval($this->getParam('birthday'));
            $occupation = intval($this->getParam('occupation'));
            $conditions['email'] = trim($this->getParam('email'));
            $conditions['telephone'] = trim($this->getParam('telephone'));
            $conditions['bgpic'] = trim($this->getParam('bgpic'));
            $conditions['sort'] = (int)$this->getParam("sort") ?? 100;
            $conditions['tag'] = $this->getParam("tag");
            $summary = trim($this->getParam('summary'));
            $bgpic = $this->getParam('bgpic');
            $userInfo = $conditions;
            if (strlen($password) > 0) {
                $userInfo['salt'] = $memberModel->getSalt();
                $userInfo['password'] = $memberModel->formatPassword($password, $userInfo['salt']);
            }

            //if($this->checkEmail($memberModel, $userInfo['email'], $userInfo['uid']))
            //$this->showmsg('邮箱已被注册！', '');
            if ($conditions['sort'] != 100) {
                C::M('user_member')->where("sort={$conditions['sort']}")->update(array('sort' => 100));
            }

            if ($memberModel->editUserInfo($userInfo)) {
                $birth = Core_Fun::strtotime($birthyear . '-' . $birthmonth . '-' . $birthday);
                $data = array(
                    'gender' => $gender,
                    'birthday' => $birth,
                    'occupation' => $occupation,
                    'summary' => $summary,
                    'marry' => $marry,
                    'bgpic' => $bgpic
                );
                C::M('user_Detail')->editDetail($userInfo['uid'], $data);
                echo $this->returnJson(1, '用户资料更改成功！');
            } else {
                echo $this->returnJson(0, '用户资料更改失败！');
            }
        } else {
            //取得用户组信息列表
            $groupList = $groupModel->getGroupList(null, 'gid');
            foreach ($groupList as $value)
                $usergroups[$value['gid']] = array('type' => $value['type'], 'title' => $value['title']);
            $this->assign('usergroups', $usergroups);

            $conditions = $memberModel->getUserInfoByUid($conditions['uid']);
            $detail = C::M('User_Detail')->getInfoByUid($conditions['uid']);
            $conditions['gender'] = $detail['gender'];
            $conditions['occupation'] = $detail['occupation'];
            $conditions['summary'] = $detail['summary'];
            $conditions['marry'] = $detail['marry'];
            $birth = explode('-', Core_Fun::date('Y-m-d', $detail['birthday']));

            $conditions['birthyear'] = empty($birth[0]) ? 1950 : $birth[0];
            $conditions['birthmonth'] = empty($birth[1]) ? 1 : $birth[1];
            $conditions['birthday'] = empty($birth[2]) ? 1 : $birth[2];
            $this->assign('conditions', $conditions);

            //取得个人设置配置信息
            $setting = include CONFIG_PATH . 'setting.php';
            $this->assign('setting', $setting);
            $this->assign('sgid', $_SESSION['isadmin']);
            $this->assign('picdom', 'imgurl');
            $this->assign('picdoms', 'small_img');
            $this->display('admin/user_edit.tpl');
        }
    }

    //保存
    public function saveAction()
    {
        $uid = $this->getParam("uid");
        $gid = $this->getParam('gid');
        if (!$uid || !$gid) {
            echo json_encode(array("code" => 0, "error" => "非法操作"));
            exit();
        }

        $realname = htmlspecialchars($this->getParam("realname"));
        $email = htmlspecialchars($this->getParam("email"));
        $telephone = htmlspecialchars($this->getParam("telephone"));
        $sort = htmlspecialchars($this->getParam('sort'));
        $tag = htmlspecialchars($this->getParam('tag'));
        $bgpic = htmlspecialchars($this->getParam('bgpic'));
        $tjpic = htmlspecialchars($this->getParam('tjpic'));

        $data = array(
            'gid' => (int)$gid,
            'realname' => $realname,
            'email' => $email,
            'telephone' => $telephone,
            'sort' => (int)$sort,
            'tag' => $tag,
            'bgpic' => $bgpic,
            'tjpic' => $tjpic
        );
        if ($uid) {
            $res = C::M('user_member')->where("uid={$uid}")->update($data);
            if ($res) {
                echo json_encode(array("code" => 1, "message" => "success"));
                exit();
            } else {
                echo json_encode(array("code" => 0, "error" => "更新失败"));
                exit();
            }
        }


    }

    public function changeAction()
    {
        $uid = intval($this->getParam('uid'));
        $field = $this->getParam('field');
        $value = intval($this->getParam('value'));
        C::M('User_Member')->editUserInfo(array(
            'uid' => $uid,
            $field => $value
        ));
        $this->showmsg('用户资料更改成功！', 'admin/user/search');
    }

    /**
     * 搜索用户
     */
    public function searchAction()
    {
        //queryString加密码
        $securecode = 'adminusersearch';
        $memberModel = new Model_User_Member();
        $groupModel = new Model_User_Group();
        //取得数据
        $conditionstr = trim($this->getParam('conditions'));
        $code = trim($this->getParam('code'));
        if (!empty($code) && strlen($conditionstr) > 0 && md5($conditionstr . $securecode) == $code) {
            $tmpconditions = explode('||', $conditionstr);
            $conditions['type'] = trim($tmpconditions[0]);
            $conditions['keyword'] = trim($tmpconditions[1]);
            $conditions['gid'] = intval($tmpconditions[2]);
            $conditions['gender'] = intval($tmpconditions[3]);
            $conditions['regdate'] = intval($tmpconditions[4]);
            $conditions['lastvisit'] = intval($tmpconditions[5]);
            $conditions['condition_type'] = intval($tmpconditions[6]);
        } else {
            $conditions['type'] = trim($this->getParam('type'));
            $conditions['keyword'] = trim($this->getParam('keyword'));
            $conditions['gid'] = intval($this->getParam('gid'));
            $conditions['gender'] = intval($this->getParam('gender'));
            $conditions['regdate'] = intval($this->getParam('regdate'));
            $conditions['lastvisit'] = intval($this->getParam('lastvisit'));
            $conditions['condition_type'] = intval($this->getParam('condition_type'));
        }
        $whereArr = array();
        //$whereArr = array(array('isbig', 1, '!='), array('ismarry', 1, '!='), array('isbrand', 1, '!='));
        !empty($conditions['keyword']) && $whereArr[] = array($conditions['type'], $conditions['keyword'], 'LIKE');
        !empty($conditions['gid']) && $whereArr[] = array('gid', $conditions['gid']);
        !empty($conditions['gender']) && $whereArr[] = array('gender', $conditions['gender']);
        $istec = trim($this->getParam('istec'));
        !empty($istec) && $whereArr[] = array('istec', 1);
        switch ($conditions['regdate']) {
            case 1:
                $whereArr[] = array('regtime', strtotime('-7 day'), '>');
                break;
            case 2:
                $whereArr[] = array('regtime', strtotime('-14 day'), '>');
                break;
            case 3:
                $whereArr[] = array('regtime', strtotime('-30 day'), '>');
                break;
            case 4:
                $whereArr[] = array('regtime', strtotime('-180 day'), '>');
                break;
            case 5:
                $whereArr[] = array('regtime', strtotime('-365 day'), '>');
                break;
            case 6:
                $whereArr[] = array('regtime', strtotime('-365 day'), '<=');
                break;
            default :
                break;
        }
        switch ($conditions['lastvisit']) {
            case 1:
                $whereArr[] = array('lastvisit', strtotime('-7 day'), '>');
                break;
            case 2:
                $whereArr[] = array('lastvisit', strtotime('-14 day'), '>');
                break;
            case 3:
                $whereArr[] = array('lastvisit', strtotime('-30 day'), '>');
                break;
            case 4:
                $whereArr[] = array('lastvisit', strtotime('-180 day'), '>');
                break;
            case 5:
                $whereArr[] = array('lastvisit', strtotime('-365 day'), '>');
                break;
            case 6:
                $whereArr[] = array('lastvisit', strtotime('-365 day'), '<=');
                break;
            default :
                break;
        }
        switch ($conditions['condition_type']) {
            case 1://达人列表
                $whereArr[] = array('startop', 1);
                break;
            case 2://练习生
                $whereArr[] = array('trainee', 1);
                break;
            case 3://推荐达人
                $whereArr[] = array('weektop', 1);
                break;
            case 4://tv推荐
                $whereArr[] = array('tvtop', 1);
                break;
            case 5://问答达人
                $whereArr[] = array('is_faq_star', 1);
                break;
            case 6://批量导入
                $whereArr[] = array('is_fake', 1);
                break;
            default:
                break;

        }
        //用户数量
        if (!empty($whereArr) && is_array($whereArr)) {
            $str = "";
            foreach ($whereArr as $key => $value) {
                $str .= " {$value[0]} = {$value[1]} and ";
            }
            $str = rtrim($str, 'and ');
        }
        $userCount = C::M('user_member')->where($str)->getCount();
        $this->assign('userscount', $userCount);
        //分页
        $perpage = 20;
        $curpage = $this->getParam('page') ? intval($this->getParam('page')) : 1;
        $conditionstr = implode('||', $conditions);
        $md5str = md5($conditionstr . $securecode);
        $mpurl = 'admin/user/search/conditions/' . $conditionstr . '/code/' . $md5str . '/';
        $multipage = $this->multipage($userCount, $perpage, $curpage, $mpurl);
        $this->assign('multipage', $multipage);
        //用户列表
        $userList = $memberModel->getUserList($whereArr, 'uid desc', array($perpage, $perpage * ($curpage - 1)));
        foreach ($userList AS $u) {
            $memberModel->editUserInfo(array(
                'uid' => $u['uid'],
                'tecview' => 1
            ));
        }

        $this->assign('users', $userList);
        //用户组列表
        $groupList = $groupModel->getGroupList(null, 'gid');
        foreach ($groupList as $value) {
            $usergroups[$value['gid']] = array('type' => $value['type'], 'title' => $value['title']);
        }
        $this->assign('usergroups', $usergroups);
        //查询条件
        $this->assign('conditions', $conditions);

        $this->assign('sgid', $_SESSION['isadmin']);

        $this->display('admin/user_search.tpl');
    }

    public function moreAction()
    {
        if ($this->getParam('id')) {
            $_ids = $this->getParam('id');
            $_startops = $this->getParam('startop');
            $_tvtops = $this->getParam('tvtop');
            $_weektops = $this->getParam('weektop');
            $_trainee = $this->getParam('trainee');
            $_is_faq_star = $this->getParam("is_faq_star");
            foreach ($_ids AS $i => $_id) {
                $_data = array(
                    'startop' => intval($_startops[$_id]),
                    'tvtop' => intval($_tvtops[$_id]),
                    'weektop' => intval($_weektops[$_id]),
                    'trainee' => intval($_trainee[$_id]),
                    'is_faq_star' => intval($_is_faq_star[$_id])
                );

                C::M('user_member')->where("uid = $_id")->update($_data);
            }
        }

        echo $this->returnJson(1, '操作成功，正在返回...');
    }

    /**
     * 屏蔽用户
     */
    public function shieldAction()
    {

        $memberModel = new Model_User_Member();
        $gid = intval($this->getParam('gid'));
        $uid = intval($this->getParam('uid'));
        if ($memberModel->editUserInfo(array('uid' => $uid, 'gid' => $gid)))
            $this->showmsg('操作成功');
        else
            $this->showmsg('操作失败');
    }

    /**
     * 删除用户
     */
    public function deleteAction()
    {
        $memberModel = new Model_User_Member();
        $deleteids = is_array($this->getParam('id')) ? $this->getParam('id') : array();
        $ucrt = 1;
        if ($ucrt) {
            foreach ($deleteids as $id) {
                $memberModel->deleteUserByUid(intval($id));
            }
        }
        echo $this->returnJson(1, '用户列表更新成功');
    }

    public function privAction()
    {
        $uid = $this->getParam('uid');
        $memberModel = new Model_User_Member();
        if (trim($this->getParam('action')) == 'access') {
            $accessnew = $this->getParam('accessnew');
            C::M('User_Access')->setAccess($accessnew, $uid);
            echo $this->returnJson(1, '编辑用户权限成功');
        } else {
            //取得用户权限
            $accessList = C::M('User_Access')->getAccess($uid);

            //取得权限列表
            $authTree = include CONFIG_PATH . 'authtree.php';
            $this->assign('adminprivs', $authTree['admin']);
            $this->assign('admin_checkboxes', $authTree['admin']);
            $this->assign('admin_checked', $accessList);
            $this->assign('privuser', $memberModel->getUserInfoByUid($uid));
            $this->display('admin/user_priv.tpl');
        }

    }

    /**
     * 输出国家JSON列表
     */
    public function getnationAction($citys)
    {
        $citys = Core_Comm_City::$cityConfig;
        foreach ($citys as $key => $value) {
            $list[$key] = $value['name'];
        }
        echo json_encode($list);
    }

    /**
     * 输出省份JSON列表
     */
    public function getprovinceAction()
    {
        $citys = Core_Comm_City::$cityConfig;
        $nationIndex = trim($this->getParam('nation'));
        if (!empty($nationIndex)) {
            foreach ($citys[$nationIndex]['province'] as $key => $value) {
                $list[$key] = $value['name'];
            }
            echo json_encode($list);
        }
    }

    /**
     * 输出城市JSON列表
     */
    public function getcityAction()
    {
        $citys = Core_Comm_City::$cityConfig;
        $nationIndex = trim($this->getParam('nation'));
        $provinceIndex = trim($this->getParam('province'));
        if (!empty($nationIndex)) {
            foreach ($citys[$nationIndex]['province'][$provinceIndex]['city'] as $key => $value) {
                $list[$key] = $value;
            }
            echo json_encode($list);
        }
    }

    /**
     * 验证字符串长度
     *
     * @param string $str
     * @param int $minlen
     * @param int $maxlen
     * @return boolean
     */
    public function checkLength($str, $minlen, $maxlen)
    {
        $len = strlen($str);
        if ($len > $maxlen || $len < $minlen) {
            return 1;
        }
        return 0;
    }

    /**
     * 验证用户名
     *
     * @param string $username
     * @return array
     */
    public function checkUsername($memberModel, $username)
    {
        $minlen = 3;
        $maxlen = 30;
        if ($this->checkLength($username, $minlen, $maxlen)) {
            return array('errorcode' => '1', 'message' => '用户名长度不符合字符数' . $minlen . '-' . $maxlen . '的要求<br>');
        }

        $guestexp = '\xA1\xA1|\xAC\xA3|^Guest|^\xD3\xCE\xBF\xCD|\xB9\x43\xAB\xC8';
        if (preg_match("/\s+|^c:\\con\\con|[%,\*\"\s\<\>\&]|$guestexp/is", $username)) {
            return array('errorcode' => '1', 'message' => '帐号格式不正确<br>');
        }

        return 0;
    }

    /**
     * 验证昵称
     *
     * @param string $nickname
     * @return array
     */
    public function checkNickName($nickname)
    {
        $minlen = 1;
        $maxlen = 32;
        if ($this->checkLength($nickname, $minlen, $maxlen)) {
            return array('errorcode' => '3', 'message' => '姓名长度不符合字符数' . $minlen . '-' . $maxlen . '的要求<br>');
        }
        return 0;
    }

    /**
     * 验证密码
     *
     * @param string $password
     * @return array
     */
    public function checkPassword($password)
    {
        if (strlen($password) < 1) {
            return array('errorcode' => '4', 'message' => '密码不能为空<br>');
        }
        return 0;
    }

    /**
     * 验证邮箱
     *
     * @param string $email
     * @return array
     */
    public function checkEmail($memberModel, $email, $uid = 0)
    {
        if ($memberModel->checkEmailExists($email, $uid)) {
            return array('errorcode' => '2', 'message' => '邮箱已被注册<br>');
        }
        return 0;
    }

    /*
     * ajax查找用户
     *
     * */
    //
    public function check_userAction()
    {
        $key = $this->getParam('q');
        if (!$key) {
            return;
        }

        $info = C::M('user_member')->field('uid,username')->where("username like '%{$key}%'")->limit(0, 10)->select();
        if ($info) {
            foreach ($info as $key => $value) {
                $one = array();
                $one['id'] = $value['uid'];
                $one['text'] = $value['username'];
                $data[] = $one;
            }
            echo json_encode($data);
            exit();
        }
        return;
    }

    /*
     *
     * 批量导入僵尸粉
     *
     * **/
    public function import_fileAction()
    {
        if (!empty($_FILES['file_stu']['name'])) {
            /*设置上传路径*/
            $savepath = HTDOCS_ROOT . 'uploadfile/excel/' . date('Ymd', time()) . "/";
            if (!file_exists($savepath)) {
                $res = $this->createFolderActionAction($savepath);//生成文件
                if (!$res) {
                    $json = array('status' => 0, 'tips' => '文件目录不存在!');
                    echo json_encode($json);
                    exit();
                }
            }

            $allowed_types = ['xls', 'xlsx'];
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (!in_array($file_type, $allowed_types)) {
                $json = array('status' => 0, 'tips' => '格式错误，只能是xls或xlsx格式文件!');
                echo json_encode($json);
                exit();
            }

            /*以时间来命名上传的文件*/
            $str = time() . mt_rand(0, 99);
            $file_name = $str . "." . $file_type;
            $path = $savepath . $file_name;
            /*是否上传成功*/
            if (!move_uploaded_file($tmp_file, $path)) {
                $json = array('status' => 0, 'tips' => '文件上传失败!');
                echo json_encode($json);
                exit();
            } else {
                //读取excel数据
                $get_data = $this->get_excel_dataAction($path, $file_type);
                if ($get_data) {
                    //处理、组装数据
                    $data = $this->detail_excel_dataAction($get_data);
                    if (isset($data['msg'])) {
                        $json = array('status' => 0, 'tips' => $data['msg']);
                        echo json_encode($json);
                        exit();
                    } else {
                        $result = C::M('user_member')->adds($data);
                        if (!$result) {
                            $json = array('status' => 0, 'tips' => '文件导入失败!');
                            echo json_encode($json);
                            exit();
                        }
                        $json = array('status' => 1, 'tips' => '文件导入成功!');
                        echo json_encode($json);
                        exit();
                    }

                } else {
                    $json = array('status' => 0, 'tips' => '文件没有数据!');
                    echo json_encode($json);
                    exit();
                }
            }
        } else {
            $json = array('status' => 0, 'tips' => '文件上传失败!');
            echo json_encode($json);
            exit();
        }
    }

    public function createFolderActionAction($path)
    {
        if (!file_exists($path) && !mkdir($path, 0777, true)) {
            return false;
        }
        return true;
    }

    /*
     * PHPExcel读取数据
     *
     * */
    public function get_excel_dataAction($path, $suffix)
    {
        //引入PHPExcel类
        require ROOT . "vendor/PHPExcel/PHPExcel.php";
        if ($suffix == 'xlsx') {
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        } else {
            $objReader = PHPExcel_IOFactory::createReader('Excel5');
        }
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $excelData = array();
        for ($row = 1; $row <= $highestRow; $row++) {
            for ($col = 0; $col < $highestColumnIndex; $col++) {
                $excelData[$row][] = (string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            }
        }
//        var_dump($excelData);die();
        return $excelData;
    }

    /*
     * 处理数据,组装
     *
     * */
    public function detail_excel_dataAction($res)
    {
        $exceltitle = $res[1];//表头
        unset($res[1]);
        $importfields = $this->importfields;
        $filetitle = [];
        foreach ($importfields as $k => $v) {
            $key = array_search($k, $exceltitle);
            if ($key !== false) {
                $filetitle[$key] = $v;
            }
        }
        if (empty($filetitle)) {
            return array('msg' => '表头格式错误，请检查');
        }

        $items = array_keys($filetitle);
        $data = [];
        foreach ($res as $key => $val) {
            foreach ($val as $item => $value) {
                if (in_array($item, $items)) {
                    $data[$key][$filetitle[$item]] = $value;
                }
            }
        }

        //安全格式验证
        if ($data) {
            $return_data = array();
            foreach ($data as $key => $value) {
                //用户名
                if (!isset($value['username']) || empty($value['username'])) {
                    return array('msg' => '错误：第 ' . $key . '行的用户名不能有空!');
                }

                //真实姓名
//                if( !isset($value['realname']) || empty($value['realname']) ){
//                    return array('msg'=>'错误：第 '.$key.'行的真实姓名不能有空!');
//                }

                //密码
                if (!isset($value['password']) || empty($value['password'])) {
                    return array('msg' => '错误：第 ' . $key . '行的密码不能有空!');
                }

                //手机号码
                if (!isset($value['telephone']) || !preg_match('/^[1][3,4,5,7,8][0-9]{9}$/', $value['telephone'])) {
                    return array('msg' => '错误：第 ' . $key . '行的手机号码格式错误!');
                }

                //验证手机号码是否重复
                $is_exist = C::M('user_member')->field('uid')->where("telephone={$value['telephone']}")->find();
                if ($is_exist) {
                    return array('msg' => '错误：第 ' . $key . '行的手机号码已经注册!');
                }

                //组装数据
                $insert_data = array();
                $insert_data['username'] = $value['username'];
                $insert_data['realname'] = $value['realname'];
                $insert_data['password'] = $value['password'];
                $insert_data['telephone'] = $value['telephone'];
                $insert_data['regtime'] = time();
                $insert_data['is_fake'] = 1;
                $rand = rand(0, 8);
                $insert_data['headpic'] = $this->default_img[$rand];
                $return_data[] = $insert_data;
                unset($insert_data);
            }
            return $return_data;
        }
    }


    /*
     * 僵尸粉，一键关注达人
     * */
    public function focus_allAction()
    {
        $action = $this->getParam('action');
        if ($action != 'focus') {
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo json_encode($json);
            exit();
        }

        //查找出所有水军
        $fake_users = C::M('user_member')->field('uid')->where('is_fake=1')->select();
        if (!$fake_users) {
            $json = array('status' => 0, 'tips' => '没有可操作的假用户!');
            echo json_encode($json);
            exit();
        }

        //查找所有达人
        $list = C::M('user_member')->field('uid')->where("startop=1 or trainee=1")->select();
        if ($list) {
            $list = array_column($list, 'uid');
        } else {
            $json = array('status' => 0, 'tips' => '无达人!');
            echo json_encode($json);
            exit();
        }

        foreach ($fake_users as $key => $value) {
            $this->set_followAction($value['uid'], $list);
        }

        $json = array('status' => 1, 'tips' => '一键关注成功!');
        echo json_encode($json);
        exit();
    }

    /*
     * 对于关注和被关注人的操作
     *
     * */
    public function set_followAction($uid, $list)
    {
        $data = array();
        $used = array();
        foreach ($list as $key => $value) {
            //查找用户是否已经关注过该达人
            $is_focus = C::M('follow')->field('id')->where("uid={$uid} and bid={$value}")->find();
            if ($is_focus) {
                continue;
            }
            $one = array();
            $one['uid'] = $uid;
            $one['bid'] = $value;
            $one['isget_u'] = 1;
            $one['isget_b'] = 1;
            $one['addtime'] = time();
            $data[] = $one;
            $used[] = $value;//这些都是新关注的
            unset($one);
        }

        $result = C::M('follow')->adds($data);
        if ($result) {
            //前10个，所有关注、被关注的经验+5
            foreach ($used as $key => $value) {
                if ($key <= 9) {
                    C::M('user_member')->where("uid = $uid")->setInc('exp', 5);
                    C::M('user_member')->where("uid = $value")->setInc('exp', 5);
                }
            }
        }
        unset($data);
        unset($used);
        return true;
    }


}
