<?php
	include("conex.php");

	$usuario   = $_POST["usuario"];
	$nombre    = $_POST["nombre"];
	$tipo      = $_POST["tipo"];
	$pos1      = $_POST["pos1"];
	$pos11     = explode(",", $pos1);
	$pos111    = $pos11[0]." ".$pos11[1];

	$pos2      = $_POST["pos2"];
	$pos22     = explode(",", $pos2);
	$pos222    = $pos22[0]." ".$pos22[1];

	$pos3      = $_POST["pos3"];
	$pos33     = explode(",", $pos3);
	$pos333    = $pos33[0]." ".$pos33[1];

	$pos4      = $_POST["pos4"];
	$pos44     = explode(",", $pos4);
	$pos444    = $pos44[0]." ".$pos44[1]; 

	$sql="SELECT id_usuario FROM USUARIOS WHERE NOMBRE='$usuario'";
	$id_dueño=mysqli_fetch_row(mysqli_query($mysqli, $sql))[0];
	
	$sql="INSERT INTO SECTORES(ID_DUENO,NOMBRE,TIPO,POS1,POS2,POS3,POS4) VALUES('$id_dueño','$nombre','$tipo',
	GeomFromText('POINT($pos111)'),GeomFromText('POINT($pos222)'),GeomFromText('POINT($pos333)'),GeomFromText('POINT($pos444)'))";
	if(mysqli_query($mysqli,$sql)){
		echo"<script>alert('El sector ha sido creado exitosamente!')</script>";
	}
	else{
		echo"<script>alert('$pos111')</script>";
		//echo"<script>alert('Ha ocurrido un error')</script>";
	}
?>