<?php
/**
 * 基础类
 */
require_once 'dal/dalBase.class.php';
require_once 'model/trsourceModel.class.php';
class dalTrsource extends dalBase {

	protected static $_instance = null;

	protected function init(){
		$this->m_tableName = "trsource";
		parent::init();
	}

	public function savetrsource($mInstance)
	{
	    $this->save($mInstance);
	}

	public function deltrsource($pk)
	{
        $this->delete($pk);
	}

	public function updatetrsource($pk,$dataArray)
	{
		$this->update($pk,$dataArray);
	}

	public function gettrsource($key)
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
			$tr = new trsourceModel();
			$tr->sid=$mInstance['sid'];
			$tr->tid=$mInstance['tid'];
			$tr->sname=$mInstance['sname'];
			$this->m_redisCache->hSet($this->m_tableName,$tr->sid,serialize($tr));
		}
	}

	/*//获取登录用户信息
	public function getLoginer($tname,$password)
	{
        $trs = $this->getAll();
		foreach ($trs as $mTeacher) {
             $teacher = unserialize($mTeacher);
			 if($tname == $teacher->tname && $password == $teacher->password)
			 {
				 return  $teacher;
			 }
		}
		return null;
	}*/
	public function getTrsourceName($sname)
	{
		$i=1;
		$trall=$this->getAll();
		foreach($trall as $tr)
		{
			$trinfo=unserialize($tr);
			if($trinfo->sname==$sname){
				$i=0;
			}

		}
		return $i;

	}


	//获取登录用户信息
	public function checkUserValid($sid)
	{
		$trs = $this->getTrsource($sid);
		return ($trs != null);
	}

}
