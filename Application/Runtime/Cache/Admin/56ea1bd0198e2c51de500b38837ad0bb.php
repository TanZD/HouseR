<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html class="x-admin-sm">

<head>
  <meta charset="UTF-8">
  <title></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
  <link rel="stylesheet" href="/HouseR/public/xadmin/css/font.css">
  <link rel="stylesheet" href="/HouseR/public/xadmin/css/xadmin.css">
  <script type="text/javascript" src="/HouseR/public/xadmin/lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="/HouseR/public/xadmin/js/xadmin.js"></script>
  <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>
      <div class="x-nav">
      <!-- <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
        </span> -->
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
          <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
          <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
              <div class="layui-card">
                <div class="layui-card-body ">
                  <form class="layui-form layui-col-space5">
                   <div class="layui-inline layui-show-xs-block">
                    <input type="text" name="title"  placeholder="合同名" autocomplete="off" class="layui-input">
                  </div>


                  <div class="layui-inline layui-show-xs-block">
                    <input type="text" name="house_id"  placeholder="房子id" autocomplete="off" class="layui-input">
                  </div>


                  <div class="layui-inline layui-show-xs-block">
                    <input class="layui-input"  autocomplete="off" placeholder="创建时间" name="add_time" id="add_time">
                  </div>
                  <div class="layui-inline layui-show-xs-block">
                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                  </div>
                </form>
              </div>          
              <div class="layui-card-body ">
                <table class="layui-table layui-form">
                  <thead>
                    <tr>
                      <th>合同名</th>
                      <th>创建时间</th>
                      <th>签约时间</th>
                      <th>起租时间</th>
                      <th>到租时间</th>
                      <th>租金总额</th>
                      <th>月租</th>
                      <th>房东id</th>
                      <th>租客id</th>
                      <th>房子id</th>  
                      <th>合同状态</th>
                      <th>备注</th>                           
                      <th>操作</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td id="title">1</td><!-- 合同名 -->
                        <td id="add_time"></td><!-- 创建时间 -->
                        <td id="time"></td><!-- 签约时间 -->
                        <td id="start_time"></td><!-- 起租时间 -->
                        <td id="end_time"></td><!-- 到租时间 -->
                        <td id="price_total"></td><!-- 租金总额 -->
                        <td id="price_month"></td><!-- 月租 -->
                        <td id="u_A_id"></td><!-- 房东id -->
                        <td id="u_B_id"></td><!-- 租客id -->
                        <td id="house_id"></td><!-- 房子id -->
                        <td id="note"></td><!-- 合同状态 -->
                        <td id="stat"></td><!-- 备注 -->	
                        <td class="td-manage">
                          <a title="修改" onclick="xadmin.open('修改合同','order-edit.html')" href="javascript:;">
                            <i class="layui-icon">&#xe699;</i>
                          </a>							  
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="layui-card-body ">
                  <div class="page">
                    <div>
                      <a class="prev" href="">&lt;&lt;</a>
                      <span class="current">1</span>
                              <!-- <span class="current">2</span>
                              <a class="num" href="">3</a>
                              <a class="num" href="">4</a> -->
                              <a class="next" href="">&gt;&gt;</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
                <script>
                  layui.use(['laydate','form'], function(){
                    var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });
                  function delAll (argument) {

                    var data = tableCheck.getData();

                    layer.confirm('确认要恢复吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('恢复成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
          });
                  }
                </script>
                <script>
                  layui.use('laydate', function(){
                    var laydate = layui.laydate;  
		  //自定义格式
		  //创建时间
		  laydate.render({
       elem: '#add_time'
       ,format: 'yyyy年MM月dd日'
     });			
		  
		  //直接嵌套显示
		  laydate.render({
       elem: '#test-n1'
       ,position: 'static'
     });
		  laydate.render({
       elem: '#test-n2'
       ,position: 'static'
       ,lang: 'en'
     });
		  laydate.render({
       elem: '#test-n3'
       ,type: 'month'
       ,position: 'static'
     });
		  laydate.render({
       elem: '#test-n4'
       ,type: 'time'
       ,position: 'static'
     });
		});
  </script>
  <script>
		//点击框全选
		function fan(){
      $('input:checkbox').each(function(){
       console.log(this);
	    //console.log($('input:checkbox'));
	    if($(this).prop('checked')==true){
	        $(this).prop('checked',false);  //改checked值为false
       }else {
	        $(this).prop('checked',true);   //改checked值为true
       }
     });
    }

  </script>
</body>

</html>