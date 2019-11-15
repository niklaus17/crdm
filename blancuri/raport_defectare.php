<?php
//include connection file
include_once("db_connect.php");
include_once('fpdf.php');

class PDF extends tFPDF
{

// Page footer
function Footer()
{

    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('DejaVuSansCondensed-Oblique','',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');

}
}

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();


$id = $_GET['id'];
$query = "SELECT * FROM formular_4 where id = '$id'";

$result = mysqli_query($conn,$query);
$row = $from_date = mysqli_fetch_assoc($result);


$pdf->AddFont('DejaVuSansCondensed-Bold','','DejaVuSansCondensed-Bold.ttf',true);
$pdf->AddFont('DejaVuSansCondensed-Oblique','','DejaVuSansCondensed-Oblique.ttf',true);
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',12);

// Move to the right
$pdf->SetX(98);
$pdf->Cell(10,6,'Directorului al IMSP CRDM',0,0);
$pdf->SetX(155);
$pdf->Cell(10,6,$row['director4'],0,0);
$pdf->Ln(7);
$pdf->SetX(139);
$pdf->Cell(10,6,'Data',0,0,'C');
$pdf->SetX(155);
$pdf->Cell(10,6,explode(' ', $row['data4'])[0]);
$pdf->Ln(7);
$pdf->SetX(136);
$pdf->Cell(10,6,'Aprobat',0,0,'C');
$pdf->SetX(170);
$pdf->Cell(6,6,'__________________',0,0,'C');
// Line break
$pdf->Ln(15);
$pdf->SetFillColor(217,217,217);
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(190,6,'Formular de defectare a dispozitivului medical',0,0,'C',true);
$pdf->Ln(10);

$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->SetX(10);
$pdf->Cell(30,8,'Se completează de către secția medicală:',0,0,'L');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFillColor(217,217,217);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Denumirea instituției:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['institutia'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Locația:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['locatia'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Număr inventar:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['numar_inventar4'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Data de non-utilizare a dispozitivului medical:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['data_non'],1,0,'L');
$pdf->Ln(10);

$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->SetX(10);
$pdf->Cell(30,8,'Se completează de către departamentul/secția de inginerie biomedicală:',0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Producator:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['producator'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Anul producerii:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['anul_producerii'],1,0,'L');

$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(90,10,'Nume dispozitiv:', 1, 1, true);
$pdf->SetFont('DejaVu','',12);
$pdf->SetXY($x + 90, $y);
$pdf->MultiCell(100,5,$row['nume_dispozitiv4'], 1, 1);
$x = $x + 10;

$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Model:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['model'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Numar de serie:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['numar_serie'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Număr inventar:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['numar_inventar2_4'],1,0,'L');
$pdf->Ln(10);

$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->SetX(10);
$pdf->Cell(30,8,'Se completează de către departamentul contabilitate:',0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Uzura:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['uzura'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Data dării în exploatare:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['data_exploatare'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Uzura:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['uzura'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Termenul de exploatare:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['termen'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Preț nominal:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['pret'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Valoarea curentă a dispozitivului:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(100,8,$row['valoarea'],1,0,'L');
$pdf->Ln(10);

$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->SetX(10);
$pdf->Cell(30,8,'Descrierea stării tehnice a dispozitivului:',0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('DejaVu','',12);
$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(190,5,$row['descrierea'],1,1,'L');
$pdf->Ln(10);

$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->SetX(10);
$pdf->Cell(30,8,'Cauza neutralizarii:',0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('DejaVu','',12);
$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(190,5,$row['cauza'],1,1,'L');
$pdf->Ln(10);

$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->SetX(10);
$pdf->Cell(30,8,'Nota:',0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('DejaVu','',12);
$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(190,5,$row['nota'],1,1,'L');
$pdf->Ln(10);

// Beneficiari
if(strlen($row['beneficiar4']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Șef secție:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['beneficiar4'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);

}
if(strlen($row['contabil']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Șef contabil:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['contabil'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);

}
if(strlen($row['it']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Șef TI si TM:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['it'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);

}
if(strlen($row['inginer1_4']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Executor/Inginer:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['inginer1_4'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);

}
if(strlen($row['inginer2_4']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Executor/Inginer:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['inginer2_4'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);

}
if(strlen($row['inginer3_4']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Executor/Inginer:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['inginer3_4'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');

    	}



// Cell(width, height, 'Text', border, new line, 'Text align')
$pdf->Output();

?>
