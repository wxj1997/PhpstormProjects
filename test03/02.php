<?php
header("Content-type:text/html;charset=utf-8");
echo "<div style='float: left; margin-right:100px; ' >";
$arr = array(
    ["xh" => "001", "xm" => "张一"],
    ["xh" => "002", "xm" => "李二"],
    ["xh" => "003", "xm" => "王三"],
    ["xh" => "004", "xm" => "赵四"],
    ["xh" => "005", "xm" => "钱五"],
    ["xh" => "006", "xm" => "孙六"],
    ["xh" => "007", "xm" => "李七"],
    ["xh" => "008", "xm" => "候八"],
    ["xh" => "009", "xm" => "齐九"],
    ["xh" => "010", "xm" => "毛十"]
);
foreach ($arr as $arrItem) {
    echo $arrItem["xh"] . '&nbsp' . $arrItem["xm"];
    echo "<br/>";
}
echo "</div>"
?>
<html>
<div style="float: left">
    <form action="#" method="post">
        <input type="hidden" name="a">
        <input type="submit" value="抽奖">
    </form>
</div>
</html>
<?php
if (isset($_POST["a"])) {
    $num = array_rand($arr, 1);
    $arrItem = $arr[$num];
    echo "&nbsp";
    echo "恭喜" . "&nbsp" . $arrItem["xh"] . "&nbsp" . $arrItem["xm"] . "&nbsp" . "中奖";

}
?>
