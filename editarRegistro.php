<?php 

include 'conexion.php';

$nombre = $_POST['nombreurl'];
$URL = $_POST['url'];
$Pass = $_POST['password'];
$comentario = $_POST['comentario'];
$idUser = $_POST['idUser'];
$idCuenta = $_POST['idCuenta'];

$query = "UPDATE cuentas SET Plataforma='$nombre',URL='$URL',Password='$Pass',Comentario='$comentario',idUser='$idUser' WHERE idCuentaUser='$idCuenta' ";
				$sql = mysqli_query( $conexion,$query) or die(mysqli_error());


	date_default_timezone_set('America/Monterrey');

	$fecha = date("Y-m-d"); 
	$hora = date("H:i:s"); 


	$query2 = "INSERT INTO logsistema(Fecha,Hora,Descripcion,idUser)values('$fecha','$hora','MODIFICACION','$idUser') ";
	$sql2 = mysqli_query( $conexion,$query2) or die(mysqli_error());



 ?>