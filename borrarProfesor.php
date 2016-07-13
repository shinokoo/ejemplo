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
	if(isset($_GET["rfcProfesor"])){
		$rfcProfesor = $_GET["rfcProfesor"];
		
		//Codigo para ejecutar quer
		$rfcProfesor=$_GET["rfcProfesor"];
		$sql = "SELECT * FROM Profesor
				WHERE rfcProfesor = $rfcProfesor";
		$result = $conn->query($sql);
	}

	//Ejecutar el borrado
	if(isset($_POST["btnBorrar"])){
		$numeroDeControl = $_POST["rfcProfesor"];
		//Codigo para ejecutar query
		$sql = "DELETE FROM Profesor
				WHERE rfcProfesor = $rfcProfesor";

		echo $sql;
		$result = $conn->query($sql);
		$conn->close();

		//Si se creo el registro lo redirecciona a la página alumno
		if($result){
			header("location: /Daw_Tarea6/Profesor.php");
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eliminar registro de profesor.</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

	<!-- Mostrar datos de la tabla de personas-->
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Eliminar profesor</strong>
		</div>
		<div class="panel-body">
			<?php 
			if(isset($result) || $result->row_num>0){
				$row = $result->fetch_assoc();
				
			?>

				<p>¿Esta seguro de eliminar el siguien registro del profesor?</p>
				<strong>rfcProfesor: </strong><span><?php echo $row["rfcProfesor"]?></span><br>
				<strong>nombre: </strong><span><?php echo $row["nombre"]?></span>

				<form method="POST" class="form-horizontal" role="form">
					<input type="hidden" name="rfcProfesor" id="rfcProfesor" value="<?php echo $row["rfcProfesor"]?>">
				    <button class="btn btn-primary" name="btnBorrar">Borrar</button>
				</form>
				<?php
			} //Fin del IF?>

		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>