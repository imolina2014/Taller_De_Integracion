<?php
	//include("./conex.php");
	$categoria = $_POST["Categoria"];
	$tipo = $_POST["Tipo"];

	echo "	<table class='table' style='width=100%'>
				<thead class='thead-inverse'>
				    <tr>
				      	<th>#</th>
				      	<th>Categoría</th>
				      	<th>Tipo</th>
				    </tr>
				 </thead>
				 <tbody>
				    <tr>
				     	<th scope='row'>1</th>
				      	<td>$categoria</td>
				      	<td>$tipo</td>
				    </tr>
				<tbody>
			<table>
		";
?>