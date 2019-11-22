<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html>
 <head>
 	<title>HELLO WORLD</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" type="text/css" href="/HouseR/public/css/index/index.css">
    <link rel="stylesheet" type="text/css" href="/HouseR/public/css/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/HouseR/public/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="/HouseR/public/css/iconfont.css">
 </head>
 <body>
 	<div class="bd">
		<div class="login web-font" style="width: 100%">
			<div class="left l_c"><a href="/HouseR/Admin/index/login" id="admin">管理员登录Login</a></div>
			<div class="right l_c"><a href="" id="userName">登录Login</a></div>
			<div class="right l_c"><a href="" id="logout">注册Register</a></div>
		</div>
 		<div align="center">
 			<div class="title breath_c">
 				<img width="30%" src="/HouseR/public/images/logo_x.png">
 			</div>

 			<div class="c_c">
 				<div class="c_b left" id="index"><i class="iconfont icon-zufang"></i>我要租房</div>
 				<div class="c_b right" id="rent"><i class="iconfont icon-ershoufang"></i>我要出租</div>
 			</div>
				<div style="clear: both;"></div>
 		</div>
 	</div>
 </body>
<script src="/HouseR/public/js/jquery.min.js"></script>
<script src="/HouseR/public/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/HouseR/public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
	var userM;
	$().ready(function(){
		$.ajax({
			url:"/HouseR/User/user/islogin",
			dataType:"JSON",
			success:function(data){
				console.log(data);
				userM=data;
				if(data.msg==-1){
					$("#userName").attr("href","/HouseR/User/user/login");
					$("#logout").attr("href","/HouseR/User/user/register");
				}else{
					$("#userName").empty().append(data.data['username']);
					$("#logout").empty().append("登出");
					$("#logout").attr("href","/HouseR/User/user/logout");
					$("#personControl").fadeIn("fast");
				}
			}
		});
		$("#index").click(function(){
			window.location.href="/HouseR/Home/rent/index";
		});
		$("#rent").click(function(){
			if(userM.msg==-1){
				window.location.href="/HouseR/User/user/login";
			}else{
				window.location.href="/HouseR/Home/rent/apply";
			}
		})
	})
</script>
</html>