<?php

/**
 * 通用Ajax调用文件
 * @author: snake.l
 *
 * @web http://www.vpcv.com/
 */

class Controller_Admin_Ajax extends Core_Controller_Action

{

    /*

     * 初始化

     */

    public function __construct($params)

    {

        parent::__construct($params);
        if (!Core_Fun::isAjax() && $this->getActionName() != 'pic') {
            exit('ERROR');
        }

    }

    public function getmenuAction()
    {
        $menu = C::M('Menu')->getMenuByAdminId($_SESSION['isadmin']);
        $arr['warp'] = $menu;
        echo json_encode($arr);
    }

    public function menuAction()
    {
        $id = $this->getParam('id');
        $type = $this->getParam('type');

        $menu = C::M('Menu')->getMenuByMenuId($id, $type);

        echo json_encode($menu);
    }

    public function menusonAction()
    {
        $pid = $this->getParam('id');
        $menu = C::M('Menu')->getMenuByPId($pid);
        echo json_encode($menu);
    }

    public function addmenuAction()
    {
        $name = $this->getParam('name');
        $url = $this->getParam('url');
        $width = $this->getParam('width');
        $height = $this->getParam('height');
        $isresize = $this->getParam('isresize');

        $data = array(
            'pid' => 0,
            'mid' => $_SESSION['isadmin'],
            'type' => 'papp',
            'name' => $name,
            'url' => $url,
            'width' => $width,
            'height' => $height,
            'isresize' => $isresize,
            'icon' => 'resource/admin/images/icon/vpcv.png'
        );

        if (C::M('menu')->add($data)) {
            $arr['msg'] = 1;
        } else {
            $arr['msg'] = 0;
        }
        echo Core_Fun::array2json($arr);
    }

    public function delmenuAction()
    {
        $id = $this->getParam('id');
        if (C::M('menu')->remove($id)) {
            $arr['msg'] = 1;
        } else {
            $arr['msg'] = 0;
        }
        echo Core_Fun::array2json($arr);
    }

    public function editmenuAction()
    {
        $id = $this->getParam('id');
        $name = $this->getParam('name');
        $url = $this->getParam('url');
        $width = $this->getParam('width');
        $height = $this->getParam('height');

        $data = array(
            'id' => $id,
            'name' => $name,
            'url' => $url,
            'width' => $width,
            'height' => $height
        );

        if (C::M('menu')->update($data)) {
            $arr['msg'] = 1;
        } else {
            $arr['msg'] = 0;
        }
        echo Core_Fun::array2json($arr);
    }

    public function lockedAction()
    {
        $userModel = new Model_User_Member();
        $user = $userModel->getInfoByUid('islocked', $_SESSION['isadmin']);
        if (!$_SESSION['isadmin']) {
            $arr['msg'] = -1;
        } elseif ($user['islocked']) {
            $arr['msg'] = 1;
        } else {
            $arr['msg'] = 0;
        }
        echo core_Fun::array2json($arr);
    }

    public function lockAction()
    {
        $userModel = new Model_User_Member();
        $update = $userModel->editUserInfo(array('uid' => $_SESSION['isadmin'], 'islocked' => 1));
        if ($update) {
            $arr['msg'] = 1;
        } else {
            $arr['msg'] = 0;
        }
        echo core_Fun::array2json($arr);
    }

    public function unlockAction()
    {
        $userModel = new Model_User_Member();
        $password = $this->getParam('password');
        $user = $userModel->onLogin($_SESSION['adminname'], $password);
        if ($user) {
            $userModel->editUserInfo(array('uid' => $user['uid'], 'islocked' => 0));
            $arr['msg'] = 1;
        } else {
            $arr['msg'] = 0;
        }
        echo core_Fun::array2json($arr);
    }

    public function mapAction()
    {
        $menulist = include CONFIG_PATH . 'menu.php';
        $html = '';
        foreach ($menulist AS $key => $menu) {
            $html .= '<dl class="clearfix"><dt>' . $key . '</dt><dd>';
            foreach ($menu AS $menuchild) {
                $html .= '<a href="' . $menuchild['url'] . '" target="win">' . $menuchild['name'] . '</a>';
            }
            $html .= '</dd></dl>';
        }
        echo core_Fun::array2json(array('html' => $html));
    }

    public function getprovinceAction()
    {
        $pid = $this->getParam('pid');
        $pid = $pid ? $pid : 52;
        $provinces = C::M('region')->getRegionList($pid);
        if (!empty($provinces)) {
            foreach ($provinces as $key => $value) {
                $list[$value['id']] = $value['regionname'];
            }
            echo json_encode($list);
        }
    }

    public function picAction()
    {
        $config = array(
            "pathFormat" => 'image/{yyyy}{mm}{dd}/{time}{rand}',
            "maxSize" => 2048000000,
            "allowFiles" => array(".png", ".jpg", ".jpeg", ".gif", ".bmp"),
            "ext" => ''
        );
        $fieldName = 'file';

        $ret = array(); // 返回到客户端的信息

        $file_path = Core_Util_Upload::webuploader($fieldName, $config);
        $json = array(
            "file_id" => $file_id,
            "state" => $file_path['state'],
            "url" => $file_path['link'],
            "thumb" => $file_path['thumb'],
            "title" => $file_path['title'],
            "original" => $file_path['original'],
            "type" => $file_path['type'],
            "size" => $file_path['size']
        );
        echo json_encode($json);
    }

    public function getfileAction()
    {
        $template = Core_Config::get('template', 'template', 'default');
        $list = Core_Fun_File::getFileList('view/show/' . $template . '/article');

        echo json_encode($list);
    }
}

?>