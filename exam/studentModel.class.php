<?php

require_once 'MySQLPDO.class.php';

class studentModel
{
    public $id;
    public $uname;
    public $upassword;
    //保存数据库对象
    private $m_db;

    public function __construct()
    {
        $this->initDB();
    }

    private function initDB()
    {
        //配置数据库连接信息
        $dbConfig = array('user' => 'root', 'pass' => 'root', 'dbname' => 'exam');
        //实例化数据库操作类
        $this->m_db = MySQLPDO::getInstance($dbConfig);
    }


    public function save()
    {
        $sql = "insert into student(uname,upassword) values ('{$this->uname}','{$this->upassword}')";
        return $this->m_db->exec($sql);

    }

    public function update()
    {
        $sql = "update student set uname ='{$this->uname}' where id={$this->id}";
        return $this->m_db->exec($sql);
    }

    public function delete()
    {
        $sql = "delete from student where id={$this->id}";
        return $this->m_db->exec($sql);
    }

    public function get()
    {
        $sql = "select * from student where id={$this->id}";
        return $this->m_db->fetchRow($sql);
    }
}