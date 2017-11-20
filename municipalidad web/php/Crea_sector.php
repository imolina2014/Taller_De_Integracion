<?php
	include("conex.php");

	$usuario=$_POST["usuario"];
	$nombre=$_POST["nombre"];
	$tipo=$_POST["tipo"];
	$pos1=$_POST["pos1"];
	$pos2=$_POST["pos2"];
	$pos3=$_POST["pos3"];
	$pos4=$_POST["pos4"]; 

	$sql="SELECT id_usuario FROM USUARIOS WHERE NOMBRE='$usuario'";
	$id_dueño=mysqli_fetch_row(mysqli_query($mysqli, $sql))[0];
	
	$sql="INSERT INTO SECTORES(ID_DUEÑO,NOMBRE,TIPO,POS1,POS2,POS3,POS4) VALUES('$id_dueño','$nombre','$tipo','$pos1','$pos2','$pos3','$pos4')";
	if(mysqli_query($mysqli,$sql)){
		echo"<script>alert('El sector ha sido creado exitosamente!')</script>";
	}
	else{
		echo"<script>alert('Ha ocurrido un error')</script>";
	}
?>