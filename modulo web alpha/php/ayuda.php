<?php
	$nombre=$_POST["Nombre"];
	$email=$_POST["Email"];
	$asunto=$_POST["Asunto"];
	$comentario=$_POST["Comentario"];
	
	$mensaje="Este es un mensaje de prueba!";
	if(mail($email,$asunto,$mensaje)){
		echo"<script>alert('En un momento recibirá un mensaje!')</script>";
	}
	else{
		echo"<script>alert('Ha ocurrido un error inesperado')</script>";
	}
	
?>