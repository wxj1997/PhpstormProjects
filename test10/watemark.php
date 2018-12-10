<?php

//创建画布资源
$src_img=imagecreatefromjpeg($path);
$wat_img=imagecreatefromgif("logo.gif");
//获得水印图片的宽和高
$watermark_info=getimagesize("logo.gif");
list($wat_w,$wat_h)=$watermark_info;
//获得目标图片的宽和高
$img_info=getimagesize($path);
list($img_w,$img_h)=$img_info;
//水印位置右下角
$new_w=$img_w-$wat_w;
$new_h=$img_h-$wat_h;
//添加水印
imagecopymerge($src_img,$wat_img,$new_w,$new_h,0,0,$wat_w,$wat_h,50);
if (imagejpeg($src_img,"thumb/wm_".$currentTime.".$ext")){
    echo "生成水印图片成功";
}
?>