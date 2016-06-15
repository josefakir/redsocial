<?php 
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	ini_set('display_errors', '0');
	$usuario = $_POST['usuario'];
	$pass = $_POST['pass'];
	$url = 'http://localhost/ygiisNuevo/api/?m=login';
	$fields = array(
		''
	);
	$fields = array(
		'usuario' => urlencode($usuario),
		'pass' => urlencode($pass)
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
	if(!empty($result)){
		$_SESSION['auth'] = true;
		$_SESSION['id_usuario'] = $result->id_usuario;
		$_SESSION['nombres'] = $result->nombres;
		$_SESSION['apellidos'] = $result->apellidos;
		$_SESSION['token'] = $result->token;
		//print_R($_SESSION);
		header("Location: ../home.php");
	}else{
		header("Location: ../index.php?m=".base64_encode(htmlentities('La autenticacion falló')));
	}
	curl_close($ch);
?>