<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM formular_3 where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

  $id = $row['id'];
  $director3 = $row['director3'];
  $cabinet3 = $row['cabinet3'];
  $section_id = $row['section_id'];
  $executor3 = $row['executor3'];
  $data3 = $row['data3'];
 	$nume_dispozitiv3 = $row['nume_dispozitiv3'];
	$anul_producerii_dispozitiv3 = $row['anul_producerii_dispozitiv3'];
  $model_dispozitiv3 = $row['model_dispozitiv3'];
  $nr_serie_dispozitiv3 = $row['nr_serie_dispozitiv3'];
  $producator_dispozitiv3 = $row['producator_dispozitiv3'];
  $numar_inventar3 = $row['numar_inventar3'];

  $model_1_3 = $row["model_1_3"];
  $model_2_3 = $row["model_2_3"];
  $model_3_3 = $row["model_3_3"];
  $model_4_3 = $row["model_4_3"];

  $nr_serie_1_3 = $row["nr_serie_1_3"];
  $nr_serie_2_3 = $row["nr_serie_2_3"];
  $nr_serie_3_3 = $row["nr_serie_3_3"];
  $nr_serie_4_3 = $row["nr_serie_4_3"];

  $chek1_3 = $row["chek1_3"];
  $respons = $row["respons"];
  $chek2_3 = $row["chek2_3"];
  $luni3 = $row["luni3"];
  $comentarii3 = $row["comentarii3"];

  $beneficiar3 = $row['beneficiar3'];
  $inginer1_3 = $row['inginer1_3'];
  $inginer2_3 = $row['inginer2_3'];
  $inginer3_3 = $row['inginer3_3'];

    array_push($return_arr, array(
      'id' => $id,
      'director3' => $director3,
      'cabinet3' => $cabinet3,
      'section_id' => $section_id,
      'executor3' => $executor3,
      'data3' => $data3,
     	'nume_dispozitiv3' => $nume_dispozitiv3,
    	'anul_producerii_dispozitiv3' => $anul_producerii_dispozitiv3,
      'model_dispozitiv3' => $model_dispozitiv3,
      'nr_serie_dispozitiv3' => $nr_serie_dispozitiv3,
      'producator_dispozitiv3' => $producator_dispozitiv3,
      'numar_inventar3' => $numar_inventar3,

      'model_1_3' => $model_1_3,
      'model_2_3' => $model_2_3,
      'model_3_3' => $model_3_3,
      'model_4_3' => $model_4_3,

      'nr_serie_1_3' => $nr_serie_1_3,
      'nr_serie_2_3' => $nr_serie_2_3,
      'nr_serie_3_3' => $nr_serie_3_3,
      'nr_serie_4_3' => $nr_serie_4_3,

      'chek1_3' => $chek1_3,
      'respons' => $respons,
      'chek2_3' => $chek2_3,
      'luni3' => $luni3,
      'comentarii3' => $comentarii3,

      'beneficiar3' => $beneficiar3,
      'inginer1_3' => $inginer1_3,
      'inginer2_3' => $inginer2_3,
      'inginer3_3' => $inginer3_3,
			));
}

echo json_encode($return_arr);

?>
