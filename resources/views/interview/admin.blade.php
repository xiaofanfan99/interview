<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台主页</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<body>
    <div style="margin-left: 200px; Padding:50px;">
        <h4>欢迎{{$user}}管理员登录面试宝典后台</h4>
        <br>
        <button type="button" class="btn btn-info" style="margin-right: 20px; "><a href="{{url('interview/add_user')}}" style="color: white">添加学生</a></button>
        <button type="button" class="btn btn-info"><a href="{{url('interview/user_list')}}" style="color: white">查看学生列表</a></button>
    </div>
</body>
</html>
