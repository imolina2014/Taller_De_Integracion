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
		<script type='text/javascript' src=js/Chart.min.js></script>	
		<link rel='stylesheet'  href='css/bootstrap.css'>
		<link rel='stylesheet'  href='css/style.css'>
		<link rel='stylesheet'  href='css/home.css'>
		<style>
			.caja {
				margin: auto;
				max-height: 150px;
				padding: 20px;
				border: 1px solid #BD6D6D;
			}
			.caja select {
				width: 100%;
				font-size: 16px;
				padding: 5px;
			}
			.resultados {
				margin: auto;
				margin-top: 40px;
				width: 1000px;
			}
		</style>
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
							<a class='navbar-brand'>SISTEMA DE INGRESO DE INCIDENTES</a>
						</div>
						<div class='collapse navbar-collapse'>
							<ul class='nav navbar-nav'>
							</ul>		
							<ul class='nav navbar-nav navbar-right' id='navbar-1'>
								<li><a href='index.php' >Incidentes</a></li>
								<li class='active'><a href='Estadisticas.php' style='color:black; background-color:white;'>Estadisticas</a></li>
								<li><a href='CreacionSectores.php'>Creacion Sectores</a></li>
								<li ><a href='RevisionSectores.php'>Revision Sectores</a></li>
								<li><a href='login.php'>Salir</a></li>
							</ul>
						</div>	
					</div>
				</nav>
			</header>
		</div>
		<div class="container">
			<div class="row col-md-3">
				<div class="caja">
					<select onchange="mostrarResultados(this.value)">
						<?php
							for($i=2000; $i<2020; $i++) {
								if($i==2015) echo "<option value='".$i."' selected>".$i."</option>";
								else echo "<option value='".$i."'>".$i."</option>";
							} 
							echo "
								<script>
									$(document).ready(mostrarResultados(2015));
										function mostrarResultados(año) {
											$.ajax({
												type: 'POST',
												url = 'DatosE1.php',
												data: 'año'+año,
												success:function(data) {
													var valores = eval(data);
													var enero = valores[0];
													var febrero = valores[1];
													var marzo = valores[2];
													var abril = valores[3];
													var mayo = valores[4];
													var junio = valores[5];
													var julio = valores[6];
													var agosto = valores[7];
													var septiembre = valores[8];
													var octubre = valores[9];
													var noviembre = valores[10];
													var diciembre = valores[11];

													var Datos = {
														labels : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
														datasets : [
															{
																fiilColor : 'rgba(91,228,146,0.6)', //Color de las barras
																strokeColor : 'rgba(57,194,112,0.7)', //Color del borde de las barras
																highlightFill : 'rgba(73,206,180,0.6)', //Color 'HOVER0 de las barras
																highlightStroke : 'rgba(66,196,157,0.7)', //Color 'HOVER' del borde de las barras
																data : [enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre]
															}
														]
													};

													var contexto = document.getElementById('grafico').getContext('2d');
													window.Barra = new Chart(contexto).Bar(Datos, {responsive : true});
												}
											});

											return false;
										}
								</script>
								";
						?>
					</select>
				</div>
				<div class="resultados">
					<canvas id="grafico"></canvas>
				</div>
			</div>
		</div>
	</body>
</html>"