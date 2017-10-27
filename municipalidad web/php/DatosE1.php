<?php
	include("conex.php");

	$año = $_POST["año"];

	$enero = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=1"));
	$febrero = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=2"));
	$marzo = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=3"));
	$abril = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=4"));
	$mayo = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=5"));
	$junio = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=6"));
	$julio = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=7"));
	$agosto = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=8"));
	$septiembre = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=9"));
	$octubre = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=10"));
	$noviembre = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=11"));
	$diciembre = mysqli_fetch_array(mysqli_query("SELECT count(TIPO) AS c FROM incidentes WHERE YEAR(FECHA)='$año' AND MONTH(FECHA)=12"));

	$data = array(0 => $enero['c'],
				  1 => $febrero['c'],
				  2 => $marzo['c'],
				  3 => $abril['c'],
				  4 => $mayo['c'],
				  5 => $junio['c'],
				  6 => $julio['c'],
				  7 => $agosto['c'],
				  8 => $septiembre['c'],
				  9 => $octubre['c'],
				  10 => $noviembre['c'],
				  11 => $diciembre['c']	
				);
	echo json_encode($data);
?>