<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生列表</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
    <div style="padding: 20px 400px;">
        <h3>学生列表</h3>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>学生姓名</th>
                <th>学生班级</th>
                <th>查看相关面试信息</th>
            </tr>
            @foreach($info as $k=>$v)
            <tr>
                <td>{{$v['user_id']}}</td>
                <td>{{$v['username']}}</td>
                <td>{{$v['user_class']}}</td>
                <td><a href="interview_info?user_id={{$v['user_id']}}">面试信息</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
