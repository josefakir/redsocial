<?php 
	$token = $_GET['t'];
	$id = $_GET['id'];
	$url = "http://localhost/ygiisNuevo/api/?m=activar&t=".$token."&id=".$id;
	$ch = curl_init();
	curl_setopt_array(
	    $ch, array( 
	    CURLOPT_URL => $url,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_RETURNTRANSFER => 1

	));
	$result = curl_exec($ch);
	$result = json_decode($result);
	$status = $result->status;
	@$error = $result->message;
	if($status == "success"){
		header("Location: ../index.php?m=".base64_encode(htmlentities('Activación completada')));
	}else{
		header("Location: ../index.php?m=".base64_encode(htmlentities('La activación falló: '.$error)));
	}
	curl_close($ch);
?>