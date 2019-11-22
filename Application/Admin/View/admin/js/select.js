var city = new Array;
			city['北京'] = ['1', '1', '']; 
			city['安徽'] = ['', '', '']; 
			city['福建'] = ['', '', '']; 
			city['甘肃'] = ['', '', '']; 
			city['广东'] = ['', '', '']; 
			city['广西'] = ['', '', '']; 
			city['贵州'] = ['', '', '']; 
			city['海南'] = ['', '', '']; 
			city['河北'] = ['', '', ''];
			city['河南'] = ['', '', ''];
			city['黑龙江'] = ['', '', ''];
			city['湖北'] = ['', '', ''];
			city['湖南'] = ['', '', ''];
			city['吉林'] = ['', '', ''];
			city['江苏'] = ['南京', '连云港', '苏州', '镇江'];        
			city['山东'] = ['青岛', '烟台', '济南']; 

			function allCity() {           
			  var select1 = document.getElementById("input_province");            
			  for(var i in city) {  //这里注意遍历数组的写法
				select1.add(new Option(i, i), null);
			  }   
			  addOption(); // 初始化选项     
			}        
			function addOption() {            
			  var select2 = document.getElementById("input_city");
			  var select1 = document.getElementById("input_province").value; 
			  select2.length = 0; //每次都先清空一下市级菜单  
			  if(select1 != '请选择省份') {                
				for(var i in city[select1 ]) {    
				  select2.add(new Option(city[select1][i], city[select1][i]), null);                
				}            
			  }else if (sheng == '请选择省份'){              
				select2.length = 0;           
				select2.add(new Option("请选择城市", "请选择城市"), null); 
			  }      
			}       
			window.onload = allCity();