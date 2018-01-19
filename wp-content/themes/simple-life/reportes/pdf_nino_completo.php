<?php
/*Template Name: PDF Niño Completo*/
require ('../ccwperu/wp-content/themes/simple-life/third-party/fpdf/fpdf.php');

class NINOCOMPLETO extends FPDF{
	
	function Header(){
		$this->Image('../ccwperu/wp-content/themes/simple-life/images/ccw_logo.png',10,6,50);
		$this->SetFont('Arial','B',10);
		$this->SetTextColor(255,0,0);
		$this->SetY(3);
		$this->Cell(120);
		$this->Cell(0, 10, utf8_decode("Ficha de información del patrocinado"),0,0,'C');
		
		$this->Ln(4);	
		$this->Cell(120);
		
		$this->Cell(0, 10, utf8_decode("Sponsorship Information"),0,0,'C');
		$this->Ln();	
	}
	
	function SetTableHeader($text){
		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->SetFillColor(0,100,255);
		$this->SetTextColor(255,255,255);
		$this->Cell(0,5,utf8_decode($text),1,0,'C',true);
		$this->Ln();
	}
	
	function Table($header, $data, $img, $setX, $setWidth){
		
		$head_array = explode('_',$header);
		$data_array = explode('_',$data);
		
		$this->SetTextColor(0,0,0);
		
		if ($img != ""){
			$img_array = explode('..',$img);
			$url = '../ccwperu'.$img_array[1];
			
			$this->Cell(35,45,$this->Image($url,$this->GetX(),$this->GetY(),35,45),1,0,'C');
			
			for ($i= 0; $i<count($head_array); $i++){
				
				if ($i % 2 == 0){
					$this->SetFillColor(230,242,255);
				}
				else {
					$this->SetFillColor(255,255,255);
				}
				
				$this->SetFont('Arial','B',8);
				$this->Cell($setWidth,5,utf8_decode($head_array[$i]),1,0,'L',true);
				
				$this->SetFont('Arial','',8);
				$this->Cell(0,5,utf8_decode($data_array[$i]),1,0,'L',true);
				$this->Ln();
				$this->SetX($setX);				
			}		
		}
		else{
			for ($i= 0; $i<count($head_array); $i++){
				
				if ($i % 2 == 0){
					$this->SetFillColor(230,242,255);
				}
				else {
					$this->SetFillColor(255,255,255);
				}
				
				$this->SetFont('Arial','B',8);
				$this->Cell($setWidth,5,utf8_decode($head_array[$i]),1,0,'L',true);
				
				$this->SetFont('Arial','',8);
				$this->Cell(0,5,utf8_decode($data_array[$i]),1,0,'L',true);
				$this->Ln();
			}	
		}
		
	}
	
	function TableHoriz($header, $data){
		
		$head_array = explode('_',$header);
		$data_array = explode('_',$data);
		
		/*HEADER*/
		$this->SetFont('Arial','B',8);
		$this->SetFillColor(0,100,255);
		$this->SetTextColor(255,255,255);
		
		$this->Cell(45,5,utf8_decode($head_array[0]),1,0,'C',true);
		$this->Cell(45,5,utf8_decode($head_array[1]),1,0,'C',true);
		$this->Cell(25,5,utf8_decode($head_array[2]),1,0,'C',true);
		$this->Cell(10,5,utf8_decode($head_array[3]),1,0,'C',true);
		$this->Cell(10,5,utf8_decode($head_array[4]),1,0,'C',true);
		$this->Cell(0,5,utf8_decode($head_array[5]),1,0,'C',true);
		$this->Ln();
		/*END HEADER*/
		
		/**/
		$this->SetFont('Arial','',8);
		$this->SetTextColor(0,0,0);
		$this->SetFillColor(255,255,255);
		$this->Cell(45,5,utf8_decode($data_array[0]),1,0,'L',true);
		$this->Cell(45,5,utf8_decode($data_array[1]),1,0,'L',true);
		$this->Cell(25,5,utf8_decode($data_array[2]),1,0,'L',true);
		$this->Cell(10,5,utf8_decode($data_array[3]),1,0,'L',true);
		$this->Cell(10,5,utf8_decode($data_array[4]),1,0,'L',true);
		$this->Cell(0,5,utf8_decode($data_array[5]),1,0,'L',true);
		$this->Ln();
		/**/		
	}
	
	function TableMulti($headerLeft, $headerRight, $subHeader, $dataLeft, $dataRight){
		$head_array = explode('_',$headerLeft);
		$head_right = explode('_',$headerRight);
		$sub_array = explode('_',$subHeader);
		$left_array = explode('_',$dataLeft);
		$right_array = explode('_',$dataRight);
		
		//Header
		$this->Cell(95,5,utf8_decode($sub_array[0]),1,0,'C',true);
		$this->Cell(95,5,utf8_decode($sub_array[1]),1,0,'C',true);
		$this->Ln();
		
		$this->SetTextColor(0,0,0);
		
		for ($i= 0; $i<count($head_array); $i++){
			
			if ($i % 2 == 0){
				$this->SetFillColor(230,242,255);
			}
			else {
				$this->SetFillColor(255,255,255);
			}
			
			$this->SetFont('Arial','B',8);
			$this->Cell(35,5,utf8_decode($head_array[$i]),1,0,'L',true);
			
			$this->SetFont('Arial','',8);
			$this->Cell(60,5,utf8_decode($left_array[$i]),1,0,'L',true);
			
			$this->SetFont('Arial','B',8);
			$this->Cell(35,5,utf8_decode($head_right[$i]),1,0,'L',true);
			
			$this->SetFont('Arial','',8);
			$this->Cell(60,5,utf8_decode($right_array[$i]),1,0,'L',true);
			
			$this->Ln();
		}	
	}
	
	function TableHistory($details){
		
		$text = "Historia del niño(a): ";
		$text = $text.$details;

		$this->SetFont('Arial','B',8);
		$this->MultiCell(0,10,utf8_decode($text),1,'J',false);
	}
}

	$headNino = 'Código'.'_'.'Nombres'.'_'.'Apellidos'.'_'
	.'Sexo'.'_'.'Fecha de nacimiento'.'_'.'Edad actual'
	.'_'.'Nombre del Padrino'.'_'.'Estado actual'
	.'_'.'Centro de vida';
	
	$dataNino = 'Código'.'_'.'Nombres'.'_'.'Apellidos'.'_'
	.'Sexo'.'_'.'Fecha de nacimiento'.'_'.'Edad actual'
	.'_'.'Nombre del Padrino'.'_'.'Estado actual'
	.'_'.'Centro de vida';

	$headParent = 'Ocupación'.'_'.'Teléfono'.'_'.'Fecha de nacimiento'.'_'.'¿Vive con la familia?'
	.'_'.'¿Por qué no?'.'_'.'Estado Civil';

	$headAdic = '(Familia) Si no vive con los padres, ¿con quién vive?'
	.'_'.'(Curso favorito) Curso favorito en su lugar de estudios'
	.'_'.'(Tareas) ¿En qué forma ayuda el niño a su familia?'
	.'_'.'(Pasatiempo) ¿Cuál es su juego o actividad favorita?'
	.'_'.'(Sueños futuros) ¿Qué quiere ser cuando sea grande?'
	.'_'.'(Comida común) ¿Qué come como alimento principal?'
	.'_'.'(Rasgos de personalidad)'
	.'_'.'(Salvación) ¿Ha aceptado el niño a Cristo como salvador?'
	.'_'.'(Salvación) ¿En qué fecha lo hizo?';
	
	$headSchool = 'Grado de estudios'.'_'.'Turno'.'_';
	$headTech = 'Nombre'.'_'.'Fecha de ingreso'.'_'.'Fecha de culminación';
	
	$headCentro = 'Nombre Centro de Vida'
	.'_'.'Nombre de quien inscribe'
	.'_'.'Teléfono'
	.'_'.'Fecha de inscripción';
	
	$headHome = 'Ciudad'
	.'_'.'Provincia'
	.'_'.'Distrito'
	.'_'.'Dirección domicilio';
	
	$pdf = new NINOCOMPLETO();
	$pdf->SetMargins(10,30,10);
	$pdf->SetAutoPageBreak(true, 50);
	$pdf->AddPage();
	
	$pdf->SetTableHeader('Datos del niño');
	$pdf->Table($headNino,$dataNino,'../pictures/codigo/P01000F20053.JPG',45,35);
	
	$pdf->SetTableHeader('Datos Escolares');
	$pdf->TableMulti($headSchool, $headTech, 'Educación Básica/Secundaria_Escuela Técnica', 'A_B_','A_B_C');
	
	$pdf->SetTableHeader('Datos Hermanos');
	$pdf->TableHoriz('Nombres_Apellidos_Grado_Edad_Sexo_Observación','B_B_B_B_B_B');
	
	$pdf->SetTableHeader('Datos Padres');
	$pdf->TableMulti($headParent, $headParent, 'Madre_Padre', 'Madre_madre','Padre_padre');
	
	$pdf->SetTableHeader('Información Adicional');
	$pdf->Table($headAdic,'A_B_C','',0,80);
	$pdf->TableHistory("Placeholder details");
	
	$pdf->SetTableHeader('Información Domicilio');
	$pdf->Table($headHome,'A_B_C_D','',0,40);
	
	$pdf->SetTableHeader('Información Centro de Vida');
	$pdf->Table($headCentro,'A_B_C_D','',0,45);
	
	$pdf->Output();
?>