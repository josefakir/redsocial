<?php 
	$user = $_POST['usuario'];
	$pass = md5($_POST['pass']);
	$sql = "SELECT * FROM usuarios WHERE correo = :usuario AND contrasena = :contrasena";
	$q = $conn->prepare($sql);
	try {
		$q->execute(
			array(
				':usuario' => $user,
				':contrasena' => $pass
			)
		);
		$result= $q->fetchAll();
		print_r(json_encode($result));
	} catch (Exception $e) {
		echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
	}
?>