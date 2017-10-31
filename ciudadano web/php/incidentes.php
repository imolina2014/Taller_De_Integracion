<?php
	include("conex.php");
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$sql="SELECT * FROM incidentes";
	$resultado=mysqli_query($mysqli,$sql);
	$nfilas=mysqli_num_rows($resultado);
				        
	if($nfilas>0){
	    echo"
	    <div class='row'>
                <div class='col-md-12'>
            	     <table class='table'>
            				<thead class='thead-inverse'>
            			        <tr>
            				        <th>#</th>
            				        <th>CATEGORÍA</th>
            				        <th><div style='margin-left:40px'>TIPO</div></th>
            				        <th>FECHA</th>
            				        <th>CALLE</th>
            				    </tr>
		";
	    while($aDatos = mysqli_fetch_array($resultado)) {
			echo"
			    <tr>
                <th>$aDatos[0]</th>
                <th>$aDatos[4]</th>
                <th><img src='img/icons/$aDatos[5].png' id='iconos'> $aDatos[5]</th>
				<th>$aDatos[3]</th>
                <th>$aDatos[7]</th>
                </tr>";
		}
		echo'</thead></table></div></div>';
    }
?>
