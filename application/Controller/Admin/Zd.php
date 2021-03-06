<?php
class Controller_Admin_Zd extends Core_Controller_Action
{
	public function __construct($params)
    {
        parent::__construct($params);
    }
	
	public function getAction()
	{
		$mysql = include ROOT . 'config/db.php';
		$sql="show tables from " . $mysql['dbName'];
		$tables = Core_Db::fetchAll($sql);
		$form = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		$form .= '<form name="tb" method="post" action="' . Core_Fun::getPathroot() . 'admin/zd/set">';
		$form .= '<select name="tb" id="tb"><option value="">--please--</option>';
		foreach($tables AS $_table)
		{
			$form .= '<option value="' . $_table['Tables_in_' . $mysql['dbName']] . '">' . $_table['Tables_in_' . $mysql['dbName']] . '</option>';
		}
		$form .= '</select>';
		$form .= '<input type="submit" value="生成" name="sub" />';
		$form .= '</form>';
		
		echo $form;
	}
	
	public function setAction()
	{
		header("Content-type: text/html; charset=utf-8"); 
		$table = '' == $_POST['tb'] ? 'g_product_hotel' : $_POST['tb'];
		
		$sql = "SHOW COLUMNS FROM `$table`";
		$Field = Core_Db::fetchAll($sql);
		$info = '';
		foreach($Field AS $_field)
		{
			$info .= "'" . $_field['Field'] . "', ";
		}
		echo substr($info, 0, strlen($info) - 2);
		echo '<br /><a href="' . Core_Fun::getPathroot() . 'admin/zd/get">返回</a>';
	}
	
	public function headAction()
	{
		$sql = "SELECT id, catname FROM ##__base_category";
		$row = Core_Db::fetchAll($sql);
		foreach($row AS $res)
		{
			$pinyin = Core_Util_Tutil::getPinyin($res['catname']);
			$head = strtoupper(substr($pinyin, 0, 1)); 
			
			$updatesql = "UPDATE ##__base_category SET pinyin = '$pinyin', head = '$head' WHERE id ='$res[id]'";
			Core_Db::query($updatesql);
		}
	}
	
	public function stapleAction()
	{
		$_materModel = new Model_Cbookmater();
		$sql = "SELECT staple FROM ##__card_cbook";
		$row = Core_Db::fetchAll($sql);
		foreach($row AS $res)
		{
			$_materModel->addMater($res['staple']);
		}
		echo '处理完成';
	}
	
	public function tableupdateAction()
	{
		$sql = "ALTER TABLE `g_user_bind` ADD `reason` VARCHAR( 100 ) NOT NULL AFTER `useable` ;";
		Core_Db::query($sql);
	}
}
?>