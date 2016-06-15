<?php 
	error_reporting(0);
	ini_set('display_errors', 0);
	$id_usuario = $_POST['id_usuario'];
	$textopublicacion = $_POST['textopublicacion'];
	$url = 'http://localhost/ygiisNuevo/api/?m=publicar';
	$fields = array(
		''
	);
	$fields = array(
		'id_usuario' => urlencode($id_usuario),
		'textopublicacion' => urlencode($textopublicacion)
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
		header("Location: ../home.php?m=".base64_encode(htmlentities('Publicación exitosa')));
	}else{
		header("Location: ../home.php?m=".base64_encode(htmlentities('La publicación falló: '.$error)));
	}
	//close connection
	curl_close($ch);
?>