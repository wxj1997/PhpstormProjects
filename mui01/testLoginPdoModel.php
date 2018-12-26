<?php
require_once "Config.php";
require_once "MySQLPDO.class.php";
require_once "userModel.class.php";
header("content-type:text/html;charset=utf-8");
if ($_POST) {
    $name = $_POST["uname"];
    $password = $_POST["upasswd"];
}
$sql = "select password from user3 where name='$name'";
$dbConfig = array('dbname' => 'demo');
$pdo = MySQLPDO::getInstance($dbConfig);
$dbPassword = $pdo->fetchRow($sql);
//echo $dbPassword["password"];
if ($dbPassword) {
    if ($password != $dbPassword["password"]) {
        die("密码错误");
    } else{
        $resp = array("errorcode" => Config::$error_code["success"]);
        echo json_encode($resp)."登录成功";
    }

} else{
    echo "用户名不存在";
}


?>