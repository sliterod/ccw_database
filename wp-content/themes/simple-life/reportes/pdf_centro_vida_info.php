<?php
/*Template Name: PDF Centro Vida*/
require ('../ccwperu/wp-content/themes/simple-life/third-party/fpdf/fpdf.php');
class CENTROPDF extends FPDF{

	function Header(){
		$this->Image('../ccwperu/wp-content/themes/simple-life/images/ccw_logo.png',10,6,50);
		$this->SetFont('Arial','',12);
		$this->SetTextColor(255,0,0);
		$this->SetY(4);
		$this->Cell(140);
		$this->Cell(0, 10, utf8_decode("Información Centro de Vida"),0,0,'c');
		$this->Ln(40);	
	}	
	
	function Table($header, $dataLeft, $dataRight, $align){
		foreach ($header as $col){
			$this->SetFillColor(96,40,46);
			$this->SetTextColor(255,255,255);
			$this->Cell(95,7,utf8_decode($col),0,0,'C',true);	
		}
		$this->Ln();
		$this->SetTextColor(0,0,0);
		$this->Cell(95,15,utf8_decode($dataLeft),0,0,'C');
		$this->MultiCell(95,7,utf8_decode($dataRight),0,$align);
		$this->Ln();
		$this->Ln();	
	}
	
}

	$contenido = $_POST[contenido];
	$centro = $_POST[centro];
	$direccion = $_POST[direccion];
	$maestro = $_POST[maestro];
	$maestro_tel = $_POST[maes_tel];
	$ayudante = $_POST[ayudante];
	$ayudante_tel = $_POST[ayu_tel];
	
	$head_centro = $_POST[head_centro];
	$head_maestro = $_POST[head_maestro];
	$head_ayudante = $_POST[head_ayudante];

	$real_content = explode("_",$contenido);
	$data_centro = explode("_",$head_centro);
	$data_maestro = explode("_",$head_maestro);
	$data_ayudante = explode("_",$head_ayudante);
	
	$pdf = new CENTROPDF();
	$pdf->SetMargins(10,30,10);
	$pdf->AddPage();
	$pdf->SetFont('Arial','',12);
	
	/*Tabla centro*/
	$pdf->Table($data_centro,$centro,$direccion,'J');
	
	/*Tabla maestro*/
	$pdf->Table($data_maestro,$maestro,$maestro_tel,'C');
	
	/*Tabla ayudante*/
	$pdf->Table($data_ayudante,$ayudante,$ayudante_tel,'C');

	$pdf->Output();
?>