<?php

$img = getimagesize($path);
list($width, $height) = $img;
//计算缩略图大小
$thu_width = 400;
$thu_height = $thu_width * $height / $width;
//绘制缩略图画布
$thumb = imagecreatetruecolor($thu_width, $thu_height);
//依据原图创建与原图一样的新图像
$source = imagecreatefromjpeg($path);
//依据原图创建缩略图
imagecopyresized($thumb, $source, 0, 0, 0, 0, $thu_width, $thu_height, $width, $height);
if (imagejpeg($thumb,"thumb/thumb_".$currentTime.".$ext")){
    echo "生成缩略图成功<br/>";
}
?>