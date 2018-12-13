<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2018/11/12
 * Time: 8:41
 */
$comment=$_POST["comment"];
mysql_connect("127.0.0.1","root","root");
mysql_select_db("mvc_study");
mysql_query("set names utf8");
$sql="insert into comment(comment) values('$comment')";
if(mysql_query($sql)){
    echo 1;
}else{
    echo 0;
}