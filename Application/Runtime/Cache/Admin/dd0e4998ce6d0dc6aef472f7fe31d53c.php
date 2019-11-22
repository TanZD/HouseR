<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="x-admin-sm">

<head>
	<meta charset="UTF-8">
	<title>房屋信息添加</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" >
	<link rel="stylesheet" href="/HouseR/public/admin/css/font.css">
	<link rel="stylesheet" href="/HouseR/public/css/admin/index.css">
	<link rel="stylesheet" type="text/css" href="/HouseR/public/layui/css/layui.css">
</head>
<body>
	<div class="bd">
		
		<form class="layui-form" enctype="multipart/form-data" method="POST" action="<?php echo U('add_houseImpl');?>"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->

			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
				<legend>房屋信息查看</legend>
			</fieldset>

			<div class="layui-form-item">
				<label class="layui-form-label">标题</label>
				<div class="layui-input-block">
					<input lay-verify="required" id="title" type="text" name="title" maxlength="50" placeholder="请输入" autocomplete="off" class="layui-input">
					<input lay-verify="required" id="host_id" type="text" name="host_id" style="display: none;" id="host_id">
					<!-- <input lay-verify="required" type="text" name="status" style="display: none;" value="1"> -->
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">状态</label>
				<div class="layui-input-block">
					<select lay-verify="city" name='city' lay-filter="aihao" id="name">
						<option value="0">请选择</option>
						<option value="1">请选择</option>
						<option value="2">请选择</option>
					</select>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">城市</label>
				<div class="layui-input-block">
					<select lay-verify="city" name='city' lay-filter="aihao" id="select_city">
						<option value="-1">请选择</option>
					</select>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">区域</label>
				<div class="layui-input-block">
					<select lay-verify="" name="location" lay-filter="aihao" id="select_location"></select>
				</div>
			</div>
			<div class="layui-form-item">
				<label lay-verify="" class="layui-form-label">详细地址</label>
				<div class="layui-input-block">
					<input type="text" name="address" maxlength="50" placeholder="请输入" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">装修</label>
				<div class="layui-input-block">
					<select lay-verify="" name='decoration' lay-filter="aihao" id="select_city">
						<option value="1">毛胚</option>
						<option value="2">普通装修</option>
						<option value="3">精装修</option>
					</select>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">范围</label>
					<div class="layui-input-inline" style="width: 50px;">
						<input lay-verify="number" min="1" type="number" name="rooms" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">房</div>
					<div class="layui-input-inline" style="width: 50px;">
						<input min="1" type="number" lay-verify="number" name="livingRooms" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">厅</div>
					<div class="layui-input-inline" style="width: 50px;">
						<input lay-verify="number" min="1" type="number" name="bathrooms" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">卫</div>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">楼层</label>
					<div class="layui-input-inline" style="width: 50px;">
						<input lay-verify="number" min="1" type="number" name="floor" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">层</div>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">面积</label>
					<div class="layui-input-inline" style="width: 50px;">
						<input lay-verify="number" min="1" type="number" name="area" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">平方米</div>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">租金/月</label>
					<div class="layui-input-inline" style="width: 150px;">
						<input lay-verify="number" min="1" type="number" name="price" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">元</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">房屋设备</label>
				<div class="layui-input-block">
					<input type="checkbox" name="bed" value="1" title="床">
					<input type="checkbox" name="kt" value="1" title="空调">
					<input type="checkbox" name="kd" value="1" title="宽带">
					<input type="checkbox" name="czy" value="1" title="餐桌椅">
					<input type="checkbox" name="yg" value="1" title="衣柜">
					<input type="checkbox" name="sf" value="1" title="沙发">
					<input type="checkbox" name="tv" value="1" title="电视">
					<input type="checkbox" name="bx" value="1" title="冰箱">
					<input type="checkbox" name="xyj" value="1" title="洗衣机">
					<input type="checkbox" name="cyyj" value="1" title="抽油烟机">
					<input type="checkbox" name="wbl" value="1" title="微波炉">
					<input type="checkbox" name="trq" value="1" title="天然气">
					<input type="checkbox" name="rsq" value="1" title="热水器">
					<input type="checkbox" name="xdg" value="1" title="消毒柜">
				</div>
			</div>

			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">房屋描述</label>
				<div class="layui-input-block">
					<textarea name="description" placeholder="请输入内容" class="layui-textarea"></textarea>
				</div>
			</div>

			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
				<legend>上传图片</legend>
			</fieldset>

			<div class="layui-upload">
				<div class="uploadImgBtn" id="uploadImgBtn">
			        <a href="javascript:;" class="file">选择文件<input lay-verify="image" class="uploadImg" type="file" name="file[]" multiple="multiple" id="file" accept="image/*"></a>
			    </div>
				<blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
					预览图：
					<div class="layui-upload-list" id="demo2"></div>
				</blockquote>
			</div>
			<div class="layui-form-item" align="center">
				<div class="layui-input-block" style="margin: 0px" >
					<input type="submit" class="layui-btn" name="submit" value="submit">
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>
			</div>
			<!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
		</form>



	</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript" src="/HouseR/public/admin/lib/layui/layui.js" charset="utf-8"></script>
<script>
	var city=<?php echo $select_city ?>;
	console.log(city);
	for(var i=0;i<city.length;i++){
		$("#select_city").append("<option value="+city[i].id+">"+city[i].cityname+"</option>");
	}

	var userM;
	//检测是否登录
	$.ajax({
		url:"/HouseR/User/user/islogin",
		dataType:"JSON",
		success:function(data){
			console.log(data);
			userM=data;
			$("#host_id").attr("value",data.data['id']);
		}
	});

	layui.use('form', function(){
		var form = layui.form;
		var regName=/[~#^$@%&!*()<>:;'"{}【】  ]/;
		form.verify({
		  title: function(value, item){ //value：表单的值、item：表单的DOM对象
		  	if(regName.test(value)){
				return "标题包含非法字符！";
		    }
		    if(value.length>3){
		      return '标题字符过长!';
		    }
		    if(value==""||value==null){
		      return '标题不能为空';
		    }
		  },
		  city: function(value){
		  	if(value==-1||value==""||value==null) return '请选择城市!';
		  },
		  image: function(value){
		  	if(value==""||value==null) return '图片不能为空!';
		  }
		  
		  //我们既支持上述函数式的方式，也支持下述数组的形式
		  //数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
		  // ,pass: [
		  //   /^[\S]{6,12}$/
		  //   ,'密码必须6到12位，且不能出现空格'
		  // ] 
		}); 

		form.on('checkbox',function(data){
			// console.log(data['elem'].checked);
			console.log(data)
		})

		form.on('submit(demo)', function(data){
			// data=JSON.stringify(data.field);
			// layer.alert(data, {
			// 	title: '最终的提交信息'
			// })
			// console.log(data);
			$("form").submit();
			return true;
		});

		$('form').submit(function(e){
			var o=0,msg;
			var d = {};
			var t = $('form').serializeArray();
			$.each(t, function() {
		      d[this.name] = this.value;
		    });
		    console.log(d);
		    if(d['title'].length<5){
		    	o=-1;
		    	msg="标题不能为空且少于5字符";
		    }else if(d['city']==-1){
		    	o=-1;
		    	msg="请选择城市";
		    }else if(d['address']==""){
		    	o=-1;
		    	msg="请填写地址";
		    }else if(d['rooms']==""||d['livingRooms']==""||d['bathrooms']==""){
		    	o=-1;
		    	msg="请填写户型";
		    }else if(d['floor']==""){
		    	o=-1;
		    	msg="请填写楼层";
		    }else if(d['area']==""){
		    	o=-1;
		    	msg="请填写面积";
		    }else if(d['price']==""){
		    	o=-1;
		    	msg="请填写租金";
		    }else if($("#demo2").find("img").length==0){
		    	o=-1;
		    	msg="请添加图片";
		    }
		    if(o!=-1){
		    	return true;
		    }
	    	layer.msg(msg);
	    	return false;
		});

		form.on('select', function(data){
		  console.log(data.value); //得到被选中的值
		  $.ajax({
		  	url: "/HouseR/admin/index/get_city",
		  	data: {"city_id": data.value},
		  	dataType:"JSON",
		  	success: function(result){
			    	// alert(result);
			    	console.log(result);
			    	if(result['msg']=="0"){
			    		var location=result['data'];
			    		$("#select_location").empty();
			    		for(var i=0;i<location.length;i++){
			    			console.log(location[i].cityname);
			    			$("#select_location").append("<option value="+location[i].id+">"+location[i].cityname+"</option>");
			    		}
						 form.render('select');//IMPORTANT
						}
					}
				});
		}); 
	});

</script>

<script>
    $(document).ready(function(){
        //为外面的盒子绑定一个点击事件
        $("#uploadImgBtn").click(function(){
            /*
            1、先获取input标签
            2、给input标签绑定change事件
            3、把图片回显
             */
//            1、先回去input标签
            var $input = $("#file");
            console.log($input)
//            2、给input标签绑定change事件
            $input.on("change" , function(){
                console.log(this)
                //补充说明：因为我们给input标签设置multiple属性，因此一次可以上传多个文件
                //获取选择图片的个数
                var files = this.files;
                var length = files.length;
                console.log("选择了"+length+"张图片");
                $('#demo2').empty();
                //3、回显
                $.each(files,function(key,value){
                    //每次都只会遍历一个图片数据

                    var fr = new FileReader();
                    fr.onload = function(){
    				  	$('#demo2').append('<img width="200px" src="'+ this.result +'" class="layui-upload-img">');
                    }
                    fr.readAsDataURL(value);
                })

            })
            $input.removeAttr("id");
        })

    })

</script>
</html>