<?php
require('third-party/fpdf/fpdf.php');


		$pdf = new FPDF();
		$pdf->AddPage();

		foreach ($result as $row){
			$pdf->SetFont('Arial','',12);					
			$pdf->Ln();
			
			foreach ($row as $column)
				$pdf->Cell(90,12,$column,1);
		}
	
		$pdf->Output();
?>