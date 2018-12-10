<html>
<form action="" method="post">
    用户名：<input type="text" name="uname">
    <br>
    密码：<input type="password" name="upasswd">
    <br>
    <input type="submit" value="注册">
</form>
<?php
header("content-type:text/html;charset=utf-8");
@mysql_connect("127.0.0.1", "root", "root") or die ("数据库连接失败");
mysql_select_db("demo");
mysql_query("set names utf8");
$sql = "insert into user set ";
if (isset($_POST)) {
    $data = $_POST;
    if ($data) {
        $sql2 = "select * from user where uname='{$data["uname"]}' ";
        $res2 = mysql_query($sql2);
        $row = mysql_fetch_assoc($res2);
        if ($row) {
            die("用户名已存在");
        }
        $salt = rand(100000, 999999);
        $data["salt"] = $salt;

    }

    foreach ($data as $k => $v) {
        if ($k == "upasswd") {
            $v = md5(md5($v) . $salt);
        }
        $sql .= " $k = '$v',";
    }
    $sql = rtrim($sql, ",");

    $res = mysql_query($sql);
    if ($res) { ?>
        <script>alert("注册成功");location.href="login.php"</script>
    <?php } ?>
<?php } ?>
</html>


