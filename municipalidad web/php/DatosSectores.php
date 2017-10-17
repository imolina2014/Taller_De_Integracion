<?php
	include("conex.php");
	$categoria = $_POST["Categoria"];
	$tipo = $_POST["Tipo"];

	$sql = "SELECT * FROM sectores";	
	$resultado = mysqli_query($mysqli,$sql);

    echo "	<table class='table' style='width=100%'>
				<thead class='thead-inverse'>
				    <tr>
				      	<th>#</th>
				      	<th>USUARIO</th>
				      	<th>POSICION #1</th>
				      	<th>POSICION #2</th>
				      	<th>POSICION #3</th>
				      	<th>POSICION #4</th>
				    </tr>
				 </thead>
				 <tbody>";
	$nfilas = mysqli_num_rows($resultado);
	if($nfilas > 0){
	    $count = 1;
		while($aDatos = mysqli_fetch_array($resultado)) {
			echo "  <tr>    
	                    <th scope='row'>$count</th>
	                    <td>$aDatos[4]</td>
						<td>$aDatos[5]</td>
						<td>$aDatos[1]</td>
						<td>$aDatos[3]</td>
						<td>$aDatos[7]</td>
					</tr>";
			$count = $count + 1;
		}
		echo  " </tbody>
			</table>
		";
	}
	else {
	    echo "<script> alert('No se encontraron datos') </script>";
	}
?>