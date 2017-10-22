<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Municipalidad & Carabineros</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<link rel="stylesheet"  href="css/bootstrap.css">
	<link rel="stylesheet"  href="css/style.css">
	<link rel="stylesheet"  href="css/home.css">

</head>

<body style="background-image: url(img/wallpaper.jpg); background-size: 100%">
	<div class="container">
		<header>
			<nav class="navbar navbar-default  navbar-inverse"><!-- navbar-fixed-top-->
				<div class="container-fluid">
					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
							<span class="sr-only">Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="../ciudadano web/home.html" class="navbar-brand">SISTEMA DE INGRESO DE INCIDENTES</a>
					</div>
					
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
						</ul>		
						<ul class="nav navbar-nav navbar-right" id="navbar-1">
							<li class="active"><a href="index.php" >Incidentes</a></li>
							<li><a href="Estadisticas.php">Estadisticas</a></li>
							<li><a href="CreacionSectores.php">Creacion Sectores</a></li>
							<li ><a href="RevisionSectores.php">Revision Sectores</a></li>
							<li><a href="">Usuario</a></li>
							<!--
							<form action="" class="navbar-form navbar-left" role="search" > 

							<div class="form-group">
								<input type="text" class="form-control"  placeholder="buscar" name="search">
							</div>
						</form>-->
						</ul>
					</div>	
				</div>
			</nav>
		</header>
		
		

		<div class="container" >
			<center><img src="Logo.png" alt="" width="400" height="300"></center><br>
			<div class="row">

				<div class="col-md-1 col-xs-1 col-sm-1"></div>

				<a href="CreacionSectores.php">
					<div class="col-md-4 col-xs-12 col-sm-4 bordes2" style=" height: 140px;">
						<div class="col-md-10 col-xs-10 col-sm-10">
							<h3 class="text-center">Creacion de sectores</h3>
							<p>Cree los sectores que considere necesarios para monitoriarlos.</p>
						</div>
						<div class="col-md-2 col-xs-2 col-sm-2" style="background-color: #D20F0F; height: 100%;"></div>
					</div>
				</a>
					
				<div class="col-md-2 col-xs-2 col-sm-2"></div>
				
				<a href="RevisionSectores.php">
					<div class="col-md-4 col-xs-12 col-sm-4 bordes2" style=" height: 140px;">
						<div class="col-md-10 col-xs-10 col-sm-10">
							<h3 class="text-center">Revision de sectores</h3>
							<p>Revise sus sectores previamente definidos, todo esto verificando los incidentes que han sucedido.</p>
						</div>
						<div class="col-md-2 col-xs-2 col-sm-2" style="background-color: #3F51B5; height: 100%;"></div>
					</div>
				</a>

				<div class="col-md-1 col-xs-1 col-sm-1"></div>
					
				
			</div>
			<div class="row">

				<div class="col-md-1 col-xs-1 col-sm-1"></div>

				<a href="index.php">
					<div class="col-md-4 col-xs-12 col-sm-4 bordes2" style="height: 140px; top:20px;">
						<div class="col-md-10 col-xs-10 col-sm-10">
							<h3 class="text-center">Incidentes</h3>
							<p>Verifique todos los incidentes ocurridos, pudiendo hacer un filtro especifico entorno a calles, categorias o tipos.</p>
						</div>
						<div class="col-md-2 col-xs-2 col-sm-2" style="background-color: #D20F0F; height: 100%;"></div>
					</div>
				</a>
					
				<div class="col-md-2 col-xs-2 col-sm-2"></div>

				<a href="Estadisticas.php">
					<div class="col-md-4 col-xs-12 col-sm-4 bordes2" style="height: 140px;  top:20px;">
						<div class="col-md-10 col-xs-10 col-sm-10">
							<h3 class="text-center">Estadisticas</h3>
							<p>Compruebe un informe estadistico detallado respecto a los inicidentes ocurridos.</p>
						</div>
						<div class="col-md-2 col-xs-2 col-sm-2" style="background-color: #3F51B5; height: 100%;"></div>
					</div>
				</a>

				<div class="col-md-1 col-xs-1 col-sm-1"></div>
					
			</div>
		</div>

	</div>
</body>
</html>
