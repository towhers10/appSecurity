<?php 

include 'conexion.php';
include 'algoritmo.php';



$fileName = $_POST['fileName'];
$keyName = $_POST['keyName'];



		$algorit = new Algoryt();

		$codigo =date("dmhis");
		$fileIn = fopen("encrypt/".$fileName, "r");
		$aux = "";
		
		$linea1 = fgets($fileIn);
		$write2 = $algorit->decryption($linea1,$keyName);
		$sql = mysqli_query($conexion,$write2) or die(mysqli_error());


		while($linea = fgets($fileIn)) {
	    	if (feof($fileIn)) break;
	    	$write = $algorit->decryption($linea,$keyName);
	    	$aux = $aux.$write;
			}

			mysqli_query($conexion,$aux) or die(mysqli_error());

			echo "todo bien";

			/*
		$linea = fgets($fileIn);
		$linea2 = fgets($fileIn);
		$linea3 = fgets($fileIn);
		$linea4 = fgets($fileIn);
		$write = $algorit->decryption($linea,$keyName);
		$write2 = $algorit->decryption($linea2,$keyName);
		$write3 = $algorit->decryption($linea3,$keyName);
		$write4 = $algorit->decryption($linea4,$keyName);
		$aux = "";
		*/
		


		//$query = $write;
		//$sql = mysqli_query($conexion,$query) or die(mysqli_error());

		//$linea2 = fgets($fileIn);
		//echo $write2 = $algorit->decryption($linea2,$keyName);



		
			
		/*
		if($write == ""){
			echo "Su clave secreta es invalida";
		}else{
			
			$fileOut = fopen("decrypt/decrypt".$codigo.".txt", "a");
			fwrite($fileOut, $write."\n");
			while($linea = fgets($fileIn)) {
	    	if (feof($fileIn)) break;
	    	$write = $algorit->decryption($linea,$keyName);
	    	fwrite($fileOut, $write."\n");
			}
			fclose($fileOut);
			$fileIn = fopen("decrypt/decrypt".$codigo.".txt", "r");
			$query = fgets($fileIn);
			
			
		}

*/

		fclose($fileIn);


		



 ?>