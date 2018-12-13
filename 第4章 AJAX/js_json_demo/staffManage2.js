// 查询员工方法
var oKeyword=document.getElementById('keyword'),　　　　  //员工编号
    oSearchBtn=document.getElementById('search'),　　　　 //查询按钮
    oSearchRes=document.getElementById('searchResult');  //反馈结果显示

// 查询员工按钮点击事件
oSearchBtn.onclick=function(){
    searchStaff();
}
// 创建查询员工方法
function searchStaff(){

    var xhr=new XMLHttpRequest();

    xhr.open('GET','serverjson2.php?number='+oKeyword.value);

    xhr.send();

    xhr.onreadystatechange=function(){
        if(xhr.readyState==4){
            if(xhr.status=200){
                var data=JSON.parse(xhr.responseText); //json解析方法JSON.parse 或者 eval('('+xhr.responseText+')')
                console.log(data);
                oSearchRes.innerHTML=data.data.name;
            }
        }
    }
}

