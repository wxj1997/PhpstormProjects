<?php
@mysql_connect("127.0.0.1", "root", "root") or die ("数据库连接失败");
mysql_select_db("demo");
mysql_query("set names utf8");
?>