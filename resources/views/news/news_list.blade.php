<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <h3>新闻列表</h3>
        <table border="1">
            <tr>
                <th>新闻标题</th>
                <th>发布时间</th>
                <th>发布人手机号</th>
            </tr>
            @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['title']}}</td>
                <td>{{$v['timing_time']}}</td>
                <td>{{$v['user_tel']}}</td>
            </tr>
            @endforeach
        </table>
    </center>
</body>
</html>
