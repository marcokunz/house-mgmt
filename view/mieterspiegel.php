<?php
use view\View;
use dao\MieterDAO;
use domain\Mieter;
require_once("config/Autoloader.php");
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Load data
    function LoadData()
    {
        global $mieter;
        return $mieter;
    }


// Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(40, 35, 50, 20);
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
            $this->Cell($w[3],6,iconv('UTF-8', 'windows-1252',$row->getMietzins()),'LR',0,'L',$fill);
            $total += $row->getMietzins();
            $this->Ln();
            $fill = !$fill;
        }
        $this->Cell($w[0],6,"TOTAL",'LR',0,'L',$fill);
        $this->Cell($w[1],6,"",'LR',0,'L',$fill);
        $this->Cell($w[2],6,"",'LR',0,'L',$fill);
        $this->Cell($w[3],6,$total,'LR',0,'L',$fill);
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
$pdf->FancyTable($header,$data);
$pdf->Output();
?>

?>
