<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */


require("fpdf/pdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();
?>


