	$(document).ready(function(){
		var UserNameOk=0;
		var PasswordOk=0;
		var PasswordOk2=0;
		var mailOk=0;
		var telok=0;
		var ageok=0;
		var errorMsg;
		var nameVal;
		var passwordVal;
		//表单检测
		$("input").blur(function(){
			if($(this).is("#name")){
				nameVal=$.trim(this.value);
				var regName=/[~#^$@%&!*()<>:;'"{}【】  ]/;
				if(nameVal==""||nameVal.length<6||nameVal.length>12){
					UserNameOk=-1;
					errorMsg="用户名不能为空，长度6位以上12位以下";	
					$("#nameError").find(".msg").remove();
					$("#nameError").append("<span class='msg onError'>" + errorMsg + "</span>");
				}else if(regName.test(nameVal)){
					UserNameOk=-1;
					errorMsg="用户名包含非法字符";
					$("#nameError").find(".msg").remove();
					$("#nameError").append("<span class='msg onError'>" + errorMsg + "</span>");
				}else{
					$.ajax({
					     url: "/HouseR/User/user/namecheck",
					     data: {"username": nameVal},
					     success: function(count){
					     	console.log(count);
					         if(count!="0"){
					         	UserNameOk=-1;
					 			errorMsg="用户名已存在";
					 			$("#nameError").find(".msg").remove();
					 			$("#nameError").append("<span class='msg onError'>" + errorMsg + "</span>");
					         }else{
					         	console.log(count);
								$("#nameError").find(".msg").remove();
					 			UserNameOk=0;
					         }
					     }
					 });

				}
			}
			if($(this).is("#inputPassword3")){
				passwordVal=this.value;
				if(passwordVal.indexOf(" ")!=-1){
					PasswordOk=-1;
					errorMsg="密码中不能包含空格";
					$("#passwordError").find(".msg").remove();
					$("#passwordError").append("<span class='msg onError'>" + errorMsg + "</span>");
				}else if(passwordVal==""||passwordVal.length>18||passwordVal.length<6){
					PasswordOk=-1;
					errorMsg="密码不能为空，长度6位以上18位以下";
					$("#passwordError").find(".msg").remove();
					$("#passwordError").append("<span class='msg onError'>" + errorMsg + "</span>");
				}else{
					PasswordOk=0;
					$("#passwordError").find(".msg").remove();
				}
			}
			if($(this).is("#inputPassword2")){
				var passwordVal2=this.value;
				if(passwordVal2.indexOf(passwordVal)!=0){
					PasswordOk2=-1;
					errorMsg="两次密码不一致";
					$("#passwordError2").find(".msg").remove();
					$("#passwordError2").append("<span class='msg onError'>" + errorMsg + "</span>");
				}else{
					PasswordOk2=0;
					$("#passwordError2").find(".msg").remove();
				}
			}
			if($(this).is("#email")){
				var re = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
				var mail=this.value;
				
					if((!re.test(mail))&&mail!=""){
						mailOk=-1;
						errorMsg="格式有误";
						$("#mailError").find(".msg").remove();
						$("#mailError").append("<span class='msg onError'>" + errorMsg + "</span>");
					}else{
						mailOk=0;
						$("#mailError").find(".msg").remove();
					}
			}
			if($(this).is("#phone")){
				var val=this.value;
				var re=/^[0-9]*$/ ;
				if(val==""||val==null){
					telok=-1;
					errorMsg="电话号码不能为空";
					$("#phoneError").find(".msg").remove();
					$("#phoneError").append("<span class='msg onError'>" + errorMsg + "</span>");
				}else if(val!=""&&(!re.test(val))||val.length<11){
					telok=-1;
					errorMsg="格式有误";
					$("#phoneError").find(".msg").remove();
					$("#phoneError").append("<span class='msg onError'>" + errorMsg + "</span>");
				}else {
					$.ajax({
						url:"/HouseR/User/user/phonecheck",
						type:"GET",
						data:{"phone":val},
						success:function(data){
							if(data!="0"){
								telok=-1;
								errorMsg="电话号码已被注册";
								$("#phoneError").find(".msg").remove();
								$("#phoneError").append("<span class='msg onError'>" + errorMsg + "</span>");
							}else{
								telok=1;
								$("#phoneError").find(".msg").remove();
							}
						}
					});
				}

			}
			if($(this).is("#age")){
				var val=this.value;
				var re=/^[0-9]*$/ ;
				if(val!=""&&(!re.test(val))){
					ageok=-1;
					errorMsg="格式有误";
					$("#ageError").find(".msg").remove();
					$("#ageError").append("<span class='msg onError'>" + errorMsg + "</span>");
				}else{
					ageok=1;
					$("#ageError").find(".msg").remove();
				}
			}
		}).keyup(function(){
			 $(this).triggerHandler("blur");
		}).focus(function(){
			 $(this).triggerHandler("blur");
		});
		
		$("#submit").click(function(){
			$("input").trigger("blur");
			//var numError=$(".onError").length;
			if(PasswordOk==-1||UserNameOk==-1||PasswordOk2==-1||mailOk==-1||telok==-1||ageok==-1){
				return false;
			}
		});
	});