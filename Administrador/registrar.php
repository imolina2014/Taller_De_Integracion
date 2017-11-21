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
		<div class="jumbotron" style="margin-top: 50px; width: 700px;">
			<form action="registrar.php" method="POST" name="form">
				<div>
					<center><h2>REGISTRO DE USUARIOS</h2></center>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input class="form-control" type="text" name="FRMnombre" placeholder="Nombre" autofocus="" required="">
				</div><br>
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-lock"></span>
					</span>
					<input class="form-control" type="password" name="FRMclave" placeholder="Clave" required="">
				</div><br>
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input class="form-control" type="email" name="FRMemail" placeholder="Email" required="" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
				</div><br>
				<center>
					<input type="submit" class="btn btn-primary" name="guardar" value="Registrar Usuario">
				</center>
				<div class="input-text"><h6><center><a href="crud.php" id="recover-pass">Ver Usuarios</a></center></h6></div>
				<div class="input-text"><h6><center><a href="index.php" id="recover-pass">Cerrar Sesión</a></center></h6></div>
			</form>
			<?php
				if(isset($_POST["guardar"])) {
					$nombre = $_POST["FRMnombre"];
					$clave = $_POST["FRMclave"];
					$email = $_POST["FRMemail"];
					$sql = "INSERT INTO usuarios(NOMBRE,CLAVE,EMAIL,CARGO) VALUES('$nombre','$clave','$email','Usuario Sistema')";
					if(mysqli_query($mysqli,$sql)) {
						echo "<script> alert('Usuario Registrado'); </script>";
					}
					else {
						echo "<script> alert('Error al registrar usuario'); </script>";
					}
				}
			?>
		</div>
	</div></center>
</body>
</html>