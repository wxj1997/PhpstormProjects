<?php
require_once "Config.php";
require_once "MySQLPDO.class.php";
require_once "userModel.class.php";
header("content-type:text/html;charset=utf-8");

//测试子类的删
/*
$usr = new userModel();
$usr->delete(11);
*/


//测试子类的改
/*
$usr = new userModel();
$dataArray=array("name"=>"QW");
$usr->update(5,$dataArray);
*/


//测试子类的查

$usr = new userModel();
print_r($usr->get(5));

?>