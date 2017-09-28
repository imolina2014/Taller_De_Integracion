<?php

$con = mysqli_connect("localhost","root","","ejemplo");

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($con,$sql);
while($data = mysqli_fetch_array($resultado)) 
{
	echo "Nombre es ".$data["nombre"]. " , Edad es ".$data["edad"]." años<br>";
}

?>