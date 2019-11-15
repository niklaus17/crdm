<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM formular_2 where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

  $id = $row['id'];
  $director2 = $row['director2'];
  $cabinet2 = $row['cabinet2'];
  $section_id = $row['section_id'];
  $executor2 = $row['executor2'];
  $data2 = $row['data2'];
 	$nume_dispozitiv2 = $row['nume_dispozitiv2'];
	$anul_producerii_dispozitiv2 = $row['anul_producerii_dispozitiv2'];
  $model_dispozitiv2 = $row['model_dispozitiv2'];
  $nr_serie_dispozitiv2 = $row['nr_serie_dispozitiv2'];
  $producator_dispozitiv2 = $row['producator_dispozitiv2'];
  $numar_inventar2 = $row['numar_inventar2'];
  $desc_defect = $row['desc_defect'];
  $cauza_defect = $row['cauza_defect'];
  $actiuni = $row['actiuni'];
  $data_instalarii2 = $row['data_instalarii2'];
  $ore = $row['ore'];
  $chek = $row['chek'];
  $materiale = $row['materiale'];
  $comentarii2 = $row['comentarii2'];
  $beneficiar2 = $row['beneficiar2'];
  $inginer1 = $row['inginer1'];
  $inginer2 = $row['inginer2'];
  $inginer3 = $row['inginer3'];

    array_push($return_arr, array(
      'id' => $id,
      'director2' => $director2,
      'cabinet2' => $cabinet2,
      'section_id' => $section_id,
      'executor2' => $executor2,
      'data2' => $data2,
     	'nume_dispozitiv2' => $nume_dispozitiv2,
    	'anul_producerii_dispozitiv2' => $anul_producerii_dispozitiv2,
      'model_dispozitiv2' => $model_dispozitiv2,
      'nr_serie_dispozitiv2' => $nr_serie_dispozitiv2,
      'producator_dispozitiv2' => $producator_dispozitiv2,
      'numar_inventar2' => $numar_inventar2,
      'desc_defect' => $desc_defect,
      'cauza_defect' => $cauza_defect,
      'actiuni' => $actiuni,
      'data_instalarii2' => $data_instalarii2,
      'ore' => $ore,
      'chek' => $chek,
      'materiale' => $materiale,
      'comentarii2' => $comentarii2,
      'beneficiar2' => $beneficiar2,
      'inginer1' => $inginer1,
      'inginer2' => $inginer2,
      'inginer3' => $inginer3,
			));
}

echo json_encode($return_arr);

?>
