<?php
	include 'plantilla.php';
	require '../php/conex.php';

	$query= "SELECT * FROM incidentes";
	$resultado=$mysqli->query($query);

	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'Categoria',1,0,'C',1);
	$pdf->Cell(40,6,'Tipo',1,0,'C',1);
	$pdf->Cell(100,6,'Calle',1,0,'C',1);
	$pdf->Cell(30,6,'Fecha',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

	while($row = $resultado->fetch_assoc() ) {
		$pdf->Cell(20,8,$row['CATEGORIA'],1,0,'C');
		$pdf->Cell(40,8,$row['TIPO'],1,0,'C');
		$pdf->Cell(100,8,$row['CALLE'],1,0,'C');
		$pdf->Cell(30,8,$row['FECHA'],1,1,'C');
	}

	$pdf->Output();
?>
