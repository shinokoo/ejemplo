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

		$rfcProfesor=$_POST["rfcProfesor"];
		$nombre=$_POST["nombre"];
		$apellidoPaterno = $_POST["apellidoPaterno"];
		$apellidoMaterno = $_POST["apellidoMaterno"];
		$Especialidad = $_POST["Especialidad"];
		$Direccion = $_POST["Direccion"];
		$Telefono= $_POST["Telefono"];

		//Codigo para ejecutar query
		$sql = "INSERT INTO Profesor(rfcProfesor,nombre, apellidoPaterno, apellidoMaterno,Especialidad,Direccion, Telefono)value('$rfcProfesor','$nombre','$apellidoPaterno', '$apellidoMaterno','$Especialidad','$Direccion', '$Telefono')";
		$result = $conn->query($sql);

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /Daw_Tarea6/profesor.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Alumnos</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<body>
	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		
		<div class="panel-body">
			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
			      <label class="control-label col-sm-1" for="rfcprofesor">rfcprofesor:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="rfcprofesorl" name="rfcProfesor" placeholder="rfcProfesor">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="nombre">nombre:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="apellidoPaterno">apellidoPaterno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="apellidoPaterno">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-1" for="zz">apellidoMaterno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="apellidoMaterno">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Especialidad">Especialidad:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Especialidad" name="Especialidad" placeholder="Especialidad">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Correo">Direccion:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-1" for="Telefono">Telefono:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
			      </div>
			    </div>
			    <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			</form>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>