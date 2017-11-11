<?php
	session_start(); 
	include("../conex.php");
	if(!isset($_SESSION["usr"]) && (!isset($_SESSION["car"]))) { 
		header("Location:index.php"); 
	}
?>

<style>
	table {
	    border-collapse: collapse;
	    width: 100%;
	}

	table, th, td {
		border: 1px solid black;
	}

	th {
    	background-color: #4CAF50;
    	color: white;
	}
</style>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crud Usuarios</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>	
	<center><div class="container">
		<div class="jumbotron" style="margin-top: 50px; width: 1000px;">
			<center><h2>GESTIÓN USUARIOS</h2></center><br>
			<center><label>Usuarios Registrados:</label></center>	
			<div>
				<table class="table table-bordered">
					<tr bgcolor="#2ECC71">
						<td width="15%"><b>#</b></td>
						<td width="15%"><b>ID USUARIO</b></td>
						<td width="20%"><b>NOMBRE</b></td>
						<td width="20%"><b>CLAVE</b></td>
						<td width="30%"><b>EMAIL</b></td>
					</tr>
					<?php 
						$sql = "SELECT * FROM usuarios WHERE CARGO='Usuario Sistema'";
						$consulta = mysqli_query($mysqli, $sql);
						$cont = 0;
						while($aDatos = mysqli_fetch_array($consulta)) {
							$cont = $cont + 1;
					?>
					<tr>
						<td><?php echo $cont ?></td>
						<td><?php echo $aDatos["ID_USUARIO"] ?></td>
						<td><?php echo $aDatos["NOMBRE"] ?></td>
						<td><?php echo $aDatos["CLAVE"] ?></td>
						<td><?php echo $aDatos["EMAIL"] ?></td>
					</tr>
					<?php
						}
						mysqli_close($mysqli);
					?>
				</table>
			</div>
			<center>
				<div>
					<form action="crud.php" method="POST">	
						<input type="submit" class="btn btn-primary" name="gestionar" value="Gestionar">
						<input type="submit" class="btn btn-danger" name="cerrar" value="Cerrar sesión">			
					</form>
					<?php
						if(isset($_POST["cerrar"])) {
							session_destroy();
							header("Location:index.php");
						}
						if(isset($_POST["gestionar"])) {
							header("Location:gestionar.php");
						}
					?>
				</div>
			</center>
		</div>
	</div></center>
</body>
</html>