<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#subirimg").click(function(e){
		e.preventDefault();
		uploadAjax();
	});
});

function uploadAjax(){
	var inputFileImage = document.getElementById('fileimg');
	//var inputFileImage = $("#fileimg");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('archivo',file);
	//alert (data);
	var url = 'uploader.php';
	
	$.ajax({
		url: url,
		type: 'POST',
		contentType:false,
		data:data,
		processData:false,
		cache:false,
		success: function(datos){
			$("#resp").html(datos);
		}
	});
}

/*function uploadFile( file ){
	//5MB
	var limit = 1048576*2,xhr;

	console.log( limit  )

	if( file ){
		if( file.size < limit ){
			if( !confirm('Cargar archivo?') ){return;}

			xhr = new XMLHttpRequest();

			xhr.upload.addEventListener('load',function(e){
				alert('Archivo cargado!');
			}, false);

			xhr.upload.addEventListener('error',function(e){
				alert('Ha habido un error :/');
			}, false);

			xhr.open('POST','subir.php');

            xhr.setRequestHeader("Cache-Control", "no-cache");
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.setRequestHeader("X-File-Name", file.name);

            xhr.send(file);
		}else{
			alert('El archivo es mayor que 2MB!');
		}
	}
}

var upload_input = document.querySelectorAll('#archivo')[0];

upload_input.onchange = function(){
	uploadFile( this.file[0] );
};*/
</script>


	<input type="file" id="fileimg" name="fileimg" /><br />
	<input type="submit" value="Subir" id="subirimg" name="subirimg" /><br /><br /><br />
	<div id="resp">
		ss
	</div>
<?php

?>