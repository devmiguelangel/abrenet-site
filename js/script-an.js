// Resetear formulario
jQuery.fn.reset = function(){
	$(this).each (function(){
		this.reset();
	});
};

// Loader
function showLoader(){
	$("#resp").html('');
	$("#resp").css({
		'background': '#FFFFFF url(img/loader.gif) no-repeat center'
	});
}

function hideLoader(){
	$("#resp").css({
		'background': '#FFFFFF'
	});
}

function setEstroSlider(){
	jQuery(function($){
		$(".peKenBurns").peKenburnsSlider({externalFont:true})
	});
	
	jQuery(window).load(function() {
		$(".peKenBurns").each(function() {
			$(this).data("peKenburnsSlider").fontsLoaded()
		})
	});
}

function setCarouFredSel(){
	$(function() {
		$("#foo2").carouFredSel({
			circular: true,
			infinite: true,
			direction: "left",
			auto: {
				play: true,
				timeoutDuration: 4000,
				pauseOnHover: true
			},			
			
			prev	: {	
				button	: "#foo2_prev",
				key		: "left"
			},
			next	: { 
				button	: "#foo2_next",
				key		: "right"
			},
			pagination	: "#foo2_pag"
		});			
	});
}

function openUrlBanner(img){
	var url = $(img).attr("title");
	window.open(url, '_blank');
}

function validateEmail(email){
	var re = /^[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*.(.[a-z]{2,3})$/;
	if(!re.exec(email)){
		return false;
	}else{
		return true;
	}
}

//Validar formulario de contacto
function validateFormContact(){
	if($("#name-cf").attr("value") == ''){
		$("#name-cf").focus();
		return 0;
	}
	
	if($("#email-cf").attr("value") == ''){
		$("#email-cf").focus();
		return 0;
	}else{
		var email = $("#email-cf").attr("value");
		if(!validateEmail(email)){
			$("#email-cf").focus();
			return 0;
		}
	}
	
	if($("#city-cf").attr("value") == ''){
		$("#city-cf").focus();
		return 0;
	}
	
	if($("#message-cf").attr("value") == ''){
		$("#message-cf").focus();
		return 0;
	}
	return 1;
}

//Enviar e-mail
function sendFormContact(){
	$("#form-contact").on('submit', function(e){
		e.preventDefault();
		var datosF = $(this).serialize();
		
		if(validateFormContact() == 1){
			$.ajax({
				async: true,
				cache: false,
		        type: "POST",
		        url: 'mail.php',
		        data: 'send-mail=&'+datosF,
		        beforeSend: showLoader,
		        success: function(datos){
		        	hideLoader();
		        	$("#resp").html(datos)
		        	$("#form-contact").reset();
	            }			
			});
			return false;
		}
	});
}
