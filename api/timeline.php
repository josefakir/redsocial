<?php 
	$sql = "SELECT publicaciones.id,id_usuario,texto,multimedia,fecha_subida,usuarios.nombres,usuarios.apellidos FROM publicaciones JOIN usuarios ON publicaciones.id_usuario = usuarios.id ORDER BY fecha_subida DESC LIMIT ".$_GET['o'].",".$_GET['l']."";

	$q = $conn->prepare($sql);
	try {
		$q->execute();
		$result= $q->fetchAll();
		print_r(json_encode($result));

//		echo '{"status":"success","id_usuario":'.json_decode(utf8_encode($result['id'])).',"nombres":"'.(($result['nombres'])).'","apellidos":"'.(($result['apellidos'])).'","token":"'.(($result['token'])).'"}';
	} catch (Exception $e) {
		echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
	}
?>