<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>后台管理</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="/HouseR/public/xadmin/css/font.css">
        <link rel="stylesheet" href="/HouseR/public/xadmin/css/xadmin.css">
        <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
        <script src="/HouseR/public/xadmin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/HouseR/public/xadmin/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            // 是否开启刷新记忆tab功能
            // var is_remember = false;
        </script>
    </head>
    <body class="index">
        <!-- 顶部开始 -->
        <div class="container">
            <div class="logo">
                <a href="./index.html">HouseR</a></div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;&nbsp;&nbsp;缩展主菜单</i></a>
            </div>
            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;" style="color:red">管理员账户名（改）</a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('个人信息','')">个人信息</a></dd>       
                        <dd>
                            <a href="./login.html">退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
        <!-- 顶部结束 -->
        <!-- 中部开始 -->
        <!-- 左侧菜单开始 -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="租房合同管理">&#xe723;</i>
                            <cite>租约管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;">
                                    <i class="iconfont">&#xe70b;</i>
                                    <cite>租房合同编辑</cite>
                                    <i class="iconfont nav_right">&#xe697;</i></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a onclick="xadmin.add_tab('租房合同删除','Admin/order-del.html')">
                                            <i class="iconfont">&#xe6a7;</i>
                                            <cite>租房合同删除</cite></a>
                                    </li>                                   								
									<li>
                                        <a onclick="xadmin.add_tab('租房审核','Admin/order-modify.html')">
                                            <i class="iconfont">&#xe6a7;</i>
                                            <cite>租房审核</cite></a>
                                    </li>
                                </ul>
                            </li>
							<li>
                                <a onclick="xadmin.add_tab('租房审核','Admin/order-add.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>租房合同添加</cite></a>
                         </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="信息管理">&#xe726;</i>
                            <cite>信息管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('信息查看','.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>信息查看</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('租赁维护记录','Admin/rent-update.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>租赁维护记录</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('租赁统计报表','.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>租赁统计报表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('房屋设备管理','.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>房屋设备管理</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="租金信息">&#xe6ce;</i>
                            <cite>租金信息</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('？？？','.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>？？？</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('？？？','.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>？？？</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('？？？','.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>？？？</cite></a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="房屋信息">&#xe6b4;</i>
                            <cite>房屋信息</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;">
                                    <i class="iconfont">&#xe70b;</i>
                                    <cite>房屋信息编辑</cite>
                                    <i class="iconfont nav_right">&#xe697;</i></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a onclick="xadmin.add_tab('房屋信息删除','Admin/house-del.html')">
                                            <i class="iconfont">&#xe6a7;</i>
                                            <cite>房屋信息删除</cite></a>
                                    </li>
                                    <li>
                                        <a onclick="xadmin.add_tab('房屋信息搜索','Admin/house-search.html')">
                                            <i class="iconfont">&#xe6a7;</i>
                                            <cite>房屋信息搜索</cite></a>
                                    </li>
                                </ul>
                            </li>
							<li>
                                <a onclick="xadmin.add_tab('添加房屋信息','Admin/house-add.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>添加房屋信息</cite></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>我的桌面</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">关闭当前</dd>
                        <dd data-type="other">关闭其它</dd>
                        <dd data-type="all">关闭全部</dd></dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='./Admin/welcome.html' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->
    </body>

</html>