<?php 


require __DIR__ ."/vendor/autoload.php";
use Twilio\Rest\Client;
include 'conexion.php';


	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$code = "";
	$phone = "";



		
		$query = "SELECT Correo,Password,Telefono,idUser FROM usuarios WHERE Correo = '$email' ";
		$sql = mysqli_query( $conexion,$query) or die(mysqli_error());

			
				if ($row = $sql->fetch_assoc()){

					if (password_verify($pass, $row['Password']) && $row['Correo'] == $email) {

						$phone = $row['Telefono'];
						$id = $row['idUser'];
						$codigo = mt_rand(2000,4000);
						enviarMensaje($phone,$codigo);
						$encode = md5($codigo);
						header("location:codigoLogin.php?ms=$encode&user=$id");
	    				



					} else {

    				echo "<script>
                	alert('Tus datos son incorrectos');
                	window.location= 'login.php'
    				</script>";
    			
						}

				}else{
					echo "<script>
                	alert('No se encuentra ningun correo con ese nombre');
                	window.location= 'login.php'
    				</script>";
				}
				




			function enviarMensaje($phone,$codigo){


					// Your Account SID and Auth Token from twilio.com/console
			$account_sid = 'AC0146c0b878f192d9729b30903122188b';
			$auth_token = '4ba768a07482d10b19c68f35b9af6140';
			// In production, these should be environment variables. E.g.:
			// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

			// A Twilio number you own with SMS capabilities
			$twilio_number = "+12565983398";

			$client = new Client($account_sid, $auth_token);
			$client->messages->create(
			    // Where to send a text message (your cell phone?)
			    '+52'.$phone,
			    array(
			        'from' => $twilio_number,
			        'body' => 'TU CODIGO ES: '.$codigo
			    )
			);




}

			
		

		




 ?>