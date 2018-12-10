<?php
header('Content-type:text/html;charset=utf-8');
$year = 2015;
$result = (($year % 4 == 0) && ($year % 100 != 0) || ($year % 400 == 0)) ? '是闰年' : '不是闰年';
echo '<h2>闰年的判断</h2>';
echo '<p>输入的年份：' . $year;
echo '<p>判断的结果：' . $year . '年' . $result;
?>