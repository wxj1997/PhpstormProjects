<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table border="1">
    <tr>
        <td>ID</td>
        <td>标题</td>
        <td>内容</td>
        <td>时间</td>
        <td>发布人</td>
        <td>类型</td>
    </tr>
    <?php
    @mysql_connect("127.0.0.1","root","root") or die ("数据库连接失败");
    mysql_select_db("test01");
    mysql_query("set names utf8");
    $sql="select * from news";
    $res=mysql_query($sql);
    while ($row=mysql_fetch_assoc($res)){
    ?>
        <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["bt"]?></td>
            <td><?php echo $row["nr"]?></td>
            <td><?php echo $row["time"]?></td>
            <td><?php echo $row["people"]?></td>
            <td><?php echo $row["type"]?></td>
        </tr>
    <?php } ?>
</table>

</body>

</html>

