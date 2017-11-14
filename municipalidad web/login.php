<?php
	session_start(); 
	include("../conex.php");
	if(isset($_POST["ingresar"])) {
		$usuario = addslashes($_POST["username"]);
		$clave = addslashes($_POST["clave"]);
		$sql = "SELECT * FROM usuarios WHERE NOMBRE='$usuario' AND CLAVE='$clave'";
		$consulta = mysqli_query($mysqli,$sql);
		if(mysqli_num_rows($consulta)>0){
			$_SESSION["usuario"] = $usuario;
			header("Location:index.php");
		}
		else {
			echo"<script> alert('Crendenciales erróneas o no encontradas'); </script>";
			echo "<form action='login.php' method='post'>";
		}
	}
	else {
		session_destroy();
	}
	mysqli_close($mysqli);
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet"  href="css/bootstrap.css">
    <link rel="stylesheet"  href="css/style_login.css">
</head>
<body>
    <div class="container">
    <div class="login-container">
            <div id="output"></div>
            <div class="avatar"><img src="img/logo.png" style="height: 100px; border-radius: 50px"></div>
            <div class="form-box">
                <form action="login.php" method="POST">
                    <input name="username" type="text" placeholder="Usuario">
                    <input name="clave" type="password" placeholder="Clave">
                    <button class="btn btn-info btn-block login" type="submit" name="ingresar">Ingresar</button><br>
                    <a href="../ciudadano%20web/home.html">regresar</a>
                </form>
            </div>
    </div>
    </div>
</body>
</html>