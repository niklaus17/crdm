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
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(92);
    // Title
    $this->Cell(50,6,'Blancuri tiparite de pe: ',0,0,'C');
    $this->SetTextColor(255,102,102);
    $this->Cell(25,6,$_GET['from_date'],1);
    $this->Cell(25,6,$_GET['to_date'],1);
    // Line break
    $this->Ln(15);
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

$display_heading = array('id'=>'Nr.', 'day'=> 'Data', 'model'=> 'Modelul blancului','section'=> 'Sectia','number'=> 'Cantitate','tip'=> 'Tip','name'=> 'Utilizatorul',);

if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
  $result = mysqli_query($conn, "SELECT id, day, model, section, number, tip, name FROM blancuri WHERE day BETWEEN '" . $_GET["from_date"] . "' AND  '" . $_GET["to_date"] . "'") or die("database error:". mysqli_error($connString));

} else {
  $result = mysqli_query($conn, "SELECT id, day, model, section, number, tip, name FROM blancuri") or die("database error:". mysqli_error($connString));

}

$header = mysqli_query($conn, "SHOW columns FROM blancuri");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);



$pdf->SetFillColor(204,255,204);
$pdf->Cell(10,8,$display_heading['id'],1, null, 'C', true);
$pdf->Cell(25,8,$display_heading['day'],1, null, 'C', true);
$pdf->Cell(57,8,$display_heading['model'],1, null, 'C', true);
$pdf->Cell(35,8,$display_heading['section'],1, null, 'C', true);
$pdf->Cell(20,8,$display_heading['number'],1, null, 'C', true);
$pdf->Cell(15,8,$display_heading['tip'],1, null, 'C', true);
$pdf->Cell(30,8,$display_heading['name'],1, null, 'C', true);


foreach($result as $row) {
$pdf->Ln();
$pdf->Cell(10,8,$row['id'],1, null, 'C');
$pdf->Cell(25,8,$row['day'],1, null, 'C');
$pdf->Cell(57,8,$row['model'],1);
$pdf->Cell(35,8,substr($row['section'], 0, 15) . '...',1);
$pdf->Cell(20,8,$row['number'],1, null, 'C');
$pdf->Cell(15,8,$row['tip'],1, null, 'C');
$pdf->Cell(30,8,$row['name'],1,);

}




    $pdf->Ln(20);
    $pdf->Cell(30,6,'Total cantitatea: ',0,0,'C');
    $pdf->SetTextColor(255,102,102);
    $pdf->Cell(15,6,$row['number'],1, null, 'C');
    $pdf->Cell(15,6,$row['tip'],1, null, 'C');

$pdf->Output();

?>
