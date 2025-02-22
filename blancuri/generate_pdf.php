<?php
//include connection file
include_once("db_connect.php");
include_once('fpdf.php');

$from_date = '';
$to_date = '';

if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
  $from_date = $_GET['from_date'];
  $to_date = $_GET['to_date'];
} else {
  $dates_query = "SELECT MIN(day) as from_date from blancuri";
  $result = mysqli_query($conn, $dates_query)  or die(mysqli_error($conn));
  $from_date = mysqli_fetch_assoc($result)['from_date'];

  $dates_query = "SELECT MAX(day) as to_date from blancuri";
  $result = mysqli_query($conn, $dates_query)  or die(mysqli_error($conn));
  $to_date =  mysqli_fetch_assoc($result)['to_date'];
}

class PDF extends tFPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('img/logo_dark.png',10,9,70);
    $this->SetFont('Helvetica','B',12);
    // Move to the right
    $this->Cell(92);
    // Title
    $this->Cell(50,6,'Blancuri tiparite de pe: ',0,0,'C');
    $this->SetTextColor(07,39,69);

    global $from_date, $to_date;

    $this->Cell(25,6,$from_date,1);
    $this->Cell(25,6,$to_date,1);
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



$display_heading = array('id'=>'Nr.', 'day'=> 'Data', 'blanc_id'=> 'Modelul blancului','section_id'=> 'Secția','number'=> 'Cantitate','tip_id'=> 'Tip','user'=> 'Utilizator',);

$result = mysqli_query($conn, "SELECT id, day, blanc_id, section_id, number, tip_id, user FROM blancuri WHERE day BETWEEN '" . $from_date . "' AND  '" . $to_date . "'") or die("database error:". mysqli_error($connString));


$header = mysqli_query($conn, "SHOW columns FROM blancuri");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);

$pdf->AddFont('DejaVuSansCondensed-Bold','','DejaVuSansCondensed-Bold.ttf',true);
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',12);

$pdf->SetFillColor(204,255,204);
$pdf->Cell(10,8,$display_heading['id'],1, null, 'C', true);
$pdf->Cell(20,8,$display_heading['day'],1, null, 'C', true);
$pdf->Cell(60,8,$display_heading['blanc_id'],1, null, 'C', true);
$pdf->Cell(37,8,$display_heading['section_id'],1, null, 'C', true);
$pdf->Cell(20,8,$display_heading['number'],1, null, 'C', true);
$pdf->Cell(18,8,$display_heading['tip_id'],1, null, 'C', true);
$pdf->Cell(27,8,$display_heading['user'],1, null, 'C', true);

$i = 1;
foreach($result as $row) {
$pdf->Ln();

$pdf->SetFont('DejaVu','',10);
$pdf->Cell(10,8,$i++,1, null, 'C');
$pdf->Cell(20,8,$row['day'],1, null, 'C');

$blanc_id = $row['blanc_id'];
$blanc_query = "SELECT  blanc from model_blanc where id = " . $blanc_id;
$result = mysqli_query($conn, $blanc_query) or die(mysqli_error($conn));
$blanc_name = mysqli_fetch_assoc($result)['blanc'];

if(strlen($blanc_name) > 30 ) {
  $pdf->Cell(60,8,iconv('UTF-8', 'ASCII//TRANSLIT',substr($blanc_name, 0, 30)) . '...',1);
} else {
  $pdf->Cell(60,8,iconv('UTF-8', 'ASCII//TRANSLIT',$blanc_name), 1);
}

$section_id = $row['section_id'];
$section_query = "SELECT  section from sectie where id = " . $section_id;
$result = mysqli_query($conn, $section_query) or die(mysqli_error($conn));
$section_name = mysqli_fetch_assoc($result)['section'];
$pdf->Cell(37,8,iconv('UTF-8', 'ASCII//TRANSLIT', substr($section_name, 0, 18)) . '...',1);

$pdf->Cell(20,8,$row['number'],1, null, 'C');

$type_id =  $row['tip_id'];
$type_query = "SELECT  format from tipul where id = " . $type_id;
$result = mysqli_query($conn, $type_query)  or die(mysqli_error($conn));
$type_name = mysqli_fetch_assoc($result)['format'];
$pdf->Cell(18,8,$type_name,1, null, 'C');

$pdf->Cell(27,8,$row['user'],1);

}

$pdf->Ln(20);
$count_query = "SELECT SUM(number) as total, tip_id FROM blancuri WHERE day BETWEEN '" . $from_date . "' AND  '" . $to_date . "' GROUP BY tip_id"  ;
$result = mysqli_query($conn, $count_query)  or die(mysqli_error($conn));

foreach($result as $row) {

  $type_id =  $row['tip_id'];
  $type_query = "SELECT  format from tipul where id = " . $type_id;
  $result = mysqli_query($conn, $type_query)  or die(mysqli_error($conn));
  $type_name = mysqli_fetch_assoc($result)['format'];

  $pdf->SetFont('DejaVuSansCondensed-Bold','',10);
  $pdf->Cell(35,6,'Total cantitatea: ',0,'C');
  $pdf->SetFont('DejaVu','',10);
  $pdf->Cell(15,6, $row['total'],1, null, 'C');
  $pdf->SetFont('DejaVuSansCondensed-Bold','',10);
  $pdf->Cell(20,6,$type_name,1, null, 'C');
  $pdf->Ln(10);

}


$pdf->Output();

?>
