<?php include("auth.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ygiis, lo nuestro es salud</title>
	<link rel="stylesheet" href="css/template.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="css/dropzone.css">
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/dropzone.js"></script>
	<script>
	$(document).ready(function(){
		$('.fancybox').fancybox({
			padding : 1
		});
		$('#publicacion').validate({
			rules : {
				nombrepublicacion : 'required'
			},
			messages : {
				nombrepublicacion : 'Este campo es requerido'
			}
		});
		$('#triggerfoto').click(function(e){
			e.preventDefault();
			$('.dropzone').slideDown('fast');
		});
		var uploads = [<?php echo $_SESSION['id_usuario'] ?>];
		var myDropzone = new Dropzone("#formulariodropzone");
		myDropzone.on("complete", function(file) {
			uploads.push(file.xhr.responseText);
		});
		myDropzone.on("queuecomplete", function(file) {

			//console.log(uploads);
			//arreglo con uploads
			var jsonString = JSON.stringify(uploads);
			$.ajax({
				type: "POST",
				url: "http://localhost/ygiisNuevo/api/index.php?m=crearAlbum",
				data: {data : jsonString}, 
				cache: false,
				success: function(data){
					//reenviar a url del album
					//alert(data);
					window.location.reload();
				}
		    });
		});
	});
	
	</script>
</head>
<body class="interior">
	<header class="w100">
		<div class="container">
			<div class="one column">
				<a href="home.php">
					<img src="images/logo.png" alt="">
				</a>
			</div>
		</div>
	</header>