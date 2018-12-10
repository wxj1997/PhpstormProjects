<?php
/**
 * 用户模块控制器类
 */
require_once 'model/trsourceModel.class.php';
require_once 'dal/dalTrsource.class.php';
require_once 'dal/dalTeacher.class.php';
/*require_once 'dal/dalSubjects.class.php';*/
require_once 'config/configs.class.php';
require_once 'utils/utils.class.php';
class trsourceController{
	/**
	 * 获取某教师的课程列表资源
	 */
	public function sourceAddAction(){
		//实例化模型，取出数据
	    $tid=$_POST['t_id'];
		$sname = $_POST['c_name'];
		if(strlen($sname)<20)
		{
			if(ctype_alnum($tid)) {
				$tr = new trsourceModel();
				$tr->tid=$tid;
				$tr->sname = $sname;

				$dal =dalTrsource::getInstance();

				$pd = $dal->getTrsourceName($sname);
				if ($pd == 0) {
					$resp = array("ret" => Configs::$error_code['register_fail']);
				} else {
					$dal->savetrsource($tr);

					$resp = array("ret" => Configs::$error_code['success'], "data" => array("source_id" => $tr->sid));
				}

			}
			else{
				$resp = array("ret" => Configs::$error_code['register_type_fail']);
			}
		}
		else
		{
			$resp = array("ret" => Configs::$error_code['register_len_fail']);
		}
		echo json_encode($resp);
	}
	public function GetAllAction(){
		//实例化模型，取出数据
        $tid = $_POST['tid'];
        //检测请求用户是否合法
		$dal = dalTeacher::getInstance();
        $bValid = $dal->checkUserValid($tid);
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

		$sid = $_POST['source_id'];

		/*$sj_id = $_POST['subjects_id'];*/
		//检测请求用户是否合法
		$dal = dalTeacher::getInstance();
		$bValid = $dal->checkUserValid($sid);
		$resp = null;
		if($bValid == false)
		{
			$resp = array ("ret" => Configs::$error_code['user_invalid']);
		}
		else
		{
	        $util = Utils::getInstance();
		    $result = $util->get_json('config/trsource.json');
		/*	$key = $sid*1000 + $sj_id;*/
			/*$sub=dalSubjects::getInstance();
			$result=$sub->getOneSubjects($key);*/
//			$result = $result['subjects'][$key];


			$resp = array ("ret" => Configs::$error_code['success'],"data" => $result);
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
