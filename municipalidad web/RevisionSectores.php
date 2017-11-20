<?php
include("../conex.php");
session_start();
	if (!isset($_SESSION['usuario'])){
		header("Location: login.php");
	}
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
	<meta http-equiv='X-UA-Compatible' content='IE-edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Municipalidad & Carabineros</title>
	<script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
	<script type='text/javascript' src='js/index.js'></script>
	<link rel='stylesheet'  href='css/bootstrap.css'>
	<link rel='stylesheet'  href='css/style.css'>
	<link rel='stylesheet'  href='css/style_nav.css'>
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 450px; /*ALTO*/
        width: 940px;  /*ANCHO*/
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        background-color: #fff;
        border: 1px solid #999;
        left: 25%;
        padding: 5px;
        position: absolute;
        top: 10px;
        z-index: 5;
      }
    </style>
</head>

<body  style='background-color: #e3f2fd;'>
	<div class='container'>
		<div class="topnav" id="myTopnav">
		  <a href="index.php">SISTEMA DE INGRESO DE INCIDENTES</a>
		  <a href='incidentes.php'>Incidentes</a>
		  <a href='Estadisticas.php'>Estadisticas</a>
		  <a href='CreacionSectores.php'>Creacion Sectores</a>
		  <a href='RevisionSectores.php' style='color:black; background-color:white;' >Revision Sectores</a>
		  <a href='login.php'>Salir  <?php echo $_SESSION['usuario']?></a>
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
		<div class='main' style="margin-top: 100px;">
			<center>
				<select class='selectpicker show-menu-arrow' id="sector">
					<option style='background: #5cb85c; color: #fff;' value="nada" >Seleccione sector</option>
					<?php
						$id_usuario = $_SESSION['id_usuario'];
						$sql = "SELECT AsText(POS1), AsText(POS2), AsText(POS3), AsText(POS4), NOMBRE,DESCRIPCION FROM sectores WHERE ID_DUENO='$id_usuario'";
						$consulta = mysqli_query($mysqli,$sql);
						if(mysqli_num_rows($consulta)>0){
							while ($Datos = mysqli_fetch_array($consulta)) {

								//deshuesamos las posiciones de los sectores y pasamos por value
								$p1     = $Datos['AsText(POS1)'];
								$p11    = explode(" ", $p1);
								$p11[0] = explode("(", $p11[0]);
								$p11[1] = explode(")", $p11[1]);
								$p111   = $p11[0][1]." ".$p11[1][0];

								$p2  = $Datos['AsText(POS2)'];
								$p22    = explode(" ", $p2);
								$p22[0] = explode("(", $p22[0]);
								$p22[1] = explode(")", $p22[1]);
								$p222   = $p22[0][1]." ".$p22[1][0];

								$p3  = $Datos['AsText(POS3)'];
								$p33    = explode(" ", $p3);
								$p33[0] = explode("(", $p33[0]);
								$p33[1] = explode(")", $p33[1]);
								$p333   = $p33[0][1]." ".$p33[1][0];

								$p4  = $Datos['AsText(POS4)'];
								$p44    = explode(" ", $p4);
								$p44[0] = explode("(", $p44[0]);
								$p44[1] = explode(")", $p44[1]);
								$p444   = $p44[0][1]." ".$p44[1][0];	

								$nombre_sector = $Datos['NOMBRE'];
								$posiciones    = $p111 ."/". $p222 ."/". $p333 ."/". $p444;
								echo "<option style='background: #5cb85c; color: #fff;' value='$posiciones'>$nombre_sector</option>";
							}
						}
						else{
							echo "<option style='background: #5cb85c; color: #fff;'>No tiene sectores creados</option>";		
						}
					?>
					
					
				</select>
				<select id="Tipo">
								<option selected value="Seleccionar" value="nada">Seleccionar Tipo</option>
								<option value="Delito">Delitos</option>
								<option value="Accidente">Accidentes</option>
					</select>
				<div>
			      	<button class="btn btn-default" onclick="changeRadius()">Cambiar Radio</button>
			      	<button class="btn btn-default" onclick="changeOpacity()">Cambiar Opacidad</button>
					<button class="btn btn-default" onclick="traecoordenadas()">Filtrar</button>
			      	<button class='btn btn-primary' onclick="initMap()" disabled="true" id="iniciar">INICIAR</button>
	    		</div>

	    		<div id="map"></div>
			    <script>

			      // This example requires the Visualization library. Include the libraries=visualization
			      // parameter when you first load the API. For example:
			      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">
			      var map, heatmap,posiciones=[];
			      var ayuda = 0;

			      function initMap() {
			        map = new google.maps.Map(document.getElementById('map'), {
			          zoom: 12,
			          center: {lat: -38.7369692, lng: -72.5907075},
			          mapTypeId: 'satellite'
			        });

			        heatmap = new google.maps.visualization.HeatmapLayer({
			          data: getPoints(),
			          map: map
			        });
			        if (ayuda > 0){traedatos();}
			        ayuda = ayuda + 1;
			      }

			      function traedatos(){
			      	var coordenadas = document.getElementById("sector").value;
			      	var Tipo        = document.getElementById("Tipo").value;
			      	var datos={"Coordenadas":coordenadas, "Tipo":Tipo};
			        $.ajax({
			          data:  datos,
			          type: "POST",
			          url: "php/obtencioncoordenadas2.php",
			          success: function (d) {
			          	//para cambiar la coordenada a calle
			          	var geocoder = new google.maps.Geocoder();
			            var datos = d.split("/");
			            var tabla = "<div class='tabla_sectores '><table class='table'><thead class='thead-inverse'><tr><th>#</th><th>Calle</th><th>Descripcion</th><th>Fecha</th><th>Categoria</th><th>Tipo</th></tr></thead><tbody >";
			            //POSICION - DESCRIPCION - FECHA - CATEGORIA - TIPO
			            for (var i = 0; i < datos.length - 1; i++) {
			            	info = datos[i].split("+");
			            	n    = i + 1;
			            	tabla = tabla + "<tr> <th scope='row'>"+n+"</th> <td>"+info[0]+"</td> <td>"+info[1]+"</td> <td>"+info[2]+"</td> <td>"+info[3]+"</td> <td>"+info[4]+"</td></tr>";
			            }
			            tabla = tabla + "</tbody></table>";
			        	document.getElementById('tablaa').innerHTML = tabla; 
			          }
			        }); 
			      }
			       function changeRadius() {
			        heatmap.set('radius', heatmap.get('radius') ? null : 20);
			      }

			      function changeOpacity() {
			        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
			      }

			      function traecoordenadas(){
			      	var Tipo        = document.getElementById("Tipo").value;
			      	var coordenadas = document.getElementById("sector").value;
			      	if(coordenadas == "nada"){
			      		alert("Debe Seleccionar un sector");
			      		return;
			      	}
			      	if(Tipo == "Seleccionar"){
			      		alert("Debe Seleccionar un tipo");
			      		return;
			      	}

			      	//Habilitamos el boton para inicar mapa calor
			      	document.getElementById('iniciar').disabled=false;

			      	//se debe agregar las coordenadas para hacer la filtracion correspondiente
			        var datos={"Tipo":Tipo, "Coordenadas":coordenadas};
			        $.ajax({
			          data:  datos,
			          type: "POST",
			          url: "php/obtencioncoordenadas.php",
			          success: function (d) {
			            var datos = d.split("/");
			            for (var i = datos.length - 2; i >= 0; i--) {
			              datos[i] = datos[i].split(" ");
			              posiciones.push(new google.maps.LatLng(datos[i][0],datos[i][1]));
			              
			            }
			            console.log("PRIMERO->"+posiciones[0]);
			            return posiciones;
			          }
			        }); 
			      }

			      // Heatmap data: 500 Points
			      function getPoints() {
			        console.log("SEGUNDO>"+posiciones.length);
			        return posiciones;
			      }
			    </script>
			    <script async defer
			        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBav05DiXZtDaYqSyCym2ulb75b0ST3dPA&libraries=visualization&callback=initMap">
			    </script>
				</div>
			</center>	
			<div class='mapa'></div>
				<div class='tabla_sectores '>
					<table class='table' id="tablaa">
					 	<thead class='thead-inverse'>
						    <tr>
						    	<th>#</th>
						     	<th>Calle</th>
						     	<th>Descripcion</th>
						     	<th>Fecha</th>
						     	<th>Categoria</th>
						     	<th>Tipo</th>
						    </tr>
						</thead>
						<tbody >
						    <tr>
						     	<th scope='row'>1</th>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						    </tr>
						    <tr>
						     	<th scope='row'>2</th>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						    </tr>
						    <tr>
						     	<th scope='row'>3</th>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						    </tr>
						    <tr>
						     	<th scope='row'>4</th>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						    </tr>
						    <tr>
						     	<th scope='row'>5</th>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						     	<td>###</td>
						    </tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</body>
</html>
