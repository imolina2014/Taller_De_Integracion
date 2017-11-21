<?php
	include 'plantilla_sec.php';
	require '../php/conex.php';

	$query= "SELECT * FROM sectores";
	$resultado=$mysqli->query($query);

	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'Id Dueno',1,0,'C',1);
	$pdf->Cell(20,6,'Id Sector',1,0,'C',1);
	$pdf->Cell(50,6,'Nombre',1,0,'C',1);
	$pdf->Cell(100,6,'Tipo',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

	while($row = $resultado->fetch_assoc() ) {
		$pdf->Cell(20,8,$row['ID_DUENO'],1,0,'C');
		$pdf->Cell(20,8,$row['ID_SECTOR'],1,0,'C');
		$pdf->Cell(50,8,$row['NOMBRE'],1,0,'C');
		$pdf->Cell(100,8,$row['TIPO'],1,1,'C');
	}

	$pdf->Output();
?>
