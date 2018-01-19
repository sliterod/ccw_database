<?php
/*Template Name: PDF Lista Centros*/
require ('../ccwperu/wp-content/themes/simple-life/third-party/fpdf/fpdf.php');

class LISTACENTRO extends FPDF{
	
	function Header(){
		$this->Image('../ccwperu/wp-content/themes/simple-life/images/ccw_logo.png',10,6,50);
		$this->SetFont('Arial','B',12);
		$this->SetTextColor(255,0,0);
		$this->SetY(4);
		$this->Cell(140);
		$this->Cell(0, 10, utf8_decode("Lista Centros de Vida"),0,0,'C');
		$this->Ln(20);	
	}

	function SetTableHeader($header){
		$header_array = explode('_',$header);

		$this->SetFillColor(0,100,255);
		$this->SetTextColor(255,255,255);
		$this->Cell(20,7,utf8_decode($header_array[0]),1,0,'C',true);
		$this->Cell(0,7,utf8_decode($header_array[1]),1,0,'C',true);
		$this->Ln();
	}

	function Table($header, $number, $centre){
		
		$num_array = explode('_',$number);
		$centre_array = explode('_',$centre);
		
		$this->SetTableHeader($header);
		$this->SetTextColor(0,0,0);
		
		$this->SetFont('Arial','',10);
		for($i = 1; $i< count($num_array);$i++){			
		
			if ($i % 2 == 0){
				$this->SetFillColor(230,242,255);
			}
			else {
				$this->SetFillColor(255,255,255);
			}
		
			$this->Cell(20,7,utf8_decode($num_array[$i]),1,0,'C',true);
			$this->Cell(0,7,utf8_decode($centre_array[$i]),1,0,'C',true);
			$this->Ln();
		}
		
	}
}
	
	$number = $_POST[numero];
	$centre = $_POST[centro];
	$head = $_POST[head_num].'_'.$_POST[head_centro];

	$pdf = new LISTACENTRO();
	$pdf->SetMargins(30,20,30);
	$pdf->AddPage();

	$pdf->Table($head,$number,$centre);
	$pdf->Output();
	
?>