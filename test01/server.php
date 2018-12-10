<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <tr>
        <th colspan="2">服务器信息展示</th>
    </tr>
    <tr>
        <td>当前php版本号：</td>
        <td><?php echo PHP_VERSION; ?></td>
    </tr>
    <tr>
        <td>操作系统的类型：</td>
        <td><?php echo PHP_OS; ?></td>
    </tr>
    <tr>
        <td>当前服务器时间：</td>
        <td><?php
            date_default_timezone_set("PRC");
            echo date('Y-m-d H:i:s') ?></td>
    </tr>
</table>
</body>
</html>