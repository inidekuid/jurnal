<?php 
class PDF extends FPDF
{
// Page header
function Header()
{
	
    // Logo
    //$this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','',12);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Rekap Bulanan',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Hal '.$this->PageNo().'/{nb}',0,0,'C');
}
}
?>