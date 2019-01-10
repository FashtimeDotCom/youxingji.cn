<?php
/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/11/15
 * Time: 15:27
 */
class Controller_Index_Travelnote extends Core_Controller_TAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    public function note_listAction()
    {

        $y = intval($this->getParam('y')) ? intval($this->getParam('y')) : date('Y');//传参
        $dy = date('Y');//当前
        $dm = date('n');//当前
        $dd = date('d');
        if($y > $dy){
            $y = $dy;
        }elseif($y < 2010){
            $y = 2010;
        }
        $list = array();
        if($dy == $y){//当前年
            //月
            $m_arr=array();
            for( $i=1;$i<=12;$i++ ){
                if( $i < $dm  ){
                    $m_arr[$i]='ls';
                }else if( $i ==$dm ){
                    $m_arr[$i]='ls on';
                }else{
                    $m_arr[$i]='no';
                }
            }
        }else{//之前年
            //月
            $dm=1;
            $m_arr=array();
            for( $i=1;$i<=12;$i++ ){
                $m_arr[$i]='ls on';
            }
        }
        $this->assign('date_info',array('now'=>array('y'=>$y,'m'=>$dm,'d'=>$dd),'months'=>$m_arr));

        //推荐5条
        $tj_list=C::M('ryt_note_table')->field('id,title,showtime,top_pic,headpic,type')->order("showtime desc,id desc")->limit(0,5)->select();
        if( $tj_list ){
            foreach($tj_list as $key=>$value){
                $tj_list[$key]['showtime']=date('j',$value['showtime'])."/".date('F',$value['showtime']).".".date('Y',$value['showtime']);
            }
            $this->assign('tj_list',$tj_list);
        }

        //搜索这个月所有游记
        $date=$this->mFristAndLastAction($y,$dm);
        $from=$date['firstday'];
        $to=$date['lastday'];

        $perpage=10;
        $page=$this->getParam("page")??1;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        $list=C::M('ryt_note_table')->field('id,title,summary,username,shownum,showtime,thumbfile,headpic,type,address,uid,top_pic')->where("showtime BETWEEN $from and $to")->order('showtime DESC')->limit($limit)->select();
//        var_dump($list);die();
        if($list){
            foreach($list as $key=>$value){
                $list[$key]['showtime']=date('Y-m-d',$value['showtime']);
                if( $value['type']==1 ){
                    $list[$key]['summary']=strip_tags($value['summary']);
                }
            }
        }

        $Num = C::M('ryt_note_table')->where("showtime BETWEEN $from and $to")->getCount();
        $mpurl = "index.php?m=index&c=travelnote&v=note_list";
        $multipage = $this->multipages ($Num, $perpage, $page, $mpurl);
        if( $multipage ){
            unset($multipage[count($multipage)-1]);
        }

        $this->assign('list',$list);
        $this->assign('page_info',array('num'=>$Num,'total_page'=>ceil($Num/$perpage)));
        $this->assign ('multipage', $multipage);
        $this->assign('ns','ryt');
        $this->display('index/travel_note/list.tpl');
    }

    /**
     * 获取指定月份的第一天开始和最后一天结束的时间戳
     *
     * @param int $y 年份 $m 月份
     * @return array(本月开始时间，本月结束时间)
     */
    function mFristAndLastAction($y = "", $m = ""){
        if ($y == "") $y = date("Y");
        if ($m == "") $m = date("m");
        $m = sprintf("%02d", intval($m));
        $y = str_pad(intval($y), 4, "0", STR_PAD_RIGHT);

        $m>12 || $m<1 ? $m=1 : $m=$m;
        $firstday = strtotime($y . $m . "01000000");
        $firstdaystr = date("Y-m-01", $firstday);
        $lastday = strtotime(date('Y-m-d 23:59:59', strtotime("$firstdaystr +1 month -1 day")));

        return array(
            "firstday" => $firstday,
            "lastday" => $lastday
        );
    }


}