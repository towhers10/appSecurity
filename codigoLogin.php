
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styleLogin.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>   
	<script src="js/CryptoJS/components/md5.js" type="text/javascript"></script>
	
	<title>Login</title>
</head>


<body>
	
	<div class= "contenedor">

		<h1 style="color: black">Verificación</h1>
		<form action="" method ="POST">
		<center><h2 style="font-size: 18px; color: white; margin-bottom: 20px; ">Te enviamos un codigo a tu celular para verificar que eres tú. </h2></center>
		<center><p style="margin-top: 10px;">Escribe tu codigo </p></center>
		<input type="text" name="codigo" id="codigo" placeholder = "Codigo" >
		<input type="hidden" name="hideCode" value="" />
		<h2 id = "resultado" name="resultado"></h2>
		<button class="btn btn-primary" onclick="validarCodigo()"; type = "submit">Entrar</button>
	</form>




	</div>


	
	
</body>
</html>

?>

<script type="text/javascript">
	var hash = "";


	function validarCodigo(){


		function getParameterByName(name) {
		    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		    results = regex.exec(location.search);
		    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
				}
		if(document.getElementById('codigo').value == ""){

			alert("Debe ingresar un codigo valido");
		}else{
			var text = document.getElementById('codigo').value;
			var code = getParameterByName('ms');
			var iduser = getParameterByName('user');
			
				$.ajax({
                        type: "POST",
                        async: false,
                        url: "hashConverter.php",
                        data: {codigo :text},
                        success: function(data) {
                        	hash = data;
                        	
                      }
                  });

				if(hash == code){
					var iduser = getParameterByName('user');
					var desc = "ENTRADA";
					$.ajax({
                        type: "POST",
                        async: false,
                        url: "registrarEntrada.php",
                        data: {id :iduser,Descripcion: desc},
                        success: function(data) {
                        	
                        	
                      }
                  });
					window.open("panelPrincipal.php?user="+iduser);

				}else{
					alert("Codigo incorrecto");


				}


			
		}


	}
	
		



</script>

