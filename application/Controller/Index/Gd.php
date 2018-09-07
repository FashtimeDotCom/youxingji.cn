<?php
/*
 * 验证码
 */
 
class Controller_Index_Gd extends Core_Controller_Action
{

	public function indexAction()
	{
		$width = $this->getParam('width');
		$width = $width ? $width : 100;
		$height = $this->getParam('height');
		$height = $height ? $height : 50;
		$gdcheck = new Core_Lib_Gdcheck();
		$gdcheck->Img_x = $width;
		$gdcheck->Img_y = $height;
		$gdcheck->createImg();
	}

}