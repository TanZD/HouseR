<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
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
        <![endif]--></head>
    
    <body style="margin-left:30%;">
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                    <div class="layui-form-item">
                        <label for="title" class="layui-form-label">
                            <span class="x-red">*</span>合同名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="title" name="title" required="" lay-verify="title" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="add_time" class="layui-form-label">
                            <span class="x-red">*</span>创建时间</label>
                        <div class="layui-input-inline layui-show-xs-block">
                                    <input class="layui-input" placeholder="" name="add_time" id="add_time">
							</div>
                    </div>
					<div class="layui-form-item">
                        <label for="time" class="layui-form-label">
                            <span class="x-red">*</span>签约时间</label>
                        <div class="layui-input-inline layui-show-xs-block">
                                    <input class="layui-input" placeholder="" name="time" id="time">
							</div>
                    </div>
					<div class="layui-form-item">
                        <label for="start_time" class="layui-form-label">
                            <span class="x-red">*</span>起租时间</label>
                        <div class="layui-input-inline layui-show-xs-block">
                                    <input class="layui-input" placeholder="" name="start_time" id="start_time">
							</div>
                    </div>
					<div class="layui-form-item">
                        <label for="end_time" class="layui-form-label">
                            <span class="x-red">*</span>到租时间</label>
                        <div class="layui-input-inline layui-show-xs-block">
                                    <input class="layui-input" placeholder="" name="end_time" id="end_time">
							</div>
                    </div>
					<div class="layui-form-item">
                        <label for="price_month" class="layui-form-label">
                            <span class="x-red">*</span>月租</label>
                        <div class="layui-input-inline">
                            <input type="text" id="price_month" name="price_month" required="" lay-verify="title" autocomplete="off" class="layui-input"></div>
                    </div>
					
					<div class="layui-form-item">
                        <label for="price_total" class="layui-form-label">
                            <span class="x-red">*</span>租金总额</label>
                        <div class="layui-input-inline">
                            <input type="text" id="price_total" name="price_total" required="" lay-verify="title" autocomplete="off" class="layui-input"></div>
                    </div>
					<div class="layui-form-item">
                        <label for="u_A_id" class="layui-form-label">
                            <span class="x-red">*</span>房东id</label>
                        <div class="layui-input-inline">
                            <input type="text" id="u_A_id" name="u_A_id" required="" lay-verify="title" autocomplete="off" class="layui-input"></div>
                    </div>
					
					<div class="layui-form-item">
                        <label for="u_B_id" class="layui-form-label">
                            <span class="x-red">*</span>租客id</label>
                        <div class="layui-input-inline">
                            <input type="text" id="u_B_id" name="u_B_id" required="" lay-verify="title" autocomplete="off" class="layui-input"></div>
                    </div>
					<div class="layui-form-item">
                        <label for="house_id" class="layui-form-label">
                            <span class="x-red">*</span>房子id</label>
                        <div class="layui-input-inline">
                            <input type="text" id="house_id" name="house_id" required="" lay-verify="title" autocomplete="off" class="layui-input"></div>
                    </div>
					<div class="layui-form-item">
                        <label for="note" class="layui-form-label">
                            <span class="x-red">*</span>合同状态</label>
                        <div class="layui-input-inline">
                            <input type="text" id="note" name="note" required="" lay-verify="title" autocomplete="off" class="layui-input"></div>
                    </div>
					
					<div class="layui-form-item">
                        <label for="stat" class="layui-form-label">
                            <span class="x-red">*</span>备注</label>
                        <div class="layui-input-inline">
                            <input type="text" id="stat" name="stat" required="" lay-verify="title" autocomplete="off" class="layui-input"></div>
                    </div>
					
                   
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="add" lay-submit="">增加</button></div>
                </form>
            </div>
        </div>
		<script type="text/javascript" src="./js/table.js"></script>
		<script type="text/javascript" src="./js/time.js"></script>
	    </body>
		
</html>