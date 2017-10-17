<?php

$mysqli = new mysqli("localhost", "id2847271_imolina","12345", "id2847271_imolina");
if ($mysqli -> connect_errno) {
	die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
	. ") " . $mysqli -> mysqli_connect_error());
}

?>