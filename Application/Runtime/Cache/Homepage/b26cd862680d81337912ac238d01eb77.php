<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title>我的租约</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<script type="text/javascript" src="/HouseR/public/js/jquery.min.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="/HouseR/public/homepage/css/Mycontract.css"> -->
	<link rel="stylesheet" type="text/css" href="/HouseR/public/layui/css/layui.css">
	<script type="text/javascript" src="/HouseR/public/layui/layui.js" charset="utf-8"></script>



</head>
<body>

	<div class="bd">

	<table id="demo1" class="layui-hide"  lay-filter="demoEvent"></table>
		</div>

	<script type="text/javascript">
		layui.use('table', function(){
  		var table = layui.table;
		table.render({
            elem: '#demo1'
            //,height: 315
            ,url: "/HouseR/Homepage/Index/apiMyRent" //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'id',event: 'setSign', title: 'ID', width:80, sort: true, fixed: 'left'}
                ,{field: 'title',event: 'setSign', title: '标题'}
                ,{field: 'cityname',event: 'setSign', title: '城市'}
                ,{field: 'locationname',event: 'setSign', title: '区域'}
                ,{field: 'area',event: 'setSign', title: '面积', }
                ,{field: 'rooms',event: 'setSign', title: '房(个数)',  }
                ,{field: 'livingrooms',event: 'setSign', title: '厅(个数)'}
                ,{field: 'bathrooms',event: 'setSign', title: '卫生间(个数)',}
                ,{field: 'add_time',event: 'setSign', title: '登记时间'}
                ,{field: 'floor',event: 'setSign', title: '楼层'}
                ,{field: 'address',event: 'setSign', title: '详细地址'}
                ,{field: 'description',event: 'setSign', title: '描述'}
            ]]
            ,page: true
            ,limit:4
            ,parseData: function(res){
            	console.log(res);
             //将原始数据解析成 table 组件所规定的数据
		      return {
		        "code": 0, //解析接口状态
		        "msg": "", //解析提示文本
		        "count": res.count, //解析数据长度
		        "data": res.item //解析数据列表
		      };
		    }
        });


    //     //监听单元格事件
		  table.on('tool(demoEvent)', function(obj){
		    var data = obj.data;
		    // console.log(data);
		    if(obj.event === 'setSign'){
		        // console.log(obj.data['house_id']);
		        console.log(obj.data['id']);
		        parent.window.location.href="/HouseR/Home/rent/house?house_id="+obj.data['id'];
		        
		      // layer.prompt({
		      //   formType: 2
		      //   ,title: '修改 ID 为 ['+ data.id +'] 的用户签名'
		      //   ,value: data.sign
		      // }, function(value, index){
		      //   layer.close(index);
		      //   alert(index);
		      //   //这里一般是发送修改的Ajax请求
		        
		      //   //同步更新表格和缓存对应的值
		      //   obj.update({
		      //     sign: value
		      //   });
		      // });
		    }
		  });
});
	</script>
	<script type="text/javascript">
		
	</script>
</body>
</html>