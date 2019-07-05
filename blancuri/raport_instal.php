<?php
//include connection file
include_once("db_connect.php");
include_once('fpdf.php');


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');

}


$pdf = new tFPDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();


$pdf->AddFont('DejaVuSansCondensed-Bold','','DejaVuSansCondensed-Bold.ttf',true);
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',12);

// Move to the right
$pdf->SetX(118);
$pdf->Cell(10,6,'Nume/Prenume',0,0);
$pdf->SetX(155);
$pdf->Cell(10,6,'VERBENIUC Vitalie',0,0);
$pdf->Ln(7);
$pdf->SetX(139);
$pdf->Cell(10,6,'Data',0,0,'C');
$pdf->SetX(155);
$pdf->Cell(10,6,'__________________');
$pdf->Ln(7);
$pdf->SetX(136);
$pdf->Cell(10,6,'Aprobat',0,0,'C');
$pdf->SetX(170);
$pdf->Cell(6,6,'__________________',0,0,'C');
// Line break
$pdf->Ln(20);
$pdf->SetFillColor(217,217,217);
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(190,6,'Formular de instalare a piesei de schimb/accesoriu la dispozitivul medical',0,0,'C',true);
$pdf->Ln(20);

$id = $_GET['id'];
$query = "SELECT * FROM formular where id = '$id'";

$result = mysqli_query($conn,$query);
$row = $from_date = mysqli_fetch_assoc($result);

$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->SetX(10);
$pdf->Cell(30,8,'Date beneficiar:',0,0,'L');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFillColor(217,217,217);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Cabinetul:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['cabinet'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Executor:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['executor'],1,0,'L');
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
$pdf->Cell(36,8,explode(' ', $row['data1'])[0],1,0,'L');
$pdf->Ln(15);

//tabel 2
$pdf->SetX(10);
$pdf->SetFillColor(217,217,217);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(48,8,'Date dispozitiv medical:',0,0,'L');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Denumire piesă/accesoriu:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['nume_dispozitiv'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Anul producerii:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['anul_producerii_dispozitiv'],1,0,'L');
$pdf->Ln();
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Model:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['model_dispozitiv'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Nr. serie:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['nr_serie_dispozitiv'],1,0,'L');
$pdf->Ln();
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Producător:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['producator_dispozitiv'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Număr inventar:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['numar_inventar'] ,1,0,'L');
$pdf->Ln(15);

//tabel 2

$pdf->SetX(10);
$pdf->SetFillColor(217,217,217);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(48,8,'Date piesă/accesoriu:',0,0,'L');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Denumire piesă/accesoriu:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['denumire_piesa'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Anul producerii:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['anul_producerii_piesa'],1,0,'L');
$pdf->Ln();
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Model:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['model_piesa'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Nr. serie:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['nr_serie_dispozitiv_piesa'],1,0,'L');
$pdf->Ln();
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Producator:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['producator_piesa'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Part number:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['part_number'],1,0,'L');
$pdf->Ln(15);

// tabel 3
$pdf->SetX(23);
$pdf->SetFillColor(217,217,217);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(155,8,'Date cu privire la dispozitivul medical pentru care a fost instalată piesa/accesoriul:',0,0,'C');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Denumire piesa/accesoriu:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['denumire_piesa_instal'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Anul producerii:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['anul_producerii_piesa_instal'],1,0,'L');
$pdf->Ln();
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Model:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['model_piesa_instal'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Nr. serie:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['nr_serie_dispozitiv_instal'],1,0,'L');
$pdf->Ln();
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(52,8,'Producator:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(70,8,$row['producator_piesa_instal'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(32,8,'Altele*:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(36,8,$row['altele'],1,0,'L');
$pdf->Ln(15);

// tabel 3
$pdf->SetX(10);
$pdf->SetFillColor(217,217,217);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(71,8,'Inspecție/Test de funcționalitate:',0,0,'L');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Data instalării/ Montării:',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(40,8,$row['data_instalarii'],1,0,'L');
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(60,8,'Perioada de garantie:',1,0,'L',true);
$pdf->Ln();
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',10,5);
$pdf->Cell(90,8,'Test de operare (verificarea funcționalității):',1,0,'L',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(40,8,$row["net"],1,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(60,8,$row['garantie'],1,0,'L');
$pdf->SetX(155);
$pdf->Cell(10,8,'luni',0,0,'L');
$pdf->Ln(15);

// Comentarii
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(71,8,'Comentarii:',0,0,'L');
$pdf->Ln(8);
$pdf->SetX(10);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('DejaVu','',12);
$pdf->MultiCell(190,5,$row['comentarii'],1,1,'L');
$pdf->Ln(15);

// Beneficiari
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Beneficiar:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['beneficiar'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);
$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Executor/Inginer:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['furnizor'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);

if(strlen($row['furnizor1']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Executor/Inginer:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['furnizor1'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');
$pdf->Ln(10);

}
if(strlen($row['furnizor2']) > 0) {

$pdf->SetX(10);
$pdf->SetFont('DejaVuSansCondensed-Bold','',12);
$pdf->Cell(40,8,'Executor/Inginer:',0,0,'L');
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(80,8,$row['furnizor2'],0,0,'L');
$pdf->Cell(70,8,'Semnătura ________________',0,0,'L');

    	}

// Cell(width, height, 'Text', border, new line, 'Text align')
$pdf->Output();

?>
