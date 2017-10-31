<?php
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
	<script type='text/javascript' src="js/jquery-3.2.1.min.js"></script>
	<script type='text/javascript' src='js/index.js'></script>
	<link rel='stylesheet'  href='css/bootstrap.css'>
	<link rel="stylesheet" href="css/index.css"
	<link rel='stylesheet'  href='css/style.css'>
	<link rel='stylesheet'  href='css/home.css'>
	<script src='js/crear_sector.js'></script>
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500px;
        width: 500px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBav05DiXZtDaYqSyCym2ulb75b0ST3dPA&callback=initMap"></script>
    <script>
      // In the following example, markers appear when the user clicks on the map.
      // Each marker is labeled with a single alphabetical character.
      var labels = 'ABCD';
      var labelIndex = 0;
      var Marker_Max = 4;
      var Num_Marker = 0;
      var coo_sector = [];
      coo_sector.push('hola','perro');
      //console.log(coo_sector);

    

      function initialize() {
        var coords = {};    //coordenadas obtenidas con la geolocalización
        
        navigator.geolocation.getCurrentPosition(
        function (position) {
            coords = {
                lng: position.coords.longitude,
                lat: position.coords.latitude
            };
            coords2= {
                lng: position.coords.longitude,
                lat: position.coords.latitude+0.05
            };
            coords3= {
                lng: position.coords.longitude+0.05,
                lat: position.coords.latitude+0.05
            };
            coords4= {
                lng: position.coords.longitude+0.05,
                lat: position.coords.latitude
            };
            
            //setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
            //console.log(coords);
            document.getElementById("LatA").value=coords.lat;
            document.getElementById("LongA").value=coords.lng;
            document.getElementById("LatB").value=coords2.lat;
            document.getElementById("LongB").value=coords2.lng;
            document.getElementById("LatC").value=coords3.lat;
            document.getElementById("LongC").value=coords3.lng;
            document.getElementById("LatD").value=coords4.lat;
            document.getElementById("LongD").value=coords4.lng;
            //console.log(coords);
      		//console.log(coords2);
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 12,
              center: coords
            });

            // This event listener calls addMarker() when the map is clicked.
            //google.maps.event.addListener(map, 'click', function(event) {
            //console.log(event.latLng.position);
              //addMarker(event.latLng, map);
            //});

            // Add a marker at the center of the map.
            a=addMarker(coords, map);
            b=addMarker(coords2,map);
            c=addMarker(coords3,map);
            d=addMarker(coords4,map);
          }

        , function (error) { console.log(error); });
        }

      // Adds a marker to the map.
      function addMarker(location, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.

        var marker = new google.maps.Marker({
          draggable:true,
          animation: google.maps.Animation.DROP,
          position: new google.maps.LatLng(location),
          position: location,
          label: labels[labelIndex++ % labels.length],
          map: map
        });
        return location
        
      }
      

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body  style='background-color: #e3f2fd;'>
	<div class='container'>
		<header>
			<nav class="navbar transparent navbar-inverse navbar-fixed-top" style="background-color:rgba(0,0,0,0.9);">
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar-1'>
							<span class='sr-only'>Menu</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
						<a href="index.php" class='navbar-brand'>SISTEMA DE INGRESO DE INCIDENTES</a>
					</div>
									
					<div class='collapse navbar-collapse'>
						<ul class='nav navbar-nav'>
						</ul>		
						<ul class='nav navbar-nav navbar-right' id='navbar-1'>
							<li><a href='incidentes.php'>Incidentes</a></li>
							<li><a href='Estadisticas.php'>Estadisticas</a></li>
							<li class='active'><a href='CreacionSectores.php' style='color:black; background-color:white;'>Creacion Sectores</a></li>
							<li><a href='RevisionSectores.php'>Revision Sectores</a></li>
							<li><a href='login.php' class'sesion'>Salir</a></li>
						</ul>
					</div>	
				</div>
			</nav>
		</header>

		<div class='create_sector main'>
			<form>
				<div class='form-group'>
				    <label for='exampleFormControlInput1'>Nombre de Sector: </label>
				    <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Nombre'>
				</div>
				<div class='form-group'>
				   	<label for='exampleFormControlSelect2'>Tipo de Delitos</label>
				    <select multiple class='form-control' id='exampleFormControlSelect2'>
					    <option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div style="width: 100% ;; " class="row" >
			    	<div style="width: 45%; margin-left: 15px;" id="map" class="col-md-4" ></div>
			    	<div style="width: 45%;height: 500px;margin-left: 20px;" class="col-md-4">
			    		<div class="jumbotron cuadrito" style="background: transparent;" >
							<form name="login">
								<label id="formapa">Latitud A    : </label>
					    		<input type="text" value="" id="LatA" style="margin-left:11px;"><br>
					    		<label id="formapa">Longitud A : </label>
					    		<input type="text" value="" id="LongA"><br>
					    		<label id="formapa">Latitud B  : </label>
					    		<input type="text" value="" id="LatB" style="margin-left:11px;"><br>
					    		<label id="formapa">Longitud B : </label>
					    		<input type="text" value="" id="LongB"><br>
					    		<label id="formapa">Latitud C  : </label>
					    		<input type="text" value="" id="LatC" style="margin-left:11px;"><br>
					    		<label id="formapa">Longitud C : </label>
					    		<input type="text" value="" id="LongC"><br>
					    		<label id="formapa">Latitud D  : </label>
					    		<input type="text" value="" id="LatD" style="margin-left:11px;"><br>
					    		<label id="formapa">Longitud D : </label>
					    		<input type="text" value="" id="LongD"><br>
							</form>
						</div>
			    	</div>
			    </div>
				
				<button class='btn btn-primary' type='submit' onClick='create_sector'>Crear Sector</button>
			</form>
		</div>
	</div>  	
	
</body>
</html>