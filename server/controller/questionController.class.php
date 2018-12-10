<?php
/**
 * 用户模块控制器类
 */
require_once 'model/userModel.class.php';
require_once 'dal/dalUser.class.php';
require_once 'config/configs.class.php';
require_once 'dal/dalQuestion_post.class.php';
class questionController{
//获取相对应主题下的所有问题
	public function getAllAction(){
		$uid = $_POST['user_id'];
		$theme_id=$_POST['theme_id'];
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
			$question=dalQuestion_post::getInstance();
			$question_all=$question->getAllquestion($theme_id);
			$resp = array ("ret" => Configs::$error_code['success'],"data" => $question_all);
		}
		echo json_encode($resp);
	}

//获取单个问题详情
    public function getOneAction(){
        $uid = $_POST['user_id'];
        $q_id=$_POST['q_id'];
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
            $question=dalQuestion_post::getInstance();
            $question_one=$question->getOneQuestion($q_id);
            $resp = array ("ret" => Configs::$error_code['success'],"data" => $question_one);
        }
        echo json_encode($resp);
    }

    //发表问题
    public function addQuestionAction(){
        $uid=$_POST['user_id'];
        $theme_id=$_POST['theme_id'];
        $post_name=$_POST['post_name'];
        $post_content=$_POST['post_content'];

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
            $question=new questionpostModel();
            $question->post_content=$post_content;
            $question->post_name=$post_name;
            $question->theme_id=$theme_id;
            $question->user_id=$uid;
            $question->post_time="'".$nowdate."'";
            $question->post_img="java.jpg";
            $question->post_readnum=0;

            $q_dal=dalQuestion_post::getInstance();
            $q_dal->saveQuestion($question);
            $resp = array ("ret" => Configs::$error_code['success'],"data" => array("question_id" => $question->id));
        }
        echo json_encode($resp);

    }


}
