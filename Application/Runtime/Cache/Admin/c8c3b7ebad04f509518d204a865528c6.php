<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" type="text/css" href="/HouseR/public/css/house_detail/index.css">
	<link rel="stylesheet" type="text/css" href="/HouseR/public/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="/HouseR/public/css/iconfont.css">
	<link rel="stylesheet" type="text/css" href="/HouseR/public/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/HouseR/public/viewerjs/viewer.min.css">
</head>
<body>
	<div class="db">
		<div class="hd_title">
			<div id="hd_title" class="title_left layui-col-md8 layui-col-sm8 layui-col-xs6">
				TITLE
			</div>
			<div style="clear: both;"></div>
		</div>

		<div class="hd_address">
			<div id="hd_address">ADDRESS</div>
		</div>

		<div class="hd_content">
			<div class="layui-col-md7 layui-col-sm7 layui-col-xs12">
				<div class="layui-carousel" id="carousel">
					<div carousel-item="" id="carousel_i"></div>
				</div>
			</div>
			<div class="layui-col-md5 layui-col-sm5 layui-col-xs12 hd_house_detail">
				<div class="hd_price" id="hd_price">
					PRICE
				</div>
				<div class="hd_room_detail">
					<div class="hd_r" id="hd_r">ROOMS LIVINGROOMS BATHROOMS</div>
					<div class="hd_r">|</div>
					<div class="hd_r" id="hd_a">AREA</div>
					<div class="hd_r">|</div>
					<div class="hd_r" id="hd_f">FLOOR</div>
					<div class="hd_r">|</div>
					<div class="hd_r" id="hd_d">DSCRIPTION</div>
					<div style="clear: both"></div>
				</div>
				<div class="hd_location">
					<div class="hd_l" id="hd_c">CITYNAME</div>
					<div class="hd_l" id="hd_l">LOCATIONNAME</div>
					<div style="clear: both"></div>
				</div>
				<div class="hd_request">
					<button class="r_btn" id="hd_number" style="font-size: 24px;width: 250px;background-color: #0787f5;"><i class="fa fa-phone fa-lg"></i>PHONE_NUMBER</button>
				</div>
			</div>
			<div style="clear: both;"></div>
		</div>

		<div class="hd_dt">
			<div class="hd_eq">
				<div class="hd_dt_title">房屋配置</div>
				<div class="hd_eq">
					<ul>
						<li><i class="iconfont icon-chuang"></i><div>床</div></li>
						<li><i class="iconfont icon-kongtiao"></i><div>空调</div></li>
						<li><i class="iconfont icon-_huabanfuben"></i><div>宽带</div></li>
						<li><i class="iconfont icon-yizi"></i><div>餐桌椅</div></li>
						<li><i class="iconfont icon-yigui"></i><div>衣柜</div></li>
						<li><i class="iconfont icon-shafa"></i><div>沙发</div></li>
						<li><i class="iconfont icon-dianshi"></i><div>电视</div></li>
						<li><i class="iconfont icon-bingxiang"></i><div>冰箱</div></li>
						<li><i class="iconfont icon-xiyiji"></i><div>洗衣机</div></li>
						<li><i class="iconfont icon-chouyouyanji"></i><div>抽油烟机</div></li>
						<li><i class="iconfont icon-weibolu"></i><div>微波炉</div></li>
						<li><i class="iconfont icon-tianranqi"></i><div>天然气</div></li>
						<li><i class="iconfont icon-reshuiqi"></i><div>热水器</div></li>
						<li><i class="iconfont icon-xiaodugui"></i><div>消毒柜</div></li>
						<div style="clear: both;"></div>
					</ul>
				</div>
			</div>

			<div>
				<div class="hd_dt_title">房源信息</div>
				<div class="">
					<div class="hd_request dt_title hd_request layui-col-md2 layui-col-sm2 layui-col-xs12">基本信息</div>
					<div class="hd_request">
						<ul>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_r"><span>房屋户型:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_f" style="float: right;"><span>所在楼层:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_a"><span>建筑面积:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_d" style="float: right;"><span>装修情况:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_city"><span>所在城市:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_location" style="float: right;"><span>所在区域:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_address"><span>详细地址:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_username" style="float: right;"><span>屋主用户名:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_phone"><span>屋主电话号码:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_user_id" style="float: right;"><span>屋主id:</span></li>
							<div style="clear: both;"></div>
						</ul>
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>	

			<div>
				<div class="hd_dt_title">房屋描述</div>
				<div class="hd_description" id="hd_description"></div>
			</div>

			<div>
				<div class="hd_dt_title">房屋图片</div>
				<div class="dt_img" id="dt_img"></div>
			</div>

			<div style="margin-bottom: 20px;">
				<textarea name="content" id="content" placeholder="请输入消息内容" class="layui-textarea"></textarea>
			</div>

			<div class="hd_request" align="center" style="width: 100%">
				<button class="r_btn" id="button1">通过申请</button>
				<button class="r_btn" id="button2" style="background-color: red;"></i>驳回申请</button>
			</div>
			<div style="clear: both;"></div>
		</div>


		<!-- <div id="container" style="width: 760px;height: 400px;position: relative;"></div> -->
	</div>
</body>
<script src="/HouseR/public/js/jquery.min.js"></script>
<script type="text/javascript" src="/HouseR/public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/HouseR/public/viewerjs/viewer.min.js" charset="utf-8"></script>
<!-- <script type="text/javascript" src="http://api.map.baidu.com/api?v=3.0&ak=wm9AX4vf125s3YOlXMNM6bqtOvLWz02T"></script> -->

<script type="text/javascript">
	layui.use(['layer'], function(){
	  var layer = layui.layer
	});

	//b ? x : y
	var house_detail=<?php echo $house_detail; ?>;
	var house_image=<?php echo $house_image; ?>;
	var isCollect=-1;
	var islogin=-1;
	var userM;
	console.log(house_detail);
	console.log(house_image);

	$(document).ready(function(){
		if(house_detail.msg!=-1){
			//设备
			var house=house_detail.data;
			if(house['bed']==1){
				$(".hd_eq li").eq(0).addClass("select_eq");
			}
			if(house['kt']==1){
				$(".hd_eq li").eq(1).addClass("select_eq");
			}
			if(house['kd']==1){
				$(".hd_eq li").eq(2).addClass("select_eq");
			}
			if(house['czy']==1){
				$(".hd_eq li").eq(3).addClass("select_eq");
			}
			if(house['yg']==1){
				$(".hd_eq li").eq(4).addClass("select_eq");
			}
			if(house['sf']==1){
				$(".hd_eq li").eq(5).addClass("select_eq");
			}
			if(house['tv']==1){
				$(".hd_eq li").eq(6).addClass("select_eq");
			}
			if(house['bx']==1){
				$(".hd_eq li").eq(7).addClass("select_eq");
			}
			if(house['xyj']==1){
				$(".hd_eq li").eq(8).addClass("select_eq");
			}
			if(house['cyyj']==1){
				$(".hd_eq li").eq(9).addClass("select_eq");
			}
			if(house['wbl']==1){
				$(".hd_eq li").eq(10).addClass("select_eq");
			}
			if(house['trq']==1){
				$(".hd_eq li").eq(11).addClass("select_eq");
			}
			if(house['rsq']==1){
				$(".hd_eq li").eq(12).addClass("select_eq");
			}
			if(house['xdg']==1){
				$(".hd_eq li").eq(13).addClass("select_eq");
			}

			$("title").append(house['title']);
			$("#hd_title").empty().append(house['title']);
			$("#hd_address").empty().append(house['address']);
			$("#hd_price").empty().append(house['price']+"元/月");
			$("#hd_f").empty().append(house['floor']+"楼");
			$("#hd_a").empty().append(house['area']+"平方米");
			$("#hd_r").empty().append(house['livingrooms']+"厅"+house['rooms']+"房"+house['bathrooms']+"卫");
			var decoration;
			if(house['decoration']==1) decoration="毛胚";
			else if(house['decoration']==2) decoration="普通装修";
			else decoration="精装修";
			$("#hd_d").empty().append(decoration);
			$("#hd_l").empty().append(house['locationname']);
			$("#hd_c").empty().append(house['cityname']);
			$("#hd_number").empty().append("<i class='fa fa-phone fa-lg'></i>"+house['a_phone']);

			$("#dt_r").append(house['livingrooms']+"厅"+house['rooms']+"房"+house['bathrooms']+"卫");
			$("#dt_f").append(house['floor']+"层");
			$("#dt_a").append(house['area']+"平方米");
			$("#dt_d").append(decoration);
			$("#dt_l").append(house['cityname']);
			$("#hd_description").append(house['description']);
			$("#dt_city").append(house['cityname']);
			$("#dt_location").append(house['locationname']);
			$("#dt_address").append(house['address']);
			$("#dt_username").append(house['a_username']);
			$("#dt_phone").append(house['a_phone']);
			$("#dt_user_id").append(house['a_user_id']);
		}

		$("#button1").click(function(){
			layer.confirm('确认？', function(index){
				// obj.del();
				$.ajax({
					url:"/HouseR/Admin/index/verify_house",
					data:{"house_id":house_detail.data['id'],"content":$("#content").val(),"r_id":house_detail.data['a_user_id']},
					success:function(data){
					  console.log(data);
					  alert("通过成功",parent.window.location.reload());
					}
				});
				layer.close(index);
		  	});
		})

		$("#button2").click(function(){
			layer.confirm('确认？', function(index){
				// obj.del();
				$.ajax({
					url:"/HouseR/Admin/index/reject_house",
					data:{"house_id":house_detail.data['id']},
					success:function(data){
					  console.log(data);
					  alert("驳回成功",parent.window.location.reload());
					}
				});
				layer.close(index);
		  	});
		})

		//申请租房
		$("#apply_rent").click(function(){
			if(userM.msg!=-1){
				window.location.href="/HouseR/Home/rent/rent_house?house_id="+house_detail.data['id'];
			}else{
				layer.msg("请先登录",window.location.href='/HouseR/User/user/login');
			}
		})

		//收藏点击事件
		$("#add_collect").click(function(){
			if(userM.msg!=-1){
				if(isCollect==-1){
					$.ajax({
						type:"POST",
						url:"/HouseR/Home/Collect/add_Collect",
						data:{"house_id":house_detail.data['id']},
						dataType:"JSON",
						success:function(data){
							console.log(data);
							if(data.msg>0){
								isCollect=1;
								$("#add_collect").empty().append("已收藏");
								layer.msg("添加收藏");
							}
						}
					})
				}else{
					$.ajax({
						type:"POST",
						url:"/HouseR/Home/Collect/cancel_Collect",
						data:{"house_id":house_detail.data['id']},
						dataType:"JSON",
						success:function(data){
							console.log(data);
							if(data.msg>0){
								isCollect=-1;
								$("#add_collect").empty().append("收藏");
								layer.msg("取消收藏");
							}
						}
					})
				}
			}else{
				layer.msg("请先登录");
			}
		});

		//放入图片
		if(house_image['msg']!=-1){
			var h_image=house_image['data'];
			for(var i=0;i<h_image.length;i++){
				$("#dt_img").append("<img class='layui-col-md4 layui-col-sm4 layui-col-xs6' src="+h_image[i].path+">")
			}
		}

		//将图片输入到轮播
		if(house_image['msg']!=-1){
			for(var i=0;i<house_image.data.length;i++){
				$("#carousel_i").append("<div style='text-align:center;'><img width='' height='100%' align='center' src="+house_image.data[i].path+"></div>")
			}
		}
		layui.use('carousel', function(){
			var carousel = layui.carousel;
		  	//建造实例
		  	carousel.render({
		  		elem: '#carousel'
		  		,auto: true
			    ,width: '100%' //设置容器宽度
			    ,arrow: 'hover' //始终显示箭头
			    //,anim: 'updown' //切换动画方式
			});
		  });

		//图片查看插件
		// View a list of images
		const gallery = new Viewer(document.getElementById('dt_img'));  

	});
</script>
</html>