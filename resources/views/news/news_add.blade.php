<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新闻添加</title>
</head>
<body>
    <center>
        <h3>新闻添加</h3>
        <form id="form1">
            新闻标题：<input type="text" name="title" id="" placeholder="请输入新闻标题"> <br><br>
            新闻内容：<textarea name="content" id="" cols="30" rows="10"></textarea> <br><br>
            发布时间：<input type="radio" name="release" value="1" id="now" checked="checked">立即发布
                    <input type="radio" name="release" value="2" id="timing">定时发布
                    <input type="text" name="timing_time" style="display: none" placeholder="2019-12-26"> <br> <br>
            <input type="button" value=" 发 布 "  class="but" >
        </form>
    </center>
</body>
</html>
<script src="/js/jq.js"></script>
<script>
    $('#timing').on('click',function () {
        $('[name="timing_time"]').show();
    })
    $('#now').on('click',function () {
        $('[name="timing_time"]').hide();
    })
    $('.but').on('click',function () {
        var title = $('[name="title"]').val();
        var content = $('[name="content"]').val();
        var release = $('[name="release"]:checked').val();
        var timing_time = $('[name="timing_time"]').val();
        $.ajax({
            //几个参数需要注意一下
            type: "POST",//方法类型
            dataType: "json",//预期服务器返回的数据类型
            url: "{{url('news/news_add_do')}}" ,//url
            data: {title:title,content:content,release:release,timing_time:timing_time},
            success: function (result) {
                // console.log(result);//打印服务端返回的数据(调试用)
                if(result.code==200){
                    alert(result.msg);
                    window.location.href='news_list';
                }
            },
        })
    })
</script>
