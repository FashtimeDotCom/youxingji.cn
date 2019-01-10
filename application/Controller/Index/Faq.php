<?php

/**
 * Created by PhpStorm.
 * User: Kael
 * Date: 2018/11/22
 * Time: 09:26
 */
class Controller_Index_Faq extends Core_Controller_TAction
{
    public function preDispatch()
    {
        parent::preDispatch();
    }

    //问题列表页
    public function indexAction()
    {
        $perpage = 8;
        $where = " a.status = 1 ";
        $keyword = htmlspecialchars($this->getParam('keyword'), ENT_QUOTES);
        if ($keyword) {
            $where .= " and a.label like '%$keyword%'";
        }

        $search = htmlspecialchars($this->getParam('search'), ENT_QUOTES);
        if ($search) {
            $where .= " and (a.label like '%$search%' or a.title like '%$search%' or a.desc like '%$search%')";
            $this->assign('search', $search);
        }

        $type = $this->getParam("type") ?? 1;//分类 1-热门回答 2-最新回答 3-待回答
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
                $where .= " and response_num=0 ";
                $order = "a.addtime desc";
                break;
            default:
                $order = "a.show_num desc";
                break;
        }


        $page = $this->getParam("page") ?? 1;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //返回数据
        if ($type == 3) {
            $list = C::M("faq as a")->field('a.*,b.username,b.headpic')->join('##__user_member as b', "a.uid=b.uid", "left")->where($where)->order($order)->limit($limit)->select();
        } else {
            $list = C::M("faq as a")->field('a.*,b.username,b.headpic')->join('##__user_member as b', "a.uid=b.uid", "left")->where($where)->order($order)->limit($limit)->select();
        }

        if ($type == 1 && $list) {
            foreach ($list as $key => $value) {
                if ($value['label']) {
                    $list[$key]['label_arr'] = explode('/', $value['label']);
                }
            }
        }

        //热门标签
        if (!$_SESSION['faq_label_list']) {
            $label_list = C::M('faq')->field('label')->where("status=1")->order('show_num desc')->limit(10)->select();
            if ($label_list) {
                foreach ($label_list as $key => $value) {
                    $label_list[$key] = explode('/', $value['label']);
                }
                $result = array_reduce($label_list, 'array_merge', array());
                $result = array_count_values($result);
                arsort($result);
                $res = array_keys($result);//返回key列表
                if (count($res) > 10) {
                    $res = array_slice($res, 0, 10);
                }
                $_SESSION['faq_label_list'] = $res;
            }
        }
        $res = $_SESSION['faq_label_list'];
        $this->assign('label_list', $res);

        $Num = C::M('faq as a')->where($where)->getCount();
        $mpurl = "index.php?m=index&c=faq&v=index&keyword=$keyword&type=$type";
        $multipage = $this->multipages($Num, $perpage, $page, $mpurl);
        $this->assign('keyword', $keyword);
        $this->assign("type", $type);
        $this->assign('multipage', $multipage);
        $this->assign('list', $list);
        $this->assign('ns', 'faq');
        $this->assign('page_info', array('num' => $Num, 'total_page' => ceil($Num / $perpage)));
        $this->display('index/faq/index.tpl');
    }

    //回答列表页
    public function detailAction()
    {
        $faq_id = $this->getParam('id');
        if (!$faq_id) {
            $this->showmsg('问答不存在，跳转中...', '/index.php?m=index&c=faq&v=index', 2);
        }

        //问题的详情
        $detail = C::M('faq as a')->field('a.*,b.username,b.headpic')->join('##__user_member as b', 'a.uid=b.uid', 'left')->where("a.id={$faq_id} and a.status=1")->find();
        $label = $detail['label'];
        if ($detail) {
            $detail['headpic'] = $detail['headpic'] ? $detail['headpic'] : '/resource/images/img-lb2.png';
            $detail['label'] = explode('/', $detail['label']);
            C::M('faq')->where('id', $faq_id)->setInc('show_num', 1);
            $this->assign('faq_detail', $detail);
        } else {
            $this->showmsg('问答不存在，跳转中...', '/index.php?m=index&c=faq&v=index', 2);
        }

        $page = $this->getParam("page") ?? 1;
        $perpage = 8;
        $limit = $perpage * ($page - 1) . "," . $perpage;
        //获取该问题的回答列表    回复列表
        $res_list = C::M('faq_response as a')->field('a.*,b.username,b.headpic,realname')->join('##__user_member as b', 'a.uid=b.uid', 'left')->where("a.faq_id={$faq_id}")->order('top_num desc,a.addtime desc')->limit($limit)->select();
        if ($res_list) {
            $joins = array(
                array('##__user_member as b', 'a.uid=b.uid', 'left'),
                array('##__user_member as c', 'a.touid=c.uid', 'left')
            );
            foreach ($res_list as $key => $value) {
                $res_list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
                $res_list[$key]['content'] = urldecode($value['content']);
                $res_list[$key]['headpic'] = $value['headpic'] ? $value['headpic'] : '/resource/images/img-lb2.png';

                // 获取评论列表
                $son = array();
                $son = C::M('comment as a')->field("a.*,b.username,c.username as to_username,b.realname,c.realname as to_realname")
                    ->joins($joins)
                    ->where("rid={$faq_id} and type=4 and pid={$value['id']}")->limit(0,10)->order('id ASC')->select();
                if ($son) {
                    foreach ($son as $k => $val) {
                        $son[$k]['content'] = Core_Fun::ubbreplace($val['content']);
                        $son[$k]['addtime'] = date('Y-m-d H:i:s',$val['addtime']);
                    }
                    $res_list[$key]['sub'] = $son;
                    unset($son);
                }
                $count = C::M('comment as a')->field("a.*,b.username,c.username as to_username,b.realname,c.realname as to_realname")
                    ->joins($joins)
                    ->where("rid={$faq_id} and type=4 and pid={$value['id']}")->getCount();
                $res_list[$key]['count'] = $count;
            }
            $this->assign("response_list", $res_list);
        }

        // 获取相关问题
        $relevant_list = C::M('faq')->where("id !={$detail['id']} and status = 1 and label like '%{$label}%'")
            ->field('id,title,response_num')->limit(100)
            ->select();
        foreach ($relevant_list as $k => $v) {
            $arr_similar[$k] = similar_text($v['title'], $detail['title']);
        }
        arsort($arr_similar); //按照相似的字节数由高到低排序
        reset($arr_similar); //将指针移到数组的第一单元
        $index = 0;
        $list = [];
        foreach ($arr_similar as $old_index => $similar) {
            if ($index < 6) {
                $list[$index]['id'] = $relevant_list[$old_index]['id'];
                $list[$index]['title'] = $relevant_list[$old_index]['title'];
                $list[$index]['response_num'] = $relevant_list[$old_index]['response_num'];
            }
            $index++;
        }
        $this->assign("arr_similar", $list);

        //跳转链接加密
        $from_url = base64_encode("/index.php?m=index&c=faq&v=detail&id={$faq_id}");
        $this->assign('from_url', $from_url);

        //分页
        $Num = C::M('faq_response as a')->where("a.faq_id={$faq_id}")->getCount();
        $mpurl = "index.php?m=index&c=faq&v=detail&id={$faq_id}";
        $multipage = $this->multipages($Num, $perpage, $page, $mpurl);
        $this->assign('page_info', array('num' => $Num, 'total_page' => ceil($Num / $perpage)));
        $this->assign('multipage', $multipage);

        $this->assign('ns', 'faq');
        $this->assign('faq_id', $faq_id);
        $this->display('index/faq/response_list.tpl');
    }
}