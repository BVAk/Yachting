<?
require('public/css/fpdf.php');
$pdf = new FPDF('P', 'pt', 'Letter');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 16, "Hello, World!");
$pdf->Output();
?>