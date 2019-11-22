<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html>
 <head>
 	<title>HELLO WORLD</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" type="text/css" href="/HouseR/public/css/index.css">
    <link rel="stylesheet" type="text/css" href="/HouseR/public/layui/css/layui.css">
 </head>
 <body>
 	<div class="bd">
		<div class="header_list" id="header">
			<ul class="layui-nav" lay-filter="" style="border-radius: 0px;">
				<li class="header_list_left" style="float: left;"><img style="width: 100px;" src="/HouseR/public/images/logo.png"></li>
			    <li class="layui-nav-item"><a href="">登录<span class="layui-badge-dot"></span></a></li>
			    <li class="layui-nav-item"><a href="">注册</a></li>
			    <!-- <li class="layui-nav-item">
				    <a href="javascript:;">解决方案</a>
				    <dl class="layui-nav-child">
				      <dd><a href="">移动模块</a></dd>
				      <dd><a href="">后台模版</a></dd>
				      <dd class="layui-this"><a href="">选中项</a></dd>
				      <dd><a href="">电商平台</a></dd>
				    </dl>
				</li>
				<li class="layui-nav-item"><a href="">社区</a></li> -->
			</ul>
		</div>

		<div class="search">
			<div class="search_class">
				 <div class="a search_b"><i class="layui-icon layui-icon-search"></i></div>
				 <div class="a">
				 	<input type="text" name="search_content" placeholder="搜索">
				 </div>
			</div>
		</div>


		<div class="search_p">
			<div class="search_p_l">
				<div class="search_address" id="search_address">
					<span>区域</span>
					<ul>
						<li class="">p1</li>
						<li>p2</li>
						<li>p3</li>
						<li>p4</li>
						<div id="search_address_more" class="more_message">
						<li>p5</li>
						<li>p6</li>
						<!-- <li>a1</li>
						<li>a2</li>
						<li>a3</li>
						<li>a4</li>
						<li>a5</li>
						<li>a6</li> -->
						<div style="clear: both;"></div>
						</div>
					</ul>
					<div class="show_more" id="add_more">+展开更多</div>
				</div>
				<div style="clear: both;"></div>

				<div><?php echo ($data); ?></div>
				<div id="url"></div>
				<div id="url2"></div>
				</div>
			</div>

		</div>

 	</div>
 </body>
<script src="/HouseR/public/js/jquery.min.js"></script>
<script src="/HouseR/public/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/HouseR/public/layui/layui.js" charset="utf-8"></script>
 <script>
//注意：导航 依赖 element 模块，否则无法进行功能性操作
layui.use('element', function(){
  var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
  
});
</script>
<script type="text/javascript">
	var pathname=window.location.pathname;
	var path=pathname.substring(pathname.lastIndexOf("index/")+6);
    if(window.location.pathname.indexOf("index/")!=-1){
    	$("#url").append(path);
    	var request=new Object();
    	//获取/后的参数
		if(path.indexOf("/")!=-1){
			var str=path; //从第一个字符开始读
			strs=str.split("/");//从&分割字符串
			for(var i=0;i<strs.length-1;i+=2){
				request[strs[i]]=strs[i+1];
			}
			console.log("/后的参数：");
			console.log(request);
		}
		//获取condition后的参数
		if(request['condition']!=null){
			var str=request['condition']; //从第一个字符开始读
			strs=str.split("-");//从&分割字符串
			console.log("condition后的参数：");
			console.log(strs);
		}
    }

	$().ready(function(){
        header_c();
        $(window).scroll(function(){header_c();});
        $("#add_more").click(function(){
        	$("#search_address_more").toggle();
        })
		$("#search_address ul li").click(function(){
			var index = $("#search_address ul li").index(this)+1;
			index="p"+index;
			// console.log(index);
			if(request['condition']==null){
				request['condition']=index;
			}else{
				if(request['condition'].indexOf(index)==-1){
					console.log(request['condition']);
					request['condition']+="-"+index;
				}
			}
			console.log(request['condition']);
			window.location.href="/HouseR/index.php/Home/Rent/Index/index";
		});

        for(var i=0;i<strs.length;i++){
        	if(strs[i].indexOf("p")!=-1){
        		var t=strs[i].substr(1)-1;
        		console.log(t);
        		$("#search_address ul li").eq(t).addClass("current_select");
        		/*
    			var index = $("ul li").index(this);
        		*/
        	}
        }

        // $("#url").append(window.location.pathname.substr(window.location.pathname.indexOf("index/")+6));
        // $("#url2").append();
        var pa=GetURLParameter();
        // $("#url2").append(pa['keyword']);
    });

    function GetURLParameter(){
		var url=location.search;//获取问号及后面的参数
		var request=new Object();
		if(url.indexOf("?")!=-1){
			var str=url.substr(1); //从第一个字符开始读
			strs=str.split("&");//从&分割字符串
			for(var i=0;i<strs.length;i++){
				request[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]);//unescape中文会乱码
			}
			console.log("问号后的参数：");
			console.log(request);
		}
        return request;
	}

	function header_c(){
    	var top = $("#header").offset().top;//根据id获取指定的位置
    	var scrollTop = $(window).scrollTop();//获取当前滑动的位置
        // console.log("top:"+top);
        // console.log("scrollTop:"+scrollTop);
		if(scrollTop<=60){
			$("#header").css("position","relative").fadeIn("slow");
		}else{
			$("#header").css("position","fixed").fadeIn("slow");
    	$("#header").offset().top=scrollTop;
		}
	}
</script>
 </html>