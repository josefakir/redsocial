<?php 
	$id_usuario = $_POST['id_usuario'];
	$textopublicacion = $_POST['textopublicacion'];
	$sql = "INSERT INTO publicaciones (id_usuario, texto,fecha_subida) values (:id_usuario,:texto,now())";
	$q = $conn->prepare($sql);
	try {
		$q->execute(
			array(
				':id_usuario' => $id_usuario,
				':texto' => $textopublicacion
			)
		);
	//$lastId = $conn->lastInsertId();
		echo '{"status":"success"}';
	} catch (Exception $e) {
		echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
	}
?>