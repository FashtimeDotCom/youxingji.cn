<?php

/**
 * 工具
 *
 * @author snake.L
 */
class Controller_Admin_Tool extends Core_Controller_Action
{

    /**
     * 更新缓存
     */
    public function updatecacheAction ()
    {
        if ($this->getParam ('updatecache')) 
		{
            Core_Cache::updateAllCache ();
			echo $this->returnJson(1, '缓存清理成功');
        }
		else
		{
        	$this->display ('admin/tool_updatecache.tpl');
		}
    }
}