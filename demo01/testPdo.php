<?php
require_once "Config.php";
require_once "MySQLPDO.class.php";
header("content-type:text/html;charset=utf-8");
$name = $_POST["uname"];
$password = $_POST["upasswd"];
if (strlen($name) < 20 && strlen($password) < 20) {
    $dbConfig = array('dbname' => 'demo');
    $pdo = MySQLPDO::getInstance($dbConfig);
    $sql = "insert into user (uname,upasswd) values ('$name','$password')";
    $pdo->exec($sql);
    $resp = array("errorcode" => Config::$error_code["success"]);
} else {
    $resp = array("errorcode" => Config::$error_code["faile"]);
}
echo json_encode($resp);
?>