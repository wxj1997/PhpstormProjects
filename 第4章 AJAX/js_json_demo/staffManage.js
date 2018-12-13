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

    xhr.open('GET','serverjson.php?number='+oKeyword.value);

    xhr.send();

    xhr.onreadystatechange=function(){
        if(xhr.readyState==4){
            if(xhr.status=200){
                var data=JSON.parse(xhr.responseText); //json解析方法JSON.parse 或者 eval('('+xhr.responseText+')')
                oSearchRes.innerHTML=data.msg;
            }
        }
    }
}

// 增加员工
var oAddnumber=document.getElementById('add-number'), //员工编号
    oAddname=document.getElementById('add-name'), //员工姓名
    oAddsex=document.getElementById('add-sex'), //员工性别
    oAddjob=document.getElementById('add-job'), //员工职位
    oAddSearch=document.getElementById('add-search'), //增加员工按钮
    oAddResult=document.getElementById('add-resultshow'); //反馈结果显示

// 增加员工按钮点击事件
oAddSearch.onclick=function(){
    createStaff();
}
// 创建增加员工方法
function createStaff(){

    var xhr=new XMLHttpRequest();

    xhr.open('POST','serverjson.php');

    var data='name='+oAddname.value
        +'&number='+oAddnumber.value
        +'&sex='+oAddsex.value
        +'&job='+oAddjob.value;

    //在open和send之间设置Content-Type
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.send(data);

    xhr.onreadystatechange=function(){
        if(xhr.readyState==4){
            if(xhr.status=200){
                var data=JSON.parse(xhr.responseText);
                if(data.success){
                    oAddResult.innerHTML=data.msg;
                }else{
                    oAddResult.innerHTML='出现错误：'+data.msg;
                }
            }else{
                alert('发生错误！'+xhr.status)
            }
        }
    }
}