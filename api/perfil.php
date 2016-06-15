<?php 
	$sql = "SELECT publicaciones.id,id_usuario,texto,multimedia,fecha_subida,usuarios.nombres,usuarios.apellidos FROM publicaciones JOIN usuarios ON publicaciones.id_usuario = usuarios.id WHERE publicaciones.id_usuario = :id_usuario ORDER BY fecha_subida DESC LIMIT ".$_GET['o'].",".$_GET['l']."";

	$q = $conn->prepare($sql);
	try {
		$q->execute(
			array(':id_usuario' => $_GET['id_usuario'])
		);
		$result= $q->fetchAll();
		print_r(json_encode($result));

	} catch (Exception $e) {
		echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
	}
?>