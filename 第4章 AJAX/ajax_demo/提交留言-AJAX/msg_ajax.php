<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>所有留言</h1>
<ul id="msgList">
    <?php

    mysql_connect("127.0.0.1","root","root");
    mysql_select_db("mvc_study");
    mysql_query("set names utf8");
    $sql="select * from comment";
    $res=mysql_query($sql);
    while ($row=mysql_fetch_assoc($res)){
    ?>
    <li><?php echo $row["comment"]?></li>
    <?php }?>
</ul>
<form action="">
    <textarea name="" id="comment" cols="30" rows="10"></textarea>
    <input type="button" value="提交留言" onclick="addComment()">
</form>
<script>
    function addComment() {
        //创建一个ajax对象
        obj=new XMLHttpRequest();
        obj.open("POST","addComment.php");

        msg=document.getElementById("comment").value;
        obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        obj.send("comment="+msg);
        obj.onreadystatechange=function () {
            if (obj.readyState==4 && obj.status==200)
            {
               console.log(obj.responseText);
               if(obj.responseText){
                   // html="<li>"+msg+"</li>";
                   htmlObj=document.createElement("li");
                   htmlObj.innerHTML=msg;
                   document.getElementById("msgList").appendChild(htmlObj);
               }
            }
        }
    }
</script>
</body>
</html>