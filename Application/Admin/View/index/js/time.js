
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
