<?php
	include("conex.php");

	$sqlRv = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Robo con violencia'";
	$sqlA = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Asalto'";
	$sqlP = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Portonazo'";
	$sqlPa = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Parricidio'";
	$sqlIn = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Infanticidio'";
	$sqlSe = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Secuestro'";
	$sqlSm = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Sustraccion de menores'";
	$sqlAs = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Asesinato'";
	$sqlOt = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Otro'";

	$queryRv = mysqli_query($mysqli,$sqlRv);
	$queryA = mysqli_query($mysqli,$sqlA);
	$queryP = mysqli_query($mysqli,$sqlP);
	$queryPa = mysqli_query($mysqli,$sqlPa);
	$queryIn = mysqli_query($mysqli,$sqlIn);
	$querySe = mysqli_query($mysqli,$sqlSe);
	$querySm = mysqli_query($mysqli,$sqlSm);
	$queryAs = mysqli_query($mysqli,$sqlAs);
	$queryOt = mysqli_query($mysqli,$sqlOt);

	$datosRv = mysqli_fetch_array($queryRv);
	$datosA = mysqli_fetch_array($queryA);
	$datosP = mysqli_fetch_array($queryP);
	$datosPa = mysqli_fetch_array($queryPa);
	$datosIn = mysqli_fetch_array($queryIn);
	$datosSe = mysqli_fetch_array($querySe);
	$datosSm = mysqli_fetch_array($querySm);
	$datosAs = mysqli_fetch_array($queryAs);
	$datosOt = mysqli_fetch_array($queryOt);

	$aDatos = array(0 => $datosRv[0],
					1 => $datosA[0],
					2 => $datosP[0],
					3 => $datosPa[0],
					4 => $datosIn[0],
					5 => $datosSe[0],
					6 => $datosSm[0],
					7 => $datosAs[0], 
					8 => $datosOt[0]
				);
	echo json_encode($aDatos);
?>