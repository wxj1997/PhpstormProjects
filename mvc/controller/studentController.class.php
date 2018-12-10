<?php
/**
 * 学生模块控制器类
 */
require_once 'dal/dalStudent.class.php';
class studentController{
	/**
	 * 新增学生
	 */
	public function addStudentAction(){
		//实例化模型，取出数据
		$stu = new studentModel();
		$stu->name ="testStudent";
		$stu->gender = 1;
		$stu->age = 22;

		$dalStu = dalStudent::getInstance();
        $dalStu->saveStudent($stu);

		#$stu->save();
		//载入视图文件
//		require 'student_list.html';
	}

	public function delStudentAction(){
		//实例化模型，取出数据
//		$stu = new studentModel();
//		$stu->delete(1);

        $dalStu = dalStudent::getInstance();
        $dalStu->delStudent(1);
	}

	public function updateStudentAction(){
		//实例化模型，取出数据
		$stu = new studentModel();
		$updateArray = array('name'=>"testUpdate");
		$stu->update(4,$updateArray);
	}

    public function getStudentAction(){
        //实例化模型，取出数据
		$dalStu = dalStudent::getInstance();
        $data = $dalStu->getStudent(3);
        var_dump($data);
    }

    public function getAllStudentAction(){
        //实例化模型，取出数据
        $stu = new studentModel();
        $data = $stu->getAll();
        var_dump($data);
    }

	/**
	 * 学生列表
	 */
	public function listAction(){
		//实例化模型，取出数据
		$stu = new studentModel();
		$data = $stu->getAll();
		//载入视图文件
		require 'student_list.html';
	}
	/**
	 * 查看指定学生信息
	 */
	public function infoAction(){
		//接收请求参数
		$id = $_GET['id'];
		//实例化模型，取出数据
		$stu = new studentModel();
		$data = $stu->getById($id);
		//载入视图文件
		require 'student_info.html';
	}
}
