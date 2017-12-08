<?php


require_once("config/Autoloader.php");
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    var $adresse = 'Hagenholzstrasse 62';
    var $plz = 3800;
    var $ort = 'Interlaken';
    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Helvetica','',30);
        // Move to the right
        // Title
        $this->Cell('','','Dein ',0,0,'C');
        $this->SetFont('Helvetica','B','');
        $this->Cell('','','Mieterspiegel.',0,0);

        // Line break
        $this->Ln(30);
        //Adresse
        $this->SetFont('Helvetica','',12);
        $this->Cell('','',$this->adresse,0,0,'L');
        $this->Ln(5);
        $this->Cell('','',$this->plz.' '.$this->ort,0,0,'L');
        // Line break
        $this->Ln(30);
    }
// Daten übergeben
    function LoadData()
    {
        global $mieter;
        return $mieter;
    }

    function setAdresse($adresse, $plz, $ort){
        $this->$adresse = $adresse;
        $this->plz = $plz;
        $this-> ort = $ort;
    }
// Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetDrawColor(255);
        $this->SetLineWidth(.3);
        $this->SetFont('Helvetica','B');
        // Header
        $w = array(40, 35, 60, 40);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],15,$header[$i],1,0,'L',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(217,217,217);
        $this->SetTextColor(0);
        $this->SetFont('Helvetica');
        // Data
        $fill = true;
        $total = 0;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,iconv('UTF-8', 'windows-1252',$row->getVorname()),'LR',0,'L',$fill);
            $this->Cell($w[1],6,iconv('UTF-8', 'windows-1252',$row->getNachname()),'LR',0,'L',$fill);
            $this->Cell($w[2],6,iconv('UTF-8', 'windows-1252',$row->getQuadratmeter()),'LR',0,'L',$fill);
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
$header = array('Vornamen', 'Name','Quadratmeter', 'Mietzins');
// Data loading
$data = $pdf->LoadData();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Ln();
$pdf->FancyTable($header,$data);
$pdf->Output();

