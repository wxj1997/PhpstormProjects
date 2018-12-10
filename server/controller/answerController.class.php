<?php
/**
 * 用户模块控制器类
 */
require_once 'model/userModel.class.php';
require_once 'dal/dalUser.class.php';
require_once 'config/configs.class.php';
require_once 'dal/dalanswer.class.php';
class answerController{

	public function getAllAction(){
		$uid = $_POST['user_id'];
		$question_id=$_POST['question_id'];
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
			$answer=dalanswer::getInstance();
			$answer_all=$answer->getAllanswer($question_id);
			$resp = array ("ret" => Configs::$error_code['success'],"data" => $answer_all);
		}
		echo json_encode($resp);
	}

	//添加回答
    public function addAnswerAction(){
        $uid = $_POST['user_id'];
        $q_id=$_POST['question_id'];
        $a_content=$_POST['answer_content'];

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
            $nowdate=date("Y-m-d H:i:s",intval(time()));
            $answer=new answerModel();
            $answer->question_id=$q_id;
            $answer->user_id=$uid;
            $answer->time="'".$nowdate."'";
            $answer->good_num=0;
            $answer->answer_content=$a_content;

            $adal=dalanswer::getInstance();
            $adal->saveAnswer($answer);
            $resp = array ("ret" => Configs::$error_code['success'],"data" =>array("answer_id" => $answer->id));
        }
        echo json_encode($resp);
    }

}
