<?php
/**
 * 基础类
 */
require_once 'dal/dalBase.class.php';
require_once 'model/subjectsModel.class.php';
class dalSubjects extends dalBase {

	protected static $_instance = null;

	protected function init(){
		$this->m_tableName = "subjects";
		parent::init();
	}

	public function savesubjects($mInstance)
	{
	    $this->save($mInstance);
	}

	public function delsubjects($pk)
	{
        $this->delete($pk);
	}

	public function updatesubjects($pk,$dataArray)
	{
		$this->update($pk,$dataArray);
	}

	public function getsubjects($key)
	{
       return   $this->get($key);
	}


	//把相应的表放入缓存
	public function initCache()
	{
		$lenCache = $this->m_redisCache->hLen($this->m_tableName);
		if($lenCache > 0)return;
		$sql = "select * from ".$this->m_tableName;
		$dbInst =  DBInterface::getInstance()->getDBInstance();
		$dataArray = $dbInst->fetchAll($sql);
		foreach ($dataArray as $mInstance) {
			$sub = new subjectsModel();
			$sub->id = $mInstance['id'];
			$sub->bank_id=$mInstance['bank_id'];
            $sub->questions_id = $mInstance['questions_id'];
            $sub->title = $mInstance['title'];
            $sub->type = $mInstance['type'];
            $sub->itemA = $mInstance['itemA'];
            $sub->itemB = $mInstance['itemB'];
            $sub->itemC = $mInstance['itemC'];
            $sub->itemD = $mInstance['itemD'];
            $sub->answer = $mInstance['answer'];
            $sub->score = $mInstance['score'];
			$this->m_redisCache->hSet($this->m_tableName,$sub->id,serialize($sub));
		}
	}

	//获取全部习题
    public function getAllSubjects()
    {
	    $subs=$this->getAll();
		foreach($subs as $sub){

			$subarr[]=unserialize($sub);
		}

	    return $subarr;
    }

    public function getOneSubjects($key)
    {
        $subs=$this->getAllSubjects();
        foreach($subs as $sub){
            if ($sub->bank_id==$key) {
                $subarr[] =$sub;
            }
        }
        return $subarr;
    }


}
