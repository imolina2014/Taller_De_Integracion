<?php
	include("php/conex.php");
	session_start();
	if(!isset($_SESSION['usuario'])){
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
	<!-- <script type='text/javascript' src=js/Chart.min.js></script> -->
	<script type="text/javascript" src="js/Chart.bundle.min.js"></script>	
	<link rel='stylesheet'  href='css/bootstrap.css'>
	<link rel='stylesheet'  href='css/style.css'>
	<!--<link rel='stylesheet'  href='css/home.css'>-->

	<script>
		$(document).ready(function(){
		    $.ajax({
		        url : 'php/DatosE1.php', //archivo que recibe la peticion
		        type : 'POST', //método de envio
		        success : function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
		            var valores = eval(data);	
		            
		            var Accidentes = valores[0];
		            var Delitos = valores[1];
		            var datos = {
						type : "pie",
						data : {
							datasets : [{
								data : [Accidentes,Delitos,],
								backgroundColor : ["#F7464A","#46BFDB",],
							}],
							labels : ["Accidentes","Delitos",]
						},
						options : { reponsive: true, }
					};
					var canvas = document.getElementById('ChartPieIncidentes').getContext('2d');
					window.pie = new Chart(canvas,datos);
		        }
		    });
		});

		$(document).ready(function(){
		    $.ajax({
		        url : 'php/DatosE2.php', //archivo que recibe la peticion
		        type : 'POST', //método de envio
		        success : function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
		            var valores = eval(data);	
		            
		            var RoboViolencia = valores[0];
		            var Asalto = valores[1];
		            var Portonazo = valores[2];
		            var Parricidio = valores[3];
		            var Infanticidio = valores[4];
		            var Secuestro = valores[5];
		            var SustraccionMenores = valores[6];
		            var Asesinato = valores[7];
		            var Otros = valores[8];
		            var datos = {
						type : "pie",
						data : {
							datasets : [{
								data : [RoboViolencia,Asalto,Portonazo,Parricidio,Infanticidio,Secuestro,SustraccionMenores,Asesinato,Otros],
								backgroundColor : ["#DC143C","#FFD700","#808000","#7FFF00","#800080","#CD853F","#FF1493","#FA8072","#FF9800",],
							}],
							labels : ["Robo con Violencia","Asalto","Portonazo","Parricidio","Infanticidio","Secuestro","Sustracción de Menores","Asesinato",'Otros',]
						},
						options : { reponsive: true, }
					};
					var canvas = document.getElementById('ChartPie_TiposDelitos').getContext('2d');
					window.pie = new Chart(canvas,datos);
		        }
		    });
		});

		$(document).ready(function(){
			$.ajax({
				url : 'php/DatosE3.php',
				type : 'POST',
				success : function(data) {
					var valores = eval(data);

					var colision_vehicular = valores[0];
					var choque_multiple = valores[1];
					var incendio = valores[2];
					var derrumbes = valores[3];
					var atropellos = valores[4];
					var otros = valores[5];
					var datos = {
					type : "pie",
					data : {
						datasets : [{
							data : [colision_vehicular,choque_multiple,incendio,derrumbes,atropellos,otros],
							backgroundColor : ["#00BCD4","#673AB7","#F44336","#CDDC39","#FF9800","#7FFF00",],
						}],
						labels : ["Colision Vehicular","Choque Multiple","Incendio","Derrumbes","Atropellos","Otros",]
					},
					options : { reponsive: true, }
				};
				var canvas_Tipo_INC = document.getElementById('ChartPie_TiposAccidentes').getContext('2d');
				window.pie = new Chart(canvas_Tipo_INC,datos);
				}
			});
		});

		$(document).ready(function(){
			var ctx = document.getElementById("ChartBarIncidentes").getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
			        datasets: [
			        {
			            label: '#Accidentes',
			            data: [12, 19, 3, 5, 2, 3],
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});
		});
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
							<li class='active'><a href='Estadisticas.php' style='color:black; background-color:white;'>Estadisticas</a></li>
							<li><a href='CreacionSectores.php'>Creacion Sectores</a></li>
							<li><a href='RevisionSectores.php'>Revision Sectores</a></li>
							<li><a href='login.php' class='sesion'>Salir</a></li>
						</ul>
					</div>	
				</div>
			</nav>
		</header>
	</div>
	<div class="container main" style="margin-top: 100px;">
		<div class="row">
			<div class="col-md-4">
				<div id="canvas-container" style="width: 100%;">
					<canvas id="ChartPieIncidentes" width="400" height="350"></canvas>
				</div>
			</div>
			<div class="col-md-4">
				<div id="canvas-container" style="width: 100%;">
					<canvas id="ChartPie_TiposAccidentes" width="400" height="350"></canvas>
				</div>
			</div>
			<div class="col-md-4">
				<div id="canvas-container" style="width: 100%;">
					<canvas id="ChartPie_TiposDelitos" width="400" height="350"></canvas>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 50px;">
			<div class="col-md-6">
				<div id="canvas-container" style="width: 100%;">
					<canvas id="ChartBarIncidentes" width="400" height="350"></canvas>
				</div>
			</div>
		</div>
	</div>
</body>
</html>