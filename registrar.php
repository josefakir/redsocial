<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ygiis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/template.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script>
	$(document).ready(function(){
		$('#registrar').validate({
			rules : {
				nombres : 'required',
				apellidos : 'required',
				email : {
					email : true,
					required : true
				},
				contrasena : 'required',
				contrasena2 : {
					required : true,
					equalTo : '#contrasena'
				},
				genero : 'required',
				dia : 'required',
				mes : 'required',
				anio : 'required'
			},
			messages : {
				nombres : 'Campo requerido',
				apellidos : 'Campo requerido',
				email : {
					email : 'Por favor escriba un correo',
					required : 'Campo requerido'
				},
				contrasena : 'Campo requerido',
				contrasena2 : {
					required : 'Campo requerido',
					equalTo : 'Las contraseñas no coinciden'
				},
				genero : 'Campo requerido',
				dia : 'Campo requerido',
				mes : 'Campo requerido',
				anio : 'Campo requerido'
			}
		})
	})
	</script>
</head>
<body>
	<video autoplay loop poster="http://ygiis.mx/components/com_community/assets/portada/ygiis2.png" id="bgvid" >
	    <source src="http://ygiis.mx/components/com_community/assets/portada/ygiis2.webm" type="video/webm">
	    <source src="http://ygiis.mx/components/com_community/assets/portada/ygiis2.mp4" type="video/mp4">
	</video>
	<div id="contenidohome" class="container">
		<div class="one-half column"><img src="images/queSomos.png" alt="" class="w100 hidemobile"></div>
		<div class="one-half column">
			<img src="images/inicio_logo.png" alt="" class="w100">
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div id="registro">
				<h1>Regístrate: </h1>
				<form id="registrar" action="procesar/registrar.php" method="post">
					<p class="tac blanco"><strong>Nombre(s)</strong></p>
					<p><input type="text" class="inputtext" name="nombres"></p>
					<p class="tac blanco"><strong>Apellido(s)</strong></p>
					<p><input type="text" class="inputtext" name="apellidos"></p>
					<p class="tac blanco"><strong>Email</strong></p>
					<p><input type="text" class="inputtext" name="email"></p>
					<p class="tac blanco"><strong>Contraseña</strong></p>
					<p><input type="password" class="inputtext" name="contrasena" id="contrasena"></p>
					<p class="tac blanco"><strong>Repita contraseña</strong></p>
					<p><input type="password" class="inputtext" name="contrasena2"></p>
					<p class="tac blanco"><strong>Género</strong></p>
					<p><select name="genero" id="">
						<option value="">Seleccione</option>
						<option value="Hombre">Hombre</option>
						<option value="Hombre">Mujer</option>
					</select></p>
					<p class="tac blanco"><strong>Fecha de nacimiento</strong></p>
					<p>
						<select name="dia" id="" class="dia">
							<?php 
								for($i=1; $i<=31;$i++){
									?>
							<option value="<?php echo $i ?>"><?php echo $i ?></option>
									<?php
								}
							?>
						</select>
						<select name="mes" id="" class="mes">
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select>
						<select name="anio" id="" class="anio">
							<?php 
								for($i=1950; $i<=2016; $i++){
									?>
							<option value="<?php echo $i ?>"><?php echo $i ?></option>
									<?php
								}
							?>
						</select>
					</p>
					<p><input type="submit" class="botonregistrar" value="¡Regístrate!"></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>