<?php
	include("conex.php");
	$calle=$_POST["Calle"];
	$categoria = $_POST["Categoria"];
	$tipo = $_POST["Tipo"];
	$fecha=$_POST["Fecha"];
    
    
    if ($calle=="")$sql = "SELECT CATEGORIA,TIPO,DESCRIPCION,FECHA,CALLE,AsText(COORDENADAS) FROM incidentes WHERE CATEGORIA='$categoria' AND TIPO='$tipo' AND FECHA='$fecha'";
    
	else $sql = "SELECT CATEGORIA,TIPO,DESCRIPCION,FECHA,CALLE,AsText(COORDENADAS) FROM incidentes WHERE CATEGORIA='$categoria' AND TIPO='$tipo' AND FECHA='$fecha' AND CALLE LIKE '%$calle%'";
	
	$resultado = mysqli_query($mysqli,$sql);
    
    echo "  <div class='row'>
                <div class='col-md-6' style='border-radius: 2px; border: 2px solid #73AD21; overflow: scroll;'>
                    <table class='table' style='width=100%'>
    				    <thead class='thead-inverse'>
            			    <tr>
            				    <th>#</th>
            				    <th>TIPO</th>
            				    <th>FECHA</th>
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
						<td>$aDatos[1]</td>
						<td>$aDatos[3]</td>";
			$CoorSep = $aDatos[5];
        	$CoorSep = explode(" ", $CoorSep);
        	$CoorSep[0]= explode("(", $CoorSep[0]);
        	$CoorSep[1]= explode(")", $CoorSep[1]);
        	$lat = $CoorSep[0][1];
        	$lon = $CoorSep[1][0];
            echo "	    <td><input type='image' src='./img/maps.png' onclick='initMap($lat,$lon)' width='50' height='50'></td>
			        </tr>";
				echo "  <script>
        				    function initMap(latitud,longitud) {
                                var uluru = {lat: latitud, lng: longitud};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: 16,
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
		echo  "         </tbody>
			        </table>
			    </div>
			    <div class='col-md-6' id='map' style='border-radius: 2px; border: 2px solid #73AD21;'><br>
			        <img src='./img/maps.png' width='500' height='400'>
			    </div>
            </div>";
	}
    
	else {
	    echo "<script> alert('No se encontraron datos') </script>";
	}

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
            				        <th>TIPO</th>
            				        <th>FECHA</th>
            				        <th>CALLE</th>
            				    </tr>
		";
	    while($aDatos = mysqli_fetch_array($resultado)) {
			echo"<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
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
