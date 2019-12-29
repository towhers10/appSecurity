<?php 
include 'conexion.php';
	
	$id = $_POST['idUser'];
	$idSitio = $_POST['idSitio'];


date_default_timezone_set('America/Monterrey');

	$fecha = date("Y-m-d"); 
	$hora = date("H:i:s"); 




$query2 = "INSERT INTO logsistema(Fecha,Hora,Descripcion,idUser)values('$fecha','$hora','CONSULTA','$id') ";
				$sql2 = mysqli_query( $conexion,$query2) or die(mysqli_error());


	$query = " SELECT * FROM cuentas WHERE idCuentaUser = '$idSitio'";
	$sql = mysqli_query( $conexion,$query) or die(mysqli_error());

	$rows = mysqli_fetch_all($sql,MYSQLI_ASSOC);

	foreach ($rows as $row) {
		$data['idCuenta'] = $row['idCuentaUser'];
		$data['plataforma'] = $row['Plataforma'];
		$data['url'] = $row['URL'];
		$data['password'] = $row['Password'];
		$data['comentario'] = $row['Comentario'];
		
	}

	$response = json_encode($data);
     echo $response;







 ?>