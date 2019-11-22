<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <title>layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="/HouseR/public/xadmin/lib/layui/css/layui.css"  media="all">
  <link rel="stylesheet" href="/HouseR/public/xadmin/css/font.css">
  <link rel="stylesheet" href="/HouseR/public/xadmin/css/xadmin.css">
  <script type="text/javascript" src="/HouseR/public/js/jquery.min.js"></script>

  <script src="/HouseR/public/xadmin/lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="/HouseR/public/xadmin/js/xadmin.js"></script>
  <script src="/HouseR/public/xadmin/lib/layui/layui.js" charset="utf-8"></script>
</head>
<body>
 
<table class="layui-hide" id="test" lay-filter="test"></table>
 
<script type="text/html" id="toolbarDemo">
<!--   <div class="layui-btn-container">
    <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
    <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
    <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
  </div> -->
</script>
 
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="pass">查看详情</a>
</script>
              
          
 
<script>
layui.use('table', function(){
  var table = layui.table;
  
  table.render({
    elem: '#test'
    ,url:'/HouseR/Admin/index/get_verify_house'
    ,toolbar: '#toolbarDemo'
    ,title: '用户数据表'
    ,cols: [[
    
      {field:'id', title:'ID', fixed: 'left', unresize: true, sort: true, totalRowText: 'ID'}
      ,{field:'title', title:'房名'}
      ,{field:'username', title:'屋主名',sort: true, totalRow: true}
      ,{field:'rooms',  title:'房', sort: true, totalRow: true}
      ,{field:'livingrooms',  title:'厅', sort: true, totalRow: true}
      ,{field:'bathrooms',  title:'卫', sort: true, totalRow: true}
      ,{field:'area', title:'建筑面积',sort: true}
      ,{field:'add_time', title:'申请时间',sort: true}
      ,{field:'cityname', title:'所在城市',sort: true}
      ,{field:'locationname', title:'所在区域'}
      ,{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}
    ]]
    ,page: true
    ,limit:10
    ,limits:[10]
    ,response: {
      statusCode: 200 //重新规定成功的状态码为 200，table 组件默认为 0
    }
    ,parseData: function(res){ //将原始数据解析成 table 组件所规定的数据
      console.log(res);
      return {
        "code": 200, //解析接口状态
        "msg": "", //解析提示文本
        "count": res.msg, //解析数据长度
        "data": res.data //解析数据列表
      };
    }
  });
  
  //头工具栏事件
  table.on('toolbar(test)', function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'getCheckData':
        var data = checkStatus.data;
        layer.alert(JSON.stringify(data));
      break;
      case 'getCheckLength':
        var data = checkStatus.data;
        layer.msg('选中了：'+ data.length + ' 个');
      break;
      case 'isAll':
        layer.msg(checkStatus.isAll ? '全选': '未全选');
      break;
    };
  });
  
  //监听行工具事件
  table.on('tool(test)', function(obj){
    var data = obj.data;
    if(obj.event === 'pass'){
      window.location.href="/HouseR/Admin/index/house_detail?house_id="+data['id'];
    }
  });
});
</script>
</body>
</html>