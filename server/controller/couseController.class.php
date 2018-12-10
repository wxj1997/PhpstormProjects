<?php
/**
 * 用户模块控制器类
 */
require_once 'model/userModel.class.php';
require_once 'dal/dalUser.class.php';
require_once 'model/couseModel.class.php';
require_once 'dal/dalCouse.class.php';
require_once 'dal/dalSubjects.class.php';
require_once 'config/configs.class.php';
class couseController{
	/**
	 * 获取所有课程
	 */
	public function GetAllAction(){
		//实例化模型，取出数据
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
			$couse=dalCouse::getInstance();
			$result=$couse->getAllCouse();
			$resp = array ("ret" => Configs::$error_code['success'],"data" => $result);
		}
		echo json_encode($resp);
	}



	}
