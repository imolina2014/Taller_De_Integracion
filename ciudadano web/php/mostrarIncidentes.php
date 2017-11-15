<script>
	function initMap(latitud,longitud,bandera) {
		var uluru = {lat: latitud, lng: longitud};
	    var map = new google.maps.Map(document.getElementById('map'), {
	    	zoom: 16,
	    	center: uluru
	    });

	    if(bandera==1){
		    var marker = new google.maps.Marker({
		    	position: uluru,
		    	map: map
		    });
		}
	}

	initMap(-38.7396500,-72.5984200,0);
</script>

<?php
	include("conex.php");
	$calle=$_POST["Calle"];
	$categoria = $_POST["Categoria"];
	$tipo = $_POST["Tipo"];
	$fecha=$_POST["Fecha"];
    
    
    if ($calle==""){
    	if($fecha=="null"){
    		$sql = "SELECT ID,CATEGORIA,TIPO,DESCRIPCION,FECHA,CALLE,AsText(COORDENADAS) FROM incidentes WHERE CATEGORIA='$categoria' AND TIPO='$tipo'";
    	}
    	else{
    		$sql = "SELECT ID,CATEGORIA,TIPO,DESCRIPCION,FECHA,CALLE,AsText(COORDENADAS) FROM incidentes WHERE CATEGORIA='$categoria' AND TIPO='$tipo' AND FECHA='$fecha'";
    	}
    }
    
	else{
		if($fecha=="null"){
			$sql = "SELECT ID,CATEGORIA,TIPO,DESCRIPCION,FECHA,CALLE,AsText(COORDENADAS) FROM incidentes WHERE CATEGORIA='$categoria' AND TIPO='$tipo' AND CALLE LIKE '%$calle%'";
		}
		else{
			$sql = "SELECT ID,CATEGORIA,TIPO,DESCRIPCION,FECHA,CALLE,AsText(COORDENADAS) FROM incidentes WHERE CATEGORIA='$categoria' AND TIPO='$tipo' AND CALLE LIKE '%$calle%' AND FECHA='$fecha'";
		}
	}

	
	$resultado = mysqli_query($mysqli,$sql);
    $nfilas = mysqli_num_rows($resultado);
	
	if($nfilas > 0){
		echo " 
			<div class='jumbotron' style='margin-top:30px;background-color:#337ab7'>
			<div class='row'>
                <div class='col-md-6' style='overflow: scroll; overflow-x:hidden; height:400px;border-style: double; border-color:black;background-color:white'>
                    <table class='table table-bordered' style='width:100%;'>
    				    <thead class='thead-inverse'>
            			    <tr>
            				    <th>CODIGO</th>
            				    <th>TIPO</th>
            				    <th>FECHA</th>
            				    <th>UBICACIÓN</th>
            				</tr>
            			</thead>";
						
		while($aDatos = mysqli_fetch_array($resultado)) {
			echo "  <tr>    
	                    <td>$aDatos[0]</td>
						<td><img src='img/icons/$aDatos[2].png' id='G_iconos' width=30 heigth=30></td>
						<td>$aDatos[4]</td>";
			
			$CoorSep = $aDatos[6];
        	$CoorSep = explode(" ", $CoorSep);
        	$CoorSep[0]= explode("(", $CoorSep[0]);
        	$CoorSep[1]= explode(")", $CoorSep[1]);
        	$lat = $CoorSep[0][1];
        	$lon = $CoorSep[1][0];

            echo "<td><input type='button' value='Ver Mapa' onclick='initMap($lat,$lon,1)' width='50' height='50' class='btn btn-primary'></td>
			     </tr>";
		}
		echo  "</table>
			    </div>
			    <div class='col-md-6' id='map' style='border-style: double; border-color:black; height:400px'></div>
            </div></div>";
	}
  
	else {
	    echo "<script> alert('No se encontraron datos'); 
	    document.getElementById('Graficos').style.display='';</script>";
	}
?>
