<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title>我的消息</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<link rel="stylesheet"  href="/HouseR/public/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/HouseR/public/layui/css/layui.css">
	<script type="text/javascript" src="/HouseR/public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/HouseR/public/layui/layui.js"></script>
<style type="text/css">
	tr td{
		cursor: pointer!important;
	}
</style>


</head>
<body>

	<div class="bd">

	<table id="demo1" class="layui-hide" lay-filter="demoEvent"></table>
	</div>

	<script type="text/javascript">
		layui.use('table', function(){
  		var table = layui.table;
		table.render({
            elem: '#demo1'
            //,height: 315
            ,url: "/HouseR/Homepage/Index/apimessage" //数据接口
            ,cols: [[ //表头
            	 {field: 'username', event: 'setSign', title: '发送人'}
                ,{field: 'content', event: 'setSign', title: '消息内容'}
                ,{field: 'add_time', event: 'setSign', title: '发送时间', width: 170, sort: true}
                ,{field: 'is', event: 'setSign', title: '已读', width: 170, sort: true}
            ]]
            ,page: true
            ,limit:12
            ,parseData:  function(res){
            	message=res;
		      	console.log(res);
		      	var data=res.total;
		      	for(var i=0;i<12&&i<res.rows;i++){
		      		if(data[i]["isread"]==1){
		      			data[i]["is"]="已读";
		      		}else data[i]["is"]="未读";
		      	}
             //将原始数据解析成 table 组件所规定的数据
		      return {
		        "code": 0, //解析接口状态
		        "msg": "", //解析提示文本
		        "count": res.rows, //解析数据长度
		        "data": res.total //解析数据列表
		      };
		    }

        });

		$.ajax({
			url:"/HouseR/Home/rent/set_isread",
			success:function(data){
				console.log("isRead");
			}
		});

		// table.on('tool(demoEvent)', function(obj){
		//     var data = obj.data;
		//     // console.log(data);
		//     if(obj.event === 'setSign'){
		        
		//         console.log(obj.data);
		//         parent.window.location.href="/HouseR/Home/rent/house?house_id="+obj.data['house_id'];
		//       // layer.prompt({
		//       //   formType: 2
		//       //   ,title: '修改 ID 为 ['+ data.id +'] 的用户签名'
		//       //   ,value: data.sign
		//       // }, function(value, index){
		//       //   layer.close(index);
		//       //   alert(index);
		//       //   //这里一般是发送修改的Ajax请求
		        
		//       //   //同步更新表格和缓存对应的值
		//       //   obj.update({
		//       //     sign: value
		//       //   });
		//       // });
		//     }
		//   });


});
	</script>
</body>
</html>