<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>个人资料编辑</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="/HouseR/public/homepage/css/change_password.css"/>
	<link rel="stylesheet"  href="/HouseR/public/font-awesome/css/font-awesome.min.css" />
	<link href="/HouseR/public/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="bd">
		<div class="main">
			<form class="" enctype="" action="" method="post" id="form">
				<div class="row">
					<div class="label">新密码</div>
					<div class="input">
						<input name="password" type="password" value="" class="form-control" id="inputPassword3" placeholder="新密码">
					</div>
				</div>
				<div class="error"><span id="passwordError"></span></div>

				<div class="row">
					<div class="label">确认密码</div>
					<div class="input">
						<input  name="" type="password" class="form-control" id="inputPassword2" placeholder="确认密码" value="">
					</div>
				</div>
				<div class="error"><span id="passwordError2"></span></div>
				<div class="btn">
					<div class="btn1">
						<button id="btn1" type="submit" class="btn btn-default">保存</button>
					</div>
				</div>
				
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="/HouseR/public/js/jquery.min.js"></script>
<script type="text/javascript" src="/HouseR/public/homepage/js/registerCheck.js"></script>
<script type="text/javascript">
</script>
</html>