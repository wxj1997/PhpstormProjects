<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="#">
    文件路径:<input type="text" name="url"><br>
    <input type="submit" value="提交">
</form>
</body>
</html>


<?php
header('Content-type:text/html;charset=utf-8');
if (isset($_POST['url'])){
    $url = $_POST['url'];
    $pos = strrpos($url, '.')+1;
    echo '文件后缀:' . substr($url, $pos);
}

?>