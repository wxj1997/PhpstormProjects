<?php
/**
 * 用户模块控制器类
 */
require_once 'model/userModel.class.php';
require_once 'dal/dalUser.class.php';
require_once 'config/configs.class.php';
require_once 'dal/dalTheme.class.php';
class themeController{
	/**
	 *
	 */
	public function getAllAction(){
		$uid = $_POST['user_id'];
		//检测请求用户是否合法
		$dal = dalUser::getInstance();
		$bValid = $dal->checkUserValid($uid);
		$resp = null;
		if($bValid == false)
		{
			$resp = array ("ret" => Configs::$error_code['user_invalid']);
		}
		else
		{
			$theme=dalTheme::getInstance();
			$theme_all=$theme->getAllTheme();
			$resp = array ("ret" => Configs::$error_code['success'],"data" => $theme_all);
		}
		echo json_encode($resp);
	}

	public function getThemeIdAction(){
		$uid = $_POST['user_id'];
		$key=$_POST['theme_name'];
		//检测请求用户是否合法
		$dal = dalUser::getInstance();
		$bValid = $dal->checkUserValid($uid);
		$resp = null;
		if($bValid == false)
		{
			$resp = array ("ret" => Configs::$error_code['user_invalid']);
		}
		else
		{
			$theme=dalTheme::getInstance();
			$theme_one=$theme->getTheme($key);
			if ($theme_one==0){
                $resp = array ("ret" => Configs::$error_code['user_invalid']);
            }else {
                $resp = array("ret" => Configs::$error_code['success'], "data" => $theme_one);
            }
		}
		echo json_encode($resp);
	}

}
