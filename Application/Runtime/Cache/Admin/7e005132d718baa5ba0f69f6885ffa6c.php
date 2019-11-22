<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" >
        <link rel="stylesheet" href="/HouseR/public/xadmin/css/font.css">
        <link rel="stylesheet" href="/HouseR/public/xadmin/css/xadmin.css">
        
        <script type="text/javascript" src="/HouseR/public/xadmin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/HouseR/public/xadmin/js/xadmin.js"></script>
    		<script type="text/javascript" src="/HouseR/public/xadmin/js/cityAndPro.js"></script>
    		<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    		
    		<script type="text/javascript" src="/HouseR/public/xadmin/js/data.js"></script>
    		<script type="text/javascript" src="/HouseR/public/xadmin/js/province.js"></script>
    		<script src="./js/jquery-1.12.4.js"></script>
    		<script type="text/javascript">
			var defaults = {
				s1: 'provid',
				s2: 'cityid',
				s3: 'areaid',
				v1: null,
				v2: null,
				v3: null
			};
	 
		</script>

    </head>
    <body>
        <div class="layui-fluid" style="margin-left:30%;">
            <div class="layui-row">
                <form class="layui-form" action="">
                  <div class="layui-form-item">
                      <label for="title" class="layui-form-label">
                          房名
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="city" class="layui-form-label">
                          省
                      </label>
                      <div class="layui-input-inline">
							<select name="provid" id="provid" lay-filter="provid">
								<option value="">请选择省</option>
							</select>
					</div>
                  </div>
				  <div class="layui-form-item">
                      <label for="location" class="layui-form-label">
                          市
                      </label>
                      <div class="layui-input-inline">
							<select name="cityid" id="cityid" lay-filter="cityid">
								<option value="">请选择市</option>
							</select>
					  </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="area" class="layui-form-label">
                          房屋面积
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="room" class="layui-form-label">
                          房
                      </label>
                      <div class="layui-input-inline" style="width:50px;">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
					  <label for="livingrooms" class="layui-form-label" style="width:3px;" >
							  厅
					  </label>
                      <div class="layui-input-inline" style="width:50px;">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
					  <label for="bathrooms" class="layui-form-label" style="width:3px;">
                          卫
                      </label>
                      <div class="layui-input-inline" style="width:50px;">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>  
				  <!-- <div class="layui-form-item">
                      <div class="layui-form-item">
							<div class="layui-inline">
								  <label class="layui-form-label">登记时间</label>
								  <div class="layui-input-inline">
									<input type="text" class="layui-input" id="test11" placeholder="">
								  </div>
							</div>
					   </div>
                  </div> -->
	<!-- 			  <div class="layui-form-item">
                      <label for="host-id" class="layui-form-label">
                          房东id
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div> -->
				  <div class="layui-form-item">
                      <label for="origin" class="layui-form-label">
                          用户提供
                      </label>
                      <div class="layui-input-block">
                        <input type="radio" name="origin" lay-skin="primary" title="是" checked="">
                        <input type="radio" name="origin" lay-skin="primary" title="否">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="floor" class="layui-form-label">
                          楼层
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="address" class="layui-form-label">
                          详细地址
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="description" class="layui-form-label">
                          租房描述
                      </label>
                      <div class="layui-upload">
						  <button type="button" class="layui-btn" id="test1">上传</button> 
					  <div class="layui-form-mid layui-word-aux">
                          <span class="x-red">*</span>可上传多张照片
                      </div>
							  <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;width:500px;">
									预览图：
									<div class="layui-upload-list" id="demo1"></div>
									<p id="demoText1"></p>
							 </blockquote>
						<!-- <button type="button" class="layui-btn" id="test9">开始上传</button> -->
					  </div> 
                  </div>
				  <div class="layui-form-item">
                      <label for="decoration" class="layui-form-label">
                          装修情况
                      </label>
                      <div class="layui-upload">
						  <button type="button" class="layui-btn" id="test2">上传</button> 
					   <div class="layui-form-mid layui-word-aux">
                          <span class="x-red">*</span>可上传多张照片
                      </div>
							  <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;width:500px;">
									预览图：
									<div class="layui-upload-list" id="demo2" style="width:;"></div>
									<p id="demoText2"></p>
							 </blockquote>
						<!-- <button type="button" class="layui-btn" id="test9">开始上传</button> -->
					  </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="price" class="layui-form-label">
                          租金
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" placeholder="￥" class="layui-input">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="status" class="layui-form-label">
                          是否出租
                      </label>
                      <div class="layui-input-block">
                        <input type="radio" name="status" lay-skin="primary" title="生效中" checked="">
                        <input type="radio" name="status" lay-skin="primary" title="已过期">
                      </div>
                  </div>
                  </div>
                  
                  <div class="layui-form-item">
                      <label for="L_repass" class="layui-form-label">
                      </label>
                      <button  class="layui-btn" lay-filter="add" lay-submit="" style="margin-left:60px;">
                          确认
                      </button>
                  </div>
              </form>
            </div>
        </div>
		<script type="text/javascript" src="./js/image.js"></script>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                

                //监听提交
                form.on('submit(add)',
                function(data) {
                    console.log(data);
                    //发异步，把数据提交给php
                    layer.alert("增加成功", {
                        icon: 6
                    },
                    function() {
                        //关闭当前frame
                        xadmin.close();

                        // 可以对父窗口进行刷新 
                        xadmin.father_reload();
                    });
                    return false;
                });

            });</script>
		   
		
    </body>

</html>