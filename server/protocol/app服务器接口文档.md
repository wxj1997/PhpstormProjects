 
## 关于错误码(已上传svn)
## urlroot : 127.0.0.1:8080/server/
# 用户接口
---
### userRegister → 用户注册
### POST
|参数|必选|类型|说明|
|:-----|:-------|:-----|-----|
|c|true|string|控制器名
|a|true|string|控制器动作名
|name|true|string|用户姓名`手机号`|
|password|true|string|用户密码`真实姓名`|
```json
{
    "errorcode": 0, // 返回状态码
    "data": {
        "user_id": 1 // 用户id
    }
}
```
---
### userLogin → 用户登录
 
|参数|必选|类型|说明|
|:-----|:-------|:-----|-----|
|phone|true|string|用户`手机号`|
|code|true|string|验证码|
 
```json
{
    "ret": 0, // 返回状态码
    "data": {
        "user_id": 1, // 用户id
    },
}
```
### uploadHeadImg → 上传用户头像
 
|参数|必选|类型|说明|
|:-----|:-------|:-----|-----|
|id|true|int|用户`id`|
|head_img|true|file|用图`用户头像文件`|
 
```json
{
    "ret": 0, // 返回状态码
    "data": {
      "file_path": "/api/Upload/img/20170418/14925087358513_img.jpg", // 用户头像路径
    },
}
```
 

