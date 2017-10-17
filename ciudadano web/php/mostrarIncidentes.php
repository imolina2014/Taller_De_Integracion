<?php
	include("conex.php");
	$categoria = $_POST["Categoria"];
	$tipo = $_POST["Tipo"];

	$sql = "SELECT CATEGORIA,TIPO,DESCRIPCION,FECHA,CALLE,AsText(COORDENADAS) FROM incidentes WHERE CATEGORIA='$categoria' AND TIPO='$tipo'";	
	$resultado = mysqli_query($mysqli,$sql);

    echo "	<table class='table' style='width=100%'>
				<thead class='thead-inverse'>
				    <tr>
				      	<th>#</th>
				      	<th>CATEGORÍA</th>
				      	<th>TIPO</th>
				      	<th>DESCRIPCIÓN</th>
				      	<th>FECHA</th>
				      	<th>CALLE</th>
				      	<th>UBICACIÓN</th>
				    </tr>
				 </thead>
				 <tbody>";
	$nfilas = mysqli_num_rows($resultado);
	
	if($nfilas > 0){
	    $count = 1;
		while($aDatos = mysqli_fetch_array($resultado)) {
			echo "  <tr>    
	                    <th scope='row'>$count</th>
	                    <td>$aDatos[0]</td>
						<td>$aDatos[1]</td>
						<td>$aDatos[2]</td>
						<td>$aDatos[3]</td>
						<td>$aDatos[4]</td>
			     ";
			$CoorSep = $aDatos[5];
        	$CoorSep = explode(" ", $CoorSep);
        	$CoorSep[0]= explode("(", $CoorSep[0]);
        	$CoorSep[1]= explode(")", $CoorSep[1]);
        	$lat = $CoorSep[0][1];
        	$lon = $CoorSep[1][0];
				echo "	<td><input type='button' class='btn btn-success' value='Ver Mapa' onclick='initMap($lat,$lon)'></td>
					</tr>";
				echo "  <script>
        				    function initMap(latitud,longitud) {
                                var uluru = {lat: latitud, lng: longitud};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: 4,
                                  center: uluru
                                });
                                var marker = new google.maps.Marker({
                                  position: uluru,
                                  map: map
                                });
                            }
        				</script>";
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