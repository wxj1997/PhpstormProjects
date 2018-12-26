<?php


class MySQLDB
{
    private $dbConfig = array(
        'host' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'pwd' => 'root',
        'charset' => 'utf8',
        'dbname' => 'demo',
    );
    //数据库连接资源
    private $link;
    private static $instance;

    public static function getInstance($params = array())
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self($params);
        }
        return self::$instance;
    }

    //构造方法
    private function __construct($params = array())
    {
        $this->initAttr($params);
        $this->connectServer();
        $this->setCharset();
        $this->selectDefaultDb();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    //私有克隆
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    //初始化属性,数据库连接信息
    private function initAttr($params)
    {
        $this->dbConfig = array_merge($this->dbConfig, $params);
    }

    //连接目标服务器
    private function connectServer()
    {
        $host = $this->dbConfig['host'];
        $port = $this->dbConfig['port'];
        $user = $this->dbConfig['user'];
        $pwd = $this->dbConfig['pwd'];
        //连接数据库服务器
        /* if ($link = mysql_connect("$host:$port", $user, $pwd)) {
             $this->link = $link;
         } else {
             die('数据库连接失败');
         }*/
        @$this->link = mysql_connect("$host:$port", $user, $pwd) or die('数据库连接失败');
    }

    //设定连接字符集
    private function setCharset()
    {
        $sql = "set names {$this->dbConfig['charset']}";
        $this->query($sql);
    }

    //选择默认数据库
    private function selectDefaultDb()
    {
        if ($this->dbConfig['dbname'] == '') {
            return;
        }
        $sql = "use {$this->dbConfig['dbname']}";
        $this->query($sql);
    }

    //执行sql的方法
    public function query($sql)
    {
        if ($result = mysql_query($sql, $this->link)) {
            return $result;
        } else {
            echo 'SQL执行失败';
        }
    }

    //查询所有记录
    public function fetchAll($sql)
    {
        if ($result = $this->query($sql)) {

            while ($row = mysql_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    //查询单条记录
    public function fetchRow($sql)
    {
        if ($result = $this->query($sql)) {
            $row = mysql_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }

    //查询单个数据
    public function fetchColumn($sql)
    {
        if ($result = $this->query($sql)) {
            if ($row = mysql_fetch_row($result)) {
                return $row[0];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //转义字符串
    public function escapeString($data)
    {
        return mysqli_real_escape_string($data, $this->link);
    }

    //获得当前最新的自动增长ID
    public function lastInsertId()
    {
        return mysqli_insert_id($this->link);
    }
}
