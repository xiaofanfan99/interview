<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>面试信息详情</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div style="padding: 10px 200px;">
    <h3>面试详情</h3>
    <br>
        <table class="table table-bordered table-hover">
            <tr>
                <th>面试编号</th>
                <th>面试资料</th>
                <th>面试公司</th>
                <th>面试地址</th>
                <th>面试时间</th>
                <th>操作</th>
            </tr>
            @foreach($info as $k=>$v)
                <tr>
                    <td>{{$v['interview_id']}}</td>
                    <td>
                        @if($v['interview_status']==0) <a href="http://www.laravel.com{{$v['interview']}}">面试图片</a>
                        @else<a href="http://www.laravel.com{{$v['interview']}}">面试录音</a> @endif
                    </td>
                    <td>{{$v['company']}}</td>
                    <td>{{$v['address']}}</td>
                    <td>{{$v['interview_time']}}</td>
                    <td><a href="/interview/interview_del?interview_id={{$v['interview_id']}}">删除</a></td>
                </tr>
            @endforeach
        </table>
</div>
</body>
</html>
