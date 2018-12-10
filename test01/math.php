<?php
header('Content-type:text/html;charset=utf-8');
const DISCOUNT = 0.8;
$fruit1 = '香蕉';
$fruit2 = '苹果';
$fruit3 = '橘子';
$fruit1_num = 2;
$fruit2_num = 1;
$fruit3_num = 3;
$fruit1_price = 7.99;
$fruit2_price = 6.89;
$fruit3_price = 3.99;
$fruit1_total = $fruit1_num * $fruit1_price;
$fruit2_total = $fruit2_num * $fruit2_price;
$fruit3_total = $fruit3_num * $fruit3_price;
$total = ($fruit1_total + $fruit2_total + $fruit3_total) * DISCOUNT;
$str = "<table border='2px'>";
$str .= "<tr><td>商品名称</td><td>购买数量(斤)</td><td>商品价格(元/斤)</td></tr>";
$str .= "<tr><td>$fruit1</td><td>$fruit1_num</td><td>$fruit1_total</td></tr>";
$str .= "<tr><td>$fruit2</td><td>$fruit2_num</td><td>$fruit2_total</td></tr>";
$str .= "<tr><td>$fruit3</td><td>$fruit3_num</td><td>$fruit3_total</td></tr>";
$str .= "<tr><td colspan='3'>商品折扣：<span>" . DISCOUNT . "</span></td></tr>";
$str .= "<tr><td colspan='3'>打折后购买商品总价格：{$total}元</td></tr>";
$str .= "</table>";
echo $str;
?>