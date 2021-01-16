<?php 
function redirect($file, $data=""){
	if ($data !=="") {
		$data="?".$data;
	}
	header("location:../view/".$file.".php");
	return;
 }

 ?>
