<?php
/*
 * 内容标签
 * @author Lee
 * @site http://www.vpcv.com
 */
class Tag_Article
{
	public function getList($params)
	{
		$wapOn = Core_Config::get('wap_on', 'wap', true);
		$num = isset($params['num']) ? $params['num'] : 6;
		$limit = isset($params['limit']) ? $params['limit'] : 0;
		$istop = isset($params['istop']) ? $params['istop'] : 0; //置顶
		$isspecial = isset($params['isspecial']) ? $params['isspecial'] : 0; //推荐
		$isindex = isset($params['isindex']) ? $params['isindex'] : 0; //首页显示
		$moduleid = isset($params['moduleid']) ? $params['moduleid'] : '';
		$isimage = isset($params['isimage']) ? $params['isimage'] : '';
		$orderby = isset($params['orderby']) ? $params['orderby'] : 'sort ASC, addtime DESC';
		$extend = isset($params['extend']) ? $params['extend'] : '';
		$where = "useable = '1'";
		if($params['catid'])
		{
			if(preg_match('/,/', $params['catid']))
			{
				$where .= " and catid IN (" . $params['catid'] . ")";
			}
			else
			{
				$where .= " and FIND_IN_SET('$params[catid]', catarr)";
			}
		}
		if($moduleid)
		{
			$where .= " and moduleid = '$moduleid'";
		}
		if($istop)
		{
			$where .= " and istop = '1'";
		}
		if($isspecial)
		{
			$where .= " and isspecial = '1'";
		}
		if($isindex)
		{
			$where .= " and isindex = '1'";
		}
		if($isimage)
		{
			$where .= " and articlethumb != ''";
		}
		$articles = C::M('article')->where($where)->order($orderby)->limit($limit, $num)->select();
		$key = 1;
		foreach($articles AS $idx => $article)
		{
			$pinyin = C::M('nav')->where('id', $article['catid'])->getField('pinyin');
			$pic = $article['articlethumb'] ? $article['articlethumb'] : Core_Fun::getPathroot() . 'resource/images/default.jpg';
			$origin = $article['articlepic'] ? $article['articlepic'] : Core_Fun::getPathroot() . 'resource/images/default.jpg';
			$articles[$idx]['articlethumb'] = $articles[$idx]['image'] = $pic;
			$articles[$idx]['origin'] = $origin;
			$articles[$idx]['catname'] = C::M('nav')->where('id', $article['catid'])->getField('name');
			$articles[$idx]['key'] = $key;
			if(Core_Comm_Validator::isMobile() && $wapOn)
			{
				$articles[$idx]['url'] = Core_Fun::getPathroot() . 'wap/article/' . $pinyin . '/' . $article['id'] . '.html';
				$articles[$idx]['caturl'] = Core_Fun::getPathroot() . 'wap/article/' . $pinyin;
			}
			else
			{
				$articles[$idx]['url'] = Core_Fun::getPathroot() . 'article/' . $pinyin . '/' . $article['id'] . '.html';
				$articles[$idx]['caturl'] = Core_Fun::getPathroot() . 'article/' . $pinyin;
			}
			
			if($extend)
			{
				$extends = C::M('module')->mtable($article['moduleid'])->queryOne($extend, array(array('aid', $article['id'])));

				$articles[$idx]['extend'] = $extends;
			}
			$key++;
		}
		return $articles;
	}
}
?>