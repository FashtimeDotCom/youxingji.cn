<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/6/4
 * Time: 10:38
 */
class Controller_Admin_Target extends Core_Controller_Action
{
    var $_pagetitle="目的地管理";
    var $_showfield=array(
        "a.id"=>"ID",
        "a.name"=>"目的地名称",
        "a.desc"=>"目的地描述",
        "a.title"=>"标题",

        "b.city_list"=>"旅经城市",
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
        $mapurl="admin/target/index/";
        $target_mdl=new Model_Target();

        $list=$target_mdl->get_list($select_field,$curpage);

        $this->assign("list",$list);

        $total=$target_mdl->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/activity/target_list.tpl");
    }

    public function addAction(){
        $this->editAction();
    }

    public function editAction($id=0)
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;

        if( $id ){
            //活动详情
            $target_mdl=new Model_Target();
            $detail=$target_mdl->get_one($id);
            if( $detail ){
                $this->assign("detail",$detail);
            }else{
                $this->showmsg('操作错误,内容不存在!', 'admin/index/index#12_2',3);
            }

            //城市地方
            $city_list=C::M("target_info")->field("*")->where(" target_id = {$id}")->select();
            if( $city_list ){
                $this->assign("city_list",$city_list);
            }
        }
        $this->assign('picdom', 'imgurl');
        $this->assign('picdoms', 'small_img');
        $this->display("admin/activity/target_edit.tpl");
    }


    public function saveAction()
    {
        $id=$this->getParam("id")?$this->getParam("id"):0;
        $name=$this->getParam("name");
        $desc=$this->getParam("desc");
        $title=$this->getParam("title");
        $ad_img_url=$this->getParam("ad_img_url");
        $university=$this->getParam("university");

        if( $id>0 ){
            //info
            $img_id_1=$this->getParam("info_1");
            $place_1=$this->getParam("name_1");
            $desc_1=$this->getParam("desc_1");
            $place_img_1=$this->getParam("tab_img_1");

            $img_id_2=$this->getParam("info_2");
            $place_2=$this->getParam("name_2");
            $desc_2=$this->getParam("desc_2");
            $place_img_2=$this->getParam("tab_img_2");

            $img_id_3=$this->getParam("info_3");
            $place_3=$this->getParam("name_3");
            $desc_3=$this->getParam("desc_3");
            $place_img_3=$this->getParam("tab_img_3");

            $data2=array(
                array(
                    "id"=>$img_id_1,
                    "city"=>$place_1,
                    "desc"=>$desc_1,
                    "img_url"=>$place_img_1
                ),
                array(
                    "id"=>$img_id_2,
                    "city"=>$place_2,
                    "desc"=>$desc_2,
                    "img_url"=>$place_img_2
                ),
                array(
                    "id"=>$img_id_3,
                    "city"=>$place_3,
                    "desc"=>$desc_3,
                    "img_url"=>$place_img_3
                )
            );
        }

        $data1=array(
            'name'=>$name,
            "ad_img_url"=>$ad_img_url,
            "desc"=>$desc,
            "title"=>$title,
            'university'=>$university
        );


        if( (int)$id>0 ){//update
            $res=C::M("target")->where(" id = {$id}")->update($data1);
            if( $res>0 ){
                $msg=array();
                foreach($data2 as $key=>$value){
                    $img_id=$value['id'];
                    $one=array();
                    $one['city']=$value['city'];
                    $one['img_url']=$value['img_url'];
                    $one['desc']=$value['desc'];
                    $res=C::M("target_info")->where(" id = {$img_id}")->update($one);
                    if( $res<=0 ){
                        $msg[]=$img_id;
                    }
                }

                if( count($msg) ){
                    $str=implode(",",$msg);
                    echo json_encode(array("code"=>0,"error"=>"ID为{$str}图片出错"));
                    exit();
                }else{
                    echo json_encode(array("code"=>1,"message"=>"success"));
                    exit();
                }

            }else{
                echo json_encode(array("code"=>0,"error"=>"编辑失败(1)"));
                exit();
            }

        }else{//add
            $res=C::M("target")->add($data1);
            if( $res>0 ){

                //创建三条记录
                $info_arr=array(
                    "target_id"=>$res
                );
                for($i=0;$i<=2;$i++){
                    C::M("target_info")->add($info_arr);
                }

                echo json_encode(array("code"=>1,"message"=>"success"));
                exit();
            }else{
                echo json_encode(array("code"=>0,"error"=>"添加失败"));
                exit();
            }
        }

    }




}