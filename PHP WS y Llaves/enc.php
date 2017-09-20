<?php
	include("conex.php"); //En ese archivo ya esta la conexion a la base de datos con usuario, pass, etc. 

	#En las siguientes lineas capturamos lo enviado mediante el metodo POST
	$Categoria   = $_POST['Categoria'];
	$Tipo        = $_POST['Tipo'];
	$Descripcion = $_POST['Descripcion'];
	$texto_plano = $_POST['NTelefono'];     //En esta variable hay que guardar el numero de telefono a encriptar.
	$Lat         = $_POST['Lat'];
	$Lon         = $_POST['Lon'];

	/********************** NO TOCAR **********************************/
	$fp=fopen("archivos/certificado.pem","r");	//LECTURA del archivo que contiene la llave publica.
	$llave_publica = fread($fp,8192);
	fclose($fp);
	openssl_public_encrypt($texto_plano, $texto_encriptado, $llave_publica); //Encriptamos usando la llave publica.
	$texto_encriptado = base64_encode($texto_encriptado); //Esta es la variable final a ingresar en la BD como Numero Telefono
	/********************** NO TOCAR **********************************/


	###### INGRESAR LOS DATOS CAPTURADOS MEDIANTE EL FORMULARIO (LOS CUALES SON LOS DE ARRIBA )
	###### A LA BASE DE DATOS SEGUN CORRESPONDAN LOS CAMPOS
	$resultado= $Categoria ." ". $Tipo ." ".$texto_encriptado." ". 	 $Descripcion ." ". $Lat ." ". $Lon;



//*************************************************************************************************************************
	//EL TRABAJO CON LA BASE DE DATOS SE DEBE HACER CON MYSQLI. LO IDEAL ERA PDO PERO LA BD DE LA ESCUELA NO LO SOPORTA
	//RECORDAR QUE AQUI SOLO SE EJECUTA LA CONSULTA, YA QUE LA CONEXION ESTA EN EL CONEX.PHP
//*************************************************************************************************************************


	//EL SIGUINT ECHO DEBEE LLEVAR UN MENSAJE DE "SU DENUNCIA FUE INGRESADA DE MANERA CORRECTA" 
	//SI LOS DATOS FUERON INGRESADOS DE FORMA CORRECTA
	//SI LOS DATOS NO PUDIERON SER INGRESADOS DEBE RESPONDER "LOS DATOS NO PUEDIERON SER INGRESADOS DE MANERA CORRECTA"
	echo $resultado; 

?>