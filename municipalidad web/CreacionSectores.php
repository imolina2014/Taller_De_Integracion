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
	<link rel="stylesheet" href="css/index.css">
	<link rel='stylesheet'  href='css/style.css'>
	<link rel='stylesheet'  href='css/home.css'>
	<script src='js/crear_sector.js'></script>
	<link rel='stylesheet'  href='css/style_nav.css'>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBav05DiXZtDaYqSyCym2ulb75b0ST3dPA&callback=initMap"></script>
    <script>
		var marker;          //variable del marcador
		var coords = {};    //coordenadas obtenidas con la geolocalización

		//Funcion principal
		initMap = function () 
		{

		    //usamos la API para geolocalizar el usuario
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
		            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
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
		      //Se crea una nueva instancia del objeto mapa
		      var map = new google.maps.Map(document.getElementById('map'),
		      {
		        zoom: 13,
		        center:new google.maps.LatLng(coords.lat,coords.lng),

		      });

		      //Creamos el marcador en el mapa con sus propiedades
		      //para nuestro obetivo tenemos que poner el atributo draggable en true
		      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
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
		      //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
		      //cuando el usuario a soltado el marcador
		      marker.addListener('click', toggleBounce);
		      
		      marker.addListener( 'dragend', function (event)
		      {
		        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
		        document.getElementById("coordslat").value = this.getPosition().lat();
		        document.getElementById("coordslng").value = this.getPosition().lng();
		      });
		      marker2.addListener('click', toggleBounce);
		      
		      marker2.addListener( 'dragend', function (event)
		      {
		        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
		        document.getElementById("coords2lat").value = this.getPosition().lat();
		        document.getElementById("coords2lng").value = this.getPosition().lng();
		      });
		      marker3.addListener('click', toggleBounce);
		      
		      marker3.addListener( 'dragend', function (event)
		      {
		        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
		        document.getElementById("coords3lat").value = this.getPosition().lat();
		        document.getElementById("coords3lng").value = this.getPosition().lng();
		      });
		      marker4.addListener('click', toggleBounce);
		      
		      marker4.addListener( 'dragend', function (event)
		      {
		        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
		        document.getElementById("coords4lat").value = this.getPosition().lat();
		        document.getElementById("coords4lng").value = this.getPosition().lng();
		      });
		}

		//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
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
		  <a href="#home">SISTEMA DE INGRESO DE INCIDENTES</a>
		  <a href='incidentes.php'>Incidentes</a>
		  <a href='Estadisticas.php'>Estadisticas</a>
		  <a href='CreacionSectores.php' style='color:black; background-color:white;'>Creacion Sectores</a>
		  <a href='RevisionSectores.php' >Revision Sectores</a>
		  <a href='login.php'>Salir  <?php echo $_SESSION['usuario']?></a>
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
		

		<div class='create_sector main'>
			<form>
				<div class='form-group'>
				    <label for='exampleFormControlInput1'>Nombre de Sector: </label>
				    <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Nombre'>
				</div>
				<div class='form-group'>
				   	<label for='exampleFormControlSelect2'>Tipo de Delitos</label>
				    <select multiple class='form-control' id='exampleFormControlSelect2'>
					    <option>Robo con violencia</option>
						<option>Asalto</option>
						<option>Portonazo</option>
						<option>Parricidio</option>
						<option>Infanticidio</option>
						<option>Secuestro</option>
						<option>Sustraccion de menores</option>
						<option>Asesinato</option>
						<option>Otro delito</option>
						<option>Colision vehicular</option>
						<option>Choque multiple</option>
						<option>Incendio</option>
						<option>Derrumbes</option>
						<option>Atropello de peatones</option>
						<option>Otro accidente</option>
					</select>
				</div>
				<div style="width: 100% ;; " class="row" >
			    	<div style="width: 45%; margin-left: 15px;" id="map" class="col-md-4" ></div>
			    	<div style="width: 45%;height: 500px;margin-left: 20px;" class="col-md-4">
			    		<div class="jumbotron cuadrito" style="background: transparent;" >
							<form name="login">
								<label id="formapa">Latitud A    : </label>
					    		<input type="text" value="" id="coordslat" style="margin-left:11px;"><br>
					    		<label id="formapa">Longitud A : </label>
					    		<input type="text" value="" id="coordslng"><br>
					    		<label id="formapa">Latitud B  : </label>
					    		<input type="text" value="" id="coords2lat" style="margin-left:11px;"><br>
					    		<label id="formapa">Longitud B : </label>
					    		<input type="text" value="" id="coords2lng"><br>
					    		<label id="formapa">Latitud C  : </label>
					    		<input type="text" value="" id="coords3lat" style="margin-left:11px;"><br>
					    		<label id="formapa">Longitud C : </label>
					    		<input type="text" value="" id="coords3lng"><br>
					    		<label id="formapa">Latitud D  : </label>
					    		<input type="text" value="" id="coords4lat" style="margin-left:11px;"><br>
					    		<label id="formapa">Longitud D : </label>
					    		<input type="text" value="" id="coords4lng"><br>
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
