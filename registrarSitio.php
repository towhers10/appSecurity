<?php 


include 'conexion.php';


$idUser = $_POST["id"];
$nombreURL = $_POST["nombreurl"];
$URL = $_POST["url"];
$Pass = $_POST["password"];
$Comentario = $_POST["comentario"];



$query = "INSERT INTO cuentas(Plataforma,URL,Password,Comentario,idUser)values('$nombreURL','$URL','$Pass','$Comentario','$idUser') ";
				$sql = mysqli_query( $conexion,$query) or die(mysqli_error());
			

		date_default_timezone_set('America/Monterrey');

		$fecha = date("Y-m-d"); 
		$hora = date("H:i:s"); 

				$query2 = "INSERT INTO logsistema(Fecha,Hora,Descripcion,idUser)values('$fecha','$hora','NUEVA CUENTA','$idUser') ";
	$sql2 = mysqli_query( $conexion,$query2) or die(mysqli_error());

				





 ?>