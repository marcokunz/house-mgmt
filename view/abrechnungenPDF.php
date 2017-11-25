<?php
use view\View;
use dao\MieterDAO;
use domain\Mieter;
use dao\KostenDAO;
use dao\EinnahmeDAO;
require_once("config/Autoloader.php");
require('fpdf/fpdf.php');

class PDF extends FPDF
{

    // Daten übergeben
    function LoadData()
    {
        global $mieter;
        return $mieter;
    }

    function LoadData2()
    {
        global $einnahme;
        return $einnahme;
    }

    function LoadData3()
    {
        global $kosten;
        return $kosten;

    }

    // Page header
    function Header($data)
    {
        // Arial bold 15
        $this->SetFont('Helvetica','',30);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->Cell(100,10,'Abrechnung',0,0,'C');
        $this->SetFont('Helvetica','B',20);
        $this->Cell(200,10,iconv('UTF-8', 'windows-1252', $data->getVorname()." ".$data->getNachname()),0,0,'C');
        // Line break
        $this->Ln(20);
    }



// Colored table
    function FancyTable($header, $data, $data1, $data2)
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

            $KostenDAO = new KostenDAO();
            $EinnahmeDAO = new EinnahmeDAO();

                $this->Cell($w[0], 6, iconv('UTF-8', 'windows-1252', $data->getVorname()." ".$data->getNachname()), 'LR', 0, 'L', $fill);
                $this->Cell($w[1], 6, iconv('UTF-8', 'windows-1252', $KostenDAO->getTotalKosten($data->getId(), "Heizkosten")), 'LR', 0, 'L', $fill);
                $this->Cell($w[2], 6, iconv('UTF-8', 'windows-1252', $KostenDAO->getTotalKosten($data->getId(), "Nebenkosten")), 'LR', 0, 'L', $fill);
                $this->Cell($w[3], 6, iconv('UTF-8', 'windows-1252', $EinnahmeDAO->getTotalEinnahmen($data->getId())), 'LR', 0, 'R', $fill);

                $this->Ln();
                $fill = !$fill;

        // Closing line
    }
}
$data = $pdf->LoadData();
$data1 =  $pdf->LoadData2();
$data2 = $pdf->LoadData3();
$pdf = new PDF();
// Column headings
$header = array('Name', 'Heizkosten','Nebenkosten', 'Mieteing&auml&nge');
// Data loading
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Ln();
$pdf->FancyTable($header,$data, $data1, $data2);
$pdf->Output();
?>