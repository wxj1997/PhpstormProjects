<?php
$dbms = 'mysql';     //数据库类型
$host = 'localhost'; //数据库主机名
$dbName = 'demo';    //使用的数据库
$user = 'root';      //数据库连接用户名
$pass = 'root';          //对应的密码
$dsn = "$dbms:host=$host;dbname=$dbName";


try {
    $dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true)); //初始化一个PDO对象,使用长连接
    echo "连接成功<br/>";
    $sql="select * from user";
    foreach ($dbh->query($sql) as $row) {
        print_r($row);
        echo "<br/>";
    }

  /*  $res=$dbh->query($sql);
    print_r($res);
    while ($row=mysql_fetch_assoc($res)){
        print_r($row);
    }*/



} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}



?>
