<?php 



	define('METHOD','AES-256-CBC'); //EL tipo de algoritmo que vas a utilizar hay varios puedes consulta la documentacion de openssl_encrypt

	define('SECRET_IV','000010'); //Esta es una llave que pide el algoritmo tu puedes poner lo que quieras
	
	/*Este es el algoritmo para encriptar y desencriptar, es propio de PHP solo recibe
	una cadena de texto y la llave con la que vas a desencriptar.

	*/

	class Algoryt{

		public static function encryption($string,$keyEncrypt){
			$output=FALSE;
			$key=hash('sha256', $keyEncrypt);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}
		public static function decryption($string,$keyEncrypt){
			$key=hash('sha256',$keyEncrypt);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

		}


		
 ?>