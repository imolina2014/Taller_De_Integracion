<?php
	session_start(); 
	if(!isset($_SESSION["car"]) && (!isset($_SESSION["car"]))) { 
		header("Location:index.php"); 
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crud Usuarios</title>
	<link rel="stylesheet" href="">
</head>
<body>	
	<div class="container">
		<h1>Hola Mundo</h1>
	</div>
</body>
</html>