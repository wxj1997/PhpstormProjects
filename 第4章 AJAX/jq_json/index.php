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
<div id="result">一会看显示结果</div>
<form id="my" action="" method="post">
    <p><span>姓名：</span><input type="text" name="username" /></p>
    <p><span>年龄：</span><input type="text" name="age" /></p>
    <p><span>工作：</span><input type="text" name="job" /></p>
</form>
<button id="send">提交</button>
</body>
</html>