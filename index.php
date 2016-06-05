<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ygiis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/template.css">
	<link rel="stylesheet" href="css/main.css">
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
				<form action="api/?m=login" method="post">
					<p class="tac blanco"><strong>Usuario</strong></p>
					<p><input type="text" class="inputtext" name="usuario"></p>
					<p>&nbsp;</p>
					<p class="tac blanco"><strong>Contraseña</strong></p>
					<p><input type="password" class="inputtext" name="pass"></p>
					<p><input type="submit" class="botoniniciar" value="Iniciar Sesión"></p>
					<p><a href="registrar.php" class="botonregistrar">¡Regístrate!</a></p>
					<p>&nbsp;</p>
					<p class="blanco"><input type="checkbox">Recordarme</p>
					<p><a href="" class="blanco">¿Olvidaste tu usuario?</a></p>
					<p><a href="" class="blanco">¿Olvidaste tu clave?</a></p>
					<p><a href="" class="blanco">Enviar código de activción</a></p>
					<div class="mensaje">
						<p><?php echo base64_decode($_GET['m']) ?></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>