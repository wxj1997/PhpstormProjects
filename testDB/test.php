<?php
require_once 'MySQLDB.class.php';
$db=MySQLDB::getInstance();
$sql="select * from user3";
echo "<pre>";

//print_r($db->fetchAll($sql));

print_r($db->fetchRow($sql));
?>