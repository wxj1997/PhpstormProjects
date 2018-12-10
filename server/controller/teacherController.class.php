<?php
/**
 * 用户模块控制器类
 */
require_once 'model/teacherModel.class.php';
require_once 'dal/dalTeacher.class.php';
require_once 'model/couseModel.class.php';
require_once 'dal/dalCouse.class.php';
require_once 'config/configs.class.php';
class teacherController{
	/**
	 * 新增老师
	 */
	public function teacherRegisterAction(){
		//实例化模型，取出数据
		$name = $_POST['account'];
		$password = $_POST['password'];
		if(strlen($name)<20 && strlen($password)<20)
		{
			if(ctype_alnum($name)&&ctype_alnum($password)) {
				$tr = new teacherModel();
				$tr->name = $name;
				$tr->passwd = $password;

				$dal = dalTeacher::getInstance();
				$pd = $dal->getTeacherName($name);
				if ($pd == 0) {
					$resp = array("ret" => Configs::$error_code['register_fail']);
				} else {
					$dal->saveTeacher($tr);
					$resp = array("ret" => Configs::$error_code['success'], "data" => array("teacher_id" => $tr->id));
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

	//登录接口
	public function teacherLoginAction(){
		//实例化模型，取出数据
		$name = $_POST['account'];
		$password = $_POST['password'];

		//用户登录逻辑
		$dal = dalTeacher::getInstance();
		$loginer = $dal->getLoginer($name,$password);
		$resp = null;
		if($loginer)
		{
			$resp = array ("ret" => Configs::$error_code['success'],"data" => array("teacher_id"=>$loginer->id));
		}
		else
		{
			$resp = array ("ret" => Configs::$error_code['login_fail']);
		}

		echo json_encode($resp);
	}


	//绑定课程
	public function bindingCourseAction(){
		//实例化模型，取出数据
		$t_id = $_POST['t_id'];
		$c_id=$_POST['c_id'];
		//检测请求用户是否合法
		$dal = dalTeacher::getInstance();
		$bValid = $dal->checkUserValid($t_id);
		$resp = null;
		if($bValid == false)
		{
			$resp = array ("ret" => Configs::$error_code['user_invalid']);
		}
		else
		{
		    $result=$dal->updateCourse($t_id,$c_id);
		    if($result==1){
		        $cour=dalCouse::getInstance();
		        $res=$cour->updateTeacher($t_id,$c_id);
            }
			$resp = array ("ret" => Configs::$error_code['success'],"data" =>$res);
		}
		echo json_encode($resp);
	}

	//新建课程
    public function addCourseAction(){
        //实例化模型，取出数据
        $t_id = $_POST['t_id'];
        $c_name=$_POST['c_name'];
        //检测请求用户是否合法
        $dal = dalTeacher::getInstance();
        $bValid = $dal->checkUserValid($t_id);
        $resp = null;
        if($bValid == false)
        {
            $resp = array ("ret" => Configs::$error_code['user_invalid']);
        }
        else
        {
            $mInstance=new couseModel();
            $mInstance->t_id=$t_id;
            $mInstance->name=$c_name;
            $cour=dalCouse::getInstance();
            $cour->saveCouse($mInstance);
            $result=$dal->updateCourse($t_id,$mInstance->id);
            $resp = array ("ret" => Configs::$error_code['success'],"data" =>$result);
        }
        echo json_encode($resp);
    }

    //老师教授课程
    public function ownCourseAction(){
        $t_id = $_POST['t_id'];
        //检测请求用户是否合法
        $dal = dalTeacher::getInstance();
        $bValid = $dal->checkUserValid($t_id);
        $resp = null;
        if($bValid == false)
        {
            $resp = array ("ret" => Configs::$error_code['user_invalid']);
        }
        else
        {
            $courarr=$dal->getCourseId($t_id);
            if($courarr!=0) {
                $cour = dalCouse::getInstance();
                $result=$cour->getTeacherCourse($courarr);
                $resp = array("ret" => Configs::$error_code['success'], "data" => $result);
            }else{
                $resp = array ("ret" => Configs::$error_code['success'], "data" =>3);
            }
        }
        echo json_encode($resp);

    }

}
