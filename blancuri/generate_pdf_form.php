<?php
//include connection file
include_once("db_connect.php");
include_once('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('img/logo_dark.png',10,9,70);
    $this->SetFont('Helvetica','B',12);
    // Move to the right
    $this->Cell(92);
    $this->Cell(65,6,'Aprobat',0,0,'C');
    $this->Ln(5);
    $this->Cell(232,6,'Nume / Prenume',0,0,'C');
    $this->Ln(5);
    $this->Cell(255,6,'Data',0,0,'C');


    // Line break
    $this->Ln(15);
 // Title
 $this->Cell(180,6,'Formular de instalare a piesei de schimb/accesoriu la dispozitivul medical',0,0,'C');

    // Line break
    $this->Ln(15);

    $this->SetFont('Helvetica','B',12);
    $this->Cell(48,6,'Date dispozitiv medical:',0,0,'C');
    $this->Ln(5);
}

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
}



$display_heading = array('nume_dispozitiv'=>'Denumire dispozitiv:', 'name'=> 'Utilizatorul',);

$result = mysqli_query($conn, "SELECT nume_dispozitiv, name FROM formular ") or die("database error:". mysqli_error($connString));


$header = mysqli_query($conn, "SHOW columns FROM formular");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);



$pdf->Cell(40,8,$display_heading['nume_dispozitiv'],1,'C');
$pdf->Cell(25,8,$display_heading['name'],1,'C');


foreach($result as $row) {
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(40,8,$row['nume_dispozitiv'],1, null, 'C');

$pdf->Cell(25,8,$row['name'],1);

}

$pdf->Output();

?>
