<!DOCTYPE html>
<html>
<head>
	<title>Desencriptador de datos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="design/css/style_des.css">
</head>
<body style= "background: rgb(247, 247, 247)">
<div class="container"  style= "background:white">
	<div class="container col-xs-8	 col-md-8">
		<center><h1>Portal privado de revision de delitos detallados.</h1></center>
	</div>
	<p class= "col-xs-12 col-md-12">En esta seccion usted podra buscar por numero de serie de delito los detalles del mismo, incluyendo el numero telefonico el cual realizo la denuncia.</p>
		<form class="form" action="des.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
			    <label for="exampleInputEmail1">Numero de denuncia</label>
			    <input type="number" class="form-control" name="Identificador" id="Identificador"  placeholder="Numero">
			</div>
			<div class="form-group">
			    <p class="help-block">Seleccione llave ADMINISTRADOR.</p>
			    <input type="file" id="Archivo"  name="Archivo" required="required"><br>
			    <label for="exampleInputPassword1">Contraseña unica de llave privada</label>
			    <input type="password" class="form-control" id="Pass" name="Pass"  placeholder="Contraseña primera llave">
			</div>
			<div class="form-group">
				<p class="help-block">Seleccione llave SEGUNDO A CARGO.</p>
			    <input type="file" id="Archivo2"  name="Archivo2" required="required"><br>
			    <label for="exampleInputPassword2">Contraseña unica de llave privada</label>
			    <input type="password" class="form-control" id="Pass2" name="Pass2" placeholder="Contraseña segunda llave">
			</div>
			<button type="submit" class="btn btn-primary">Desencriptar</button>
		</form>
</div>
<?php
	include("conex.php");
	if (isset($_POST['Identificador']) & isset($_POST['Pass'])){
		$var= $_POST['Identificador'];
		$pas= $_POST['Pass'];
		$pas2= $_POST['Pass2'];
		$nombre2 = $_FILES['Archivo2']['name']; 
		$tipo2 = $_FILES['Archivo2']['type']; 
		$tamano2 = $_FILES['Archivo2']['size']; 
		$tmp2 = $_FILES['Archivo2']['tmp_name']; 
		$dir2 = "archivos/$nombre2"; 
		move_uploaded_file($tmp2,"$dir2"); 
		$nombre = $_FILES['Archivo']['name']; 
		$tipo = $_FILES['Archivo']['type']; 
		$tamano = $_FILES['Archivo']['size']; 
		$tmp = $_FILES['Archivo']['tmp_name']; 
		$dir = "archivos/$nombre"; 
		move_uploaded_file($tmp,"$dir");
	    $query = "SELECT descripcion, coordenadas, fecha, tipo, categoria, nro_denuncia FROM incidentes where id=$var";
		$resultado=$mysqli->query($query);
		print("<div class='container' style= 'background:white'>");
		print("<div class='table-responsive'>
			<table class='table'>");
		print (
			"<thead>
			<tr>
				<th>Descripcion</th>
				<th>Coordenadas</th>
				<th>Fecha</th>
				<th>Tipo</th>
				<th>Categoria</th>
				<th>Identificador unico telefono</th>
			</tr>
			</th>"
		);
		while ($rows = $resultado->fetch_assoc()) {
			print("<tbody>
				<tr>");
			print("<td>".$rows["descripcion"]."</td>");
			print("<td>".$rows["coordenadas"]."</td>");
			print("<td>".$rows["fecha"]."</td>");
			print("<td>".$rows["tipo"]."</td>");
			print("<td>".$rows["categoria"]."</td>");
			$fp=fopen("archivos/$nombre","r");
			$llave_privada = fread($fp,8192);
			fclose($fp);
			$fp=fopen("archivos/$nombre2","r");
			$llave_privada2 = fread($fp,8192);
			fclose($fp);
			$texto_encriptado = $rows["nro_denuncia"];
			$texto_encriptado = base64_decode($texto_encriptado);  //Esta es la variable que debemos extraer de la base de datos.
			$res = openssl_get_privatekey($llave_privada2,$pas2);
			openssl_private_decrypt($texto_encriptado, $texto_desencriptado, $res);
			$res = openssl_get_privatekey($llave_privada,$pas);
			openssl_private_decrypt($texto_desencriptado, $texto_desencriptado, $res);
			print("<td>".$texto_desencriptado."</td>"); //AQUI HAY QUE APLICAR EL DESCIFRADO CUANDO ESTE TRMINADO.
			print("</tr>
				</tbody>");
		}
		print("</table></div>");
		print("</div>");
		$resultado->free();
		unlink($dir);
		unlink($dir2);
	}	
?>
</body>
</html>