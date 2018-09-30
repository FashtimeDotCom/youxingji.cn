<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/8
 * Time: 16:21
 *
 * 点击收藏API
 *
 */
class Controller_Api_Favtravel extends Core_Controller_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    /*
     * 收藏API
     * 参数：
     * type：操作类型，0取消，1收藏
     * travel_id:说说ID
     *
     * */
    public function collectionAction()
    {
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $action=(int)$this->getParam("action");//0取消，1收藏
        if( !in_array($action,array(0,1)) ){
            $json = array('status' => 0, 'tips' => '缺少参数');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $user_id = $_SESSION['userinfo']['uid'];
        //查询是否登陆
        if(!$user_id){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $t_id=$this->getParam("t_id");//目标ID
        $type=$this->getParam("type");//分类 1日志，2tv,3游记,4达人问答
        if( $t_id <=0 || !$type ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        if( $action==0 ){//取消,删除记录
            $where=" t_id = {$t_id} && uid = {$user_id} &&type={$type} ";
            $res=C::M("collection")->where($where)->delete();
            if($res){
                $json = array('status' => 1, 'tips' => '取消成功!');
                echo Core_Fun::outputjson($json);
                exit;
            }else{
                $json = array('status' => 0, 'tips' => '取消失败');
                echo Core_Fun::outputjson($json);
                exit;
            }
        }else{//收藏
            $data=array(
                't_id'=>$t_id,
                "uid"=>$user_id,
                "add_time"=>time(),
                'type'=>$type
            );

            //判断是否是重复收藏
            $is_collection=C::M('collection')->field('id')->where("t_id={$t_id} and uid={$user_id} and type={$type}")->find();
            if( $is_collection ){
                $json = array('status' => 0, 'tips' => '您已收藏过啦!');
                echo Core_Fun::outputjson($json);
                exit;
            }

            $res=C::M("collection")->add($data);
            if($res){
                $json = array('status' => 1, 'tips' => '收藏成功，请在个人中心查看!');
                echo Core_Fun::outputjson($json);
                exit;
            }else{
                $json = array('status' => 0, 'tips' => '收藏失败');
                echo Core_Fun::outputjson($json);
                exit;
            }
        }
    }


    //加载更多
    public function collection_moreAction(){
        //验证是否是post 提交申请
        if( !$this->isPost() ){
            $json = array('status' => 0, 'tips' => '非法操作!');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $user_id = $_SESSION['userinfo']['uid']??229;
        //查询是否登陆
        if(!$user_id){
            $json = array('status' => 0, 'tips' => '请登录后再试');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $page=$this->getParam("page");
        $type=$this->getParam("type");//分类,1-日志，2-tv,3-游记
        if( !$page || $page <=0 || !$type ){
            $json = array('status' => 0, 'tips' => '参数错误');
            echo Core_Fun::outputjson($json);
            exit;
        }

        $perpage=4;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        $list=C::M("collection")->where("uid={$user_id} and type={$type}")->order("add_time DESC")->limit($limit)->select();
        if( $list ){
            $id_list=array_column($list,'t_id');
            $id_str=implode(",",$id_list);
            switch ($type){
                case 1:
                    $data=$this->parseTravelAction($id_str);
                    break;
                case 2:
                    $data=$this->parseTvAction($id_str);
                    break;
                case 3:
                    $data=$this->parseNoteAction($id_str);
                    break;
                default:
                    $data=$this->parseTravelAction($id_str);
                    break;
            }

            $json = array('status' => 1, 'tips' =>$data,"page"=>$page+1);
            echo Core_Fun::outputjson($json);
            exit;
        }else{
            $json = array('status' => 0, 'tips' =>"没有数据啦:)");
            echo Core_Fun::outputjson($json);
            exit;
        }
    }

    function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? 1 : 0;
    }

    public function parseTravelAction($id_str){
        $sql="SELECT * FROM ##__travel WHERE id In ({$id_str});";
        $data=Core_Db::fetchAll($sql);
        if( $data ){
            foreach ($data as $key=>$value){
                $data[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
                $data[$key]['content']=json_decode($value['content']);
            }
            return $data;
        }
        return false;
    }

    public function parseTvAction($id_str){
        $sql="SELECT * FROM ##__tv WHERE id In ({$id_str});";
        $data=Core_Db::fetchAll($sql);
        if( $data ){
            foreach ($data as $key=>$value){
                $data[$key]['addtime']=date("Y-m-d H:i:s",$value['addtime']);
            }
            return $data;
        }
        return false;
    }

    public function parseNoteAction($id_str){
        $sql="SELECT * FROM ##__travel_note WHERE id In ({$id_str});";
        $data=Core_Db::fetchAll($sql);
        if( $data ){
            return $data;
        }
        return false;
    }






}