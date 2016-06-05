<?php 
	include("functions.php");
	header('Content-Type: application/json');
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$contrasena = md5($_POST['contrasena']);
	$genero = $_POST['genero'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$about = $_POST['about'];
	$token = RandomString();
	$status = '0';
	$sql = "INSERT INTO usuarios (nombres,apellidos,correo,contrasena,genero,fecha_nacimiento,about,fecha_registro,token,status) VALUES (:nombres,:apellidos,:correo,:contrasena,:genero,:fecha_nacimiento,:about,:fecha_registro,:token,:status)";
	$q = $conn->prepare($sql);
	try {
		$q->execute(
			array(
				':nombres' => $nombres,
				':apellidos' => $apellidos,
				':correo' => $correo,
				':contrasena' => $contrasena,
				':genero' => $genero,
				':fecha_nacimiento' => $fecha_nacimiento,
				':about' => $about,
				':fecha_registro' => date('Y-m-d'),
				':token' => $token,
				':status' => $status
			)
		);
		$lastId = $conn->lastInsertId();
		/* send email */
		require_once('../lib/sendgrid-php/vendor/autoload.php');
		$sendgrid = new SendGrid('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');
		$email = new SendGrid\Email();
		$email
		    ->addTo($correo)
		    //->addTo('bar@foo.com') //One of the most notable changes is how `addTo()` behaves. We are now using our Web API parameters instead of the X-SMTPAPI header. What this means is that if you call `addTo()` multiple times for an email, **ONE** email will be sent with each email address visible to everyone.
		    ->setFrom('info@ygiis.mx')
		    ->setSubject('Bienvenido a Ygiis')
		    ->setText('')
		    ->setHtml('
				<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<title>Bienvenido</title>
				</head>
				<body style="font-family:Arial">
					<div style="width:600px">
					<img src="http://graphicsandcode.com/ygiis/headeremail.jpg" alt="Ygiis">
					<p></p>
					<h2>Bienvenido a Ygiis '.$nombres.'</h2>
					<p>Por favor activa tu cuenta haciendo click en el siguiente enlace</p>
					<p>&nbsp;</p>
					<p><a style="width:300px; background:#348eda; display:block; margin:0 auto;    margin: 0 auto;text-align: center;padding: 10px 0;color: #fff;text-decoration: none;" href="http://localhost/ygiisNuevo/procesar/activar.php?t='.$token.'&id='.$lastId.'">Activar</a></p>
					</div>
				</body>
				</html>
		    ')
		;
		$sendgrid->send($email);
		echo '{"status":"success"}';
	} catch (Exception $e) {
		echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
	}
?>