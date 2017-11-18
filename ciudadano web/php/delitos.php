<?php
	include("conex.php");
	$delitos=["Robo con violencia","Asalto","Portonazo","Parricidio","Infanticidio","Secuestro","Sustraccion de menores","Asesinato","Otro"];
	
	$cons=["","","","","","","","",""];
	for($i=0;$i<9;$i++){
		$cons[$i]="SELECT count(*) FROM incidentes WHERE CATEGORIA='Delito' AND TIPO='$delitos[$i]'";
	}

	$query=["","","","","","","","",""];
	for ($i=0;$i<9;$i++){
		$query[$i]=mysqli_query($mysqli,$cons[$i]);
	}

	$n_accidentes=[0,0,0,0,0,0,0,0,0];
	for ($i=0;$i<9;$i++){
		$n_delitos[$i]=mysqli_fetch_row($query[$i])[0];
	}

	echo json_encode($n_delitos);
?>
