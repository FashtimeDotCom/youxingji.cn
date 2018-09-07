<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/5/31
 * Time: 14:45
 */
class Controller_Admin_Activity extends Core_Controller_Action
{
    var $_pagetitle="活动列表";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.name"=>"活动名称",
        "a.status"=>"状态",
        "a.start_time"=>"开始时间",
        "a.end_time"=>"结束时间",

        "b.username"=>"种子达人名字",
        "a.user_id"=>"用户ID",

        "c.name as target_name"=>"目的地",

//        "d.city_list"=>"旅经城市",
        "e.name as type_name"=>"所属活动"
    );

    var $status=array(
        0=>"<span style='color: blue;'>未生效</span>",
        1=>"<span style='color: green;'>进行中</span>",
        2=>"<span style='color: red;'>废除</span>"
    );

    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->assign("pagetitle",$this->_pagetitle);
    }

    public function indexAction()
    {
        $select_field=array_keys($this->_showfield);
        $field_list=array_values($this->_showfield);
        $this->assign("field_list",$field_list);

        $curpage=$this->getParam("page")?(int)$this->getParam("page"):1;
        $perpage=15;
        $mapurl="admin/activity/index/";
        $activity_mdl=new Model_Activity();

        $list=$activity_mdl->get_list($select_field,$curpage);
        if($list){
            foreach( $list as $key=>$value ){
                $list[$key]['start_time']=date("Y-m-d",strtotime($value['start_time']));
                $list[$key]['end_time']=date("Y-m-d",strtotime($value['end_time']));
                $list[$key]['old_status']=$value['status'];
                $list[$key]['status']=$this->status[$value['status']];
            }
        }

        $this->assign("list",$list);

        $total=$activity_mdl->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/activity/activity_list.tpl");
    }

    public function addAction(){
        $this->editAction();
    }

    public function editAction($id=0)
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;
        $this->assign("status_list",$this->status);

        if( $id ){
            //活动详情
            $activity_mdl=new Model_Activity();
            $detail=$activity_mdl->get_one($id);
            if( $detail ){
                $this->assign("detail",$detail);
            }else{
                $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#12_1',3);
            }
        }

        //获取目的地列表
        $target_list=C::M("target")->field("id,name")->select();
        if($target_list ){
            $target_list=array_column($target_list,"name","id");
        }

        //获取活动分类
        $type_list=C::M("activity_type")->field("id,name")->select();
        if( $type_list ){
            $type_list=array_column($type_list,"name","id");
        }

        $this->assign("type_list",$type_list);
        $this->assign("target_list",$target_list);
        $this->display("admin/activity/activity_edit.tpl");
    }

    public function saveAction()
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;
        $name=$this->getParam("name");
        $start_time=$this->getParam("start_time");
        $end_time=$this->getParam("end_time");
        $target_id=$this->getParam("target_id")??0;
        $status=$this->getParam("status")??0;
        $user_id=$this->getParam("user_id");
        $type_id=$this->getParam("type_id");
        $small_img=$this->getParam("small_img");

        $data=array(
            "name"=>$name,
            "target_id"=>(int)$target_id,
            "user_id"=>(int)$user_id,
            "status"=>(int)$status,
            "start_time"=>date("Y-m-d H:i:s",strtotime($start_time)),
            "end_time"=>date("Y-m-d H:i:s",strtotime($end_time)),
            "type_id"=>$type_id,
            "small_img_url"=>$small_img,
        );

        if( (int)$id>0 ){//update
            $res=C::M("activity")->where(" id = {$id}")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(2)"));
                exit();
            }

        }else{//add

            if( empty($target_id) || $target_id==0 ){
                echo json_encode(array("code"=>0,"error"=>"目的地选择失败！"));
                exit();
            }

            $res=C::M("activity")->add($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"添加失败"));
                exit();
            }
        }

    }


    /*
     *
     * 删除活动，逻辑删除
     * */
    public function update_statusAction()
    {
        $id=(int)$this->getParam("id");
        if( $id >0 ){
            $data=array(
                "status"=>2
            );
            $res=C::M("activity")->where(" id={$id} ")->update($data);
            if( $res>0 ){
                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(1)"));
                exit();
            }
        }
        echo json_encode(array("code"=>0,"error"=>"操作错误！"));
        exit();
    }

    /*
     * 绑定tv
     *
     * */
    public function tvAction()
    {
        $activity_id=$this->getParam("id");
        $user_id=$this->getParam("user_id");
        if( !$activity_id ){
            $this->showmsg('操作错误,活动类型不存在!', 'admin/index/index#12_1',3);
        }

        $check_list=C::M("activity_tv")->field("id,tv_id,sort")->where(" activity_id={$activity_id} ")->select();
        $list_id=array_column($check_list,"tv_id");
        $istop_arr=array_column($check_list,"sort","tv_id");

        $_orderby = "id ASC";
        $where = "status = 1 and uid={$user_id}";
        $Num = C::M('tv')->where($where)->getCount();
        $perpage = 20;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = 'admin/activity/tv/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
        $tv_list =  C::M('tv')->where(" status = 1 and uid= {$user_id} ")->field("id,title")->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();

        if( $tv_list ){
            foreach($tv_list as $key=>$value){
                if( in_array($value['id'],$list_id) ){
                    $tv_list[$key]['can_do']=1;
                }

                if( $istop_arr[$value['id']]==1 ){
                    $tv_list[$key]['istop']=1;
                }
            }
        }

        $this->assign("activity_id",$activity_id);
        $this->assign('list', $tv_list);
        $this->assign ('multipage', $multipage);
        $this->display('admin/activity/activity_tv.tpl');
    }

    public function save_tvAction()
    {
        $activity_id=$this->getParam("activity_id");
        if( !$activity_id ){
            echo $this->returnJson(0, '编辑失败,活动ID未能为空');
            exit();
        }

        $tv_list=$this->getParam("select");
        $istop=$this->getParam("istop");

        if( count($istop) >1 ){
            echo $this->returnJson(0, '编辑失败,只能推荐一个选择的');
            exit();
        }

        if( !empty($tv_list) ){//是否为空，为空就删除
            $res=C::M("activity_tv")->where(" activity_id ={$activity_id} ")->delete();
            if($res ){
                foreach ($tv_list as $key=>$value){
                    $one=array();
                    $one['activity_id']=$activity_id;
                    $one['tv_id']=$value;
                    if( isset($istop[0]) && $value==$istop[0] ){
                        $one['sort']=1;
                    }else{
                        $one['sort']=0;
                    }
                    C::M("activity_tv")->add($one);
                }


                echo $this->returnJson(1, '操作成功，正在返回...');
                exit();
            }

        }else{//
            $res=C::M("activity_tv")->where(" activity_id ={$activity_id} ")->delete();
            if($res ){
                echo $this->returnJson(1, '操作成功，正在返回...');
                exit();
            }
        }

    }

    /*
     * 绑定说说
     * */
    public function travelAction()
    {
        $activity_id=$this->getParam("id");
        $user_id=$this->getParam("user_id");
        if( !$activity_id ){
            echo $this->returnJson(0, '编辑失败,活动ID未能为空');
            exit();
        }

        $check_list=C::M("activity_travel")->field("id,travel_id,sort")->where(" activity_id={$activity_id} ")->select();
        $list_id=array_column($check_list,"travel_id");
        $istop_arr=array_column($check_list,"sort","travel_id");

        $_orderby = "id ASC";
        $where = "status = 1 and uid={$user_id} ";
        $Num = C::M('travel')->where($where)->getCount();
        $perpage = 20;
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $mpurl = 'admin/activity/travel/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
        $travel_list =  C::M('travel')->where(" status = 1 and uid={$user_id} ")->field("id,title")->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();

        if( $travel_list ){
            foreach($travel_list as $key=>$value){
                if( in_array($value['id'],$list_id) ){
                    $travel_list[$key]['can_do']=1;
                }

                if( $istop_arr[$value['id']]==1 ){
                    $travel_list[$key]['istop']=1;
                }
            }
        }

        $this->assign("activity_id",$activity_id);
        $this->assign('list', $travel_list);
        $this->assign ('multipage', $multipage);
        $this->display('admin/activity/activity_travel.tpl');
    }

    public function save_travelAction()
    {
        $activity_id=$this->getParam("activity_id");

        if( !$activity_id ){
            echo $this->returnJson(0, '编辑失败,活动ID未能为空');
            exit();
        }

        $tv_list=$this->getParam("select");
        $istop=$this->getParam("istop");

        if( count($istop) >1 ){
            echo $this->returnJson(0, '编辑失败,只能推荐一个选择的');
            exit();
        }

        if( !empty($tv_list) ){//是否为空，为空就删除

            $res=C::M("activity_travel")->where(" activity_id ={$activity_id} ")->delete();
            if($res ){
                foreach ($tv_list as $key=>$value){
                    $one=array();
                    $one['activity_id']=$activity_id;
                    $one['travel_id']=$value;
                    if( isset($istop[0]) && $value==$istop[0] ){
                        $one['sort']=1;
                    }else{
                        $one['sort']=0;
                    }
                    C::M("activity_travel")->add($one);
                }

                echo $this->returnJson(1, '操作成功，正在返回...');
                exit();
            }
        }else{//
            $res=C::M("activity_travel")->where(" activity_id ={$activity_id} ")->delete();
            if($res ){
                echo $this->returnJson(1, '操作成功，正在返回...');
                exit();
            }
        }

    }






}