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

	if(isset($_POST["btnActualizar"])){
		$numeroDeControl = $_POST["rfcProfesor"];
		$nombreAlumno = $_POST["nombre"];
		$apellidoPaterno = $_POST["apellidoPaterno"];
		$apellidoMaterno = $_POST["apellidoMaterno"];
		$Direccion = $_POST["Especialidad"];
		$correo = $_POST["Direccion"];
         $grupo = $_POST["Telefono"];

		//Codigo para ejecutar  query
		$sql = "UPDATE profesor
		set rfcProfesor='$rfcProfesor',apellidoPaterno =
		$'apellidoPaterno',apellidoMaterno='$apellidoMaterno',Especialidad='$Especialidad',Telefono=$'$Telefono' 
		where rfcProfesor=$rfcProfesor";
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
	<title>Registrar de Alumnos</title>
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
			      <label class="control-label col-sm-1" for="rfcProfesor">rfcProfesor:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="rfcProfesor" name="rfcProfesor" placeholder="rfcProfesor">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="nombreAlumno">NombreAlumno:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
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
			      <label class="control-label col-sm-1" for="Especialidad">Especialidad:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Especialidad" name="Direccion" placeholder="Especialidad">
			      </div>
			    </div>
				<div class="form-group">
			      <label class="control-label col-sm-1" for="Telefono">Telefono:</label>
			      <div class="col-sm-11">
			        <input type="text" class="form-control" id="Telefono" name="correo" placeholder="Telefono">
			      </div>
			    </div>
			    <button class="btn btn-primary" name="btnEnviar">Enviar</button>
			    <button class="btn btn-primary" name="btnActualizar">Actualizar</button>
			    <a href="index.php">regresar</a>

			    
			</form>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>