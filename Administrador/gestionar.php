<?php
	session_start(); 
	include("../conex.php");
	if(!isset($_SESSION["usr"]) && (!isset($_SESSION["car"]))) { 
		header("Location:index.php"); 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<center><div class="container">
		<div class="jumbotron" style="margin-top: 50px; width: 1150px;">
			<form action="gestionar.php" method="POST" name="form">
				<div>
					<center><h2>GESTIÓN USUARIOS</h2></center><br>	
				</div>
				<center><div><br>
					<input type="submit" class="btn btn-primary" name="agregar" value="Nuevo Usuario">
					<input type="submit" class="btn btn-success" name="actualizar" value="Actualizar Datos">
					<input type="submit" class="btn btn-danger" name="cerrar" value="Cerrar sesión">
				</div></center><br><br>
				<center><label>Usuarios Registrados:</label></center>
				<div>
					<table class="table table-bordered">
						<tr bgcolor="#2ECC71">
							<td width="10%"><b>#</b></td>
							<td width="10%"><b>ID USUARIO</b></td>
							<td width="5%"><b>NOMBRE</b></td>
							<td width="5%"><b>CLAVE</b></td>
							<td width="10%"><b>EMAIL</b></td>
							<td width="40%"><b>ACCIÓN</b></td>
						</tr>
						<?php 
							$sql = "SELECT * FROM usuarios WHERE CARGO='Usuario Sistema'";
							$consulta = mysqli_query($mysqli, $sql);
							$cont = 0;
							while($aDatos = mysqli_fetch_array($consulta)) {
								$cont = $cont + 1;
								$id = $aDatos["ID_USUARIO"];
								$nombre = $aDatos["NOMBRE"];
								$clave = $aDatos["CLAVE"];
								$email = $aDatos["EMAIL"];
								echo	"<tr>
											<td>$cont</td>
											<td>
												<input type='text' name='id' value='$id' onClick='this.select()'>
											</td>
											<td>
												<input type='text' name='nombre' value='$nombre' onClick='this.select()'>
											</td>
											<td>
												<input type='text' name='clave' value='$clave' onClick='this.select()'>
											</td>
											<td>
												<input type='text' name='email' value='$email' onClick='this.select()'>
											</td>
											<td>
												<input type='submit' name='accion' class='btn btn-primary' value='Guardar'>
							 					<input type='submit' name='accion' class='btn btn-danger' value='Eliminar'>
											</td>
										</tr>";
							}
						?>
					</table>
				</div>
			</form><br><br>

			<?php
				if(isset($_POST["cerrar"])) {
					session_destroy();
					header("Location:index.php");
				}

				if(isset($_POST['accion'])) {
				 	$accion = $_REQUEST['accion'];
				 	$id = $_REQUEST["id"];
				 	$nombre = $_REQUEST['nombre'];
				 	$clave = $_REQUEST['clave'];
				 	$email = $_REQUEST['email'];
				 	if($accion=="Eliminar") {
				 		$sql = "DELETE FROM usuarios WHERE ID_USUARIO=$id";
				 		if (mysqli_query($mysqli, $sql)) echo "<script> alert('Usuario Eliminado') </script>";
				 		else echo "<script> alert('¡ERROR! No se pudo ejecutar la acción) </script>";
				 	}
				 	if($accion=="Guardar") {
				 		$sql = "UPDATE usuarios SET NOMBRE='$nombre', CLAVE='$clave', EMAIL='$email' WHERE ID_USUARIO=$id";
				 		if (mysqli_query($mysqli, $sql)) echo "<script> alert('Cambios Guardados') </script>";
				 		else echo "<script> alert('¡ERROR! No se pudo ejecutar la acción) </script>";
				 	}
				 	mysqli_close($mysqli);
			 	}

			 	if(isset($_POST["actualizar"])) {
			 		header("Location:gestionar.php");
			 	}

			 	if(isset($_POST["agregar"])) {
			 		header("Location:registrar.php");
			 	}
			?>
		</div>
	</div></center>
</body>
</html>