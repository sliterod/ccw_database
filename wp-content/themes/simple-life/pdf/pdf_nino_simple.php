<?php
/*Template Name: PDF Niño Simple*/
require ('../ccwperu/wp-content/themes/simple-life/third-party/fpdf/fpdf.php');

class NINOSIMPLE extends FPDF{
	
	function Header(){
		$this->Image('../ccwperu/wp-content/themes/simple-life/images/ccw_logo.png',10,6,50);
		$this->SetFont('Arial','B',12);
		$this->SetTextColor(255,0,0);
		$this->SetY(4);
		$this->Cell(140);
		$this->Cell(0, 10, utf8_decode("Ficha de información (Sencilla)"),0,0,'C');
		$this->Ln(40);	
	}

	function SetTableHeader(){
		$this->SetFillColor(96,40,46);
		$this->SetTextColor(255,255,255);
		$this->Cell(0,7,utf8_decode("Datos del niño"),1,0,'C',true);
		$this->Ln();
	}

	function Table($header, $data, $img){
		
		$head_array = explode('_',$header);
		$data_array = explode('_',$data);
		$img_array = explode('..',$img);
		
		$this->SetTextColor(0,0,0);
		
		
		$url = '../ccwperu'.$img_array[1];

		$this->Cell(50,63,$this->Image($url,$this->GetX(),$this->GetY(),50,63),1,0,'C');
		
		for ($i= 0; $i<count($head_array); $i++){
			
			if ($i % 2 == 0){
				$this->SetFillColor(220,170,176);
			}
			else {
				$this->SetFillColor(255,255,255);
			}
			
			$this->SetFont('Arial','B',8);
			$this->Cell(35,7,utf8_decode($head_array[$i]),1,0,'L',true);
			
			$this->SetFont('Arial','',8);
			$this->Cell(0,7,utf8_decode($data_array[$i]),1,0,'L',true);
			$this->Ln();
			$this->SetX(80);				
		}
	}
}

	$header = $_POST[head];
	$data = $_POST[data];
	$url = ''.$_POST[url];

	$pdf = new NINOSIMPLE();
	$pdf->SetMargins(30,20,30);
	$pdf->AddPage();

	$pdf->SetTableHeader();
	$pdf->Table($header,$data,$url);	
	
	$pdf->Output();
?>