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
		$numeroDeControl=$_POST["numeroDeControl"];
		$nombreAlumno = $_POST["nombreAlumno"];
		$apellidoPaterno = $_POST["apellidoPaterno"];
		$apellidoMaterno = $_POST["apellidoMaterno"];
		$Direccion = $_POST["Direccion"];
		$correo = $_POST["correo"];
        $grupo = $_POST["grupo"];
		//Codigo para ejecutar query
		$sql = "INSERT INTO alumnoo(numeroDeControl,nombreAlumno, apellidoPaterno, apellidoMaterno, Direccion, correo,grupo)value('$numeroDeControl','$nombreAlumno','$apellidoPaterno', '$apellidoMaterno', '$Direccion', '$correo','$grupo')";
		$result = $conn->query($sql);

		//Si se creo el registro lo redirecciona al index
		if($result){
			header("location: /Daw_Tarea6/alumnoo.php");
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
			      <label class="control-label col-sm-1" for="numeroDeControl">numero<De<br>Control:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="numeroDeControl" name="numeroDeControl" placeholder="numeroDeControl">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="nombreAlumno">nombreAlumno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombreAlumno" name="nombreAlumno" placeholder="nombreAlumno">
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
			      <label class="control-label col-sm-1" for="Dirección">Dirección:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Dirección" name="Direccion" placeholder="Dirección">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="correo">correo:</label>
			      <div class="col-sm-11">
			        <input type="email" class="form-control" id="correo" name="correo" placeholder="correo">
			        <div class="form-group">
			      <label class="control-label col-sm-1" for="grupo">grupo:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="grupo" name="grupo" placeholder="grupo">
			      </div>
			    </div>
			    <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			</form>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->s
</body>
</html>