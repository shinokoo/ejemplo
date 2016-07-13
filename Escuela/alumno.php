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
	//Codigo para ejecutar query
	$sql = "SELECT * FROM alumno";
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
					      <li><a href="#">Alumno</a></li>
					      <li><a href="materia.php">Materia</a></li>
				    </ul>
			</div>
		</nav>
	</div>

	<div class="container">

		<strong><a id="registrar" class="btn btn-primary" href="registrar_alumno.php">Nuevo Alumno</a></strong>

	<div class="panel panel-primary">

		<div class="panel-heading">
			<strong>Alumnos</strong>
		</div>

		<div class="panel-body">
			<table class="table table-striped">
		<thead>

		<div class="input-group">
		      <input type="text" class="form-control" placeholder="Buscar Alumno">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button">Buscar</button>
		      </span>
	    </div>
		       


			
				<tr>
					<th>numeroDeControl</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Dirección</th>
					<th>Correo</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {?>
			    <tr>
			    	<td><?php echo $row["numeroDeControl"]?></td>
			    	<td><?php echo $row["nombre"]?></td>
			    	<td><?php echo $row["apellidoPaterno"]?></td>
			    	<td><?php echo $row["apellidoMaterno"]?></td>
			    	<td><?php echo $row["Direccion"]?></td>
			    	<td><?php echo $row["correo"]?></td>
			    	<td>
			    		<a href="borrar_alumno.php?numControl=<?php echo $row['numeroDeControl'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
			    		<a href="modificar_alumno.php?numeroDeControl=<?php echo $row['numeroDeControl'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
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