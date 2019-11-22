<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>个人资料编辑</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="/HouseR/public/homepage/css/EditProfile.css"/>
	<!-- <link rel="stylesheet"  href="font-awesome/css/font-awesome.min.css" /> -->
	<link href="/HouseR/public/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="bd" id="bd">
		<div class="main">
			<form class="EPform" action="" method="post" id="form" enctype="multipart/form-data">
				<div class="image">
					<img id="user_image" src="<?php echo ($user['image']); ?>" class="user_image" style="margin-bottom: 40px;cursor: pointer;width:256px;height:256px;border-radius:50%;">
				</div>
				<input id="upload" name="file" accept="image/*" type="file" style="display: none">
				<div class="row">
					<div class="label">用户名</div>
					<div class="input">
						<input readonly autocomplete="off" name="username" type="username" value="<?php echo ($user['username']); ?>" class="form-control" id="name" placeholder="用户名">
					</div>
				</div>
				<!-- <div class="error"><span id="nameError"></span></div> -->

				<div class="row">
					<div  class="label">邮箱</div>
					<div class="input">
						<input autocomplete="off" name="email" type="email" class="form-control" id="email" placeholder="邮箱" value="<?php echo ($user['email']); ?>">
					</div>
				</div>
				<div class="row">
					<div  class="label">电话号码</div>
					<div class="input">
						<input autocomplete="off" readonly name="phone" type="text" class="form-control" id="phone" placeholder="电话号码" value="<?php echo ($user['phone']); ?>">
					</div>
				</div>
				<div class="row">
					<div  class="label">真实姓名</div>
					<div class="input">
						<input autocomplete="off" name="realName" type="text" class="form-control" id="realName" placeholder="真实姓名" value="<?php echo ($user['realname']); ?>">
					</div>
				</div>
				<div class="error"><span id="mailError"></span></div>
				<div class="row">
					<div class="label">年龄</div>
					<div class="input">
						<input autocomplete="off" name="age" type="age" class="form-control" id="age" placeholder="年龄" value="<?php echo ($user['age']); ?>">
					</div>
				</div>
				<div class="error"><span id="ageError"></span></div>
				<div class="EDbutton">
					<div class="btn1">
						<button id="btn1" type="submit" class="btn btn-default">&nbsp;&nbsp;保存&nbsp;&nbsp;</button>
					</div>
					
				</div>
				
			</form>
			<div class="change_password">
				<div class="btn1">
					<a href="<?php echo U('change_password');?>" target="ifr"><button type="" class="btn btn-default" id="change_password">修改密码</button></a>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="/HouseR/public/js/jquery.min.js"></script>
<script type="text/javascript" src="/HouseR/public/homepage/js/registerCheck.js"></script>
<script type="text/javascript">
	var btn1 = document.getElementById('btn1');
	function abc(){
		// alert("123");
		// window.parent.location.reload();
		// return false;
	}
	btn1.onclick = abc;
</script>
<script type="text/javascript">
	$(function() {
		$("#user_image").click(function() {
		$("#upload").click(); // 隐藏了input:file样式后，点击头像就可以本地上传
		$("#upload").on("change", function() {
			var objUrl = getObjectURL(this.files[0]); // 获取图片的路径，该路径不是图片在本地的路径
			console.log(objUrl);
			if (objUrl) {
				$("#user_image").attr("src", objUrl); // 将图片路径存入src中，显示出图片
				 //upimg();
				}
			});
		});
	});

	// 建立一?可存取到?file的url
	function getObjectURL(file) {
		var url = null;
		if (window.createObjectURL != undefined) { // basic
			url = window.createObjectURL(file);
		} else if (window.URL != undefined) { // mozilla(firefox)
			url = window.URL.createObjectURL(file);
		} else if (window.webkitURL != undefined) { // webkit or chrome
			url = window.webkitURL.createObjectURL(file);
		}
		return url;
	}
		// window.onload = function () {
	 //        /* window意思是窗口     onload是加载     意思是页面加载完毕后，才执行里面的js ，所以可以放在顶端*/
	 //        var form = document.getElementById("form");
	 //        /*获取图片img="id"给变量 img*/
	 //        //var btn_show = document.getElementById("btn_show");
	 //        /*获取显示按钮id="btn_show"给变量 btn_show*/
	 //        var btn_hidden = document.getElementById("change_password");
	 //        /*获取隐藏按钮id=“btn_show”给变量 btn_hidden */

	 //        // btn_show.onclick = function () {
	 //        //     img.style.display = "block";
	 //        // }
	 //        /*点击显示按钮时，img的样式style的display属性赋值为“block”，下同理*/
	 //        btn_hidden.onclick = function () {
	 //            form.style.display = "none";
	 //        }
	 //    }

	</script>
</body>
</html>