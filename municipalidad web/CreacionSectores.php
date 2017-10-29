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
	<script src='js/crear_sector.js'></script>
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
							<li><a href='index.php'>Incidentes</a></li>
							<li><a href='Estadisticas.php'>Estadisticas</a></li>
							<li class='active'><a href='CreacionSectores.php' style='color:black; background-color:white;'>Creacion Sectores</a></li>
							<li><a href='RevisionSectores.php'>Revision Sectores</a></li>
							<li><a href='login.php' class'sesion'>Salir</a></li>
											<!--
											<form action='' class='navbar-form navbar-left' role='search' > 

											<div class='form-group'>
												<input type='text' class='form-control'  placeholder='buscar' name='search'>
											</div>
										</form>-->
						</ul>
					</div>	
				</div>
			</nav>
		</header>

		<div class='create_sector'>
			<form>
				<div class='form-group'>
				    <label for='exampleFormControlInput1'>Nombre de Sector: </label>
				    <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Nombre'>
				</div>
				<div class='form-group'>
				    <label for='exampleFormControlSelect1'>Puntos del Sector</label>
					<select class='form-control' id='exampleFormControlSelect1'>
					    <option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
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
				<div class='form-group'>
				    <label for='exampleFormControlTextarea1'>Descripcion</label>
				    <textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
				</div>
				<button class='btn btn-primary' type='submit' onClick='create_sector'>Crear Sector</button>
			</form>
		</div>
	</div>  	
</body>
</html>