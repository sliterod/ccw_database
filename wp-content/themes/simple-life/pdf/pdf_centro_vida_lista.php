<?php
/*Template Name: PDF Lista Centros*/
require ('../ccwperu/wp-content/themes/simple-life/third-party/fpdf/fpdf.php');

class LISTACENTRO extends FPDF{
	
	function Header(){
		$this->Image('../ccwperu/pictures/ccw/ccw_logo.png',10,6,50);
		$this->SetFont('Arial','B',10);
		$this->SetTextColor(255,0,0);
		$this->SetY(4);
		$this->Cell(140);
		$this->Cell(0, 10, utf8_decode("Lista Centros de Vida"),0,0,'C');
		$this->Ln(20);	
	}

	function SetTableHeader($header){
		$header_array = explode('_',$header);

		$this->SetFillColor(96,40,46);
		$this->SetTextColor(255,255,255);
		$this->Cell(20,7,utf8_decode($header_array[0]),1,0,'C',true);
		$this->Cell(50,7,utf8_decode($header_array[1]),1,0,'C',true);
		$this->Cell(70,7,utf8_decode($header_array[2]),1,0,'C',true);
		$this->Cell(0,7,utf8_decode($header_array[3]),1,0,'C',true);
		$this->Ln();
	}

	function Table($header, $number, $centre, $teacher, $phone){
		
		$num_array = explode('_',$number);
		$centre_array = explode('_',$centre);
		$teach_array = explode('_',$teacher);
		$phone_array = explode('_',$phone);
		
		$this->SetTableHeader($header);
		$this->SetTextColor(0,0,0);
		
		$this->SetFont('Arial','',8);

		for($i = 1; $i< count($num_array);$i++){			
			
			$phones = explode('/',$phone_array[$i]);
			
			if ($i % 2 == 0){
				$this->SetFillColor(220,170,176);
			}
			else {
				$this->SetFillColor(255,255,255);
			}
		
			$this->Cell(20,7,utf8_decode($num_array[$i]),1,0,'C',true);
			$this->Cell(50,7,utf8_decode($centre_array[$i]),1,0,'C',true);
			$this->Cell(70,7,utf8_decode($teach_array[$i]),1,0,'C',true);
			$this->Cell(25,7,utf8_decode($phones[0]),1,0,'C',true);
			$this->Cell(25,7,utf8_decode($phones[1]),1,0,'C',true);
			$this->Ln();
		}
		
	}
}
	
	$number = $_POST['numero'];
	$centre = $_POST['centro'];
	$teacher = $_POST['maestro'];
	$phone = $_POST['telefono'];
	$head = $_POST['head_num'].'_'.$_POST['head_centro'].'_'.$_POST['head_maestro'].'_'.$_POST['head_telf'];

	$pdf = new LISTACENTRO();
	$pdf->SetMargins(10,20,10);
	$pdf->AddPage();

	$pdf->Table($head,$number,$centre, $teacher, $phone);
	$pdf->Output();
	
?>