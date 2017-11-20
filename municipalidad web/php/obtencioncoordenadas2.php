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
	$query = "SELECT AsText(coordenadas), DESCRIPCION, FECHA, CATEGORIA, TIPO FROM incidentes WHERE ST_Contains(GeomFromText('Polygon(($pos1,$pos2,$pos3,$pos4, $pos1))'),COORDENADAS) and CATEGORIA = '$var'";
	$resultado=$mysqli->query($query);
	while ($rows = $resultado->fetch_assoc()) {
			$CoorSep = $rows["AsText(coordenadas)"];
			$CoorSep = explode(" ", $CoorSep);
			$CoorSep[0]= explode("(", $CoorSep[0]);
			$CoorSep[1]= explode(")", $CoorSep[1]);
			$lat = $CoorSep[0][1];
			$lon = $CoorSep[1][0];
			echo $lat." ".$lon."+".$rows["DESCRIPCION"]."+".$rows["FECHA"]."+".$rows["CATEGORIA"]."+".$rows["TIPO"]."/";

	}
?>

