<?php

	$texto_plano = "QUE TAL"; //En esta variable hay que guardar el numero de telefono a encriptar.





	$fp=fopen("certificado.pem","r");	//LECTURA del archivo que contiene la llave publica.
	$llave_publica = fread($fp,8192);
	fclose($fp);

	openssl_public_encrypt($texto_plano, $texto_encriptado, $llave_publica); //Encriptamos usando la llave publica ubicada en el servidor o donde este accesible.

	$texto_encriptado = base64_encode($texto_encriptado); //Esta es la variable final a ingresar en la BD.


?>