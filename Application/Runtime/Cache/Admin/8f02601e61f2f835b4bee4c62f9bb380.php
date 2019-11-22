<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="x-admin-sm">
<head>
<meta charset="utf-8">
<title>layui</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="/HouseR/public/xadmin/lib/layui/css/layui.css"  media="all">
<link rel="stylesheet" href="/HouseR/public/xadmin/css/font.css">
<link rel="stylesheet" href="/HouseR/public/xadmin/css/xadmin.css">
<script src="/HouseR/public/xadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/HouseR/public/xadmin/js/xadmin.js"></script>
<script src="/HouseR/public/js/jquery.min.js"></script>
</head>
    <body>
      <div class="layui-fluid">
        <div class="layui-col-md12">
          <div class="layui-card">
            <div class="layui-card-body ">
              <div class="layui-input-inline layui-show-xs-block">
                  <input class="layui-input" placeholder="房屋id号" name="id_search" id="id_search">
              </div>

              <div class="layui-inline layui-show-xs-block">
                  <button class="layui-btn" id="search"><i class="layui-icon">&#xe615;</i></button>
              </div>
            </div>
                
            <div class="layui-card-body layui-table-body layui-table-main">
               <table class="layui-hide" id="test" lay-filter="test"></table>
               <!-- <script type="text/html" id="toolbarDemo">
                  <div class="layui-btn-container">
                    <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
                    <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
                    <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
                  </div>
                </script> -->
                 
                <!-- <script type="text/html" id="barDemo">
                  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                </script> -->
             </div>
            <script type="text/html" id="barDemo">
              <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="pass">查看详情</a>
            </script>
          </div>
        </div>
      </div> 
    </body>
<script>
layui.use('table', function(){
  var table = layui.table;
  
  $("#search").click(function(){
      var val=$("#id_search").val();
      table.render({
      elem: '#test'
      ,url: "/HouseR/Admin/index/get_house?house_id="+val
      ,toolbar: '#toolbarDemo'
      ,title: '房屋信息'
      ,cols: [[
        {field:'id', title:'ID', fixed: 'left', unresize: true, sort: true, totalRowText: 'ID'}
        ,{field:'title', title:'房名'}
        ,{field:'a_username', title:'屋主名',sort: true, totalRow: true}
        ,{field:'rooms',  title:'房', sort: true, totalRow: true}
        ,{field:'livingrooms',  title:'厅', sort: true, totalRow: true}
        ,{field:'bathrooms',  title:'卫', sort: true, totalRow: true}
        ,{field:'area', title:'建筑面积',sort: true}
        ,{field:'add_time', title:'申请时间',sort: true}
        ,{field:'cityname', title:'所在城市',sort: true}
        ,{field:'locationname', title:'所在区域'}
        ,{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}
        // ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}
      ]]
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
  })
  
  
  //监听行工具事件
  table.on('tool(test)', function(obj){
    var data = obj.data;
    //console.log(obj)
    if(obj.event === 'pass'){
      window.location.href="/HouseR/Admin/index/delete_house?house_id="+data['id'];

      // layer.confirm('真的删除行么', function(index){

      //   layer.close(index);
      // });
    } else if(obj.event === 'edit'){
      layer.prompt({
        formType: 2
        ,value: data.email
      }, function(value, index){
        obj.update({
          email: value
        });
        layer.close(index);
      });
    }
    //点击响应事件
    // if(obj.event === 'setSign'){
    //   console.log(obj.data);
    //   parent.window.location.href="/HouseR/Home/rent/house?house_id="+obj.data['house_id'];
    // }
  });
});
</script>
<script type="text/javascript" src="/HouseR/public/xadmin/js/time.js"></script>
<!-- <script type="text/javascript" src="./js/table.js"></script> -->
    </body>
    
</html>