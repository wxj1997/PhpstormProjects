<html>
<?php
header("content-type:text/html;charset=utf-8");
@mysql_connect("127.0.0.1", "root", "root") or die ("数据库连接失败");
mysql_select_db("demo");
mysql_query("set names utf8");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql2="update newsinfo set newsCnt =newsCnt +1 where id=$id";
    mysql_query($sql2);
    $sql = "select * from newsinfo where id=$id";
    $res = mysql_query($sql);
    while ($row = mysql_fetch_assoc($res)) {
        ?>
        <h1><?php echo $row["newsTitle"]; ?></h1>
        <br/>

        <h5>

            <?php echo substr($row["newsDateTime"],0,10); ?>
            浏览量：<?php echo $row["newsCnt"]; ?>
        </h5>

        <br/>
        <?php echo $row["newsContent"]; ?>
    <?php } ?>
<?php } ?>
</html>

