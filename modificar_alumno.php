<?php 
	//Código para conectar
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "escuela";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	$conn->set_charset("utf8");

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 	

	if(isset($_POST["btnEnviar"])){
		$numeroDeControl = $_POST["numeroDeControl"];
		$nombreAlumno = $_POST["nombreAlumno"];
		$apellidoPaterno = $_POST["apellidoPaterno"];
		$apellidoMaterno = $_POST["apellidoMaterno"];
		$Direccion = $_POST["Direccion"];
		$correo = $_POST["correo"];

		//Codigo para ejecutar query
		$sql = "INSERT INTO alumno(numeroDeControl,nombreAlumno, apellidoPaterno, apellidoMaterno, Direccion, correo)value('$nombreAlumno','$apellidoPaterno', '$apellidoMaterno', '$Direccion', '$correo')";
		$result = $conn->query($sql);

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /Daw_Tarea6/alumno.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Alumnos</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
</head>
<body>
	<!-- Mostrar datos de la tabla de personas-->
	<input type="text" class="form-control" placeholder="Buscar Alumno">
	<div class="container">
	<div class="panel panel-primary">
		<!-- <div class="panel-heading">
			 <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			 <strong class="btn btn-primary">Nueva Persona</strong>
		</div> -->
		<div class="panel-body">
			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">NumeroDe<br>Control:</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="numeroDeControl" name="numeroDeControl" placeholder="numeroDeControl">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Nombre:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombreAlumno" name="nombreAlumno" placeholder="NombreAlumno">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Paterno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Materno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Dirección">Dirección:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Dirección" name="Direccion" placeholder="Dirección">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Correo">Correo:</label>
			      <div class="col-sm-11">
			        <input type="email" class="form-control" id="Correo" name="correo" placeholder="Correo">
			      </div>
			    </div>
			    <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			</form>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>