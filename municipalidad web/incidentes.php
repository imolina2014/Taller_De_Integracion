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
	<script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
	<script type='text/javascript' src='js/index.js'></script>
	<link rel='stylesheet'  href='css/bootstrap.css'>
	<link rel='stylesheet'  href='css/style.css'>
	<link rel='stylesheet'  href='css/home.css'>
	<link href ="datedropper/datedropper.css" rel="stylesheet" type ="text/css"/>
	<link href ="datedropper/myfecha.css" rel="stylesheet" type="text/css"/>
	<script src ="datedropper/datedropper.js "></script>
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
							<li><a href='Estadisticas.php'>Estadisticas</a></li>
							<li><a href='CreacionSectores.php'>Creacion Sectores</a></li>
							<li><a href='RevisionSectores.php'>Revision Sectores</a></li>
							<li><a href='login.php' class='sesion'>Salir</a></li>
						</ul>
					</div>	
				</div>
			</nav>
		</header>
		
		<div class='container' >
			<div class=" col-md-12 main">
			<h1><b>Bienvenido al Servicio de Registro de Incidentes</b></h1>
			<p>Aquí podrás unirte al programa de seguridad y estadística de incidentes; donde tú puedes ser un gran colaborador y parte del programa, notificando de manera responsable incidentes que ocurren a tu alrededor y con ello, notificar a los participantes de la misma.</p>
			
			<label>Filtrar</label>	
			<form method="post" name="filtro">
			    <input type="text" size="20" id="sCalle" placeholder="Ingresar Calle (Opcional)">
				
				<div id="Categoria"> 
					<select id="sCategoria" onchange="filtrar('sTipo')">
						<option selected value="Seleccionar Categoria">Seleccionar Categoria</option>
					</select>
				</div>
					
				<div id="contenedor">
					<select id="sTipo">
						<option selected value="Seleccionar Tipo">Seleccionar Tipo</option>
					</select>
				</div>
				
				<input type="text" data-theme="myfecha" data-large-mode="true" id="sFecha">
            	
				<input type="button" class="btn btn-primary" value="Buscar" onclick="BuscarIncidente();">	
		    </form>	
		    <script>$("#sFecha").dateDropper();</script>

		    <div class="table" id="tIncidentes"></table>
		    <div id="Tgeneral"></div>
		</div>
	</div>
	</div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBav05DiXZtDaYqSyCym2ulb75b0ST3dPA&callback=initMap"></script>
		</div>
	
</body>
</html>