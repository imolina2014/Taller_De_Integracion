<?php
	$nombre=$_POST["Nombre"];
	$email=$_POST["Email"];
	$asunto=$_POST["Asunto"];
	$comentario=$_POST["Comentario"];
	//armaremos el texto.
	$texto = "Nombre: ".$nombre."   Correo: ".$email. " \n".$comentario;

	echo"<script>alert('$texto')</script>";

	//if(mail("priffo2014@alu.uct.cl","asuntillo","Este es el cuerpo del mensaje")){
	if(mail("priffo2014@alu.uct.cl",$asunto,$texto)){

		echo"<script>alert('En un momento recibirá un mensaje!')</script>";
	}
	else{
		echo"<script>alert('Ha ocurrido un error inesperadoooo')</script>";
	}
	
?>