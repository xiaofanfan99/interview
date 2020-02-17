<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生添加</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<form class="form-horizontal" action="{{url('interview/add_user_do')}}" method="post">
    <h3 style="margin-left: 200px;">学生添加</h3>
    <br>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label"> 学 生 姓 名 ：</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" placeholder="请设置要添加的学生姓名" name="username">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label"> 密 码 ：</label>
        <div class="col-xs-4">
            <input type="password" class="form-control" placeholder="请设置学生密码" name="password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label"> 学 生 班 级 ：</label>
        <div class="col-xs-4">
            <select class="form-control" name="user_class">
                <option value="0">请选择相应班级</option>
                <option value="1902">1902</option>
                <option value="1903">1903</option>
                <option value="1904">1904</option>
                <option value="1905">1905</option>
                <option value="1906">1906</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success"> 添 加 </button>
        </div>
    </div>
</form>
</body>
</html>
