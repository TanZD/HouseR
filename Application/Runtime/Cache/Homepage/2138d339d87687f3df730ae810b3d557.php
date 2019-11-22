<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<title>个人主页</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="/HouseR/public/homepage/css/homepage.css"/>
		<link rel="stylesheet"  href="/HouseR/public/font-awesome/css/font-awesome.min.css" />
		<script type="text/javascript" src="/HouseR/public/js/jquery.min.js"></script>
		<link href="/HouseR/public/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="/HouseR/public/homepage/js/registerCheck.js"></script>

	</head>
	<body>
	    <div class="bd">
			<div class="header breath_c">
				<div style="color: #FFFFFF;">个人中心</div>
				<a style="margin-right: 20px;" href="/HouseR/User/user/logout">退出</a>
				<a style="margin-right: 20px;" href="/HouseR/Home/rent/index">首页</a>
			</div>
			<div class="left breath_c">
				<div class="person">
					<div>
						<img style="cursor: pointer;" src="<?php echo ($user['image']); ?>" onclick="parent.frames['ifr'].window.location.href='<?php echo U('EditProfile');?>'" class="img-circle">
					</div>
					<div class="user" >
						<?php echo ($user['username']); ?>
					</div>
				</div>
				<div>
					<ul class="nav nav-pills nav-stacked">
					  <li role="presentation" class="active jjj"><a href="<?php echo U('MyMessage');?>" target="ifr">我的消息</a></li>
					  <li role="presentation"><a href="<?php echo U('collect');?>" target="ifr">关注房源</a></li>
					  
					  <li role="presentation"><a href="<?php echo U('history');?>" target="ifr">浏览历史</a></li>
					  <li role="presentation"><a href="<?php echo U('Mycontract');?>" target="ifr">我的租约</a></li>
					  <li id="iii" role="presentation"><a href="<?php echo U('EditProfile');?>" target="ifr">个人资料</a></li>
					  <li role="presentation"><a href="<?php echo U('MyRent');?>" target="ifr">我的房源</a></li>
					  
					</ul>
				</div>
			</div>
			<div class="content">
				<iframe style="border-radius: 3px;" name="ifr" width="100%" frameborder="0" height="100%"></iframe>
			</div>
		</div>
			
	</body>
<script type="text/javascript">
var list = document.getElementsByTagName('li');

for(let i = 0;i<list.length;i++) {
    list[i].addEventListener('click',function() {
        for(let i=0;i<list.length;i++) {
            list[i].removeAttribute('class');
        }
        this.setAttribute('class','jjj');
    })
}

var img = document.getElementById('image');
var iii = document.getElementById('iii');
    
</script>
<script type="text/javascript">
var list = document.getElementsByTagName('li');
$("#image").click(function(){
	$("li").removeClass("active");  
	$("li").removeClass("jjj");          
	$("#iii").addClass("jjj");
});
	
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
</script>
</html>