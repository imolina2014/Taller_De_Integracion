<?php
	include("conex.php");

	$sqlCv = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Colision vehicular'";
	$sqlCm = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Choque multiple'";
	$sqlIn = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Incendio'";
	$sqlDe = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Derrumbes'";
	$sqlAp = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Atropello de peatones'";
	$sqlOt = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Otro'";

	$queryCv = mysqli_query($mysqli,$sqlCv);
	$queryCm = mysqli_query($mysqli,$sqlCm);
	$queryIn = mysqli_query($mysqli,$sqlIn);
	$queryDe = mysqli_query($mysqli,$sqlDe);
	$queryAp = mysqli_query($mysqli,$sqlAp);
	$queryOt = mysqli_query($mysqli,$sqlOt);

	$datosCv = mysqli_fetch_array($queryCv);
	$datosCm = mysqli_fetch_array($queryCm);
	$datosIn = mysqli_fetch_array($queryIn);
	$datosDe = mysqli_fetch_array($queryDe);
	$datosAp = mysqli_fetch_array($queryAp);
	$datosOt = mysqli_fetch_array($queryOt);

	$aDatos = array(0 => $datosCv[0],
					1 => $datosCm[0],
					2 => $datosIn[0],
					3 => $datosDe[0],
					4 => $datosAp[0],
					5 => $datosOt[0]
				);
	echo json_encode($aDatos);
?>