<?php
/**
 * 基础类
 */
require_once 'dal/dalBase.class.php';
require_once 'model/teacherModel.class.php';
class dalTeacher extends dalBase {

	protected static $_instance = null;

	protected function init(){
		$this->m_tableName = "teacher";
		parent::init();
	}

	public function saveTeacher($mInstance)
	{
	    $this->save($mInstance);
	}

	public function delTeacher($pk)
	{
        $this->delete($pk);
	}

	public function updateTeacher($pk,$dataArray)
	{
		$this->update($pk,$dataArray);
	}

	public function getTeacher($key)
	{
       return   $this->get($key);
	}

	public function initCache()
	{
		$lenCache = $this->m_redisCache->hLen($this->m_tableName);
		if($lenCache > 0)return;
		$sql = "select * from ".$this->m_tableName;
		$dbInst =  DBInterface::getInstance()->getDBInstance();
		$dataArray = $dbInst->fetchAll($sql);
		foreach ($dataArray as $mInstance) {
			$tr = new teacherModel();
			$tr->id = $mInstance['id'];
			$tr->name =$mInstance['name'];
			$tr->passwd = $mInstance['passwd'];
			$tr->c_id=$mInstance['c_id'];
			$this->m_redisCache->hSet($this->m_tableName,$tr->id,serialize($tr));
		}
	}

	//获取登录用户信息
	public function getLoginer($tname,$password)
	{
        $trs = $this->getAll();
		foreach ($trs as $mTeacher) {
             $teacher = unserialize($mTeacher);
			 if($tname == $teacher->name && $password == $teacher->passwd)
			 {
				 return  $teacher;
			 }
		}
		return null;
	}

	//判断用户名是否存在
	public function getTeacherName($teachername)
	{
		$i=1;
		$trall=$this->getAll();
		foreach($trall as $tr)
		{
			$trinfo=unserialize($tr);
			if($trinfo->name==$teachername){
				$i=0;
			}
		}
		return $i;

	}


	//获取登录用户信息
	public function checkUserValid($tid)
	{
		$trs = $this->getTeacher($tid);
		return ($trs != null);
	}

	//修改课程数据
    public function updateCourse($t_id,$c_id)
    {
        $tr = $this->getTeacher($t_id);
        $course=$tr->c_id;
        $courarr=explode(',',$course);
        for($i=0;$i<count($courarr);$i++){
            if($courarr[$i]==$c_id)return 0;
        }
        if($course=="")
        {
            $date=$c_id;
        }else{
            $date=$course.','.$c_id;
        }
        $add=array("c_id"=>$date);
        $this->updateTeacher($t_id,$add);
        return  1;
    }

    //修改课程ID
    public function getCourseId($t_id)
    {
        $tr = $this->getTeacher($t_id);
        $course=$tr->c_id;
        if($course=="")
        {
           return 0;
        }else{
            $courarr=explode(',',$course);
            return  $courarr;
        }

    }

}
