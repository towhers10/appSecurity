<?php 

include 'conexion.php';




	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$phone = $_POST['phone'];

		$encryptPass = password_hash($pass, PASSWORD_DEFAULT);

		$query2 = "SELECT idUser FROM usuarios WHERE Correo = '$email' ";
		$sql2 = mysqli_query( $conexion,$query2) or die(mysqli_error());


		if(mysqli_num_rows($sql2) > 0 ){
				echo "<script>
                alert('Ese correo ya existe');
                window.location= 'Registro.php'
    			</script>";
			
			}else{
				$query = "INSERT INTO usuarios(Correo,Password,Username,Telefono)values('$email','$encryptPass','$username','$phone') ";
				$sql = mysqli_query( $conexion,$query) or die(mysqli_error());

			
			if($sql!= 0){
				echo "<script>
                alert('Te haz registrado exitosamente');
    			</script>";
				header("location: login.php");
			}else{
				echo "Error en la base de datos";
				

			}
				

			}
		

		




 ?>