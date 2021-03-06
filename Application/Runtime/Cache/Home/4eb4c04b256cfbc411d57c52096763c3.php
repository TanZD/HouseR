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
		<div class="header_list" id="header">
			<ul class="layui-nav" lay-filter="" style="border-radius: 0px;">
				<li class="header_list_left" style="float: left;"><img onclick="window.location.href='/HouseR/Home/index'" style="width: 100px;" src="/HouseR/public/images/logo.png"></li>
				<li class="layui-nav-item" style="float: left;">
					<a href="javascript:;" id="c_city"></a>
				</li>
 				<li class="layui-nav-item" id="apply_house" style="display: none;"><a href="/HouseR/Home/rent/apply" >我要出租</a></li>
 				<li class="layui-nav-item" style="display: none" id="personControl"><a href="/HouseR/Homepage/index">个人中心<span id="dot" style="display: none;" class="layui-badge-dot"></span></a></li>
 				<li class="layui-nav-item"><a href="" id="userName">登录</a></li>
 				<li class="layui-nav-item"><a href="" id="logout">注册</a></li>
			</ul>
		</div>

		<div class="hd_title">
			<div id="hd_title" class="title_left layui-col-md8 layui-col-sm8 layui-col-xs6">
				TITLE
			</div>
			<div style="clear: both;"></div>
		</div>

		<div class="hd_address">
		</div>

		<div class="hd_content">
			<div>
				<div class="hd_dt_title" style="margin-bottom: 50px;">租房申请</div>
			</div>
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
			</div>
			<div style="clear: both;"></div>
		</div>

		<div class="hd_dt">
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
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_l"><span>所在城市:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_ll" style="float: right;"><span>所在区域:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_an"><span>屋主用户名:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_ap" style="float: right;"><span>屋主联系电话:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="hd_address"><span>详细地址:</span></li>
							<div style="clear: both;"></div>
						</ul>
					</div>
				</div>
			<div style="clear: both;"></div>
			<div>
				<div class="hd_dt_title">房屋描述</div>
				<div class="hd_description" id="hd_description"></div>
			</div>
			<div>
				<div class="hd_dt_title">选择租约时长</div>
				<div>
					<div class="hd_date">
						<div class="ht_d">起租时间</div>
						<input type="text" style="width: 200px;" class="layui-input" id="test1" placeholder="">
					</div>
					<div class="hd_date">
						<div class="ht_d">到租时间</div>
						<input type="text" style="width: 200px;" class="layui-input" id="test2" placeholder="yyyy-MM-dd">
					</div>
					<div style="clear: both;"></div>
				</div>
				<div class=" " id="select_time">
					<button class="r_btn r_btn_no">1个月</button>
					<button class="r_btn r_btn_no">2个月</button>
					<button class="r_btn r_btn_no">3个月</button>
					<button class="r_btn r_btn_no">4个月</button>
					<button class="r_btn r_btn_no">5个月</button>
					<button class="r_btn r_btn_no">6个月</button>
				</div>
			</div>
			<div>
				<div class="hd_dt_title">租金总额</div>
				<div class="hd_total_price" id="hd_price_total" style="float: right;">$$$</div>
			</div>
			<div class="hd_request" align="center" style="width: 100%">
				<button class="r_btn" id="button1">确认申请</button>
				<button class="r_btn" style="width: 250px;background-color: #0787f5;"><i class="fa fa-phone fa-lg"></i>PHONE_NUMBER</button>
			</div>
			<div style="clear: both;"></div>
			</div>

		</div>

	</div>
</body>
<script src="/HouseR/public/js/jquery.min.js"></script>
<script type="text/javascript" src="/HouseR/public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/HouseR/public/viewerjs/viewer.min.js" charset="utf-8"></script>
<script type="text/javascript">
	
	//检测是否登录
	$.ajax({
		url:"/HouseR/User/user/islogin",
		dataType:"JSON",
		async:false,
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
				$("#apply_house").fadeIn("fast");
			}
		}
	});
	layui.use(['layer'], function(){
	  var layer = layui.layer
	});

	//b ? x : y
	var house_detail=<?php echo $house_detail; ?>;
	var house_image=<?php echo $house_image; ?>;
	var isCollect=-1;
	var islogin=-1;
	var curr_mon=1;
	var total_price;
	console.log(house_detail);
	console.log(house_image);
	var myDate = new Date();
	var y=myDate.getFullYear();
	var m=timeAdd0((myDate.getMonth()+1));
	var d=timeAdd0(myDate.getDate());
	var nowdate=y+"-"+m+"-"+d;
	var end_time;

	function getdate(){
		var arr=new Array();
		arr=$("#test1").val().split('-');
		// console.log("value::"+arr);
		date=new Array();
		date['year']=arr[0];
		date['month']=arr[1];
		date['date']=arr[2];
		date.month=parseInt(date.month);
		date.year=parseInt(date.year);
		// console.log("date::"+date['month']);
		dateSub(date);
    	total_price=house_detail.data['price']*curr_mon;
    	$("#hd_price_total").empty().append(total_price+"元");
	}

	function dateSub(date){
    	date.month+=curr_mon;
    	if(date.month>12){
    		date.month=date.month-12;
    		date.year++;
    	}
    	if(date.month<10) date.month="0"+date.month;
    	if(date.date<10) date.date="0"+date.date;
		$("#test2").attr("value",date.year+"-"+date.month+"-"+date.date);
		end_time=date.year+"-"+date.month+"-"+date.date;
	}

	function timeAdd0(str) {
		if(str<10){
			str="0"+str;
		}
	    return str
	}

	$(document).ready(function(){
		//检测是否登录

		$("#button1").click(function(){
			if($("#test1").val()==""||$("#test2").val()==""){
				layer.msg("请选择租借时间");
				return false;
			}
			//获取html <body></body>的Jquery对象
			var body = $("body");
			//创建表单
			var form = $("<form></form>");
			//将表单放入body中
			body.append(form);
			//设置表单各项属性
			form.attr("action","/HouseR/Home/rent/apply_rent");
			form.attr("method","post");
			//创建input对象并放入表单中
			form.append('<input type="text" name="start_time" value="'+nowdate+'"><input type="text" name="end_time" value="'+end_time+'"><input type="text" name="u_A_id" value="'+house_detail.data['host_id']+'"><input type="text" name="u_B_id" value="'+1+'"><input type="text" name="house_id" value="'+house_detail.data['id']+'"><input type="text" name="price_total" value="'+parseFloat(total_price)+'"><input type="text" name="price_month" value="'+house_detail.data['price']+'"><input type="text" name="title" value="'+house_detail.data['title']+'">');
			//提交表单
			form.submit();
		});
		$("#select_time button").click(function(){
			var index=$("#select_time button").index(this);
			// alert(index);
			$("#select_time button").addClass("r_btn_no");
			$("#select_time button").eq(index).removeClass("r_btn_no");
			curr_mon=index+1;
			getdate();
			// console.log("val::"+$("#test1").val());
		});


		//显示信息
		if(house_detail.msg!=-1){
			var house=house_detail.data;
			$("title").append(house['title']);
			$("#hd_title").empty().append(house['title']);
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

			$("#dt_r").append(house['livingrooms']+"厅"+house['rooms']+"房"+house['bathrooms']+"卫");
			$("#dt_f").append(house['floor']+"层");
			$("#dt_a").append(house['area']+"平方米");
			$("#dt_d").append(decoration);
			$("#dt_l").append(house['cityname']);
			$("#dt_ll").append(house['locationname']);
			$("#hd_description").append(house['description']);
			$("#dt_an").append(house['a_username']);
			$("#dt_ap").append(house['a_phone']);
			$("#hd_address").append(house['address']);
			$("#hd_price_total").empty().append("0元");
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

		layui.use('laydate', function(){
			var laydate = layui.laydate;

			//执行一个laydate实例
			laydate.render({
				elem: '#test1' //指定元素
				,value: nowdate
				,min: nowdate
				,isInitValue: true
				,btns: ['now', 'confirm']
				,done: function(value, date){
					// alert("A");
			    	console.log(date); //得到初始的日期时间对象：{year: 2017, month: 8, date: 18, hours: 0, minutes: 0, seconds: 0}
			    	dateSub(date);
			    	total_price=house_detail.data['price']*curr_mon;
			    	$("#hd_price_total").empty().append(total_price+"元");
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url:"/HouseR/Home/rent/get_message",
			success:function(data){
				if(data!="0") $("#dot").show();
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url:"/HouseR/Home/rent/get_message",
			success:function(data){
				if(data!="0") $("#dot").show();
			}
		});
	});
</script>
</html>