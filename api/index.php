<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	//error_reporting(0);
	//ini_set('display_errors', 0);
	include("config.php");
	$conn = new PDO("mysql:host=$host;dbname=$database",$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	switch ($_GET['m']) {
		case 'registrar':
			include("registrar.php");
		break;
		case 'activar':
			include("activar.php");
		break;
		case 'login':
			include("login.php");
		break;
	}
?>