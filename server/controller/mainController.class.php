<?php
/**
 * 用户模块控制器类
 */
require_once 'model/userModel.class.php';
require_once 'dal/dalUser.class.php';
require_once 'config/configs.class.php';
class mainController{
	/**
	 * 获取主页滚动栏资源
	 */
	public function mainSliderResAction(){
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
			$resp = array ("ret" => Configs::$error_code['success'],"data" => Configs::$main_slider_res);
		}
		echo json_encode($resp);
	}


	/**
	 * 获取全部课程视频列表数据
	 */
	public function caseGetAllAction(){
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
			$resp = array ("ret" => Configs::$error_code['success'],"data" => Configs::$main_vedio_res);
		}
		echo json_encode($resp);
	}


	/**
	 * 获取某课程相关视频数据
	 */
	public function caseGetDetailsAction(){
		//实例化模型，取出数据
		$uid = $_POST['user_id'];
		$casename=$_POST['case'];
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
			foreach(Configs::$main_vedio_res as $onecase)
			{
				if($onecase['name']==$casename){
					$resp = array ("ret" => Configs::$error_code['success'],"data" => $onecase);
				}
			}

		}
		echo json_encode($resp);
	}


	/**
	 * 获取主页课程栏资源
	 */
	public function mainSourceResAction(){
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
			$resp = array ("ret" => Configs::$error_code['success'],"data" => Configs::$main_source_res);
		}
		echo json_encode($resp);
	}

	public function SourceKeChengAction(){

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
			$resp = array ("ret" => Configs::$error_code['success'],"data" => Configs::$main_source_res);
		}
		echo json_encode($resp);

	}

	/**
	 * 获取主页视频栏资源
	 */
	public function mainVideoResAction(){
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
			$resp = array ("ret" => Configs::$error_code['success'],"data" => Configs::$main_video_res);
		}
		echo json_encode($resp);
	}
}
