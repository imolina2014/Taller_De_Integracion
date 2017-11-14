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
	<link rel='stylesheet'  href='css/style_nav.css'>
</head>

<body  style='background-color: #e3f2fd;'>
	<div class='container'>
		<div class="topnav" id="myTopnav">
		  <a href="#home">SISTEMA DE INGRESO DE INCIDENTES</a>
		  <a href='incidentes.php'>Incidentes</a>
		  <a href='Estadisticas.php'>Estadisticas</a>
		  <a href='CreacionSectores.php'>Creacion Sectores</a>
		  <a href='RevisionSectores.php' style='color:black; background-color:white;' >Revision Sectores</a>
		  <a href='login.php'>Salir  <?php echo $_SESSION['usuario']?></a>
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
		<div class='main' style="margin-top: 100px;">
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
</body>
</html>
