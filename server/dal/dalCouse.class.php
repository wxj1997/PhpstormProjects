<?php
/**
 * 基础类
 */
require_once 'dal/dalBase.class.php';
require_once 'model/couseModel.class.php';
class dalCouse extends dalBase {

	protected static $_instance = null;

	protected function init(){
		$this->m_tableName = "couse";
		parent::init();
	}

	public function saveCouse($mInstance)
	{
	    $this->save($mInstance);
	}

	public function delCouse($pk)
	{
        $this->delete($pk);
	}

	public function updateCouse($pk,$dataArray)
	{
		$this->update($pk,$dataArray);
	}

	public function getCouse($key)
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
			$couse = new couseModel();
			$couse->id = $mInstance['id'];
			$couse->name =$mInstance['name'];
			$couse->t_id = $mInstance['t_id'];
			$this->m_redisCache->hSet($this->m_tableName,$couse->id,serialize($couse));
		}
	}


	public function getAllCouse(){
        $couse=$this->getAll();
        foreach($couse as $cou){

            $couarr[]=unserialize($cou);
        }

        return $couarr;
    }

//修改老师数据
    public function updateTeacher($t_id,$c_id)
    {
        $cour = $this->getCouse($c_id);
        $tr=$cour->t_id;
        $trarr=explode(',',$tr);
        for($i=0;$i<count($trarr);$i++){
            if($trarr[$i]==$t_id)return 0;
        }
        $date=$tr.','.$t_id;
        $add=array("t_id"=>$date);
        $this->updateCouse($c_id,$add);
        return  1;
    }


//查询某一老师所教课程
    public function getTeacherCourse($courarr)
    {
        $courAll = $this->getAllCouse();
        foreach($courAll as $cou){
            for($i=0;$i<count($courarr);$i++){
                if($cou->id==$courarr[$i]){
                    $arr[]=$cou;
                }
            }
        }
        return  $arr;
    }

}
