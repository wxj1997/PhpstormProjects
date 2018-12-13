<?php
header("Content-type:text/html;charset=utf8");
mysql_connect("127.0.0.1","root","root");
mysql_select_db("demo");
mysql_query("set names utf8");
$id=$_GET["id"];
$sql="select * from userInfo where userID='$id'";
$res=mysql_query($sql);
$row=mysql_fetch_assoc($res);
if(!$row){
    $msg="可以使用";
}else
{
    $msg="请更换用户名";
}
echo $msg;
?>