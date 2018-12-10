<?php

header('Content-type:text/html;charset=utf-8');
$year = 2008;
if (($year % 4 == 0) && ($year % 100 != 0) || ($year % 400 == 0)) {
    echo $year . '年是闰年';
} else {
    echo $year . '年不是闰年';
}
?>