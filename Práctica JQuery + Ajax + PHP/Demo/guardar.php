<?php

$con = mysqli_connect("localhost","root","","ejemplo");
$nom = $_POST["Nombre"];
$edad = $_POST["Edad"];

if($nom != "" && $edad != "") {
	$sql = "INSERT INTO usuarios(nombre,edad) VALUES('$nom','$edad')";
	mysqli_query($con,$sql);
	echo "Se han registrado los datos";
}
else {
	echo "Complete los datos";
}
?>