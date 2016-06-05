<?php 
	$token = $_GET['t'];
	$id = $_GET['id'];
	$sql = "UPDATE usuarios SET status='1' where id=:id and token=:token";
	$q = $conn->prepare($sql);
	try {
		$q->execute(
			array(
				':id' => $id,
				':token' => $token
			)
		);
		echo '{"status":"success"}';
	} catch (Exception $e) {
		echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
	}
?>