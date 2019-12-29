<?php 

include 'conexion.php';

$idUser = $_POST["idUser"];

$query = " SELECT Fecha,Hora,Descripcion FROM logsistema WHERE idUser = '$idUser'";
	$sql = mysqli_query( $conexion,$query) or die(mysqli_error());

	$rows = mysqli_fetch_all($sql,MYSQLI_ASSOC);

	foreach ($rows as $row) {
		$data['Fecha'] = $row['Fecha'];
		$data['Hora'] = $row['Hora'];
		$data['Descripcion'] = $row['Descripcion'];
		
	}

	$response = json_encode($data);
     echo $response;







 ?>