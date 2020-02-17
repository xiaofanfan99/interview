<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="x-body">
    <h2>添加比赛</h2>
    <form class="layui-form">
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">比赛时间</label>
            <div class="layui-input-inline">
                <input type="text" id="username" name="match_time" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="phone" class="layui-form-label">比赛球队1</label>
            <div class="layui-input-inline">
                <input type="text" id="phone" name="team_name1" required="" lay-verify="phone" autocomplete="off" class="layui-input">
            </div>
        </div>
        <span class="x-red">vs</span>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">比赛球队2</label>
            <div class="layui-input-inline">
                <input type="password" id="L_repass" name="team_name2" required="" lay-verify="repass" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="add" lay-submit="">
                增加比赛
            </button>
        </div>
    </form>
</div>
</body>

</html>
