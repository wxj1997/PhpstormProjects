<?php
/**
 * 用户模块控制器类
 */
require_once 'model/userModel.class.php';
require_once 'dal/dalUser.class.php';
require_once 'dal/dalSubjects.class.php';
require_once 'config/configs.class.php';
require_once 'utils/utils.class.php';
class sourceController{
	/**
	 * 获取有题库的课程列表资源
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
			$util = Utils::getInstance();
			$result = $util->get_json('config/source.json');
			$resp = array ("ret" => Configs::$error_code['success'],"data" => $result);
		}
		echo json_encode($resp);
	}

	/**
	 * 获取某课程题集数据
	 */
	public function GetDetailAction(){
		//实例化模型，取出数据
		$uid = $_POST['user_id'];
		$sid = $_POST['source_id'];
		$sj_id = $_POST['subjects_id'];
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
//			$util = Utils::getInstance();
//			$result = $util->get_json('config/subjects.json');
			$key = $sid*1000 + $sj_id;
			$sub=dalSubjects::getInstance();
			$result=$sub->getOneSubjects($key);
//			$result = $result['subjects'][$key];


			$resp = array ("ret" => Configs::$error_code['success'],"data" => $result);
		}
		echo json_encode($resp);
	}

	/**
	 * 交卷接口
	 */
	public function ExamFinishAction(){
		//实例化模型，取出数据
		$uid = $_POST['user_id'];
		$s_id = $_POST['source_id'];
		$sj_id = $_POST['subjects_id'];
		$abc =$_POST['answers'];
		$ansewers=json_decode($abc);
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


            $key = $s_id*1000 + $sj_id;
            $sub=dalSubjects::getInstance();
            $result=$sub->getOneSubjects($key);

//			$util = Utils::getInstance();
//			$result = $util->get_json('config/subjects.json');
//			$key = $s_id*1000 + $sj_id;
//			$configData = $result['subjects'][$key];

			$score = 0;
			foreach($ansewers as $sid=>$ansewer)
			{
                if( $result[$sid]->answer == $ansewer )
				{
					$score = $score + $result[$sid]->score;
				}
			}
			$respData = array();
			$respData['score'] = $score;
			$resp = array("ret" => Configs::$error_code['success'],"data" =>$respData);
		}
		echo json_encode($resp);
	}

	/**
	 * 获取指定课程视频数据
	 */
	public function videoGetDetailAction(){
		//实例化模型，取出数据
		$uid = $_POST['user_id'];
		$vd=$_POST['video_id'];
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
			$util = Utils::getInstance();
			$result = $util->get_json('config/video.json');
			$result = $result['classes'][$vd];
			$resp = array ("ret" => Configs::$error_code['success'],"data" => $result);
		}
		echo json_encode($resp);
	}

	public function testAction(){
		$uid=$_POST['user_id'];
		$dal=dalUser::getInstance();
		$bValid=$dal->checkUserValid($uid);
		$resp=null;
		if($bValid == false)
		{
			$resp = array ("ret" => Configs::$error_code['user_invalid']);
		}
		else
		{
			$util = dalSubjects::getInstance();
			$result=$util->getAllSubjects();
			$resp = array ("ret" => Configs::$error_code['success'],"data" => $result);
		}
		echo json_encode($resp);

	}


	}
