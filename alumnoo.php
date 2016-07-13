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
	if (isset($_GET["btnBuscar"])) {
		$buscar = $_GET["buscar"];
		$sql ="SELECT * FROM  alumnoo
		WHERE CONCAT(nombreAlumno, apellidoPaterno)
		LIKE '%$buscar%'";
	}
	else{
		$sql = "SELECT * FROM alumnoo";
	}

	$result = $conn->query($sql);
	$conn->close();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Alumnos</title>
	<link rel="stylesheet" type="text/css" href="estilo/estilo.css">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="estilo/css/font-awesome.min.css">
	 
</head>
<body>
	
	<div class="container">
		<nav class="navbar navbar-inverse">
			 <div class="container-fluid">
				 <div class="navbar-header">
				      <a class="navbar-brand" href="#">Escuela</a>
				 </div>
				    <ul class="nav navbar-nav">
					      <li><a href="index.php">Inicio</a></li>
					      <li><a href="alumnoo.php">Alumno</a></li>
					      <li><a href="materia.php">Materia</a></li>
					      <li><a href="profesor.php">Profesores</a></li>
				    </ul>
			</div>
		</nav>
	</div>

	

	<div class="panel panel-primary">

		<div class="panel-heading">
			<strong>Alumnos</strong>
		</div>
		<div class="container">
          <br>
		
		<strong><a id="registrar" class="btn btn-primary" href="registrarAlumno.php">Agregar Alumno</a></strong>
		 <strong><a id="registrar" class="btn btn-primary" href="alumnoo.php">Regresar</a></strong>

		<div class="panel-body">
			<table class="table table-striped">
		<thead>
        <form method="GET" class="form-inline" role="form">
				<div id="busqueda" class="form-group col-md-2">
					<input type="text" name="buscar" class="form-control" id="buscar" placeholder="Buscar alumnoo ">
				</div>
				<div  id="btnBuscar" class="from-group col-md-1">
					<button id="btnBuscar" type="submit" name="btnBuscar" class="btn btn-primary">
						<span class="glyphicon glyphicon-search"> Buscar</span>
					</button>
				</div>
			</form>     


			
				<tr>
					<th>numeroDeControl</th>
					<th>nombreAlumno</th>
					<th>apellidoPaterno</th>
					<th>apellidoMaterno</th>
					<th>Direccion</th>
					<th>correo</th>
					<th>grupo</th>
					
				</tr>
			</thead>
			<tbody>
			<?php 
				if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {?>
			    <tr>
			    	<td><?php echo $row["numeroDeControl"]?></td>
			    	<td><?php echo $row["nombreAlumno"]?></td>
			    	<td><?php echo $row["apellidoPaterno"]?></td>
			    	<td><?php echo $row["apellidoMaterno"]?></td>
			    	<td><?php echo $row["Direccion"]?></td>
			    	<td><?php echo $row["correo"]?></td>
			    	<td><?php echo $row["grupo"]?></td>
			    
			    	<td>
			    		<a href="borrarAlumno.php?numeroDeControl=<?php echo $row['numeroDeControl'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
			    		<a href="modificarAlumno.php?numeroDeControl=<?php echo $row['numeroDeControl'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>

			    	</td>
			    </tr>

		    <?php } //End while
				}//End if
				else {
				    echo "0 results";
				}
			 ?>
			</tbody>
			</table>
		</div><!-- Cierre de panel body -->
	</div><!-- Cierre de panel primary -->
	</div><!-- Cierre de container -->
</body>
</html>