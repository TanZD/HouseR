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
		</div>

		<div class="hd_content">
			<div>
				<div class="hd_dt_title" style="margin-bottom: 50px;">租约信息</div>
			</div>
			<div class="">
					<div class="hd_request">
						<ul>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_t"><span>标题:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_add" style="float: right;"><span>创建时间:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_time"><span>签约时间:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_st" style="float: right;"><span>起租时间:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_et"><span>到租时间:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_pt" style="float: right;"><span>租金总额:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_pm"><span>月租:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_aname" style="float: right;"><span>屋主用户名:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_p"><span>屋主联系电话:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_rs" style="float: right;"><span>合约状态:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="mc_id"><span>租约编号:</span></li>
							<div style="clear: both;"></div>
						</ul>
					</div>
				</div>
			<div style="clear: both;"></div>
		</div>

		<div class="hd_dt">
			<div>
				<div class="hd_dt_title">房源信息</div>
				<div class="">
					<div class="hd_request">
						<ul>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_r"><span>房屋户型:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_f" style="float: right;"><span>所在楼层:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_a"><span>建筑面积:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_d" style="float: right;"><span>装修情况:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_l"><span>所在城市:</span></li>
							<li class="hd_request layui-col-md5 layui-col-sm5 layui-col-xs12" id="dt_ll" style="float: right;"><span>所在区域:</span></li>
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
			<div style="clear: both;"></div>
			</div>

		</div>

	</div>
</body>
<script src="/HouseR/public/js/jquery.min.js"></script>
<script type="text/javascript" src="/HouseR/public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/HouseR/public/viewerjs/viewer.min.js" charset="utf-8"></script>
<script type="text/javascript">
	layui.use(['layer'], function(){
	  var layer = layui.layer
	});

	//b ? x : y
	var house_detail=<?php echo $house_detail; ?>;
	var house_image=<?php echo $house_image; ?>;
	var contract_detail=<?php echo $contract_detail; ?>;
	var isCollect=-1;
	var islogin=-1;
	var total_price;
	console.log(house_detail);
	console.log(house_image);

	$(document).ready(function(){
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

		//显示租约信息
		if(contract_detail.msg!=-1){
			var contract=contract_detail.data;
			$("#mc_t").append(contract['title']);
			$("#mc_id").append(contract['id']);
			$("#mc_add").append(contract['add_time']);
			$("#mc_time").append(contract['time']);
			$("#mc_st").append(contract['start_time']);
			$("#mc_et").append(contract['end_time']);
			$("#mc_pt").append(contract['price_total']+"元");
			$("#mc_pm").append(contract['price_month']+"元");
			$("#mc_p").append(contract['phone']);
			$("#mc_aname").append(contract['username']);
			if(contract['rent_status']==0)
			$("#mc_rs").append("审核中");
			else if(contract['rent_status']==1) 
			$("#mc_rs").append("租约期中");
		}
	});
</script>
</html>