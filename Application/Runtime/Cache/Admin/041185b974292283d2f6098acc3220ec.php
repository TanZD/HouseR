<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>HouseR</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/HouseR/public/admin/css/font.css">
    <link rel="stylesheet" href="/HouseR/public/admin/css/login.css">
	  <link rel="stylesheet" href="/HouseR/public/admin/css/xadmin.css">
    <script src="/HouseR/public/js/jquery.min.js"></script>
    <script src="/HouseR/public/admin/lib/layui/layui.js" charset="utf-8"></script>
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">HouseR-管理登录</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" action="/HouseR/Admin/index/postLogin">
            <input name="login" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <div class="info3" id="info3" style="text-align: center;color: red;margin-bottom: 10px;"><?php echo ($msg); ?></div>
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <script>
    </script>
    <!-- 底部结束 -->

</body>
</html>