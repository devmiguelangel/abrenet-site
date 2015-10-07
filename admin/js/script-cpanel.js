/*###################Inicio de Sesion ######################*/
function checkFormSignup(){
	if($("#user-name").attr("value") == ''){
		$(".error-user").html("Introduzca su nombre de Usuario");
		$("#user-name").focus();
		return 0;
	}
	
	if($("#user-pass").attr("value") == ''){
		$(".error-pass").html("Introduzca su Contraseña");
		$("#user-pass").focus();
		return 0
	}
	return 1;
}

function signUp(){
	$("#f-signup").on("submit", function(event){
		event.preventDefault();
		if(checkFormSignup() == 1){
			$("#f-signup").attr('action', 'signup.php');
			$(this).unbind('submit').submit();
		}
	});
}

/*###################Administrar Slider######################*/
function getCategory(){
	$(".admin-content").click(function(e){
		e.preventDefault();
		var sw = $(this).attr("rel");
		
		$.ajax({
			async: true,
	        type: "POST",
	        url: "admin-content.php",
	        data: {acontent: "", cg: sw},
	        //data: "acontent=&cg="+sw,
	        beforeSend: function(){
	        	$("#content-main").fadeTo("slow", 0, function(){
					$("#main-cp").css({ "background": "#FFFFFF url(img/loader-01.gif) no-repeat center" });
				});
	        },
	        complete: function(){
	        	$("#main-cp").css({
	        		"background": "none",
	        		"background": "#FFFFFF"
	        	});
	        },
	        cache: false,
	        success: function(datos){
	        	//alert(datos);
	        	$("#main-cp").html(datos);
            }			
		});
		return false;
	});
}

/*###################Actualizar Slider######################*/
function updateSliderContent(){
	$(".update-c-slider").click(function(e){
		e.preventDefault();
		var sw = $(this).attr('rel');
		
		$.ajax({
			async: true,
			cache: false,
	        type: "POST",
	        url: 'admin-content.php',
	        data: "acontent=&cg="+sw,
	        success: function(datos){
	        	//alert(datos);
	        	$("#main-cp").html(datos);
            }			
		});
		return false;
	});
}

/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/
/*###################Administrar Slider######################*/