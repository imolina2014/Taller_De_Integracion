<?php

$mysqli = new mysqli("db.inf.uct.cl", "imolina","123456", "imolina");
if ($mysqli -> connect_errno) {
	die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
	. ") " . $mysqli -> mysqli_connect_error());
}

?>