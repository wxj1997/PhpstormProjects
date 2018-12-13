<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<!--用php调用接口API - 孙金旭的博客 - CSDN博客-->
<!--https://blog.csdn.net/qq_38537286/article/details/78707336-->
<h2>快递查询结果</h2>
<?php
//com	是	string	需要查询的快递公司编号
// 	no	是	string	需要查询的快递单号
// 	key	是	string	在个人中心->我的数据,接口名称上方查看
// 	dtype	否	string	返回数据的格式,xml或json，默认json
$file_contents = file_get_contents('http://v.juhe.cn/exp/index?key=49c8064d2b94c53314492bfdf0627d11&com=ems&no=1043951892831');
//echo $file_contents;
$data=json_decode($file_contents,TRUE); //PHP和JS通讯通常都用json，但用 json 传过来的数组并不是标准的array，而是 stdClass 类型，第二个参数强制转为数组
//echo "<pre>";
//print_r($data);
foreach($data["result"]["list"] as $v){
//foreach(array_reverse($data["result"]["list"]) as $v){
    echo $v["remark"].$v["datetime"]."<br>";
}
?>
</body>
</html>