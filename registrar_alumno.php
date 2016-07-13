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
		$nombre = $_POST["nombre"];
		$apePaterno = $_POST["apePaterno"];
		$apeMaterno = $_POST["apeMaterno"];
		$direccion = $_POST["direccion"];
		$correo = $_POST["correo"];

		//Codigo para ejecutar query
		$sql = "INSERT INTO alumnos(nombre, apePaterno, apeMaterno, direccion, correo)value('$nombre','$apePaterno', '$apeMaterno', '$direccion', '$correo')";
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
	<div class="container">
	<div class="panel panel-primary">
		<!-- <div class="panel-heading">
			 <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			 <strong class="btn btn-primary">Nueva Persona</strong>
		</div> -->
		<div class="panel-body">
			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Nombre:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Paterno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="apePaterno" name="apePaterno" placeholder="Apellido Paterno">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-1" for="email">Apellido Materno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="apeMaterno" name="apeMaterno" placeholder="Apellido Materno">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Dirección">Dirección:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Dirección" name="direccion" placeholder="Dirección">
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