<?php
$img_w = 100;
$img_h = 30;
//生成的验证码为四则运算

$op_arr = array("+", "-");
$num1 = rand(1, 99);
$num2 = rand(1, 99);
$ope = $op_arr[rand(0, 1)];
switch ($ope) {
    case "+":
        $code = $num1 + $num2;
    case "-":
        $code = $num1 - $num2;
}
session_start();
$_SESSION['code'] = $code;
//生成画布
$img = imagecreatetruecolor($img_w, $img_h);
//为画布分配颜色
$bg_color = imagecolorallocate($img, 255, 255, 255);
//设置画布背景色
imagefill($img, 0, 0, $bg_color);
//设定字符串颜色
$str_color = imagecolorallocate($img, 0, 0, 0);
//将码值写入图片中
imagestring($img, 5, 5, rand(1, 10), $num1, $str_color);
imagestring($img, 5, 30, rand(1, 10), $ope, $str_color);
imagestring($img, 5, 45, rand(1, 10), $num2, $str_color);
imagestring($img, 5, 65, rand(1, 10), "=", $str_color);
imagestring($img, 5, 80, rand(1, 10), "?", $str_color);
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