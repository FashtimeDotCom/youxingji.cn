<?php

/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/9/27
 * Time: 15:32
 */
class Controller_Api_Faq extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
 * 问题列表，查看更多
 * */
    public function get_moreAction()
    {
        //验证是否是post 提交申请
        if (!$this->isPost()) {
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page = $this->getParam("page");
        if (!$page || $page <= 0) {
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //分类,1-热门回答，2-最新回答，3-等待回答
        $type = $this->getParam("type") ?? 1;
        if (!in_array($type, array(1, 2, 3))) {
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        switch ($type) {
            case 1:
                $order = "a.show_num desc";
                break;
            case 2:
                $order = "a.addtime desc";
                break;
            case 3:
                $order = "a.addtime desc";
                break;
            default:
                $order = "a.show_num desc";
                break;
        }

        $perpage = 4;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        if ($type == 3) {
            $list = C::M("faq as a")->field('a.*,b.username,b.headpic')->join('##__user_member as b', "a.uid=b.uid", "left")->where("a.status=1 and a.response_num=0")->order($order)->limit($limit)->select();
        } else {
            $list = C::M("faq as a")->field('a.*,b.username,b.headpic')->join('##__user_member as b', "a.uid=b.uid", "left")->where("a.status=1 and a.response_num>0")->order($order)->limit($limit)->select();
        }

        if ($list) {
            foreach ($list as $key => $value) {
                $list[$key]['headpic'] = empty($value['headpic']) ? '/resource/images/img-lb2.png' : $value['headpic'];
            }

            $json = array('status' => 1, 'tips' => $list, "page" => $page + 1);
            echo Core_Fun::outputjson($json);
            exit;
        } else {
            $json = array('status' => 0, 'tips' => "没有数据啦:)");
            echo Core_Fun::outputjson($json);
            exit;
        }
    }


    /*
     * 回答列表查看更多--详情页
     *
     * */
    public function response_moreAction()
    {
        //验证是否是post 提交申请
        if (!$this->isPost()) {
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page = $this->getParam("page");
        $faq_id = $this->getParam('faq_id');
        if (!$page || $page <= 0 || !$faq_id) {
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        //分类,1-按热度，2-按时间
        $type = $this->getParam("type") ?? 1;
        if (!in_array($type, array(1, 2))) {
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        switch ($type) {
            case 1:
                $order = "a.show_num desc";
                break;
            case 2:
                $order = "a.addtime desc";
                break;
            default:
                $order = "a.show_num desc";
                break;
        }

        $perpage = 4;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        $list = C::M('faq_response as a')->field('a.*,b.username,b.headpic')->join('##__user_member as b', "a.uid=b.uid", "left")->where("a.faq_id={$faq_id}")->order($order)->limit($limit)->select();
        if ($list) {
            foreach ($list as $key => $value) {
                $list[$key]['headpic'] = empty($value['headpic']) ? '/resource/images/img-lb2.png' : $value['headpic'];
                //数据处理，只显示前面文字，过滤图片
                $list[$key]['content'] = $this->filter_imagAction($value['content']);
                $list[$key]['addtime'] = date('Y-m-d H:i:s',$value['addtime']);
            }
        }

        if ($list) {
            $json = array('status' => 1, 'tips' => $list, "page" => $page + 1);
            echo Core_Fun::outputjson($json);
            exit;
        } else {
            $json = array('status' => 0, 'tips' => "没有数据啦:)");
            echo Core_Fun::outputjson($json);
            exit;
        }

    }

    /*
     * 我要回答--接口
     *
     * */
    public function save_response_faqAction()
    {
        //验证是否是post 提交申请
        if (!$this->isPost()) {
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $user_id = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if (!$user_id) {
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $faq_id = $this->getParam("faq_id");
        $content = $this->getParam("content");
        if (!$faq_id || !$content) {
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $time = time();
        $content = urlencode($content);//转换一下
        $data = array(
            'faq_id' => $faq_id,
            'uid' => $user_id,
            'addtime' => $time,
            'content' => $content
        );
        $res = C::M('faq_response')->add($data);
        if ($res) {
            $username=C::M('user_member')->field('username,headpic')->where("uid={$user_id}")->find();
            C::M('faq')->where("id={$faq_id}")->setInc('response_num', 1);;//修改已经回答状态
            $result = [
                'status' => 1,
                'tips' => '回答成功',
                'id'  =>  $res,
                'username'  =>  $username['username'],
                'headpic'  =>  empty($username['headpic'])?'/resource/images/img-lb2.png':$username['headpic'],
                'addtime'   =>  date('Y-m-d H:i:s',$time),
                'content'   =>  $content,
                'num'   =>  C::M('faq')->where("id={$faq_id}")->getField('response_num')
            ];

            echo Core_Fun::outputjson($result);
            exit;
        } else {
            $json = array('status' => 0, 'tips' => '回答失败');
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    /*
     * 发布问题
     *
     * */
    public function save_set_faqAction()
    {
        //验证是否是post 提交申请
        if (!$this->isPost()) {
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $user_id = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if (!$user_id) {
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $title = $this->getParam("title");
        $desc = $this->getParam("desc");
        $address = $this->getParam("address");
        $thumbfile = $this->getParam('thumbfile');
        $label = $this->getParam("label");

        $data = array(
            'title' => $title,
            'uid' => $user_id,
            'desc' => $desc,
            'address' => $address,
            'thumbfile' => $thumbfile,
            'label' => $label,
            'addtime' => date("Y-m-d H:i:s", time()),
        );

        $res = C::M('faq')->add($data);
        if ($res) {
            $json = array('status' => 1, 'tips' => '发布问题成功');
            echo Core_Fun::outputjson($json);
            exit;
        } else {
            $json = array('status' => 0, 'tips' => '发布问题失败');
            echo Core_Fun::outputjson($json);
            exit;
        }

    }


    /*
     * pc个人中心-我的问答列表
     * 参数：
     *  PAGE:分页
     *  TYPE:查找分类，1-我的提问，2-我的问答
     *
     *
     * */
    public function my_faq_listAction()
    {
        //验证是否是post 提交申请
        if (!$this->isPost()) {
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $uid = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if (!$uid) {
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $type = $this->getParam('type') ?? 1;
        if (!in_array($type, array(1, 2))) {
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page = $this->getParam('page') ?? 1;
        $perpage = 10;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        if ($type == 1) {//我的提问
            $list = C::M('faq')->where("uid = $uid")->order('addtime desc')->limit($limit)->select();
        } else {
            $list = C::M('faq as a')->field('a.*,b.addtime as response_time')->join('##__faq_response as b', 'a.id=b.faq_id', 'left')->where("b.uid={$uid}")->order("b.addtime desc")->limit($limit)->select();
        }

        if ($list) {
            foreach ($list as $key => $value) {
                if (trim($value['label'])) {
                    $list[$key]['label'] = explode("/", $value['label']);
                    $list[$key]['response_time'] = date('Y-m-d H:i:s',$value['response_time']);
                }
            }
        } else {
            $json = array('status' => 0, 'tips' => '没有数据啦!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $json = array('status' => 1, 'tips' => $list, "page" => $page + 1);
        echo Core_Fun::outputjson($json);
        exit;
    }


    /*
   * 过滤图片，读取文字
   * */
    public function filter_imagAction($content)
    {
        $content = urldecode($content);
        $content = strip_tags($content);//去掉HTML标签
        $content = substr($content, 0, 255);//只截取一部分
        return $content;
    }

    function isPost()
    {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }

}