<?php
use view\View;
use dao\MieterDAO;
use domain\Mieter;
require_once("config/Autoloader.php");
require('fpdf/fpdf.php');

class PDF extends FPDF
{

    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','',30);
        $this->SetTextColor(255, 255, 255);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Dein',0,0,'C');
        $this->SetFont('Arial','B',30);
        //$this->Cell(30,10,'Mieterspiegel.',0,0,'C');
        // Line break
        $this->Ln(20);
    }
// Daten übergeben
    function LoadData()
    {
        global $mieter;
        return $mieter;
    }


// Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(0,0,255);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,255);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(40, 35, 60, 40);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        $total = 0;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,iconv('UTF-8', 'windows-1252',$row->getVorname()),'LR',0,'L',$fill);
            $this->Cell($w[1],6,iconv('UTF-8', 'windows-1252',$row->getNachname()),'LR',0,'L',$fill);
            $this->Cell($w[2],6,iconv('UTF-8', 'windows-1252',$row->getAdresse()),'LR',0,'L',$fill);
            $this->Cell($w[3],6,iconv('UTF-8', 'windows-1252',number_format($row->getMietzins())),'LR',0,'R',$fill);
            $total += $row->getMietzins();
            $this->Ln();
            $fill = !$fill;
        }
        $this->Cell($w[0],6,"TOTAL",'LR',0,'L',$fill);
        $this->Cell($w[1],6,"",'LR',0,'L',$fill);
        $this->Cell($w[2],6,"",'LR',0,'L',$fill);
        $this->Cell($w[3],6,number_format($total),'LR',0,'R',$fill);
        $this->Ln();

        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
}

$pdf = new PDF();
// Column headings
$header = array('Vornamen', 'Name','Adresse', 'Mietzins');
// Data loading
$data = $pdf->LoadData();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Ln();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>
