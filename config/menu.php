<?php
return array(
	Core_Fun::Lang('menu::menu_index') => array(
		array('url'=>'/admin/index/home','name'=>Core_Fun::Lang('menu::menu_index_index'),'auth'=>'index_home', 'icon' => 'icon-desktop')
	),
	Core_Fun::Lang('menu::menu_nav') => array(
		array('url'=>'/admin/nav/index','name'=>Core_Fun::Lang('menu::menu_nav_index'),'auth'=>'nav_index', 'icon' => 'icon-sitemap'),
		array('url'=>'/admin/ad/index','name'=>Core_Fun::Lang('menu::menu_nav_ad'),'auth'=>'ad_index', 'icon' => 'icon-facetime-video'),
		array('url'=>'/admin/category/index/item/1','name'=>'联动类别','auth'=>'category_index', 'icon' => 'icon-facetime-video'),
		array('url'=>'/admin/module/list','name'=>'模型列表','auth'=>'module_list', 'icon' => 'icon-facetime-video')
	),
	/*Core_Fun::Lang('menu::menu_category') => array(
		array('url' => '/admin/category/index/item/1', 'name' => '品牌类别', 'auth' => 'category_index', 'icon' => 'icon-reorder')
	),*/
	Core_Fun::Lang('menu::menu_ryt') => array(
		array('url' => '/admin/ryt/index', 'name' => '日阅潭', 'auth' => 'ryt_index', 'icon' => 'icon-file-alt'),
		array('url' => '/admin/ryt/comment', 'name' => '评论列表', 'auth' => 'ryt_comment', 'icon' => 'icon-file-alt'),
        array('url' => '/admin/TravelNote/index', 'name' => '游记', 'auth' => 'travel_note', 'icon' => 'icon-file-alt'),
	),
  	Core_Fun::Lang('menu::menu_tv') => array(
		array('url' => '/admin/youhua/tv', 'name' => 'TV列表', 'auth' => 'youhua_tv', 'icon' => 'icon-file-alt'),
	),
  	Core_Fun::Lang('menu::menu_recruiting') => array(
		array('url' => '/admin/recruiting/index', 'name' => '招募令', 'auth' => 'recruiting_index', 'icon' => 'icon-file-alt'),
      	array('url' => '/admin/recruiting/entered', 'name' => '报名表', 'auth' => 'recruiting_entered', 'icon' => 'icon-file-alt'),
	),
  	Core_Fun::Lang('menu::menu_youhua') => array(
		array('url' => '/admin/youhua/writer', 'name' => '游画作者', 'auth' => 'youhua_writer', 'icon' => 'icon-file-alt'),
		array('url' => '/admin/youhua/scenery', 'name' => '作品列表', 'auth' => 'youhua_scenery', 'icon' => 'icon-file-alt'),
        array('url' => '/admin/ForeignScenery/index', 'name' => '海外专区', 'auth' => 'foreign_scenery', 'icon' => 'icon-file-alt'),

        array('url'=>"/admin/sketch/index","name"=>"带你写生","auth"=>"sketch","icon"=>"icon-file-alt"),
        array('url'=>"/admin/sketchDetail/index","name"=>"写生详情","auth"=>"sketch_detail","icon"=>"icon-file-alt"),
        array('url'=>"/admin/sketchEveryday/index","name"=>"详细行程","auth"=>"sketch_everyday","icon"=>"icon-file-alt"),
        array('url'=>"/admin/sketchApply/index","name"=>"写生报名","auth"=>"sketch_apply","icon"=>"icon-file-alt"),
	),
  	Core_Fun::Lang('menu::menu_star') => array(
		array('url' => '/admin/youhua/star', 'name' => '达人邦', 'auth' => 'youhua_star', 'icon' => 'icon-file-alt'),
      	array('url' => '/admin/youhua/tourism', 'name' => '旅游地', 'auth' => 'youhua_tourism', 'icon' => 'icon-file-alt'),

        array('url'=>"/admin/starTravel/index","name"=>"带你旅行","auth"=>"star_travel","icon"=>"icon-file-alt"),
        array('url'=>"/admin/starTravelDetail/index","name"=>"旅游详情","auth"=>"star_travel_detail","icon"=>"icon-file-alt"),
        array('url'=>"/admin/starTravelEveryday/index","name"=>"详细行程","auth"=>"star_travel_everyday","icon"=>"icon-file-alt"),
        array('url'=>"/admin/starTravelApply/index","name"=>"旅游报名","auth"=>"star_travel_apply","icon"=>"icon-file-alt"),
	),
	Core_Fun::Lang('menu::menu_journey') => array(
        array('url' => '/admin/JourneyLabel/index', 'name' => '标签+分类', 'auth' => 'journey_label', 'icon' => 'icon-file-alt'),
		array('url' => '/admin/article/index', 'name' => '独家线路', 'auth' => 'article_index', 'icon' => 'icon-file-alt'),
      	array('url' => '/admin/article/baojia', 'name' => '日历报价', 'auth' => 'article_baojia', 'icon' => 'icon-file-alt'),
		array('url' => '/admin/article/features', 'name' => '特色体验', 'auth' => 'article_features', 'icon' => 'icon-file-alt'),
		array('url' => '/admin/article/trip', 'name' => '详细行程', 'auth' => 'article_trip', 'icon' => 'icon-file-alt'),
		array('url' => '/admin/leaving/index', 'name' => '预约报名', 'auth' => 'leaving_index', 'icon' => 'icon-file-alt')
	),
	Core_Fun::Lang('menu::menu_sms') => array(
		array('url' => '/admin/sms/index', 'name' => '短信列表', 'auth' => 'sms_index', 'icon' => 'icon-file-alt')
	),
	/*Core_Fun::Lang('menu::menu_forum') => array(
		array('url'=>'/admin/forum/index','name'=>Core_Fun::Lang('menu::menu_forum_index'),'auth'=>'forum_index', 'icon' => 'icon-book'),
		array('url'=>'/admin/forum/thread','name'=>Core_Fun::Lang('menu::menu_forum_thread'),'auth'=>'forum_thread', 'icon' => 'icon-file-alt'),
		array('url'=>'/admin/forum/post','name'=>Core_Fun::Lang('menu::menu_forum_post'),'auth'=>'forum_post', 'icon' => 'icon-comment')
	),*/
	Core_Fun::Lang('menu::menu_user') => array(
		array('url'=>'/admin/user/search','name'=>Core_Fun::Lang('menu::menu_user_search'),'auth'=>'user_search', 'icon' => 'icon-user'),
		array('url'=>'/admin/banned/manage','name'=>Core_Fun::Lang('menu::menu_user_banned'),'auth'=>'banned_manage', 'icon' => 'icon-info-sign')
	),
	Core_Fun::Lang('menu::menu_tool') => array(
		array('url'=>'/admin/db/backup/issingle/1','name'=>Core_Fun::Lang('menu::menu_tool_backup'),'auth'=>'db_backup'),
		array('url'=>'/admin/db/restore','name'=>Core_Fun::Lang('menu::menu_tool_restore'),'auth'=>'db_restore'),
		array('url'=>'/admin/tool/updatecache/issingle/1','name'=>Core_Fun::Lang('menu::menu_tool_upcache'),'auth'=>'tool_updatecache'),
		array('url'=>'/admin/stats/index','name'=>Core_Fun::Lang('menu::menu_tool_stats'),'auth'=>'stats_index'),
		array('url'=>'/admin/link/index','name'=>Core_Fun::Lang('menu::menu_tool_link'),'auth'=>'link_index')
	),
	Core_Fun::Lang('menu::menu_setting') => array(
        array('url'=>'/admin/config/site/issingle/1','name'=>Core_Fun::Lang('menu::menu_setting_site'),'auth'=>'config_site','icon' => 'icon-cog'),
		array('url'=>'/admin/config/basic/issingle/1','name'=>Core_Fun::Lang('menu::menu_setting_basic'),'auth'=>'config_basic', 'icon' => 'icon-asterisk'),
		array('url'=>'/admin/config/wap/issingle/1','name'=>Core_Fun::Lang('menu::menu_setting_wap'),'auth'=>'config_wap', 'icon' => 'icon-tablet'),
		//array('url'=>'/admin/config/sec/issingle/1','name'=>Core_Fun::Lang('menu::menu_setting_gd'),'auth'=>'config_sec', 'icon' => 'icon-lock'),
		array('url'=>'/admin/config/mail/issingle/1','name'=>Core_Fun::Lang('menu::menu_setting_email'),'auth'=>'config_mail', 'icon' => 'icon-envelope'),
		array('url'=>'/admin/config/water/issingle/1','name'=>Core_Fun::Lang('menu::menu_setting_water'),'auth'=>'config_water', 'icon' => 'icon-tag'),
		//array('url'=>'/admin/config/template/issingle/1','name'=>Core_Fun::Lang('menu::menu_setting_template'),'auth'=>'config_template', 'icon' => 'icon-folder-close-alt'),
		//array('url'=>'/admin/config/third/issingle/1','name'=>Core_Fun::Lang('menu::menu_setting_third'),'auth'=>'config_third', 'icon' => 'icon-cloud-upload')
        array('url'=>'/admin/TrafficNum/index','name'=>'流量设置','auth'=>'traffic_num', 'icon' => 'icon-tag'),
	),
    Core_Fun::Lang('menu::menu_activity') => array(
        array('url'=>'/admin/activitytype/index','name'=>"活动分类",'auth'=>'activity_type'),
        array('url'=>'/admin/target/index','name'=>"目的地列表",'auth'=>'target'),
        array('url'=>'/admin/activity/index','name'=>"活动列表",'auth'=>'activity'),
        array('url'=>'/admin/ActivityVote/index','name'=>"名单公布",'auth'=>'activity_vote'),
    ),
    Core_Fun::Lang('menu::menu_faq') => array(
        array('url'=>'/admin/faq/index','name'=>"问答列表",'auth'=>'faq_list'),
    ),
);
