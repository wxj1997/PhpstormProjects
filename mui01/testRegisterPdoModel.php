<?php
require_once "Config.php";
require_once "MySQLPDO.class.php";
require_once "userModel.class.php";
header("content-type:text/html;charset=utf-8");
if ($_POST) {
    $name = $_POST["uname"];
    $password = $_POST["upasswd"];
}

if (strlen($name) < 20 && strlen($password) < 20) {

    //测试子类的增
    $usr = new userModel();
    $usr->name = $name;
    $usr->password = $password;
    $usr->save();

    $resp = array("errorcode" => Config::$error_code["success"]);
    echo "注册成功";
} else {
    $resp = array("errorcode" => Config::$error_code["faile"]);
    echo "注册失败";
}
echo json_encode($resp);
?>