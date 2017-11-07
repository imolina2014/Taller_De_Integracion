<?php
	session_start(); 
	//include("./conex.php");
	$conexion = mysqli_connect("localhost", "root", "", "id2847271_imolina");
	if(isset($_POST["login"])) {
		$usuario = addslashes($_POST["FRMusuario"]);
		$clave = addslashes($_POST["FRMclave"]);
		$sql = "SELECT * FROM usuarios WHERE NOMBRE='$usuario' AND CLAVE='$clave'";
		$consulta = mysqli_query($conexion, $sql);
		$nfilas = mysqli_num_rows($consulta);
		$aDatos = mysqli_fetch_array($consulta);
		if($nfilas > 0){
			$_SESSION["usr"] = $usuario;
			$cargo = $aDatos["CARGO"];
			if($cargo=="Administrador") {
				$_SESSION["car"] = $cargo;
				header("Location:crud.php");
			}
			else {
				echo"<script> alert('No autorizado'); </script>";
				echo "<form action='index.php' method='post'>";
			}
		}
		else {
			echo"<script> alert('Crendenciales erróneas o no encontradas'); </script>";
			echo "<form action='index.php' method='post'>";
		}
	}
	else {
		session_destroy();
	}
	mysqli_close($conexion);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<center><div class="container">
		<div class="jumbotron" style="margin-top: 50px; width: 700px;">
			<form method="POST" name="form">
				<div>
					<center><h1>ADMINISTRADOR</h1></center>
					<center><h2>INICIAR SESIÓN</h2></center>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input class="form-control" type="text" name="FRMusuario" placeholder="Usuario" autofocus="" required="">
				</div><br>
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-lock"></span>
					</span>
					<input class="form-control" type="password" name="FRMclave" placeholder="Clave" required="">
				</div><br>
				<center><input type="submit" class="btn btn-success" name="login" value="Ingresar al sistema"></center>
				<div class="input-text"><h6><center><a href="recuperar.php" id="recover-pass">Olvidé mi contraseña</a></center></h6></div>
			</form>
		</div>
	</div></center>	
</body>
</html>