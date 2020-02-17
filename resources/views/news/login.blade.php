<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
</head>
<body>
    <center>
        <h3>新闻发布登录页</h3>
        <br>
        <form action="{{url('news/login_do')}}" method="post">
           用户名： <input type="text" name="account_name" id="" placeholder="请输入账号/手机号/邮箱"><br><br>
            密码：<input type="password" name="pwd_id" id="" placeholder="请输入密码"><br><br>
            <input type="submit" value=" 登 录 ">
        </form>
    </center>
</body>
</html>


