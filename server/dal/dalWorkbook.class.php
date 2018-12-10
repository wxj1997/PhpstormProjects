<?php
/**
 * 基础类
 */
require_once 'dal/dalBase.class.php';
require_once 'model/workbookModel.class.php';
class dalWorkbook extends dalBase {

	protected static $_instance = null;

	protected function init(){
		$this->m_tableName = "workbook";
		parent::init();
	}

	public function saveUser($mInstance)
	{
	    $this->save($mInstance);
	}

	public function delUser($pk)
	{
        $this->delete($pk);
	}

	public function updateUser($pk,$dataArray)
	{
		$this->update($pk,$dataArray);
	}

	public function getUser($key)
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
			$wb = new workbookModel();
			$wb->id = $mInstance['id'];
			$wb->name =$mInstance['name'];
			$wb->c_id = $mInstance['c_id'];
			$this->m_redisCache->hSet($this->m_tableName,$wb->id,serialize($wb));
		}
	}

	//获取课程习题集
	public function getworkbookByCourseId($c_id)
	{
        $work = $this->getAll();
		foreach ($work as $onework) {
             $oneRecord = unserialize($onework);
			 if($oneRecord->c_id==$c_id)
			 {
				 $workarr[]=$oneRecord;
			 }
		}
		if ($workarr) {
            return $workarr;
        }else{
		    return 0;
        }
	}


}
