<?php
/**
 * theme表的操作类，继承基础模型类
 */
require_once 'item.class.php';
require_once 'model.class.php';
class answerModel extends model{
	public $id;
	public $user_id;
	public $question_id;
	public $answer_content;
	public $good_num;
	public $time;


	protected  function initTableName(){
        $this->m_tableName = "answer_post";
	}
	protected  function initRelationMap(){
        $this->m_arRelationMap = array();

        $idItem = new item();
        $idItem->setMKey('id');
        $idItem->setMBCanModify(false);
        $idItem->setMDataType('int');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('user_id');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('int');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('question_id');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('int');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('answer_content');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('str');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('good_num');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('int');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('time');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('datetime');
        array_push($this->m_arRelationMap,$idItem);
	}

	protected  function initPrimaryKey(){
		$this->m_primaryKey ='id';
	}


}
