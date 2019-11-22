<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>后台管理</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/HouseR/public/xadmin/css/font.css">
        <link rel="stylesheet" href="/HouseR/public/xadmin/css/xadmin.css">
        <script src="/HouseR/public/xadmin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/HouseR/public/xadmin/js/xadmin.js"></script>
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
  
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
									  <th>房屋名</th>
									  <th>市</th>
									  <th>区</th>
									  <th>房屋面积</th>

									  <th>登记时间</th>
									  <th>房东id</th>
									  <th>是否为用户提供</th>  
									  <th>楼层</th>
									  <th>详细地址</th>

									  <th>租金</th>
									  <th>出租情况</th>
                                      <th>操作</th></tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <input type="checkbox" name="id" value="1"   lay-skin="primary"> 
                                    </td>
                                      <td id="title">1</td><!-- 房屋名 -->
									  <td id="city"></td><!-- 市 -->
									  <td id="location"></td><!-- 区 -->
									  <td id="area"></td><!-- 房屋面积 -->

									  <td id="add_time"></td><!-- 登记时间 -->
									  <td id="host_id"></td><!-- 房东id -->
									  <td id="origin"></td><!-- 是否为用户提供 -->
									  <td id="floor"></td><!-- 楼层 -->
									  <td id="address"></td><!-- 详细地址 -->
									  <td id="price"></td><!-- 租金 -->
									  <td id="status"></td><!-- 出租情况 -->
                                    
                                    <td class="td-manage">
                                      
                                      <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                        <i class="layui-icon">&#xe640;</i>
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
                                  <a class="num" href="">1</a>
                                  <span class="current">2</span>
                                  <a class="num" href="">3</a>
                                  
                                  <a class="next" href="">&gt;&gt;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
		<script type="text/javascript" src="/HouseR/public/xadmin/js/table.js"></script>
    </body>

</html>