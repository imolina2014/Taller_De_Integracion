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
	<script type='text/javascript' src'js/jquery-3.2.1.min.js'></script>
	<script type='text/javascript' src='js/index.js'></script>
	<link rel='stylesheet'  href='css/bootstrap.css'>
	<link rel='stylesheet'  href='css/style.css'>
	<link rel='stylesheet'  href='css/home.css'>
	<link rel='stylesheet'  href='css/style_nav.css'>
</head>

<body  style='background-color: #e3f2fd;'>
	<div class='container'>
		<div class="topnav" id="myTopnav">
		  <a href="#home">SISTEMA DE INGRESO DE INCIDENTES</a>
		  <a href='incidentes.php'>Incidentes</a>
		  <a href='Estadisticas.php'>Estadisticas</a>
		  <a href='CreacionSectores.php'>Creacion Sectores</a>
		  <a href='RevisionSectores.php' >Revision Sectores</a>
		  <a href='login.php'>Salir  <?php echo $_SESSION['usuario']?></a>
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
		<!--<header>

	<div class='container' style="margin-top: 100px;">
		<header>
		</header>-->
		
		<div class='container main' >
			<div class='row'>
				<div class='col-md-1 col-xs-1 col-sm-1'></div>
				<a href='CreacionSectores.php'>
					<div class='col-md-4 col-xs-12 col-sm-4 bordes2' style=' height: 140px;'>
						<div class='col-md-10 col-xs-10 col-sm-10'>
							<h3 class='text-center'>Creacion de sectores</h3>
							<p>Cree los sectores que considere necesarios para monitoriarlos.</p>
						</div>
						<div class='col-md-2 col-xs-2 col-sm-2' style='background-color: #D20F0F; height: 100%;'></div>
					</div>
				</a>
				<div class='col-md-2 col-xs-2 col-sm-2'></div>
				<a href='RevisionSectores.php'>
					<div class='col-md-4 col-xs-12 col-sm-4 bordes2' style=' height: 140px;'>
						<div class='col-md-10 col-xs-10 col-sm-10'>
							<h3 class='text-center'>Revision de sectores</h3>
							<p>Revise sus sectores previamente definidos, todo esto verificando los incidentes que han sucedido.</p>
						</div>
						<div class='col-md-2 col-xs-2 col-sm-2' style='background-color: #3F51B5; height: 100%;'></div>
					</div>
				</a>
				<div class='col-md-1 col-xs-1 col-sm-1'></div>
			</div>
			<div class='row'>
				<div class='col-md-1 col-xs-1 col-sm-1'></div>
				<a href='incidentes.php'>
					<div class='col-md-4 col-xs-12 col-sm-4 bordes2' style='height: 140px; top:20px;'>
						<div class='col-md-10 col-xs-10 col-sm-10'>
							<h3 class='text-center'>Incidentes</h3>
							<p>Verifique todos los incidentes ocurridos, pudiendo hacer un filtro especifico entorno a calles, categorias o tipos.</p>
						</div>
						<div class='col-md-2 col-xs-2 col-sm-2' style='background-color: #D20F0F; height: 100%;'></div>
					</div>
				</a>
				<div class='col-md-2 col-xs-2 col-sm-2'></div>
				<a href='Estadisticas.php'>
					<div class='col-md-4 col-xs-12 col-sm-4 bordes2' style='height: 140px;  top:20px;'>
						<div class='col-md-10 col-xs-10 col-sm-10'>
							<h3 class='text-center'>Estadisticas</h3>
							<p>Compruebe un informe estadistico detallado respecto a los inicidentes ocurridos.</p>
						</div>
						<div class='col-md-2 col-xs-2 col-sm-2' style='background-color: #3F51B5; height: 100%;'></div>
					</div>
				</a>
				<div class='col-md-1 col-xs-1 col-sm-1'></div>
			</div>
		</div>
	</div>
</body>
</html>