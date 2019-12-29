<?php
	
	
	include 'conexion.php';

	$idUser = $_GET["user"];

	$query2 = " SELECT Fecha,Hora,Descripcion FROM logsistema WHERE idUser = '$idUser'";
	$sql2 = mysqli_query( $conexion,$query2) or die(mysqli_error());

	$rowsLog = mysqli_fetch_all($sql2,MYSQLI_ASSOC);



	$query = " SELECT * FROM cuentas WHERE idUser = '$idUser'";
	$sql = mysqli_query( $conexion,$query) or die(mysqli_error());

	$rows = mysqli_fetch_all($sql,MYSQLI_ASSOC);
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>  
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="css/stylePanel.css">
	<link rel="stylesheet" href="css/switch.css">


	
</head>
<body style="background: url(img/panel.png) no-repeat center center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;">

		  <div class="w3-sidebar w3-bar-block w3-card" style="width:210px; background-color: #1C1C1C; ">
		  <h5 class="w3-bar-item" style="color: white;">DASHBOARD</h5>
		  <button style="color: white;" class="w3-bar-item w3-button tablink" onclick="openCity(event, 'London')">Mis Claves</button>
		  <button style="color: white;" class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Paris')">Generar Password</button>
		  <button style="color: white;" class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Tokyo')">Registrar</button>
		  <button onclick="document.getElementById('logModal').style.display='block'" style="color: white;" class="w3-bar-item w3-button tablink">Log</button>
		</div>

		<div style="margin-left:210px">

		  <div id="welcome" class="w3-container welcome" style="">
		  	
		    <h1 >PANEL DE ADMINISTRACION</h1>
		    <h2>Bienvenido</h2>
		    <p>Desde aquí podrás administrar y generar claves seguras para utilizarlas en tus sitios favoritos.</p>
		    <p>En el menú del lado izquierdo podrás seleccionar la acción que quieras realizar.</p>
		    <div style="text-align: center;">
		    	<img src="img/user.png" alt="">
		    </div>
		  </div>


<!--MODAL LOG-->

<div id="logModal" class="w3-modal"  >
 <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="">
  <header class="w3-container w3-black"> 
   <span onclick="document.getElementById('logModal').style.display='none'" 
   class="w3-button w3-black w3-xlarge w3-display-topright">&times;</span>
   <h2>LOG DEL SISTEMA</h2>
  </header>
	<body >
		<div id ="textLog" style="height: 400px;
    overflow-y: auto;">
		<?php
		foreach ($rowsLog as $row) {
		?>
		<span>Haz hecho una <?php echo $row['Descripcion']; ?> el día <?php echo $row['Fecha']; ?> a las <?php echo $row['Hora']; ?></span><br>
		<?php } ?>
	</div>
		

	</body>
	

  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-red w3-right w3-border" 
   onclick="document.getElementById('logModal').style.display='none'">Close</button>
  </div>
 </div>
</div>


<!--MODAL UPDATE-->

	<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color: black;">EDITAR</h2>
      </div>
		
      <form class="w3-container" action="" method="POST">
        <div class="w3-section">
			<input type="hidden" id="modalID" name="modalID" value="">
          <label><b>Nombre</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nombre del sitio" name="modalNombre" id="modalNombre" required>

          <label><b>URL</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="URL" name="usrname" id="modalURL" required>

          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Password" name="usrname" id="modalPassword" required>

          <label><b>Comentario</b></label>
          <input class="w3-input w3-border" type="text" id="modalComentario" placeholder="Comentario" name="psw" required>


          <button class="w3-button w3-block w3-green w3-section w3-padding" onclick="editarDatos();">Guardar</button>
          
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="actualizar()" type="button" class="w3-button w3-red">Cancel</button>
        
      </div>

    </div>
  </div>


  <!--TERMINA MODAL -->
  <!--MODA SELECT ARCHIVO -->

  <div id="modalFile" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('modalFile').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color: black;">Selecciona el archivo</h2>
      </div>
		
      <form class="w3-container" method="POST">
        <input type="file" value="Seleccionar" class="w3-button w3-white" id="fileName";>
		
		<center><h2>Ingresa tu clave secreta</h2></center>
      	<span><input class="w3-input w3-border w3-round-large" style="font-size: 20px;" type="text" id= "keyName" name="" placeholder="Key"></span>


          <button class="w3-button w3-block w3-green w3-section w3-padding" onclick="decryptFile();">Importar</button>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('modalFile').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        
      </div>

    </div>
  </div>


<!--Modal clave-->

<div id="modalKey" class="w3-modal" >
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; ">

      <div class="w3-center" style="padding-bottom: 30px;"><br>
        <span onclick="document.getElementById('modalKey').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <center><p style="color: green; font-size: 20px;">Tus datos han sido guardados</p></center>
        <h1 style="color: black;">Tu llave secreta es: </h1>
        <h2 style="color: black;"id="viewKey"></h2>
      </div>
	

    </div>
  </div>



		  <div id="London" class="w3-container city welcome" style="display:none">
		    <h1 >MIS CLAVES</h1>
		    <h2>Esta es lista de claves que tienes hasta el momento.</h2>
		    <p>Selecciona un elemento de la lista para editar sus datos o puedes generar un backup de tus datos con el boton "Descargar".</p>
			
						
					  <h2>Tus claves <input type="file" name="myFile" id="myfile" value="Importar" style="visibility: hidden;"></h2>
					  <p style="margin-bottom: 30px;">Selecciona una para editar  <button onclick="doBackup();"style="font-size: 20px;" class="w3-button w3-round-xlarge w3-right w3-aqua" >Exportar</button><button onclick="document.getElementById('modalFile').style.display='block'" style="font-size: 20px; margin-right: 5px;" class="w3-button w3-round-xlarge w3-right w3-aqua" id="btnFile">Importar</button></p>
					  <ul class="w3-ul w3-card-2 w3-round-large" id="tablaSitio" style="background-color: rgb(0,51,51,0.6); color: white; margin-bottom: 20px;">

					  	<?php
						foreach ($rows as $row) {
						?>
					    <li class="w3-bar" ">
					      <span onclick="this.parentElement.style.display='none';eliminarCuenta(this.id)" id="<?php echo $row['idCuentaUser']; ?>" class="w3-bar-item w3-button w3-black w3-large w3-right">×</span>
					      <img src="img/url.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
					     <a href="#" id="<?php echo $row['idCuentaUser']; ?>" onclick="viewModal(this.id);" style="color: rgb(255,255,255);">
					      <div class="w3-bar-item">
					        <span class="w3-large"><?php echo $row['Plataforma']; ?></span><br>
					        <span><?php echo $row['URL']; ?></span><br>
					        <span>********</span>
					      </div>
					      </a>
					    </li>
			    <?php } ?>
			  </ul>
		

		  </div>

		  <div id="Paris" class="w3-container city welcome" style="display:none ">
		    <h1>GENERAR CLAVE SEGURA</h1>
		    <h2>Aquí podrás generar tus claves seguras para tus sitios.</h2>
		    <p>Escoge la configuración de tu clave y dale en generar para evaluar que nivel de seguridad tiene.</p>

		    <div></div>
		    <div class= "w3-center" style="margin-bottom: 18px; margin-top: 30px;">
		 		<form action="" method="POST" id="config">

		 				
		 		<input class= "" style="margin: 5px; width:20px !important;
				height:20px!important;"type="checkbox" id="mayus" name="mayus" value=""> <span class= "" style="color:#00FFFF; font-size:25px; width:20px !important;
				height:20px!important;" >Mayusculas</span>
				<input type="checkbox" id="minus"style="margin: 5px; width:20px !important;
				height:20px!important;" name="minus" value=""> <span style="color:#00FFFF; font-size:25px;" >Minusculas</span><br>
				<input type="checkbox" class= "" id="numeros"style=" width:20px !important;
				height:20px!important; margin: 5px;"  name="numeros" value=""> <span style=" color:#00FFFF; font-size:25px; margin-right:8px;" >Numeros</span>
				<input style="font-size: 10px; width:20px !important;
				height:20px!important; margin-left: 25px;" type="checkbox" id="caracteres" name="caracteres" value=""> <span style="margin-left: 5px; color:#00FFFF; font-size:25px;" >Caracteres</span><br>
				<span style="color:#00FFFF; font-size:25px;" >Longitud: </span><input style="font-size: 25px; margin-top: 40px; width:80px !important;
				height:40px!important;"type="number" name="cantidad" id="cantidad" min="8" max="128" value="8">
				</form>
				<button onclick="generarPass();"class= "w3-button w3-round-xlarge w3-red"style=" margin-top: 60px;margin-left: 10px;border: none;
    outline:none;">Generar Password</button>

				
		 	</div>
				
				
			
		 	<div class= "w3-center" style="margin-top: 80px;">
		 		<div style="margin-bottom: 10px; padding-right:40px;">
					<center><span style="font-size: 20px;" id="nivelPass"> </span></center>

				</div>

		 		<span style="color:#00FFFF; font-size:25px;">Password: </span><input style="text-align:center; border-radius: 25px; padding-left:5px;height: 40px; font-size: 20px; "type="text" id="genPass"><button class= "w3-button w3-round-xlarge w3-green"style="margin-left: 10px;border: none;
    outline:none;" onclick="validarPass();">Calcular Seguridad</button>

		 	</div>
		    
		  </div>

		  <div id="Tokyo" class="w3-container w3-center city welcome" style="display:none">
		    <h1>REGISTRA UN NUEVO SITIO</h1>
		    <h2>Agregar los sitios web para administrarlos.</h2>
		    <p>Llena los datos del formulario con tu clave segura para guardarla.</p>
		    <div class= "contenedor registro">
			<form action=""  method ="POST">
			<h4>Nombre del sitio: </h4>
			<input type="text" name="username" id="nombreURL" placeholder = "Nombre" >
			<h4>URL: </h4>
			<input type="text" name="email" id="URL" placeholder = "URL del sitio" >
			<h4>Contraseña: </h4>
			<input type="password" name="pass" id="pass" placeholder = "Contraseña">
			<h4>Comentario: </h4>
			<input type="text" name="phone" id="Coment" placeholder = "Comentario">
			<p></p>
			<button class="w3-button w3-round-xlarge w3-center w3-aqua" onclick="validarRegistro();" type = "button">Registrar</button>
			
			
		</form>



	


	

	</div>
		  </div>

</div>

<script>



			function validarPass(){

				var passValue = document.getElementById("genPass").value;

				if(passValue == ""){
					alert("Debe generar una contraseña primero");
				}else{
					var patt = new RegExp(/^(?=.*\d)(?=.*[`~!@#$%^&*()_°¬|+\-=?;:'",.<>\{\}\[\]\\\/])(?=.*[A-Z])(?=.*[a-z])\S{8,128}$/);
				var res = patt.test(passValue);
	

				if(res == true){

					document.getElementById("nivelPass").style.color = '#2EFE2E';
					document.getElementById("nivelPass").innerHTML = "Seguridad: ALTA";
				}else{
					document.getElementById("nivelPass").style.color = 'red';
					document.getElementById("nivelPass").innerHTML = "Seguridad: BAJA";
				}	
				}
				
				



			}

			function decryptFile(event){
				this.event.preventDefault();

				var fileName = document.getElementById("fileName").value.split('/').pop().split('\\').pop();
				
				var keyName = document.getElementById("keyName").value;

				if(fileName == "" || keyName == ""){

						alert("Debe llenar todos los datos");
						
				}else{

					$.ajax({
                        type: "POST", 
                        url: "exportFile.php",
                        dataType: "text",
                        data: {fileName:fileName,keyName:keyName},
                        async: true,
                        success: function(data) {
                        	alert(data);
                        	
                      }
                  });
					document.getElementById("fileName").value = "";
					document.getElementById("keyName").value = "";
					
				}

				return false;

			}

		

	function eliminarCuenta(id){

		
		$.ajax({
                        type: "POST", 
                        url: "eliminarCuenta.php",
                        data: {idCuenta:id},
                        success: function(data) {
                        	alert("Cuenta Eliminada");
                        	
                      }
                  });




	}

	function doBackup(){

			var iduser = getParameterByName("user");


			$.ajax({
                        type: "POST", 
                        url: "generarScript.php",
                        dataType: "text",
                        data: {idUser:iduser},
                        success: function(data) {
                        	document.getElementById("viewKey").innerHTML = data;
                        	document.getElementById('modalKey').style.display='block';
                        	
                      }
                  });


	}

	


	function actualizar(){
		document.getElementById('id01').style.display='block';
		setInterval(viewModalLog(),5000);
		
	}


	function viewModalLog(){
		location.reload();

	}



	function generarPass(){

		var longitud = document.getElementById("cantidad").value;
		var minus = document.getElementById("minus").value;
		var mayus = document.getElementById("mayus").value;
		var numeros = document.getElementById("numeros").value;
		var caracteres = document.getElementById("caracteres").value;
		
		if( $('#minus').prop('checked') ) {
    		minus = true;
			}else{
				minus = false;
			}


			if( $('#mayus').prop('checked') ) {
    		mayus = true;
			}else{
				mayus = false;
			}

			if( $('#numeros').prop('checked') ) {
    		numeros = true;
			}else{
				numeros = false;
			}


			if( $('#caracteres').prop('checked') ) {
    		caracteres = true;
			}else{
				caracteres = false;
			}


		
			$.ajax({
                        type: "POST", 
                        url: "proyectoGenerador.php",
                        dataType: "text",
                        data: {longitud:longitud,minus:minus,mayus:mayus,caracteres:caracteres,numeros:numeros},
                        success: function(data) {
                        	document.getElementById("genPass").value = data;
                        	
                      }
                  });
		



	}

function validarRegistro(){

				var nombreURL = document.getElementById("nombreURL").value;
				var URL = document.getElementById("URL").value;
				var Password = document.getElementById("pass").value;
				var comentario = document.getElementById("Coment").value;


				if( nombreURL == ""|| URL == ""|| Password == ""||comentario == ""){
					alert("Debe llenar todos los datos");
				}else{

					var iduser = getParameterByName("user");

					$.ajax({
                        type: "POST",
                        url: "registrarSitio.php",
                        data: {id :iduser,comentario: comentario,password :Password,url: URL,nombreurl: nombreURL},
                        success: function(data) {
                        	alert("Sitio agregado");
                        	document.getElementById("Coment").value = "";
                        	document.getElementById("URL").value = "";
                        	document.getElementById("pass").value = "";
                        	document.getElementById("nombreURL").value = "";
                        	window.location.reload();

                      }
                  });

				}
			}

function getParameterByName(name) {
		    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		    results = regex.exec(location.search);
		    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
				}


			function editarDatos(){
				
				var iduser = getParameterByName("user");

				var nombreURL = document.getElementById("modalNombre").value;
				var URL = document.getElementById("modalURL").value;
				var Password = document.getElementById("modalPassword").value;
				var comentario = document.getElementById("modalComentario").value;
				var idCuenta = document.getElementById("modalID").value;

				if( nombreURL == ""|| URL == ""|| Password == ""||comentario == ""){
					alert("Debe llenar todos los datos");
				}else{
					
				$.ajax({
                        type: "POST",
                        url: "editarRegistro.php",
                        async: false,
                        data: {idUser :iduser,comentario: comentario,password :Password,url: URL,nombreurl: nombreURL,idCuenta:idCuenta},
                        success: function(data) {
                        	alert("Datos actualizados");

                        	document.getElementById('id01').style.display='none';
                      }
                  });

			}
			}


			function viewModal(id){
			var iduser = getParameterByName("user");

				$.ajax({
                        type: "POST",
                        url: "cargarDatosModal.php",
                        dataType: 'json',
                        data: {idSitio :id,idUser:iduser},
                        success: function(data) {
                        	document.getElementById("modalNombre").value =data.plataforma;
							document.getElementById("modalURL").value =data.url;
							document.getElementById("modalPassword").value =data.password;
							document.getElementById("modalComentario").value =data.comentario;
							document.getElementById("modalID").value =data.idCuenta;
							document.getElementById('id01').style.display='block';


                        	
                        	

                      }
                  });



			}



			function openCity(evt, cityName) {
			  var i, x, tablinks;
			  x = document.getElementsByClassName("city");
			  document.getElementById("welcome").style.display = "none";
			  for (i = 0; i < x.length; i++) {
			    x[i].style.display = "none";
			    
			  }
			  tablinks = document.getElementsByClassName("tablink");
			  for (i = 0; i < x.length; i++) {
			    tablinks[i].className = tablinks[i].className.replace(" w3-blue", ""); 
			  }
			  document.getElementById(cityName).style.display = "block";
			  evt.currentTarget.className += " w3-blue";
			}


			


			
</script>
	
</body>
</html>