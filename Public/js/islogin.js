var userM;
$().ready(function(){
	//检测是否登录
	$.ajax({
		url:"/HouseR/User/user/islogin",
		dataType:"JSON",
		success:function(data){
			console.log(data);
			userM=data;
			if(data.msg==-1){
				$("#userName").attr("href","/HouseR/User/user/login");
				$("#logout").attr("href","/HouseR/User/user/register");
			}else{
				$("#userName").empty().append(data.data['username']);
				$("#logout").empty().append("登出");
				$("#logout").attr("href","/HouseR/User/user/logout");
				$("#personControl").fadeIn("fast");
			}
		}
	});
});