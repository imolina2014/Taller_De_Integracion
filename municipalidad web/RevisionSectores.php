<?php
session_start();
	if (isset($_SESSION['usuario'])){
		echo"
			<html>
			<head>
				<meta charset='utf-8'>
				<meta http-equiv='X-UA-Compatible' content='IE-edge'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<title>Municipalidad & Carabineros</title>
				<script type='text/javascript' src'js/jquery-3.2.1.min.js'></script>
				<script type='text/javascript' src='js/index.js'></script>
				<link rel='stylesheet'  href='css/bootstrap.css'>
				<link rel='stylesheet'  href='css/style.css'>
				<link rel='stylesheet'  href='css/home.css'>

			</head>

			<body style='background-image: url(img/wallpaper.jpg); background-size: 100%'>
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
										<li><a href='index.php' >Incidentes</a></li>
										<li><a href='Estadisticas.php'>Estadisticas</a></li>
										<li><a href='CreacionSectores.php'>Creacion Sectores</a></li>
										<li class='active'><a href='RevisionSectores.php'>Revision Sectores</a></li>
										<li><a>".$_SESSION['usuario']."</a></li>
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
							<div class='main'>
						<center>
							<select class='selectpicker show-menu-arrow'>
								<option style='background: #5cb85c; color: #fff;'>Tus Sectores</option>
							</select>
							<button class='btn btn-primary' name='Desplegar'>Desplegar Sectores</button>		
						</center>	
					
						<div class='mapa'></div>

						<div class='tabla_sectores '>
							
						<table class='table'>
						  <thead class='thead-inverse'>
						    <tr>
						      <th>#</th>
						      <th>Calle</th>
						      <th>Descripcion</th>
						      <th>Fecha</th>
						      <th>Categoria</th>
						      <th>Tipo</th>
						      <th>Mapa</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope='row'>1</th>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						    </tr>
						    <tr>
						      <th scope='row'>2</th>
						       <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						    </tr>
						    <tr>
						      <th scope='row'>3</th>
						       <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						    </tr>
						    <tr>
						      <th scope='row'>4</th>
						       <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						    </tr>
						    <tr>
						      <th scope='row'>5</th>
						       <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						      <td>###</td>
						    </tr>

						  </tbody>
						</table>


						</div>

					</div>
			</div>
			</body>
			</html>";
}else{header("Location:login.php");}
?>