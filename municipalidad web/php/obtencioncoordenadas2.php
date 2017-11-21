<?php
	include("conex.php");
	$var         = $_POST['Tipo'];
	$posiciones  = $_POST['Coordenadas'];
	$posiciones2 = explode("/", $posiciones);
	$pos1 = $posiciones2[0];
	$pos2 = $posiciones2[1];
	$pos3 = $posiciones2[2]; 
	$pos4 = $posiciones2[3];

	//$query = "SELECT AsText(coordenadas) FROM incidentes where CATEGORIA='$var'";
	$query = "SELECT CALLE, DESCRIPCION, FECHA, CATEGORIA, TIPO FROM incidentes WHERE ST_Contains(GeomFromText('Polygon(($pos1,$pos2,$pos3,$pos4, $pos1))'),COORDENADAS) and CATEGORIA = '$var'";
	$resultado=$mysqli->query($query);
	while ($rows = $resultado->fetch_assoc()) {
			echo utf8_encode($rows["CALLE"])."+".utf8_encode($rows["DESCRIPCION"])."+".$rows["FECHA"]."+".$rows["CATEGORIA"]."+".$rows["TIPO"]."/";

	}
?>

