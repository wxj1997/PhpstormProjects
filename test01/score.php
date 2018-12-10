<?php
header('Content-type:text/html;charset=utf-8');
$name = '小明';
$score = 78;
if (is_int($score) || is_float($score)) {
    if ($score >= 90 && $score <= 100) {
        $str = 'A级';
    } elseif ($score >= 80 && $score < 90) {
        $str = 'B级';
    } elseif ($score >= 70 && $score < 80) {
        $str = 'C级';
    } elseif ($score >= 60 && $score < 70) {
        $str = 'D级';
    } elseif ($score >= 0 && $score < 60) {
        $str = 'E级';
    } else {
        $str = '学生成绩范围必须在0-100！';
    }
} else {
    $str = '输入的学生成绩不是数值！';
}
echo "<h2>学生成绩等级</h2><p>学生姓名：" . $name . "<p>学生分数：" . $score . "分<p>成绩等级：" . $str;
?>