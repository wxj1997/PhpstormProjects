<?php
$img_w = 100;
$img_h = 22;

//生成验证码文字
$code = "";
$str = "ABCDEFGHJKLMNPQRSTUVWXYZabcdegfghjklmnopqrstuvwxyz0123456789";
for ($i = 0; $i < 6; $i++) {
    $code1 = substr($str, rand(0, strlen($str)) - 1, 1);
    $code .= $code1;
}
session_start();
$_SESSION['code'] = $code;
//生成画布
$img = imagecreatetruecolor($img_w, $img_h);
//为画布分配颜色
$bg_color = imagecolorallocate($img, 170, 153, 153);
//设置画布背景色
imagefill($img, 0, 0, $bg_color);
//设定字符串颜色
$str_color = imagecolorallocate($img, 255, 255, 255);
//将码值写入图片中
imagestring($img, 5, 25, 3, $code, $str_color);
//添加干扰线
for ($i = 0; $i < 4; $i++) {
    //干扰线颜色
    $line_color = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
    imageline($img, rand(0, $img_w), 0, rand(0, $img_w), $img_h, $line_color);
}
//添加干扰点
for ($i = 0; $i < 20; $i++) {
    imagesetpixel($img, rand(0, $img_w), rand(0, $img_h), $line_color);
}


//设置输出验证码图片格式
header('Content-Type:image/jpeg');
imagejpeg($img);
?>