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
</body>
</html>

<?php
//session_start();
//session_destroy();
header("Content-Type: text/html; charset=UTF-8");
if(isset($_REQUEST["ingresar"])) {
	$conexion = mysqli_connect("localhost", "id2847271_imolina","12345", "id2847271_imolina");

    $FRMusuario = mysqli_real_escape_string( $conexion, substr( $_POST["username"], 0, 10) );
    $FRMclave   = mysqli_real_escape_string( $conexion, $_POST["password"] );


    $sql = sprintf("SELECT * FROM usuarios WHERE NOMBRE='%s' AND CONTRASEÑA='%s'", $FRMusuario, $FRMclave);
    $consulta = mysqli_query($conexion,$sql);

    if ($consulta->num_rows>0){
        //session_start();
       // $registro = mysqli_fetch_array($consulta);
	   	//$_SESSION['usuario']=$registro["NOMBRE"];
		header('Location:index.html');
	}
	else echo '<script>alert("Error!, accion NO realizada.")</script>';

}
?>