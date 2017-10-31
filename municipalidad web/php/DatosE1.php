<?php
	include("conex.php");

	$sqlAc = "SELECT COUNT(CATEGORIA) FROM incidentes WHERE CATEGORIA='Accidente'";
	$sqlDe = "SELECT COUNT(CATEGORIA) FROM incidentes WHERE CATEGORIA='Delito'";
	$queryAc = mysqli_query($mysqli,$sqlAc);
	$queryDe = mysqli_query($mysqli,$sqlDe);
	$datosAc = mysqli_fetch_array($queryAc);
	$datosDe = mysqli_fetch_array($queryDe);
	$aDatos = array(0 => $datosAc[0],
					1 => $datosDe[0] 
				);
	echo json_encode($aDatos);
?>