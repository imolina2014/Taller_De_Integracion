<?php
	include("conex.php");
	$var         = $_POST['Tipo'];
	$posiciones  = $_POST['Coordenadas'];
	$posiciones2 = explode("/", $posiciones);
	$pos1 = $posiciones2[0];
	$pos2 = $posiciones2[1];
	$pos3 = $posiciones2[2]; 
	$pos4 = $posiciones2[3];
	//$pos1 = "-38.77282106248364 -72.66287973281248";
	//$pos2 = "-38.68853718643291 -72.65189340468748";
	//$pos3 = "-38.69764800978937 -72.5220301234375";
	//$pos4 = "-38.77282106248364 -72.52271676894532";

	//$query = "SELECT AsText(coordenadas) FROM incidentes where CATEGORIA='$var'";
	$query = "SELECT AsText(coordenadas) FROM incidentes WHERE ST_Contains(GeomFromText('Polygon(($pos1,$pos2,$pos3,$pos4, $pos1))'),COORDENADAS) and CATEGORIA = '$var'";
	$resultado=$mysqli->query($query);
	while ($rows = $resultado->fetch_assoc()) {
			$CoorSep = $rows["AsText(coordenadas)"];
			$CoorSep = explode(" ", $CoorSep);
			$CoorSep[0]= explode("(", $CoorSep[0]);
			$CoorSep[1]= explode(")", $CoorSep[1]);
			$lat = $CoorSep[0][1];
			$lon = $CoorSep[1][0];
			echo $lat." ".$lon."/";

	}
?>