<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
		    <script src="/HouseR/public/xadmin/lib/layui/lay/modules/laydate.js"></script>
    </head>
    <body>
        <div class="layui-fluid" style="margin-left:30%;">
            <div class="layui-row">
                <form class="layui-form">
                  <div class="layui-form-item">
                      <label for="contractName" class="layui-form-label">
							合同名
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-form-item">
						<div class="layui-form-item">
							<div class="layui-inline">
								  <label class="layui-form-label">创建时间</label>
								  <div class="layui-input-inline">
									<input type="text" class="layui-input" id="test11" placeholder="">
								  </div>
							</div>
					   </div>
                  </div>
				  <div class="layui-form-item">
					  <div class="layui-inline">
						<label class="layui-form-label">签约时间</label>
							<div class="layui-input-inline">
								<input type="text" class="layui-input" id="test12" placeholder="">
							</div>
					  </div>
                  </div>
				  <div class="layui-form-item">
					  <div class="layui-inline">
						<label class="layui-form-label">起租时间</label>
							<div class="layui-input-inline">
								<input type="text" class="layui-input" id="test13" placeholder="">
							</div>
					  </div>
                  </div>
				  <div class="layui-form-item">
					  <div class="layui-inline">
						<label class="layui-form-label">到租时间</label>
							<div class="layui-input-inline">
								<input type="text" class="layui-input" id="test14" placeholder="">
							</div>
					  </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="master_id" class="layui-form-label">
							房东id
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="tenant_id" class="layui-form-label">
							租客id
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="house_id" class="layui-form-label">
							房子id
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="Monthlyrent" class="layui-form-label">
							月租
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username" required="" lay-verify="required"
                          autocomplete="off" class="layui-input" placeholder="￥">
                      </div>
                  </div>
				  <div class="layui-form-item">
                      <label for="totalrent" class="layui-form-label">
							租金总额
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username" required="" lay-verify="required"
                          autocomplete="off" class="layui-input" placeholder="￥">
                      </div>
                  </div>
                  <div class="layui-form-item">
                      <label class="layui-form-label">合同状态</label>
                      <div class="layui-input-block">
                        <input type="radio" name="1" lay-skin="primary" title="生效中" checked="">
                        <input type="radio" name="1" lay-skin="primary" title="已过期">
                      </div>
                  </div>
                  <div class="layui-form-item">
                      <label for="username" class="layui-form-label">
							备注
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
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
			<script>
				//执行一个laydate实例
				laydate.render({
				  elem: '#test1' //指定元素
				});
			</script>
			<script>
		layui.use('laydate', function(){
		  var laydate = layui.laydate;  
		  //自定义格式
		  //创建时间
		  laydate.render({
			elem: '#test11'
			,format: 'yyyy年MM月dd日'
		  });
		  //签约时间
		  laydate.render({
			elem: '#test12'
			,format: 'yyyy年MM月dd日'
		  });
		  //起租时间
		  laydate.render({
			elem: '#test13'
			,format: 'yyyy年MM月dd日'
		  });
		  //到租时间
		  laydate.render({
			elem: '#test14'
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
    </body>

</html>