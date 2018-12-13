<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#send").click(function(){
                var cont = $("input").serialize();
                $.ajax({
                    url:'getData.php',
                    type:'post',
                    dataType:'json',
                    data:cont,
                    success:function(data){
                        var str = data.username + data.age + data.job;
                        $("#result").html(str);
                    }
                });
            });
        });
    </script>
</head>
<body>
<!--用php调用接口API - 孙金旭的博客 - CSDN博客-->
<!--https://blog.csdn.net/qq_38537286/article/details/78707336-->
<!--常用快递数据接口_免费API接口调用-聚合数据-->
<!--https://www.juhe.cn/docs/api/id/43-->
<div id="result">一会看显示结果</div>
<?php
$file_contents = file_get_contents('http://v.juhe.cn/exp/com?key=49c8064d2b94c53314492bfdf0627d11');
//echo $file_contents;
$com=json_decode($file_contents,TRUE); //PHP和JS通讯通常都用json，但用 json 传过来的数组并不是标准的array，而是 stdClass 类型，第二个参数强制转为数组
echo "<pre>";
print_r($com);
?>
</body>
</html>