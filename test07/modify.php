<html>

<?php
header("content-type:text/html;charset=utf-8");
@mysql_connect("127.0.0.1", "root", "root") or die ("数据库连接失败");
mysql_select_db("demo");
mysql_query("set names utf8");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$sql = "select * from newsinfo where id=$id";
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);

$sql2 = "select * from cateinfo ";
$res2 = mysql_query($sql2);

$t = $row["newsTitle"];
$c = $row["newsContent"];
?>

<form action="" method="post">
    新闻标题：<input name="title" type="text" value="<?= $t ?>">
    <br><br>
    新闻分类：<select>
        <?php
        while ($cate = mysql_fetch_assoc($res2)) {
            ?>
            <option value="<?= $cate["id"] ?>"
                <?php echo ($cate["id"] == $row["newsCate"]) ? "selected": ""  ?> >
                <?=$cate["cateName"] ?>
            </option>
        <?php } ?>
    </select>
    <br><br>
    新闻内容：<textarea rows="4" cols="50" name="content"><?= $c ?></textarea>
    <br><br>
    <input type="submit">

</form>

<?php

if ($_POST) {
    $t2 = $_POST["title"];
    $c2 = $_POST["content"];
    $sql3 = "update newsinfo set newsTitle = '$t2', newsContent='$c2' where id=$id";
    $res = mysql_query($sql3);
    if ($res) {
        ?>
        <script>
            alert("更新成功");
            window.location.href = "page.php";
        </script>
    <?php } ?>
<?php } ?>
</html>