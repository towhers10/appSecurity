<?php 
	

 $host = "localhost";
 $user = "root";
 $pass = "";
 $db = "gestordeclaves";



	$conexion = mysqli_connect($host, $user, $pass);
	mysqli_select_db($conexion,$db);
	


 ?>