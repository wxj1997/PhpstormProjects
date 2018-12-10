<?php
/**
 * 基础类
 */
require_once 'dal/dalBase.class.php';
require_once 'model/answerModel.class.php';
class dalanswer extends dalBase {

	protected static $_instance = null;

	protected function init(){
		$this->m_tableName = "answer_post";
		parent::init();
	}

    public function saveAnswer($mInstance)
    {
        $this->save($mInstance);
    }

	public function initCache()
	{
		$lenCache = $this->m_redisCache->hLen($this->m_tableName);
		if($lenCache > 0)return;
		$sql = "select * from ".$this->m_tableName;
		$dbInst =  DBInterface::getInstance()->getDBInstance();
		$dataArray = $dbInst->fetchAll($sql);
		foreach ($dataArray as $mInstance) {
			$answer = new answerModel();
			$answer->id = $mInstance['id'];
			$answer->user_id =$mInstance['user_id'];
            $answer->question_id = $mInstance['question_id'];
            $answer->answer_content = $mInstance['answer_content'];
            $answer->good_num= $mInstance['good_num'];
            $answer->time= $mInstance['time'];
			$this->m_redisCache->hSet($this->m_tableName,$answer->id,serialize($answer));
		}
	}


	function getAllanswer($key){
        $answer_all=$this->getAll();
        foreach($answer_all as $answer){
            $answerdetail=unserialize($answer);
            if ($answerdetail->question_id==$key) {
                $answerarr[]=$answerdetail;
            }
        }
        return $answerarr;
	}



}
