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
	<link rel='stylesheet'  href='css/style.css'>
	<script src='js/crear_sector.js'></script>
	<link rel='stylesheet'  href='css/style_nav.css'>
	<style>
      #map {
        height: 500px;
        width: 500px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBav05DiXZtDaYqSyCym2ulb75b0ST3dPA&callback=initMap"></script>
    <script>
		var marker;          
		var coords = {};    

		//Funcion principal
		initMap = function () 
		{
		        navigator.geolocation.getCurrentPosition(
		          function (position){
		            coords = {
		                lng: position.coords.longitude,
		                lat: position.coords.latitude
		            };
		            coords2= {
		                lng: position.coords.longitude,
		                lat: position.coords.latitude+0.02
		            };
		            coords3= {
		                lng: position.coords.longitude+0.02,
		                lat: position.coords.latitude+0.02
		            };
		            coords4= {
		                lng: position.coords.longitude+0.02,
		                lat: position.coords.latitude
		            };
		            setMapa(coords);
		            document.getElementById("coordslat").value = coords.lat;
		            document.getElementById("coordslng").value = coords.lng;
		            document.getElementById("coords2lat").value = coords2.lat;
		            document.getElementById("coords2lng").value = coords2.lng;
		            document.getElementById("coords3lat").value = coords3.lat;
		            document.getElementById("coords3lng").value = coords3.lng;
		            document.getElementById("coords4lat").value = coords4.lat;
		            document.getElementById("coords4lng").value = coords4.lng;
		          },function(error){console.log(error);});
		}
		function setMapa (coords)
		{   
		      var map = new google.maps.Map(document.getElementById('map'),
		      {
		        zoom: 13,
		        center:new google.maps.LatLng(coords.lat,coords.lng),

		      });
		      marker = new google.maps.Marker({
		        map: map,
		        draggable: true,
		        animation: google.maps.Animation.DROP,
		        position: new google.maps.LatLng(coords.lat,coords.lng),

		      });
		      marker2 = new google.maps.Marker({
		        map: map,
		        draggable: true,
		        animation: google.maps.Animation.DROP,
		        position: new google.maps.LatLng(coords2.lat,coords2.lng),

		      });
		      marker3 = new google.maps.Marker({
		        map: map,
		        draggable: true,
		        animation: google.maps.Animation.DROP,
		        position: new google.maps.LatLng(coords3.lat,coords3.lng),

		      });
		      marker4 = new google.maps.Marker({
		        map: map,
		        draggable: true,
		        animation: google.maps.Animation.DROP,
		        position: new google.maps.LatLng(coords4.lat,coords4.lng),

		      });
		      marker.addListener('click', toggleBounce);
		      marker.addListener( 'dragend', function (event)
		      {
		        document.getElementById("coordslat").value = this.getPosition().lat();
		        document.getElementById("coordslng").value = this.getPosition().lng();
		      });
		      marker2.addListener('click', toggleBounce);
		      
		      marker2.addListener( 'dragend', function (event)
		      {
		        document.getElementById("coords2lat").value = this.getPosition().lat();
		        document.getElementById("coords2lng").value = this.getPosition().lng();
		      });
		      marker3.addListener('click', toggleBounce);
		      
		      marker3.addListener( 'dragend', function (event)
		      {
		        document.getElementById("coords3lat").value = this.getPosition().lat();
		        document.getElementById("coords3lng").value = this.getPosition().lng();
		      });
		      marker4.addListener('click', toggleBounce);
		      
		      marker4.addListener( 'dragend', function (event)
		      {
		        document.getElementById("coords4lat").value = this.getPosition().lat();
		        document.getElementById("coords4lng").value = this.getPosition().lng();
		      });
		}
		function toggleBounce() {
		  if (marker.getAnimation() !== null) {
		    marker.setAnimation(null);
		  } else {
		    marker.setAnimation(google.maps.Animation.BOUNCE);
		  }
		}
    </script>
</head>

<body  style='background-color: #e3f2fd;'>
	<div class='container'>
		<div class="topnav" id="myTopnav">
		  <a href="index.php">SISTEMA DE INGRESO DE INCIDENTES</a>
		  <a href='incidentes.php'>Incidentes</a>
		  <a href='Estadisticas.php'>Estadisticas</a>
		  <a href='CreacionSectores.php' style='color:black; background-color:white;'>Creacion Sectores</a>
		  <a href='RevisionSectores.php' >Revision Sectores</a>
		  <a href='login.php'>Salir  <?php echo $_SESSION['usuario']?></a>
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
		<div class='create_sector main'>
			<form method="post">
				<div class="container-fluid">
					<div class='form-group'>
					    <input type="hidden" id="nombre_usuario" value=<?php echo $_SESSION['usuario'] ?> >
					    <div class="col-xs-3">
					   		<label for='exampleFormControlInput1'>Nombre de Sector: </label>
					    	<input type='text' class='form-control' id='nombre_sector' placeholder='Ingresar Nombre'>
					    </div>

					    <div class="col-xs-3">
					    	<label for='exampleFormControlSelect2'>Tipos de Delitos:</label>
						    <select class='form-control selectpicker' id='tipo_delito'>
						    	<optgroup label="Delitos" data-max-options="2">
								    <option>Robo con violencia</option>
									<option>Asalto</option>
									<option>Portonazo</option>
									<option>Parricidio</option>
									<option>Infanticidio</option>
									<option>Secuestro</option>
									<option>Sustraccion de menores</option>
									<option>Asesinato</option>
									<option>Otro</option>
								</optgroup>
							</select>
						</div>
					</div>
				</div>
				<div style="width: 100%;margin-top:20px;margin-left: 15px" class="from-group" >

					<div class="panel panel-primary col-md-6" style="max-width: 600px;">
						<div class="panel-heading"><center>Direccionar marcadores a las coordenadas del sector en cuestion</center></div>
					  	<div class="panel-body">
					    	<div style="width: 94%; margin-left: 15px;" id="map" class="col-md-4" ></div>
					  	</div>
					</div>

			    	<div style="width: 45%;height: 500px;margin-left: 20px;" class="col-md-4">
			    		<div class="jumbotron cuadrito" style="background: transparent;" >
							<form name="login">
								<div class="form-group">
									<div class="col-xs-5" style="margin-top:35px">
										<label id="formapa">Latitud A: </label>
							    		<input type="text" class="form-control" value="" id="coordslat" style="margin-left:11px;background: rgb(240,173,78);color:white" disabled></div>
						    		<div class="col-xs-5" style="margin-top:35px">
							    		<label id="formapa">Longitud A: </label>
							    		<input type="text" class="form-control" value="" id="coordslng" style="background: rgb(92,184,92);color:white" disabled></div><br>
						    	</div>
						    	<div class="form-group">
						    		<div class="col-xs-5" style="margin-top:10px">
							    		<label id="formapa" >Latitud B: </label>
							    		<input type="text" class="form-control" value="" id="coords2lat" style="margin-left:11px;background: rgb(240,173,78);color:white" disabled></div>
						    		<div class="col-xs-5" style="margin-top:10px">
							    		<label id="formapa">Longitud B: </label>
							    		<input type="text" class="form-control" value="" id="coords2lng" style="background: rgb(92,184,92);color:white" disabled></div><br>
						    	</div>
						    	<div class="form-group">
						    		<div class="col-xs-5" style="margin-top:10px">
							    		<label id="formapa">Latitud C: </label>
							    		<input type="text" class="form-control" value="" id="coords3lat" style="margin-left:11px;background: rgb(240,173,78);color:white" disabled></div>
						    		<div class="col-xs-5" style="margin-top:10px">
							    		<label id="formapa">Longitud C: </label>
							    		<input type="text" class="form-control" value="" id="coords3lng" style="background: rgb(92,184,92);color:white" disabled></div><br>
					    		</div>
					    		<div class="form-group">
					    			<div class="col-xs-5" style="margin-top:10px">
							    		<label id="formapa">Latitud D: </label>
							    		<input type="text" class="form-control" value="" id="coords4lat" style="margin-left:11px;background: rgb(240,173,78);color:white" disabled></div>
							    	<div class="col-xs-5" style="margin-top:10px">
							    		<label id="formapa">Longitud D: </label>
							    		<input type="text" class="form-control" value="" id="coords4lng" style="background: rgb(92,184,92);color:white" disabled></div><br>
					    		</div>
					    		<button class='btn btn-primary' style="margin-top:30px;margin-left:26px" type='button' onClick='Crea_sector()'>Crear Sector
					    		</button>
							</form>
						</div>
			    	</div>
			    </div>
			</form>
			<div id="respuesta"></div>
		</div>
	</div>  	
</body>
</html>
