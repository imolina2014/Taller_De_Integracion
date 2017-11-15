<?php
	include("conex.php");

	$sql = "SELECT COUNT(CATEGORIA) FROM incidentes WHERE CATEGORIA='Delito'";
	$sqlRv = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Robo con violencia'";
	$sqlA = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Asalto'";
	$sqlP = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Portonazo'";
	$sqlPa = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Parricidio'";
	$sqlIn = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Infanticidio'";
	$sqlSe = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Secuestro'";
	$sqlSm = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Sustraccion de menores'";
	$sqlAs = "SELECT COUNT(TIPO) FROM incidentes WHERE TIPO='Asesinato'";
	$sqlOt = "SELECT COUNT(TIPO) FROM incidentes WHERE CATEGORIA='Delito' AND TIPO='Otro'";

	$queryDe = mysqli_query($mysqli,$sql);
	$queryRv = mysqli_query($mysqli,$sqlRv);
	$queryA = mysqli_query($mysqli,$sqlA);
	$queryP = mysqli_query($mysqli,$sqlP);
	$queryPa = mysqli_query($mysqli,$sqlPa);
	$queryIn = mysqli_query($mysqli,$sqlIn);
	$querySe = mysqli_query($mysqli,$sqlSe);
	$querySm = mysqli_query($mysqli,$sqlSm);
	$queryAs = mysqli_query($mysqli,$sqlAs);
	$queryOt = mysqli_query($mysqli,$sqlOt);

	$datosDe = mysqli_fetch_array($queryDe);
	$datosRv = mysqli_fetch_array($queryRv);
	$datosA = mysqli_fetch_array($queryA);
	$datosP = mysqli_fetch_array($queryP);
	$datosPa = mysqli_fetch_array($queryPa);
	$datosIn = mysqli_fetch_array($queryIn);
	$datosSe = mysqli_fetch_array($querySe);
	$datosSm = mysqli_fetch_array($querySm);
	$datosAs = mysqli_fetch_array($queryAs);
	$datosOt = mysqli_fetch_array($queryOt);

	$CantidadDelitos = $datosDe[0];
	$RoboViolencia = round($datosRv[0]*100/$CantidadDelitos,1);
	$Asalto = round($datosA[0]*100/$CantidadDelitos,1);
	$Portonazo = round($datosP[0]*100/$CantidadDelitos,1);
	$Parricidio = round($datosPa[0]*100/$CantidadDelitos,1);
	$Infanticidio = round($datosIn[0]*100/$CantidadDelitos,1);
	$Secuestro = round($datosSe[0]*100/$CantidadDelitos,1);
	$SusMenores = round($datosSm[0]*100/$CantidadDelitos,1);
	$Asesinato = round($datosAs[0]*100/$CantidadDelitos,1);
	$Otros = round($datosOt[0]*100/$CantidadDelitos,1);
	
	$aDatos = array(0 => $RoboViolencia,
					1 => $Asalto,
					2 => $Portonazo,
					3 => $Parricidio,
					4 => $Infanticidio,
					5 => $Secuestro,
					6 => $SusMenores,
					7 => $Asesinato, 
					8 => $Otros
				);
	echo json_encode($aDatos);
?>