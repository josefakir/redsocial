<?php 
	error_reporting(0);
	ini_set('display_errors', 0);
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$contrasena = $_POST['contrasena'];
	$genero = $_POST['genero'];
	$fecha_nacimiento = $_POST['anio']."-".$_POST['mes']."-".$_POST['dia'];
	$url = 'http://localhost/ygiisNuevo/api/?m=registrar';
	$fields = array(
		''
	);
	$fields = array(
		'nombres' => urlencode($nombres),
		'apellidos' => urlencode($apellidos),
		'correo' => urlencode($email),
		'contrasena' => urlencode($contrasena),
		'genero' => urlencode($genero),
		'fecha_nacimiento' => urlencode($fecha_nacimiento)
	);
	//url-ify the data for the POST
	foreach($fields as $key=>$value) { 
		$fields_string .= $key.'='.$value.'&'; 
	}
	rtrim($fields_string, '&');
	//open connection
	$ch = curl_init();
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//execute post
	$result = curl_exec($ch);
	$result = json_decode($result);
	$status = $result->status;
	$error = $result->message;
	if($status == "success"){
		header("Location: ../index.php?m=".base64_encode(htmlentities('Registro correcto')));
	}else{
		header("Location: ../index.php?m=".base64_encode(htmlentities('El registro falló: '.$error)));
	}
	//close connection
	curl_close($ch);
?>