<?php
//取得当前文件所在目录
$dir  =  dirname(__FILE__);
//判断目标目录是否是文件夹
$file_arr = array();
if(is_dir($dir)){
    //打开
    if($dh = @opendir($dir)){
        //读取

        while(($file = readdir($dh)) !== false){

            if($file != '.' && $file != '..'){

                $file_arr[] = $file;
            }

        }
        //关闭
        closedir($dh);
    }
}
echo "<pre>";
print_r($file_arr);
?>
