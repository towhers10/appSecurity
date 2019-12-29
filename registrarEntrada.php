<?php 



include 'conexion.php';

date_default_timezone_set('America/Monterrey');


	$idUser = $_POST['id'];
	$describe = $_POST['Descripcion'];
	$fecha = date("Y-m-d"); 
	$hora = date("H:i:s"); 




$query = "INSERT INTO logsistema(Fecha,Hora,Descripcion,idUser)values('$fecha','$hora','$describe','$idUser') ";
				$sql = mysqli_query( $conexion,$query) or die(mysqli_error());




 ?>