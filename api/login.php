<?php 
	$user = $_POST['usuario'];
	$pass = md5($_POST['pass']);
	$sql = "SELECT * FROM usuarios WHERE correo = :usuario AND contrasena = :contrasena AND status ='1'";
	$q = $conn->prepare($sql);
	try {
		$q->execute(
			array(
				':usuario' => $user,
				':contrasena' => $pass
			)
		);
		$result= $q->fetchAll();
		$result = $result[0];
		echo '{"status":"success","id_usuario":'.json_decode(utf8_encode($result['id'])).',"nombres":"'.(($result['nombres'])).'","apellidos":"'.(($result['apellidos'])).'","token":"'.(($result['token'])).'"}';
	} catch (Exception $e) {
		echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
	}
?>