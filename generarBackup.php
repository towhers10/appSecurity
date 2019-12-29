<?php 
		include 'conexion.php';
		include 'algoritmo.php'; //incluye el otro archivo del algoritmo


		$idUser = $_POST["idUser"]; //Obtengo el id del usuario para seleccionar sus cuentas

		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz'; 
		$keyd =  substr(str_shuffle($permitted_chars), 0, 16);//genero una llave aleatoria para la encriptacion y desencriptacion. Es la que le das al usuario
		
		$algorit = new Algoryt(); //Generas una instancia de la clase algoryt que es donde esta el algoritmo de encriptacion en el otro archivo

		$query = " SELECT * FROM cuentas WHERE idUser = '$idUser'";
		$sql = mysqli_query( $conexion,$query) or die(mysqli_error()); //ejecuta la consulta para buscar las cuentas del usuario

		$rows = mysqli_fetch_all($sql,MYSQLI_ASSOC); //genera una matriz asosiativa para cada fila

		$codigo =date("dmhis"); //genera un numero aleatorio dado por lafecha de creacion para el nombre del archivo
		$fp = fopen("encrypt/backup_user_".$codigo.$idUser.".txt", "a");//genera el archivo de texto donde va a ir el backup
		$header = "BACKUP DE TUS CUENTAS\n";//Solo es el titulo del archivo
		$encrypth = $algorit->encryption($header,$keyd);//Guarda el resultado de la funcion encryption del otro archivo del algoritmo
		fwrite($fp, $encrypth."\n");//Escribe en el archivo la cadena de texto que viene siendo el titulo o la cabecera del archivo

		$i = 1;//esto es opcional solo es para enumerar las cuentas dentro del archivo

		foreach ($rows as $row) { //para cada fila la va a guardar en $row y ese row se vuelve como un array de ahí jalas los datos de la tabla

			$texto = "NO.$i\n"."Plataforma: ".$row['Plataforma']."\n"."URL: ".$row['URL']."\n"."Password: ".$row['Password']."\n"."Comentarios: ".$row['Comentario']; //aqui guardas el primer parrafo que va a ir en el archivo de texto.

			$encrypt = $algorit->encryption($texto,$keyd); //de igual forma mandas a llamar la funcion encryption y despues escribes en el archivo el resultado.
			fwrite($fp,$encrypt."\n\n");
			$i = $i+1;	
		}

		fclose($fp); //cierras el archivo
		echo $keyd;	//aquí mando la llave generada para mostrarla al usuario

 ?>