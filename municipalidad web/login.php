<html>
<head>
    <title>Login</title>
    <script type="text/javascript" src="js/sript_login.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.css">
    <link rel="stylesheet"  href="css/style_login.css">
</head>
<body>
    <div class="container">
    <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
                <form action="login.php" method="POST">
                    <input name="username" type="text" placeholder="Usuario">
                    <input name="password" type="password" placeholder="Clave">
                    <button class="btn btn-info btn-block login" type="submit" name="ingresar">Ingresar</button>
                </form>
            </div>
    </div>
    </div>
<?php
session_start();
session_destroy();
if(isset($_POST["ingresar"])) {
	$conexion = mysqli_connect("localhost", "id2847271_imolina","12345","id2847271_imolina");
    $usuario = $_POST["username"];
	$clave = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE NOMBRE='".$usuario."' and CONTRASEÑA='".$clave."' ";
    $consulta = mysqli_query($conexion,$sql);

    if ($consulta>=0){
    	$filaD=mysqli_fetch_array($consulta);
        session_start();
	   	$_SESSION['usuario']=$_POST['username'];
		header('Location:index.php');
	}else{ echo '<script>alert("Error!, accion NO realizada.")</script>';
    echo"<form action='login.php' method='post'>";
    }

}
?>
</body>
</html>