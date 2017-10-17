<?php
	include("conex.php"); //En ese archivo ya esta la conexion a la base de datos con usuario, pass, etc. 
	$Categoria   = $_POST['Categoria'];
	$Tipo        = $_POST['Tipo'];
	$Descripcion = $_POST['Descripcion'];
	$texto_plano = $_POST['NTelefono'];     //En esta variable hay que guardar el numero de telefono a encriptar.
	$Lat         = $_POST['Lat'];
	$Lon         = $_POST['Lon'];
	$Calle		 = $_POST['Calle'];
	$Coordenadas = "GeomFromText('POINT(".$Lat." ".$Lon.")')";
	$fp=fopen("archivos/certificado.pem","r");	//LECTURA del archivo que contiene la llave publica.
	$llave_publica = fread($fp,8192);
	fclose($fp);
	openssl_public_encrypt($texto_plano, $texto_encriptado, $llave_publica); //Encriptamos usando la llave publica.
	$fp=fopen("archivos/certificado2.pem","r");	//LECTURA del archivo que contiene la llave publica.
	$llave_publica = fread($fp,8192);
	fclose($fp);
	openssl_public_encrypt($texto_encriptado, $texto_encriptado, $llave_publica);
	$texto_encriptado = base64_encode($texto_encriptado); //Esta es la variable final a ingresar en la BD como Numero Telefono

	$sql = "INSERT INTO incidentes (DESCRIPCION, COORDENADAS, FECHA, CATEGORIA, TIPO, NRO_DENUNCIA, CALLE) VALUES ('$Descripcion',$Coordenadas,CURRENT_DATE,'$Categoria','$Tipo','$texto_encriptado','$Calle')";


	$resultado = mysqli_query($mysqli, $sql);
	mysqli_close($mysqli); 
	if($resultado) {
		echo "Exito!";
	}
	else {
		echo "Ocurrio un error inesperado. Reintente.";
	}
?>