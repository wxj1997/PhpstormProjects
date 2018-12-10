<?php
header("content-type:text/html;charset=utf-8");
@mysql_connect("127.0.0.1", "root", "root") or die ("数据库连接失败");
mysql_select_db("demo");
mysql_query("set names utf8");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "delete from newsinfo where id=$id";

    $res = mysql_query($sql);
    if ($res) { ?>

        <script>
            alert("删除成功");
            window.location.href = "page.php";
        </script>

    <?php } ?>
    else <?php { ?>

        <script>
            alert("删除失败");
        </script>

    <?php } ?>


<?php } ?>











