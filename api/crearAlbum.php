<?php 
	$datos = $_POST['data'];
	$datos = explode(",",$datos);
	$id_usuario = str_replace("[","",$datos[0]);
	$nombre = date("Y-m-d");
	$mensajepublicación = "Hizo una publicación";
	$pathsmulti = "";
	$sql = "INSERT INTO albumes (id_usuario,nombre,fecha) VALUES (:id_usuario,:nombre,now())";
	$q = $conn->prepare($sql);
	try {
		$q->execute(
			array(
				':id_usuario' => $id_usuario,
				':nombre' => $nombre
			)
		);
		$id_album = $conn->lastInsertId();
		/* subir imágenes a tabla imagenes */
		$cont = 0;
		foreach($datos as $d){
			if($cont!=0){
				$sql = "INSERT INTO imagenes (id_album,id_usuario,ruta,fecha) VALUES (:id_album,:id_usuario,:ruta,now())";
				$q = $conn->prepare($sql);
				try {
					$q->execute(
						array(
							':id_album' => $id_album,
							':id_usuario' => $id_usuario,
							':ruta' => str_replace("]","",str_replace("../","",str_replace('"','',$d)))
						)
					);
				} catch (Exception $e) {
					echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
				}
				$pathsmulti .= str_replace("]","",str_replace("../","",str_replace('"','',$d))).",";
			}
			$cont++;
		}
		$sql = "INSERT INTO publicaciones (id_usuario,texto,multimedia,fecha_subida) VALUES (:id_usuario,:texto,:multimedia,now())";
		$q = $conn->prepare($sql);
		try {
			$q->execute(
				array(
					':id_usuario' => $id_usuario,
					':texto' => $mensajepublicación,
					':multimedia' => $pathsmulti
				)
			);
		} catch (Exception $e) {
			echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
		}

		echo $id_album;
		
		/* fin subir imágenes */
	} catch (Exception $e) {
		echo '{"status":"error","message":'.json_encode($e->errorInfo[2]).'}';
	}
?>