<?php

require_once 'studentModel.class.php';
require_once 'Config.php';
header('Content-type:text/html;charset=utf8');
class studentController
{
    public function addStudentAction()
    {
        $name = $_GET['name'];
        $password = $_GET['password'];
        if (strlen($name) < 20 && strlen($password) < 20) {
            $stu = new studentModel();
            $stu->uname = $name;
            $stu->upassword = $password;
            $stu->save();
            $resp = array("errorcode" => Config::$error_code["success"]);
        } else {
            $resp = array("errorcode" => Config::$error_code["faile"]);
        }
        echo json_encode($resp);
    }

    public function deleteStudentAction()
    {
        $stu = new studentModel();
        $stu->id = 13;//id根据数据库中的id号自己写
        $stu->delete();
        echo '删除成功';
    }

    public function updateStudentAction()
    {

        $stu = new studentModel();
        $stu->uname = "thgn";//需要修改的名字随意写
        $stu->id = 7;//需要修改的id随意写
        $stu->update();
        echo '更新成功';

    }

    public function getStudentAction()
    {
        $stu = new studentModel();
        $stu->id=6;//id根据数据库中的id号自己写
        print_r($stu->get());

    }


}