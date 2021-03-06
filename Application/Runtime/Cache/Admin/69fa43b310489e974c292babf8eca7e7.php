<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/HouseR/public/xadmin/css/font.css">
        <link rel="stylesheet" href="/HouseR/public/xadmin/css/xadmin.css">
        <script src="/HouseR/public/xadmin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/HouseR/public/xadmin/js/xadmin.js"></script>
        <script src="/HouseR/public/js/jquery.min.js"></script>  
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">租房数据统计</div>
                        <div class="layui-card-body" id="tr">
                            <ul class="layui-row layui-col-space10 layui-this x-admin-carousel x-admin-backlog">
                                <li class="layui-col-md2 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>房源数</h3>
                                        <p>
                                            <cite id="house_num"></cite>
                                        </p>
                                    </a>
                                </li>
                                <li class="layui-col-md2 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>待审核房屋数</h3>
                                        <p>
                                            <cite id="house_num_verify"></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md2 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>合约总数</h3>
                                        <p>
                                            <cite id="rent_num"></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md2 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>待审核合约数</h3>
                                        <p>
                                            <cite id="rent_num_verify"></cite></p>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">开发团队</div>
                        <div class="layui-card-body ">
                            <table class="layui-table">
                                <tbody>
                                    <tr>
                                        <th>组长</th>
                                        <td>谭志东</td>
                                    </tr>
                                    <tr>
                                        <th>组员</th>
                                        <td>陈汝阳  梁洪铭  梁嘉豪  郭安宁  许鹤棋  李旭鹏</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <style id="welcome_style"></style>
                <div class="layui-col-md12">
                    <blockquote class="layui-elem-quote layui-quote-nm">本项目参考x-admin提供的网页模板。   <a href="http://x.xuebingsi.com/" target="_blank">访问x-admin官网</a></blockquote></div>
            </div>
        </div>
        </div>
    </body>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            url:"/HouseR/Admin/index/get_house_num",
            dataType:"JSON",
            success:function(data){
                $("#house_num").empty().append(data['msg']);
            }
        })

        $.ajax({
            url:"/HouseR/Admin/index/get_rent_num",
            dataType:"JSON",
            success:function(data){
                $("#rent_num").empty().append(data['msg']);
            }
        })

        $.ajax({
            url:"/HouseR/Admin/index/get_rent_num",
            data:{"status":"0"},
            dataType:"JSON",
            success:function(data){
                $("#rent_num_verify").empty().append(data['msg']);
            }
        })

        $.ajax({
            url:"/HouseR/Admin/index/get_house_num",
            data:{"status":"0"},
            dataType:"JSON",
            success:function(data){
                $("#house_num_verify").empty().append(data['msg']);
            }
        })
    });
</script>
</html>