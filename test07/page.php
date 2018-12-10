<html>
<style type="text/css">
    ul li {
        list-style-type: none;
    }

    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        color: blue;
    }

    .s1 {
        float: left;
    }

    span {
        margin-left: 20px;
    }

    span a {
        color: blue;
    }
    h1{
        display: inline;
    }

</style>


<?php
session_start();
if (isset($_SESSION["name"])) { ?>

    <h1>欢迎<?= $_SESSION["name"] ?>登录</h1>
    <h1><span><a href="logout.php">退出登录</a></span></h1>
    <form action="" method="post">
        搜索：<input type="text" name="search">
        <input type="submit" value="搜索">
    </form>

    <?php
    header("content-type:text/html;charset=utf-8");
    @mysql_connect("127.0.0.1", "root", "root") or die ("数据库连接失败");
    mysql_select_db("demo");
    mysql_query("set names utf8");

    $sql1 = "select count(*) from newsinfo";
    $res1 = mysql_query($sql1);
    $count = mysql_fetch_row($res1);
    $count = $count[0];
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
    $currentCount = 3;
    $totalPage = ceil($count / $currentCount);
    $index = ($page - 1) * $currentCount;
    $sql = "select * from newsinfo ";

    if ($_POST) {
        $search = $_POST["search"];
        $arr = explode(" ", $search);
        $arr = array_filter($arr);  // 删除空元素
        $sql .= " where ";
        foreach ($arr as $value) {
            $sql .= " newsTitle like '%$value%' or";
        }
        $sql = substr($sql, 0, strlen($sql) - 2);
    }
    $sql .= " ORDER by newsDateTime DESC ";
    $sql .= " limit $index ,$currentCount ";
    /*echo $sql;*/
    $res = mysql_query($sql);
    while ($row = mysql_fetch_assoc($res)) {
        ?>
        <ul>
            <a href="content.php?id=<?php echo $row["id"]; ?>">
                <li>
                    <h3> <?php echo $row["newsTitle"]; ?></h3>
                </li>
            </a>
            <span class="s1"><a href="modify.php?id=<?= $row["id"] ?>">修改</a></span>
            <span><a href="delete.php?id=<?php echo $row["id"]; ?>">删除</a></span>
            <span><?php echo substr($row["newsDateTime"], 0, 10); ?></span>
        </ul>

    <?php } ?>

    <a href="page.php?page=1">首页</a>
    <a href="page.php?page=<?= ($page - 1) > 0 ? ($page - 1) : 1 ?>">上一页</a>
    <a href="page.php?page=<?= ($page + 1) < $totalPage ? ($page + 1) : $totalPage ?>">下一页</a>
    <a href="page.php?page=<?= $totalPage ?>">末页</a>

<?php } else {
    echo "<script>alert('请先登录');location.href='login.php'</script>";
} ?>


</html>
