<?php
header("content-type:text/html;charset=utf-8");
require_once 'MySQLDB.class.php';
$db=MySQLDB::getInstance();
$sql="select * from newsinfo";
echo "<pre>";

print_r($db->fetchAll($sql));

//print_r($db->fetchRow($sql));
?>