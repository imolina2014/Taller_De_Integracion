<?php
	include("conex.php");
	$accidentes=['Colision vehicular','Choque multiple','Incendio','Derrumbes','Atropello de peatones','Otro'];
	
	$cons=["","","","","",""];
	for($i=0;$i<6;$i++){
		$cons[$i]="SELECT count(*) FROM incidentes WHERE CATEGORIA='Accidente' AND TIPO='$accidentes[$i]'";
	}

	$query=["","","","","",""];
	for ($i=0;$i<6;$i++){
		$query[$i]=mysqli_query($mysqli,$cons[$i]);
	}
	
	$n_accidentes=[0,0,0,0,0,0];
	for ($i=0;$i<6;$i++){
		$n_accidentes[$i]=mysqli_fetch_row($query[$i])[0];
	}
	
	echo json_encode($n_accidentes);
?>
