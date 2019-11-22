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
			if($(this).is("#login")){
				nameVal=$.trim(this.value);
				var regName=/[~#^$@%&!*()<>:;'"{}【】  ]/;
				if(nameVal==""||nameVal.length<6||nameVal.length>12){
					UserNameOk=-1;
					errorMsg="用户名或电话不能为空";	
					$("#nameError").find(".msg").remove();
					$("#nameError").append("<span class='msg onError'>" + errorMsg + "</span>");
				
				}else{
					
								$("#nameError").find(".msg").remove();
					
				}
			}
			if($(this).is("#password")){
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

		$("#updateM").click(function(){
			$("input").trigger("blur");
			if(mailOk==-1||telok==-1||ageok==-1){
				return false;
			}
		})
	});