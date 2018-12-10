<?php
/**
 * 基础类
 */
require_once 'dal/dalBase.class.php';
require_once 'model/questionpostModel.class.php';
class dalQuestion_post extends dalBase {

	protected static $_instance = null;

	protected function init(){
		$this->m_tableName = "question_post";
		parent::init();
	}

    public function saveQuestion($mInstance)
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
			$question = new questionpostModel();
			$question->id = $mInstance['id'];
            $question->user_id=$mInstance['user_id'];
            $question->theme_id=$mInstance['theme_id'];
            $question->post_img=$mInstance['post_img'];
            $question->post_name=$mInstance['post_name'];
            $question->post_content=$mInstance['post_content'];
            $question->post_readnum=$mInstance['post_readnum'];
			$question->post_time =$mInstance['post_time'];
			$this->m_redisCache->hSet($this->m_tableName,$question->id,serialize($question));
		}
	}


	function getAllquestion($key){
		$question_all=$this->getAll();
		foreach($question_all as $question){
			$questiondetail=unserialize($question);
			if ($questiondetail->theme_id==$key) {
                $questionarr[]=$questiondetail;
            }
		}
		return $questionarr;
	}

    function getOneQuestion($key){
        $question_all=$this->getAll();
        foreach($question_all as $question){
            $questiondetail=unserialize($question);
            if ($questiondetail->id==$key) {
                $questionarr[]=$questiondetail;
            }
        }
        return $questionarr;
    }



}
