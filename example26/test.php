<?php
//php获取指定目录下的所有文件列表 - 闻道先后，术业专攻 - 博客园
//https://www.cnblogs.com/imnzq/p/6796752.html
//获取当前文件所在的绝对目录
//php 快速读取文件夹下文件列表 - 李照耀 - 博客园
//https://www.cnblogs.com/lizhaoyao/p/6428469.html
$dir =  dirname(__FILE__);
//$dir =__DIR__;
echo $dir;
//扫描文件夹
$file = scandir($dir);
//显示
echo " <pre>";
print_r($file);

?>