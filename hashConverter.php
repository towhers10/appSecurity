<?php 


	$encode = $_POST['codigo'];


	$hash = md5($encode);

	echo $hash;

 ?>