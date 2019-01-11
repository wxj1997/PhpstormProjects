<?php
/**
 * 前端控制器
 */
//header('Content-type:text/html; Charset=utf8');
header("Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
//得到控制器名
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') return;
$c = $_GET['c'] ? $_GET['c'] : 'student';
require_once 'controller/'.$c.'Controller.class.php';
$controller_name=$c.'Controller.class.php';
$controller=new $controller_name;
$a=$_GET['a']?$_GET['a']:'list';
$action_name=$a.'Action';
$controller->$action_name();
?>