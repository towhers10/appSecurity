<?php


	$longitud = $_POST["longitud"];
	$may = $_POST["mayus"];
	$min =	$_POST["minus"];
	$num = $_POST["numeros"];
	$esp =	$_POST["caracteres"];

	genPass($longitud, $may, $min, $num, $esp);

	function genPass($longitud, $may, $min, $num, $esp){
		
/*
		//ESTA ES LA MANERA MAS BRUTA QUE SE ME OCURRIO
		$numero = array('0','1','2','3','4','5','6','7','8','9','0','1','2','3','4','5','6','7','8','9','1','2','3','4','5','6');
		//$numero = array('0','1','2','3','4','5','6','7','8','9');
		$letmay = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Y','X','Z');
		$letmin = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','y','x','z');
		$especi = array('!','"','#','$','%','&','/','(',')','=','?','¡','¿','|','@','+','-','_','.',':',',',';','{','}','[',']','~');
		$arrayPass = array();
		$arrayPosible = array();
		//agrega los datos al array


		*/


		function generarCadena($long,$cadena){
			$aux = "";
			for($i =1;$i<=$long;$i++){
			$string =  substr(str_shuffle($cadena), 1, 1);
			$aux = $string.$aux;
			}

			echo $aux;

		}


		

		if ($may == "false" && $min == "false" && $num == "false" && $esp =="false") {
		$permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
		
		generarCadena($longitud,$permitted_chars);


		}
		else if ($may == "true" && $min == "false" && $num == "false" && $esp =="false") {
			$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			generarCadena($longitud,$permitted_chars);
		}
		else if ($min == "true" && $may == "false" && $num == "false" && $esp =="false") {
			$permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
			generarCadena($longitud,$permitted_chars);
		}
		else if ($num == "true" && $min == "false" && $esp == "false" && $may =="false") {
			$permitted_chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
			generarCadena($longitud,$permitted_chars);
			
		}
		else if ($esp == "true" && $min == "false" && $num == "false" && $may =="false"|| ($esp == "true" && $min == "true" && $num == "false" && $may =="false")) {
			$permitted_chars = 'abcdefghijklmnopqrstuvwxyz/?@-{}[]%&$#!+*';
			generarCadena($longitud,$permitted_chars);
		}

		elseif ($min == "true" && $num == "true" && $esp == "true" && $may =="false") {
			$permitted_chars = '0123456789/?|@-{}[]%&$#!+*abcdefghijklmnopqrstuvwxyz';
			generarCadena($longitud,$permitted_chars);
		}
		elseif ($min == "true" && $num == "true" && $esp == "false" && $may =="false") {
			$permitted_chars = '01234567890123456789abcdefghijklmnopqrstuvwxyz';
			generarCadena($longitud,$permitted_chars);
		}

		elseif ($min == "true"  && $esp == "true" && $may =="true"&& $num == "false") {
			$permitted_chars = '/?|@-{}[]%&$#!+*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			generarCadena($longitud,$permitted_chars);
		}

		elseif ($min == "true" && $num == "true"&& $may =="true" && $esp == "false" ) {
			$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz0123456789';
			generarCadena($longitud,$permitted_chars);
		}

		elseif ($esp == "true" && $may == "true" && $num == "false" && $min =="false") {
			$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ/?|@-{}[]%&$#!+*';
			generarCadena($longitud,$permitted_chars);
		}

		else if ($esp == "true" && $num == "true" && $min == "false" && $may =="false") {
			$permitted_chars = '/?|@-{}[]%&$#!+*0123456789';
			generarCadena($longitud,$permitted_chars);
		}

		else if ($esp == "true" && $num == "true" && $may == "true" && $min =="false") {
			$permitted_chars = '/?|@-{}[]%&$#!+*0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			generarCadena($longitud,$permitted_chars);
		}

		else if ($esp == "true" && $num == "true" && $may == "true"&& $min == "true") {
			$permitted_chars = 'abcdefghijklmnopqrstuvwxyz/?|@-{}[]%&$#!+*0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABC';
			generarCadena($longitud,$permitted_chars);
		}

		else if ($min == "true" && $may == "true"&& $num == "false" && $esp =="false") {
			$permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			generarCadena($longitud,$permitted_chars);
		}

		else if ($num == "true" && $may == "true" && $min == "false" && $esp =="false") {
			$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			generarCadena($longitud,$permitted_chars);
		}

		else if ($esp == "true" && $may == "true" && $num == "true" && $min =="false") {
			$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/?|@-{}[]%&$#!+*';
			generarCadena($longitud,$permitted_chars);
		}


		
		
		//var_export($arrayPosible);


	}





	


?>