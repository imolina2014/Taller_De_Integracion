<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("Location: login.php");
	$conexion = mysqli_connect("localhost", "root","","id2847271_imolina");
							
							$sql_incidentes = "SELECT * FROM incidentes WHERE categoria='Accidente'";
							$sql_incendios="SELECT * FROM incidentes WHERE tipo='Accidente'";
    						
    						$consulta_incidentes=mysqli_query($conexion,$sql_incidentes);
    						$consulta_incendios= mysqli_query($conexion,$sql_incendios);
							$nr_inci = mysqli_num_rows($conexion,$consulta_incidentes);
							$nr_ince = mysqli_num_rows($conexion,$consulta_incendios);

							$porcent=$ince*100/$inci;

	echo"<p>".($porcent)."</p>";

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

		$(document).ready(function(){
			var ctx = document.getElementById("chartbar").getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
			        datasets: [{
			            label: '# of Votes',
			            data: [12, 19, 3, 5, 2, 3],
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
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

		$(document).ready(function(){
			$.ajax({
				url : 'php/DatosE1.php',
				type : 'POST',
				beforeSend : function() {
					$('#chartbarincidentes').html('Procesando datos, por favor espere...');
				},
				success : function(response) {
					$('#chartbarincidentes').html(response);
					//alert(response);
				}
			});
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
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div id="canvas-container" style="width: 100%;">
					<canvas id="chart" width="400" height="350"></canvas>
				</div>
			</div>
			<div class="col-md-6">
				<div id="canvas-container" style="width: 100%;">
					<canvas id="chartbar" width="400" height="350"></canvas>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div id="canvas-container" style="width: 100%;">
					<canvas id="chartbarincidentes" width="400" height="350"></canvas>
				</div>
			</div>
		</div>
	</div>
</body>
</html>