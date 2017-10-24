<?php
	header('Content-Type: text/html; charset=UTF-8');
	include("conex.php");
	$sql="SELECT * FROM incidentes";
	$resultado=mysqli_query($mysqli,$sql);
	$nfilas=mysqli_num_rows($resultado);
				        
	if($nfilas>0){
	    echo"
	    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
	    <div class='row'>
                <div class='col-md-12'>
            	     <table class='table'>
            				<thead class='thead-inverse'>
            			        <tr>
            				        <th>#</th>
            				        <th>CATEGORÍA</th>
            				        <th>TIPO</th>
            				        <th>FECHA</th>
            				        <th>CALLE</th>
            				    </tr>
		";
	    while($aDatos = mysqli_fetch_array($resultado)) {
			echo"
				<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
			    <tr>
                <th>$aDatos[0]</th>
                <th>$aDatos[4]</th>
                <th>$aDatos[5]</th>
				<th>$aDatos[3]</th>
                <th>$aDatos[7]</th>
                </tr>";
		}
		echo'</thead></table></div></div>';
    }
?>