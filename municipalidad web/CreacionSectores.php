<?php
session_start();
	if (isset($_SESSION['usuario'])){
		echo"
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

			</head>

			<body  style='background-image: url(img/background.jpg);'>
				<div class='container'>
					<header>
						<nav class='navbar navbar-default  navbar-inverse'><!-- navbar-fixed-top-->
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
											<li class='active'
											><a href='CreacionSectores.php'>Creacion Sectores</a></li>
											<li><a href='RevisionSectores.php'>Revision Sectores</a></li>
											<li><a href='login.php' class'sesion'>Salir ".$_SESSION['usuario']."</a></li>
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

				</body>
				</html>";

}else{header("Location:login.php");}
?>