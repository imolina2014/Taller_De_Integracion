<?php
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
	<link rel='stylesheet'  href='css/home.css'>
	<script>
		$(document).ready(function(){
			var datos = {
				type : "pie",
				data : {
					datasets : [{
						data : [5,10,40,12,23,],
						backgroundColor : ["#F7464A","#46BFDB","#FDB45C","#949FB1","#4D5360",],
					}],
					labels : ["Datos01","Datos02","Datos03","Datos04","Datos05",]
				},
				options : { reponsive: true, }
			};
			var canvas = document.getElementById('chart').getContext('2d');
			window.pie = new Chart(canvas,datos);
		});
	</script>
</head>

<body  style='background-color: #e3f2fd;'>
	<div class='container'>
		<header>
			<nav  class='navbar navbar-light bg-light' style= 'background-color:#4CAF50' >
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
		<div id="canvas-container" style="width: 50%;">
			<canvas id="chart" width="500" height="350"></canvas>
		</div>
	</body>
</html>"