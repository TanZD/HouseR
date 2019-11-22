
			layui.use('upload', function(){
			  var $ = layui.jquery
			  ,upload = layui.upload;
			  
			  //普通图片上传
			  var uploadInst = upload.render({
				elem: '#test'
				,url: '/upload/'
				,before: function(obj){
				  //预读本地文件示例，不支持ie8
				  obj.preview(function(index, file, result){
					$('#demo1').attr('src', result); //图片链接（base64）
				  });
				}
				,done: function(res){
				  //如果上传失败
				  if(res.code > 0){
					return layer.msg('上传失败');
				  }
				  //上传成功
				}
				,error: function(){
				  //演示失败状态，并实现重传
				  var demoText = $('#demoText');
				  demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
				  demoText.find('.demo-reload').on('click', function(){
					uploadInst.upload();
				  });
				}
			  });
			  
			  //多图片上传1
			  var uploadInst1 =upload.render({
				elem: '#test1'
				,url: '/upload/'
				,multiple: true
				,before: function(obj){
				  //预读本地文件示例，不支持ie8
				  obj.preview(function(index, file, result){
					$('#demo1').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
				  });
				}
				,done: function(res){
					//如果上传失败
					if(res.code > 0){
					return layer.msg('上传失败');
				  }
				  //上传完毕
				}
				,error: function(){
				  //演示失败状态，并实现重传
				  var demoText1 = $('#demoText1');
				  demoText1.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
				  demoText1.find('.demo-reload').on('click', function(){
					uploadInst1.upload();
				  });
				}
			  });
			  //多图片上传2
			  var uploadInst2 =upload.render({
				elem: '#test2'
				,url: '/upload/'
				,multiple: true
				,before: function(obj){
				  //预读本地文件示例，不支持ie8
				  obj.preview(function(index, file, result){
					$('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
				  });
				}
				,done: function(res){
				  //上传完毕
				}
				,error: function(){
				  //演示失败状态，并实现重传
				  var demoText2 = $('#demoText2');
				  demoText2.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
				  demoText2.find('.demo-reload').on('click', function(){
					uploadInst2.upload();
				  });
				}
			  });
			  //选完文件后不自动上传
				  upload.render({
					elem: '#test8'
					,url: '/upload/'
					,auto: false
					//,multiple: true
					,bindAction: '#test9'
					,done: function(res){
					  console.log(res)
					}
				  });
			 
			  
			  
			});
