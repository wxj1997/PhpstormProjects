<?php
/**
 * 基础模型类
 */

class model
{
    #protected $m_db; //保存数据库对象
    protected $m_tableName;
    protected $m_arRelationMap;
    //protected $m_unModifyMap;
    protected $m_primaryKey;//主键名

    public function __construct()
    {
        $this->init(); // 初始化
    }

    protected function init()
    {
        #$this->initDB(); // 初始化数据库
        $this->initTableName();
        $this->initRelationMap();
        $this->initPrimaryKey();
    }


    protected function initTableName()
    {

    }

    protected function initRelationMap()
    {

    }

    protected function initPrimaryKey()
    {

    }

    protected function getTableName()
    {
        return $this->m_tableName;
    }

    protected function getRelationMap()
    {
        return $this->m_arRelationMap;
    }
//子类的增
    public function save()
    {
        $field = "";
        $values = "";


        $sql = "INSERT INTO " . $this->m_tableName . " (";


        foreach ($this->m_arRelationMap as $key => $value) {
            if ($value->getMBCanModify() == false)
                continue;

            $keyDB = $value->getMKey();
            $valueDB = $this->$keyDB;
            if ($value->getMDataType() == 'str') {
                $valueDB = "'" . $valueDB . "'";
            }
            $field .= $keyDB . ",";
            $values .= $valueDB . ",";
        }
        $fields = substr($field, 0, strlen($field) - 1);
        $vals = substr($values, 0, strlen($values) - 1);
        $sql .= $fields . " ) VALUES (" . $vals . ")";
        $dbConfig = array('dbname' => 'demo');
        $pdo = MySQLPDO::getInstance($dbConfig);
        $pdo->exec($sql);

    }
//子类的删
    public function delete($pk)
    {
        $sql = "DELETE FROM " . $this->m_tableName . " WHERE " . $this->m_primaryKey . "=" . $pk;
        $dbConfig = array('dbname' => 'demo');
        $pdo = MySQLPDO::getInstance($dbConfig);
        $pdo->exec($sql);
    }
//子类的改
    public function update($pk, $dataArray)
    {
        $kv = "";

        $sql = "UPDATE " . $this->m_tableName . " SET ";
        foreach ($this->m_arRelationMap as $key => $value) {
            if ($value->getMBCanModify() == false)
                continue;

            $keyDB = $value->getMKey();
            if (array_key_exists($keyDB, $dataArray) == false) {
                continue;
            }

            $valueDB = $dataArray[$keyDB];
            $this->$keyDB = $valueDB;
            if ($value->getMDataType() == 'str') {
                $valueDB = "'" . $dataArray[$keyDB] . "'";
            }

            $kv = $keyDB . "=" . $valueDB . ",";
        }

        $kv = substr($kv, 0, strlen($kv) - 1);
        $sql .= $kv . " WHERE " . $this->m_primaryKey . "=" . $pk;
        $dbConfig = array('dbname' => 'demo');
        $pdo = MySQLPDO::getInstance($dbConfig);
        $pdo->exec($sql);
    }
//子类的查
    public function get($key)
    {
        $sql = "select * from " . $this->m_tableName . " where id =" . $key;
        $dbConfig = array('dbname' => 'demo');
        $pdo = MySQLPDO::getInstance($dbConfig);
        $data = $pdo->fetchRow($sql);
        return $data;
    }
//子类的查
    public function getAll()
    {
        $dbConfig = array('dbname' => 'demo');
        $pdo = MySQLPDO::getInstance($dbConfig);
        $data = $pdo->fetchAll('select * from user3');
        return $data;
    }

}
