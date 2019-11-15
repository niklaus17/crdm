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


$pdf->AddFont('DejaVuSansCondensed-Bold','','DejaVuSansCondensed-Bold.ttf',true);
$pdf->AddFont('DejaVuSansCondensed-Oblique','','DejaVuSansCondensed-Oblique.ttf',true);
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',12);

$id = $_GET['id'];
$query = "SELECT * FROM formular_3 where id = '$id'";

$result = mysqli_query($conn,$query);
$row = $from_date = mysqli_fetch_assoc($result);

// Move to the right
$pdf->SetX(99);
$pdf->Cell(10,6,'Vicedirectorului DTI și TM',0,0);
$pdf->SetX(155);
$pdf->Cell(10,6,$row['director3'],0,0);
$pdf->Ln(7);
$pdf->SetX(139);
$pdf->Cell(10,6,'Data',0,0,'C');
$pdf->SetX(155);
$pdf->Cell(10,6,explode(' ', $row['data3'])[0]);
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
$pdf->Cell(190,6,'Intervenție de mentenanță a dispozitivului',0,0,'C',true);
$pdf->Ln(10);

$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->SetX(10);
$pdf->Cell(30,8,'Date beneficiar:',0,0,'L');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFillColor(217,217,217);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Cabinetul:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['cabinet3'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Executor:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['executor3'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVu','',12);
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Secția:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);

$section_id = $row['section_id'];
$section_query = "SELECT  section from sectie where id = " . $section_id;
$result = mysqli_query($conn, $section_query) or die(mysqli_error($conn));
$section_name = mysqli_fetch_assoc($result)['section'];
$pdf->Cell(70,8,iconv('UTF-8', 'ASCII//TRANSLIT', substr($section_name, 0, 33)) . '...',1);

$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Data efectuării:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,explode(' ', $row['data3'])[0],1,0,'L');
$pdf->Ln(10);

$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->SetX(10);
$pdf->Cell(30,8,'Date dispozitiv medical:',0,0,'L');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFillColor(217,217,217);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Denumire dispozitiv:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['nume_dispozitiv3'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Anul producerii:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['anul_producerii_dispozitiv3'],1,0,'L');
$pdf->Ln();

$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Model:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['model_dispozitiv3'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Nr. serie:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['nr_serie_dispozitiv3'],1,0,'L');
$pdf->Ln();

$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Producător:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['producator_dispozitiv3'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Număr inventar:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['numar_inventar3'],1,0,'L');

if(strlen($row['model_1_3']) > 0) {
  $pdf->Ln(15);

$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Model',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['model_1_3'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Serie',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);

}
if(strlen($row['nr_serie_1_3']) > 0) {

$pdf->Cell(36,8,$row['nr_serie_1_3'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);

}
if(strlen($row['model_2_3']) > 0) {

$pdf->Cell(52,8,'Model',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['model_2_3'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Serie',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);

}
if(strlen($row['nr_serie_2_3']) > 0) {

$pdf->Cell(36,8,$row['nr_serie_2_3'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);

}
if(strlen($row['model_3_3']) > 0) {

$pdf->Cell(52,8,'Model',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['model_3_3'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Serie',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);

}
if(strlen($row['nr_serie_3_3']) > 0) {

$pdf->Cell(36,8,$row['nr_serie_3_3'],1,0,'L');
$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);

}
if(strlen($row['model_4_3']) > 0) {

$pdf->Cell(52,8,'Model',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['model_4_3'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Serie',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);

}
if(strlen($row['nr_serie_4_3']) > 0) {

$pdf->Cell(36,8,$row['nr_serie_4_3'],1,0,'L');
}
$pdf->Ln(15);

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Mentenață:',1,0,'L',true);
$pdf->Cell(40,8,'Supus',1,0,'L',true);
$pdf->Cell(98,8,'Responsabil:',1,0,'L',true);
$pdf->Ln();
$pdf->Cell(52,8,'Mentenață preventivă:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(40,8,$row['chek1_3'],1,0,'L');
$pdf->Cell(98,8,$row['respons'],1,0,'L');

$pdf->Ln();
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Verificarea periodică:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(40,8,$row['chek2_3'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Periodicitatea:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(46,8,$row['luni3'],1,0,'L');
$pdf->SetX(175);
$pdf->Cell(10,8,'luni',0,0,'L');
$pdf->Ln(10);

// Comentarii
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(71,8,'Comentarii:',0,0,'L');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('DejaVu','',12);
$pdf->MultiCell(190,5,$row['comentarii3'],1,1,'L');

$pdf->Ln(10);

// Beneficiari
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Șef secție:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['beneficiar3'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Executor/Inginer:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['inginer1_3'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);

if(strlen($row['inginer2_3']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Executor/Inginer:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['inginer2_3'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);

}
if(strlen($row['inginer3_3']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Executor/Inginer:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['inginer3_3'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');

    	}

// Cell(width, height, 'Text', border, new line, 'Text align')
$pdf->Output();

?>
