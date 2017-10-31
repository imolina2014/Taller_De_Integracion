<?php
	include("conex.php");
	$calle=$_POST["Calle"];
	$categoria = $_POST["Categoria"];
	$tipo = $_POST["Tipo"];
	$fecha=$_POST["Fecha"];
    
    
    if ($calle=="")$sql = "SELECT CATEGORIA,TIPO,DESCRIPCION,FECHA,CALLE,AsText(COORDENADAS) FROM incidentes WHERE CATEGORIA='$categoria' AND TIPO='$tipo' AND FECHA='$fecha'";
    
	else $sql = "SELECT CATEGORIA,TIPO,DESCRIPCION,FECHA,CALLE,AsText(COORDENADAS) FROM incidentes WHERE CATEGORIA='$categoria' AND TIPO='$tipo' AND FECHA='$fecha' AND CALLE LIKE '%$calle%'";
	
	$resultado = mysqli_query($mysqli,$sql);
    $nfilas = mysqli_num_rows($resultado);
	
	if($nfilas > 0){
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
						
	    $count = 1;
		while($aDatos = mysqli_fetch_array($resultado)) {
			echo "  <tr>    
	                    <th scope='row'>$count</th>
						<td><img src='img/icons/$aDatos[1].png' id='G_iconos'></td>
						<td>$aDatos[3]</td>";
			$CoorSep = $aDatos[5];
        	$CoorSep = explode(" ", $CoorSep);
        	$CoorSep[0]= explode("(", $CoorSep[0]);
        	$CoorSep[1]= explode(")", $CoorSep[1]);
        	$lat = $CoorSep[0][1];
        	$lon = $CoorSep[1][0];
            echo "<td><input type='button' value='Ver Mapa' onclick='initMap($lat,$lon)' width='50' height='50' class='btn btn-primary'></td>
			     </tr>";
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
		include("Incidentes.php");
	}
?>
