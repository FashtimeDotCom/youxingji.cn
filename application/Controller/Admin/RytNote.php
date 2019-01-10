<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/12/3
 * Time: 10:51
 */
class Controller_Admin_RytNote extends Core_Controller_Action
{
    var $_pagetitle="游记整合表";
    var $_showfield=array(
        "id"=>"ID",
        "title"=>"标题",
        "username"=>"作者",
        "showtime"=>"发布时间",
        "istop"=>"是否推荐",
        'type'=>'游记类型'
    );

    var $is_top=array(
        0=>"不推荐",
        1=>"推荐"
    );

    var $type=array(
        1=>'<span style="color: green;">后台游记</span>',
        2=>'<span style="color: blue;">用户游记</span>'
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
        $limit = $perpage * ($curpage - 1) . "," . $perpage;

        $mapurl="admin/RytNote/index/";
        $list=C::M('ryt_note_table')->field('id,title,username,showtime,istop,type')->order('showtime desc,id desc')->limit($limit)->select();
        if( $list ){
            foreach( $list as $key=>$value ){
                $list[$key]['type']=$this->type[$value['type']];
                $list[$key]['showtime']=date('Y-m-d',$value['showtime']);
            }
        }
        $this->assign("list",$list);

        $total=C::M('ryt_note_table')->getCount();
        $this->assign("total",$total);

        $multipage = $this->multipage($total, $perpage, $curpage, $mapurl);
        $this->assign('multipage', $multipage);

        $this->display("admin/travel_note/ryt_note_list.tpl");
    }

    public function moreAction()
    {
        if($this->getParam('id'))
        {
            $_ids = $this->getParam ('id');
            $_istops = $this->getParam ('istop');
            foreach($_ids AS $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
                    'istop' => intval($_istops[$_id]),
                );

                C::M('ryt_note_table')->update ($_data);
            }
        }

        echo $this->returnJson(1, '操作成功，正在返回...');
    }


}