<?php
session_start();
	if (!isset($_SESSION['usuario'])){
		header("Location: login.php");
	}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modulo WEB</title>
	<script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
	<script type='text/javascript' src='js/index.js'></script>	
	<link rel='stylesheet'  href='css/bootstrap.css'>
	<link rel='stylesheet'  href='css/style.css'>
	<link rel='stylesheet'  href='css/style_nav.css'>
	<script type="text/javascript" src="../ciudadano web/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../ciudadano web/js/index.js"></script>
	<link rel="stylesheet"  href="../ciudadano web/css/bootstrap.css">
	<link rel="stylesheet"  href="../ciudadano web/css/style.css">
	<link href ="../ciudadano web/datedropper/datedropper.css" rel="stylesheet" type ="text/css"/>
	<link href ="../ciudadano web/datedropper/myfecha.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="../ciudadano web/js/Chart.bundle.min.js"></script>
	<script src ="../ciudadano web/datedropper/datedropper.js "></script>

	<script src="../ciudadano web/js/jquery.min.js"></script>
	<link rel="stylesheet" href="../ciudadano web/css/bootstrap.min.css">
	<link rel="stylesheet" href="../ciudadano web/css/bootstrap-theme.min.css">
	<script src="../ciudadano web/js/bootstrap.min.js"></script>
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>

<body name="principal" onload="crea_categoria();Incidentes()">
	<div class="container">
		<div class="topnav" id="myTopnav">
		  <a href="#home">SISTEMA DE INGRESO DE INCIDENTES</a>
		  <a href='incidentes.php' style='color:black; background-color:white;'>Incidentes</a>
		  <a href='Estadisticas.php' >Estadisticas</a>
		  <a href='CreacionSectores.php'>Creacion Sectores</a>
		  <a href='RevisionSectores.php'>Revision Sectores</a>
		  <a href='login.php'>Salir  <?php echo $_SESSION['usuario']?></a>
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
	
		<div class=" col-md-12 main" style="margin-top:45px">
			<h1><b>Bienvenido al Servicio de Registro de Incidentes</b></h1>
			<p>Aquí podrás unirte al programa de seguridad y estadística de incidentes; donde tú puedes ser un gran colaborador y parte del programa, notificando de manera responsable incidentes que ocurren a tu alrededor y con ello, notificar a los participantes de la misma.</p>
			
			<form method="post" name="filtro">
					<input type="text" size="20" id="sCalle" placeholder="Ingresar Calle (Opcional)">
					
					<div id="Categoria"> 
						<select id="sCategoria" onchange="filtrar('sTipo')" >
							<option selected value="Seleccionar Categoria" >Seleccionar Categoria</option>
						</select>
					</div>
						
					<div id="contenedor">
						<select id="sTipo">
							<option selected value="Seleccionar Tipo">Seleccionar Tipo</option>
						</select>
					</div>
					
					<input type="text" data-theme="myfecha" data-large-mode="true" id="sFecha">
					<input type="checkbox" id="a_fecha" onchange="C_fecha()">
					<input type="button" onClick="BuscarIncidente()" value="Filtrar" class="btn btn-primary">	
					<input type="button" onClick="Quitar_filtro()" value="Quitar filtro" class="btn btn-primary">

		    </form>	
		    <script>$("#sFecha").dateDropper();</script>

		    <div class="table" id="tIncidentes"></div>
		
			<div id="Graficos">
			    <div style="margin-top:5%;" id="AccidentesG">
					<center><h3 style="font-family: fantasy;">Accidentes</h3></center>
					<div class=" col-md-7"><canvas id="G_accidentes"></canvas></div> 
					<div class=" col-md-5"><canvas id="G2_accidentes"></canvas></div>
				</div>
					
				<div style="margin-top:33%;" id="DelitosG">
					<center><h3 style="font-family: fantasy;">Delitos</h3></center>
					<div class=" col-md-7"><canvas id="G_delitos"></canvas></div> 
					<div class=" col-md-5"><canvas id="G2_delitos"></canvas></div>
				</div>
			</div>

		</div>
	</div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBav05DiXZtDaYqSyCym2ulb75b0ST3dPA&callback=initMap"></script>
</body>
</html>
