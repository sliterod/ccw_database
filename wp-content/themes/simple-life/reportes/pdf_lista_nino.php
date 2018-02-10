<?php
/*Template Name: PDF Lista Niño*/
require ('../ccwperu/wp-content/themes/simple-life/third-party/fpdf/fpdf.php');

class PdfListaNino extends FPDF{
	function Header(){
		$this->Image('../ccwperu/wp-content/themes/simple-life/images/ccw_logo.png',10,6,50);
		$this->SetY(3);
		$this->Cell(120);
		$this->Ln(20);	
	}
	
	function SetTableHeader($title){
		
		if ($title == "TODOS") 
			$txt = utf8_decode("LISTA DE NIÑOS");
		else
			$txt = utf8_decode("LISTA DE NIÑOS ".$title);
		
		$this->SetFont('Arial','B',10);
		$this->SetTextColor(255,0,0);
		$this->Cell(0,5,$txt,0,0,'C',false);
		$this->Ln();
		$this->Ln();
	}
	
	function SetTableSubHeader($centro){
		$centroArray = explode("_",$centro);
		
		$pageWidth = $this->GetPageWidth();
		$cellWidth = $pageWidth/2;
		
		$nomMaestro = strtoupper(utf8_decode($centroArray[1]));
		$telMaestro = utf8_decode($centroArray[2]);
		
		$this->Cell($cellWidth,5,"CENTRO: ".strtoupper(utf8_decode($centroArray[0])),0,0,'L',false);
		$this->Cell(0,5,$nomMaestro." (".$telMaestro.")",0,0,'R',false);
		
		$this->Ln();
		
	}
	
	function SetTableData($data){
		$dataArray = explode("_",$data);
		
		$this->Cell(0,5,utf8_decode("TOTAL: ").count($dataArray),0,0,'L',false);
		$this->Ln();
		$this->Ln();
		
		$this->SetFillColor(96,40,46);
		$this->SetTextColor(255,255,255);
		$this->Cell(10,5,utf8_decode("N°"),1,0,'C',true);
		$this->Cell(100,5,utf8_decode("NOMBRE DEL NIÑO"),1,0,'L',true);
		$this->Cell(0,5,utf8_decode("CÓDIGO"),1,0,'L',true);
		$this->Ln();
				
		$this->SetTextColor(0,0,0);
		for ($i = 0; $i < count($dataArray); $i++){

			$array = explode(";",$dataArray[$i]);

			if ($i % 2 == 0){
				$this->SetFillColor(220,170,176);
			}
			else {
				$this->SetFillColor(255,255,255);
			}
			
			$this->Cell(10,5,$i+1,1,0,'C',true);
			$this->Cell(100,5,strtoupper(utf8_decode($array[0])),1,0,'L',true);
			$this->Cell(0,5,strtoupper(utf8_decode($array[1])),1,0,'L',true);
			$this->Ln();
		}
	}
	
	function GetMonth($month){
		
		$mes = "";
		
		switch ($month)	{
			case 01: $mes = "ENERO"; break;
			case 02: $mes = "FEBRERO"; break;
			case 03: $mes = "MARZO"; break;
			case 04: $mes = "ABRIL"; break;
			case 05: $mes = "MAYO"; break;
			case 06: $mes = "JUNIO"; break;
			case 07: $mes = "JULIO"; break;
			case 08: $mes = "AGOSTO"; break;
			case 09: $mes = "SETIEMBRE"; break;
			case 10: $mes = "OCTUBRE"; break;
			case 11: $mes = "NOVIEMBRE"; break;
			case 12: $mes = "DICIEMBRE"; break;
		}
		
		return $mes;
	}
	
	function SetTableDataAssist($data){
		$dataArray = explode("_",$data);
		
		setlocale(LC_ALL, "es_ES");
		
		$month = date("m, Y");
		$month = "MES: ".$this->GetMonth($month);
		
		$this->Cell(0,5,utf8_decode("TOTAL: ").count($dataArray),0,0,'L',false);
		$this->Ln();
		$this->Ln();
				
		$this->Cell(10,5,"",0,0,'C',false);
		$this->Cell(70,5,"",0,0,'L',false);
		$this->Cell(50,5,$month,0,0,'C',false);
		$this->Cell(0,5,"",0,0,'L',false);
		$this->Ln();
		
		$this->SetFillColor(96,40,46);
		$this->SetTextColor(255,255,255);
		$this->Cell(10,5,utf8_decode("N°"),1,0,'C',true);
		$this->Cell(70,5,utf8_decode("NOMBRE DEL NIÑO"),1,0,'L',true);
		
		for ($i = 0; $i < 5; $i++){
			$this->Cell(10,5," / ",1,0,'C',true);	
		}
				
		$this->Cell(0,5,utf8_decode("OBSERVACIONES"),1,0,'L',true);
		$this->Ln();
	
		$this->SetTextColor(0,0,0);
		$this->SetFont('Arial','B',8);
		for ($i = 0; $i < count($dataArray); $i++){

			$array = explode(";",$dataArray[$i]);

			if ($i % 2 == 0){
				$this->SetFillColor(220,170,176);
			}
			else {
				$this->SetFillColor(255,255,255);
			}
			
			$this->Cell(10,5,$i+1,1,0,'C',true);
			$this->Cell(70,5,strtoupper(utf8_decode($array[0])),1,0,'L',true);
			
			for ($j = 0; $j < 5; $j++){
				$this->Cell(10,5,"",1,0,'C',true);	
			}
					
			$this->Cell(0,5,"",1,0,'L',true);
			
			$this->Ln();
		}
	}
	
}
	$nombres = $_POST[nombres];
	$centro = $_POST[centro];
	$tipo = $_POST[tipo];
	
	$pdf = new PdfListaNino();
	$pdf->SetMargins(10,30,10);
	$pdf->SetAutoPageBreak(true);
	$pdf->AddPage();
	
	if ($tipo == "ASISTENCIA"){
		$pdf->SetTableHeader("(".$tipo.")");
		$pdf->SetTableSubHeader($centro);
		$pdf->SetTableDataAssist($nombres);
	}
	else{
		$pdf->SetTableHeader($tipo);
		$pdf->SetTableSubHeader($centro);
		$pdf->SetTableData($nombres);	
	}
		
	$pdf->Output();

?>