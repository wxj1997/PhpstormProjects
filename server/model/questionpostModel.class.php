<?php
/**
 * theme表的操作类，继承基础模型类
 */
require_once 'item.class.php';
require_once 'model.class.php';
class questionpostModel extends model{
	public $id;
    public $user_id;
	public $theme_id;
	public $post_img;
	public $post_name;
	public $post_content;
	public $post_readnum;
	public $post_time;



	protected  function initTableName(){
        $this->m_tableName = "question_post";
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
        $idItem->setMKey('theme_id');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('int');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('post_img');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('str');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('post_name');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('str');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('post_content');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('str');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('post_time');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('datetime');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('post_readnum');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('int');
        array_push($this->m_arRelationMap,$idItem);
	}

	protected  function initPrimaryKey(){
		$this->m_primaryKey ='id';
	}


}
