<html>
<style type="text/css">

    form {
        display: inline;
    }

    #yzm {
        cursor: pointer;
    }

</style>

<script language="JavaScript">
    function refresh() {
        document.getElementById("yzm").src = "yzm.php";
    }
</script>

<form action="" method="post">
    用户名：<input type="text" name="uname">
    <br>
    密码：<input type="password" name="upasswd">
    <br>
    验证码：<input type="text" name="yzm">
    <img src="numOpYzm.php" onclick="refresh()" id="yzm">
    <br>
    <input type="submit" value="登录">
</form>
<button><a href="register.php">注册</a></button>
<?php
header("content-type:text/html;charset=utf-8");
require_once("connection.php");
if ($_POST) {
    session_start();
    //判断验证码是否正确 ,不区分大小写，并运算
    //echo strtolower($_SESSION["code"]);
    if (strtolower($_POST["yzm"]) != strtolower($_SESSION["code"])) {
        die("验证码错误");
    }


    $name = $_POST["uname"];
    $password = $_POST["upasswd"];
    $sql = "select upasswd,salt from user where uname='$name'";
    /*echo $sql;*/
    $res = mysql_query($sql);
    if ($row = mysql_fetch_assoc($res)) {
        $db_password = $row["upasswd"];
        $salt = $row["salt"];
        if ($db_password == md5(md5($password) . $salt)) {
//登录成功

            echo "<script>alert('登录成功');location.href='welcome.html'</script>";
        } else {
            echo "<script>alert('密码错误');history.go(-1)</script>";
        }

    } else {
        echo "<script>alert('用户名错误');/*history.go(-1)*/</script>";
    }
}

?>
</html>
