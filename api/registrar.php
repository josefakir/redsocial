<?php 
	header('Content-Type: application/json');
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$contrasena = md5($_POST['contrasena']);
	$genero = $_POST['genero'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$about = $_POST['about'];
	$sql = "INSERT INTO usuarios (nombres,apellidos,correo,contrasena,genero,fecha_nacimiento,about,fecha_registro) VALUES (:nombres,:apellidos,:correo,:contrasena,:genero,:fecha_nacimiento,:about,:fecha_registro)";
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
				':fecha_registro' => date('Y-m-d')
			)
		);
		echo '{"status":"success"}';
	} catch (Exception $e) {
		echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
		//print_r($e->errorInfo[2]);
	}
	
?>