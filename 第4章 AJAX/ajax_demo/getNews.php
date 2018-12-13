<?php
mysql_connect("127.0.0.1","root","root");
mysql_select_db("demo");
mysql_query("set names utf8");
$id=$_GET["id"];

$sql="select newsTitle,newsID,newsContent from newsInfo where newsID=".$id;
$res=mysql_query($sql);
$row=mysql_fetch_assoc($res);
echo $row["newsContent"];
?>