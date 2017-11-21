<?php
	include("conex.php");
	
	$n_accidentes=[0,0,0,0,0,0,0,0,0,0,0,0];
	$n_delitos=[0,0,0,0,0,0,0,0,0,0,0,0];
	
	for($i=0;$i<12;$i++){
		$cons1="SELECT count(*) FROM incidentes WHERE MONTH(FECHA)=$i+1 AND CATEGORIA='Accidente'";
		$sql1=mysqli_query($mysqli,$cons1);
		$res1=mysqli_fetch_row($sql1)[0];
		
		$cons2="SELECT count(*) FROM incidentes WHERE MONTH(FECHA)=$i+1 AND CATEGORIA='Delito'";
		$sql2=mysqli_query($mysqli,$cons2);
		$res2=mysqli_fetch_row($sql2)[0];
		
		$n_accidentes[$i]=$res1;
		$n_delitos[$i]=$res2;
	}

	$incidentes=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
	for($i=0;$i<12;$i++){
		$incidentes[$i]=$n_accidentes[$i];
		$incidentes[$i+12]=$n_delitos[$i];
	}

	echo json_encode($incidentes);
?>