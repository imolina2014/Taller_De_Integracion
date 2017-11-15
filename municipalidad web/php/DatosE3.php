<?php
	include("conex.php");

	$sql = "SELECT COUNT(CATEGORIA) FROM incidentes WHERE CATEGORIA='Accidente'";
	$sqlCv = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Colision vehicular'";
	$sqlCm = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Choque multiple'";
	$sqlIn = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Incendio'";
	$sqlDe = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Derrumbes'";
	$sqlAp = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Atropello de peatones'";
	$sqlOt = "SELECT COUNT(TIPO) FROM incidentes WHERE CATEGORIA='Accidente' AND TIPO='Otro'";

	$queryAc = mysqli_query($mysqli,$sql);
	$queryCv = mysqli_query($mysqli,$sqlCv);
	$queryCm = mysqli_query($mysqli,$sqlCm);
	$queryIn = mysqli_query($mysqli,$sqlIn);
	$queryDe = mysqli_query($mysqli,$sqlDe);
	$queryAp = mysqli_query($mysqli,$sqlAp);
	$queryOt = mysqli_query($mysqli,$sqlOt);

	$datosAc = mysqli_fetch_array($queryAc);
	$datosCv = mysqli_fetch_array($queryCv);
	$datosCm = mysqli_fetch_array($queryCm);
	$datosIn = mysqli_fetch_array($queryIn);
	$datosDe = mysqli_fetch_array($queryDe);
	$datosAp = mysqli_fetch_array($queryAp);
	$datosOt = mysqli_fetch_array($queryOt);

	$CantidadAccidentes = $datosAc[0];
	$ColVehicular = round($datosCv[0]*100/$CantidadAccidentes,1);
	$ChoMultiple = round($datosCm[0]*100/$CantidadAccidentes,1);
	$Incendio = round($datosIn[0]*100/$CantidadAccidentes,1);
	$Derrumbes = round($datosDe[0]*100/$CantidadAccidentes,1);
	$AtroPeatones = round($datosAp[0]*100/$CantidadAccidentes,1);
	$Otros = round($datosOt[0]*100/$CantidadAccidentes,1);

	$aDatos = array(0 => $ColVehicular,
					1 => $ChoMultiple,
					2 => $Incendio,
					3 => $Derrumbes,
					4 => $AtroPeatones,
					5 => $Otros
				);
	echo json_encode($aDatos);
?>