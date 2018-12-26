<?php
/**
 * user表的操作类，继承基础模型类
 */
require_once 'item.class.php';
require_once 'model.class.php';
class userModel extends model{


	public $id;
	public $name;
	public $password;


	protected  function initTableName(){
        $this->m_tableName = "user3";
	}
	protected  function initRelationMap(){
        $this->m_arRelationMap = array();

        $idItem = new item();
        $idItem->setMKey('id');
        $idItem->setMBCanModify(false);
        $idItem->setMDataType('int');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('name');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('str');
        array_push($this->m_arRelationMap,$idItem);

        $idItem = new item();
        $idItem->setMKey('password');
        $idItem->setMBCanModify(true);
        $idItem->setMDataType('str');
        array_push($this->m_arRelationMap,$idItem);
	}

	protected  function initPrimaryKey(){
		$this->m_primaryKey ='id';
	}


}
