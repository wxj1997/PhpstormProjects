<?php
require_once "connection.php";
$name = $_POST['uname'];
$password = $_POST['upasswd'];
$file = $_FILES["myFile"];
/*echo "<pre>";
print_r($file);
echo "</pre>";*/
if ($file['size'] > 1 * 1024 * 1024) {
    die("文件太大！");
}
$arr = array("jpg", "png");
$pos = strrpos($file['name'], ".") + 1;
$ext = substr($file['name'], $pos);
if (!in_array($ext, $arr)) {
    die("上传类型错误！");
}
date_default_timezone_set("PRC");
$currentTime = date("YmdHis") . rand(1000, 9999);

$sql = "insert into user2 (uname,upasswd,uphoto) values ('$name','$password','$currentTime.$ext ')";
mysql_query($sql);

if (move_uploaded_file($file['tmp_name'], "upload/$currentTime" . ".$ext")) {
    ?>
    <script>alert("注册成功");
        location.href = "uploadFileForm.html";</script>
<?php } ?>

