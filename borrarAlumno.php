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

	//Mostrar confirmacion de borrado
	if(isset($_GET["numeroDeControl"])){
		$numeroDeControl = $_GET["numeroDeControl"];
		
		//Codigo para ejecutar quer
		$numeroDeControl=$_GET["numeroDeControl"];
		$sql = "SELECT * FROM alumnoo
				WHERE numeroDeControl = $numeroDeControl";
		$result = $conn->query($sql);
	}

	//Ejecutar el borrado
	if(isset($_POST["btnBorrar"])){
		$numeroDeControl = $_POST["numeroDeControl"];
		//Codigo para ejecutar query
		$sql = "DELETE FROM alumnoo
				WHERE numeroDeControl = $numeroDeControl";

		echo $sql;
		$result = $conn->query($sql);
		$conn->close();

		//Si se creo el registro lo redirecciona a la página alumno
		if($result){
			header("location: /Daw_Tarea6/alumnoo.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eliminar registro de Alumno.</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Eliminar Alumno</strong>
		</div>
		<div class="panel-body">
			<?php 
			if(isset($result) || $result->row_num>0){
				$row = $result->fetch_assoc();
				$numeroDeControl = $_GET["numeroDeControl"];
			?>

				<p>¿Esta seguro de eliminar el siguien registro del Alumno?</p>
				<strong>NumeroDeControl: </strong><span><?php echo $row["numeroDeControl"]?></span><br>
				<strong>nombreAlumno: </strong><span><?php echo $row["nombreAlumno"]." ".$row["apellidoPaterno"]." ".$row["apellidoMaterno"]?></span>

				<form method="POST" class="form-horizontal" role="form">
					<input type="hidden" name="numeroDeControl" id="numeroDeControl" value="<?php echo $row["numeroDeControl"]?>">
				    <button class="btn btn-primary" name="btnBorrar">Borrar</button>
				</form>
				<?php
			} //Fin del IF?>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>