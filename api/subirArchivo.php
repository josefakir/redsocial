<?php 
	$target_path = "../useruploads/";
	$target_path = $target_path . $_POST['id_usuario'].date('Y-m-d-H-i-s').str_replace(" ","-",basename( $_FILES['file']['name'])); 
	if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    	echo $target_path;
	} else{
   		echo "error";
	}
?>