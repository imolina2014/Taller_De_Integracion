<?php
	/*include("./conex.php");
	include("funciones.php");

	$errores = array();

	if(!empty($_POST)) {
		$email = $mysqli->real_escape_string($_POST["email"]);
		//valida si es email
		if(!isEmail($email)) {
			$errores[] = "Debe ingresar un correo electronico valido";
			if(emailExiste($email)) {
				$user_id = getValor('ID_USUARIO','EMAIL');
			}
		}
	}*/
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
			<form action="recuperar.php" method="POST" name="form">
				<div>
					<center><h2>RECUPERAR CONTRASEÑA</h2></center>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input id="email" class="form-control" type="email" name="email" placeholder="Email" autofocus="" required="">
				</div><br>
				<center><input id="btn-login" type="submit" class="btn btn-success" name="login" value="Enviar"></center>
				<div class="input-text"><h6><center><a href="index.php" id="recover-pass">Iniciar Sesión</a></center></h6></div>
			</form>
		</div>
	</div></center>
</body>
</html>