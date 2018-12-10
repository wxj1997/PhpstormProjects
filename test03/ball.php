<html>
<style type="text/css">
    . * {
        margin: 0px;
        padding: 0px;
    }

    .red {
        display: inline-block;
        background-color: red;
        height: 50px;
        width: 50px;
        margin-right: 10px;
        line-height: 50px;
        text-align: center;
        border-radius: 50px;

    }

    .blue {
        display: inline-block;
        background-color: blue;
        height: 50px;
        width: 50px;
        line-height: 50px;
        text-align: center;
        border-radius: 50px;

    }
</style>
</html>

<?php
$red_num = range(1, 33);
$keys = array_rand($red_num, 6);
shuffle($keys);
foreach ($keys as $v) {
    $red[] = $red_num[$v] < 10 ? ('0' . $red_num[$v]) : $red_num[$v];
}
$blue_num = rand(1, 16);
$blue = $blue_num < 10 ? ('0' . $blue_num) : $blue_num;
foreach ($red as $v) {
    echo '<span class="red">';
    echo $v . "&nbsp";
    echo '</span>';
}
echo '<span class="blue">';
echo $blue;
echo '</span>';
?>