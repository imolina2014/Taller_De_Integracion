<?php
	include("conex.php");

	$sqlAc = "SELECT COUNT(CATEGORIA) FROM incidentes WHERE CATEGORIA='Accidente'";
	$sqlDe = "SELECT COUNT(CATEGORIA) FROM incidentes WHERE CATEGORIA='Delito'";
	$queryAc = mysqli_query($mysqli,$sqlAc);
	$queryDe = mysqli_query($mysqli,$sqlDe);
	$datosAc = mysqli_fetch_array($queryAc);
	$datosDe = mysqli_fetch_array($queryDe);

	$incidentes = $datosAc[0]+$datosDe[0];
	$accidentes = round($datosAc[0]*100/$incidentes,1); 
	$delitos = round($datosDe[0]*100/$incidentes,1);
	$aDatos = array(0 => $accidentes,
					1 => $delitos
				);
	echo json_encode($aDatos);
?>