<?php 

		include 'conexion.php';
		include 'algoritmo.php'; //incluye el otro archivo del algoritmo

		$idUser = $_POST["idUser"]; //Obtengo el id del usuario para seleccionar sus cuentas

		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz'; 
		$keyd =  substr(str_shuffle($permitted_chars), 0, 16);


		$algorit = new Algoryt(); //Generas una instancia de la clase algoryt que es donde esta el algoritmo de encriptacion en el otro archivo

		$query = " SELECT * FROM cuentas WHERE idUser = '$idUser'";
		$sql = mysqli_query( $conexion,$query) or die(mysqli_error()); //ejecuta la consulta para buscar las cuentas del usuario

		$rows = mysqli_fetch_all($sql,MYSQLI_ASSOC); //genera una matriz asosiativa para cada fila

		$codigo =date("dmhis"); //genera un numero aleatorio dado por lafecha de creacion para el nombre del archivo
		$fp = fopen("encrypt/backup_user_".$codigo.$idUser.".txt", "a");//genera el archivo de texto donde va a ir el backup
		$header = "DELETE FROM cuentas WHERE idUser =".$idUser.";";
		
		$encrypth = $algorit->encryption($header,$keyd);
		fwrite($fp, $encrypth."\n");
		$header2 = "INSERT INTO cuentas (idCuentaUser,Plataforma, URL, Password,Comentario, idUser) VALUES";//Solo es el titulo del archivo
		$encrypth = $algorit->encryption($header2,$keyd);//Guarda el resultado de la funcion encryption del otro archivo del algoritmo

		fwrite($fp, $encrypth."\n");
		
		$numRow = mysqli_num_rows($sql);
		$i = 1;
		foreach ($rows as $row) { //para cada fila la va a guardar en $row y ese row se vuelve como un array de ahí jalas los datos de la tabla
			$texto = "(".$row['idCuentaUser'].","."'".$row['Plataforma']."'".","."'".$row['URL']."'".",". "'".$row['Password']."'".",". "'".$row['Comentario']."'".","."$idUser".")";
			if($i != $numRow){
				$texto = $texto.",";
			}
			$encrypt = $algorit->encryption($texto,$keyd); //de igual forma mandas a llamar la funcion encryption y despues escribes en el archivo el resultado.
			fwrite($fp,$encrypt."\n");
			 //aqui guardas el primer parrafo que va a ir en el archivo de texto.
			$i = $i+1;
			}
		
		fclose($fp); //cierras el archivo
		echo $keyd;




 ?>