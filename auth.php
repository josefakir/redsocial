<?php 
	session_start();
	if(isset($_SESSION['auth'])){
		if($_SESSION['auth']!=true){
			header("Location: index.php?m=".base64_encode(htmlentities('Debes iniciar sesión para ver esta página')));
		}
	}else{
		header("Location: index.php?m=".base64_encode(htmlentities('Debes iniciar sesión para ver esta página')));
	}
	//print_r($_SESSION);
?>