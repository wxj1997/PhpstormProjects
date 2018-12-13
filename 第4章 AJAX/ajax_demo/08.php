<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<select name="newsList" id="" onchange="showNews(this.value)">
<?php
mysql_connect("127.0.0.1","root","root");
mysql_select_db("demo");
mysql_query("set names utf8");

$sql="select newsTitle,newsID from newsInfo order by newsID desc";
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res)){
?>
    <option value="<?php echo $row["newsID"]?>"><?php echo $row["newsTitle"]?></option>
<?php }?>
</select>

<div id="txtHint"></div>

<script>
    function showNews(id)
    {

        var xmlhttp;
        if (id=="")
        {
            document.getElementById("txtHint").innerHTML="";
            return;
        }
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getNews.php?id="+id,true);
        xmlhttp.send();
    }
</script>
</body>
</html>