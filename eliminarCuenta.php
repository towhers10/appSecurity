<?php 

include 'conexion.php';

	$idCuenta = $_POST['idCuenta'];



	$query2 = " DELETE FROM cuentas WHERE idCuentaUser = '$idCuenta'";
	$sql2 = mysqli_query( $conexion,$query2) or die(mysqli_error());





 ?>