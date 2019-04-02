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
    $this->SetFont('Helvetica','I',12);
    // Move to the right
    $this->Cell(92);
    // Title
    $this->Cell(50,6,'Blancuri tiparite de pe: ',0,0,'C');
    $this->SetTextColor(255,102,102);
    // $this->Cell(25,6,$_GET['from_date'],1);
    // $this->Cell(25,6,$_GET['to_date'],1);
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



$display_heading = array('id'=>'Nr.', 'day'=> 'Data', 'model'=> 'Modelul blancului','section_id'=> 'Sectia','number'=> 'Cantitate','tip_id'=> 'Tip','name'=> 'Utilizatorul',);

if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
  $result = mysqli_query($conn, "SELECT id, day, model, section_id, number, tip_id, name FROM blancuri WHERE day BETWEEN '" . $_GET["from_date"] . "' AND  '" . $_GET["to_date"] . "'") or die("database error:". mysqli_error($connString));

} else {
  $result = mysqli_query($conn, "SELECT id, day, model, section_id, number, tip_id, name FROM blancuri") or die("database error:". mysqli_error($connString));

}

$header = mysqli_query($conn, "SHOW columns FROM blancuri");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);



$pdf->SetFillColor(204,255,204);
$pdf->Cell(10,8,$display_heading['id'],1, null, 'C', true);
$pdf->Cell(20,8,$display_heading['day'],1, null, 'C', true);
$pdf->Cell(57,8,$display_heading['model'],1, null, 'C', true);
$pdf->Cell(37,8,$display_heading['section_id'],1, null, 'C', true);
$pdf->Cell(20,8,$display_heading['number'],1, null, 'C', true);
$pdf->Cell(18,8,$display_heading['tip_id'],1, null, 'C', true);
$pdf->Cell(30,8,$display_heading['name'],1, null, 'C', true);


foreach($result as $row) {
$pdf->Ln();
$pdf->Cell(10,8,$row['id'],1, null, 'C');
$pdf->Cell(20,8,$row['day'],1, null, 'C');
$pdf->Cell(57,8,$row['model'],1);

$section_id = $row['section_id'];
$section_query = "SELECT  section from sectie where id = " . $section_id;
$result = mysqli_query($conn, $section_query) or die(mysqli_error($conn));
$section_name = mysqli_fetch_assoc($result)['section'];
$pdf->Cell(37,8,iconv('UTF-8', 'ASCII//TRANSLIT', substr($section_name, 0, 15)) . '...',1);

$pdf->Cell(20,8,$row['number'],1, null, 'C');

$type_id =  $row['tip_id'];
$type_query = "SELECT  format from tipul where id = " . $type_id;
$result = mysqli_query($conn, $type_query)  or die(mysqli_error($conn));
$type_name = mysqli_fetch_assoc($result)['format'];
$pdf->Cell(18,8,$type_name,1, null, 'C');

$pdf->Cell(30,8,$row['name'],1,);

}

$pdf->Ln(20);
$count_query = "SELECT SUM(number) as total, tip_id FROM blancuri GROUP BY tip_id";
$result = mysqli_query($conn, $count_query)  or die(mysqli_error($conn));

foreach($result as $row) {

  $type_id =  $row['tip_id'];
  $type_query = "SELECT  format from tipul where id = " . $type_id;
  $result = mysqli_query($conn, $type_query)  or die(mysqli_error($conn));
  $type_name = mysqli_fetch_assoc($result)['format'];

  $pdf->Cell(30,6,'Total cantitatea: ',0,'C');
  $pdf->Cell(15,6, $row['total'],1, null, 'C');
  $pdf->Cell(20,6,$type_name,1, null, 'C');
  $pdf->Ln(10);

}


$pdf->Output();

?>
