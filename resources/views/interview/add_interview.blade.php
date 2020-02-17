<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加面试题</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<body>
<div >
    <form class="form-horizontal" action="{{url('interview/add_interview_do')}}" method="post" enctype="multipart/form-data">
        <h3 style="margin-bottom: 40px; margin-left: 180px" >添加面试题</h3>
        <div class="radio" style="margin-left: 180px; margin-bottom: 5px;">
            <label>
                <input type="radio" name="interview_status" id="optionsRadios1" value="0" checked>
                图片面试题
            </label>&ensp;&ensp;
            <label>
                <input type="radio" name="interview_status" id="optionsRadios2" value="1">
                面试录音
            </label>
        </div>
        <div class="form-group" style="margin-left: 180px;">
            <label for="exampleInputFile"> 面 试 资 料 :</label>
            <input type="file" name="interview" id="exampleInputFile" >
            <p class="help-block"> 上传面试录音或是面试题. </p>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">面试公司</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" placeholder="请输入正确的公司名称" name="company">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">面试地址</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" placeholder="请输入正确的公司地址" name="address">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">面试时间</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" placeholder="请输入正确的面试时间" name="interview_time">
                <span style="color: #ef3338">*格式为2020-02-17</span>
            </div>
        </div>

        <button type="submit" class="btn btn-success" style="margin-left: 180px;">添加面试资料</button>
    </form>
</div>

</body>
</html>
