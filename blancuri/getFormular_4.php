<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM formular_4 where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

  $id = $row['id'];

  $chek1_4 = $row["chek1_4"];
  $institutia = $row['institutia'];
  $locatia = $row['locatia'];
  $numar_inventar4 = $row['numar_inventar4'];
 	$data_non = $row['data_non'];
	$producator = $row["producator"];
  $anul_producerii = $row["anul_producerii"];
  $nume_dispozitiv4 = $row["nume_dispozitiv4"];
  $model = $row["model"];
  $numar_serie = $row["numar_serie"];
  $numar_inventar2_4 = $row["numar_inventar2_4"];
  $uzura = $row["uzura"];
  $data_exploatare = $row["data_exploatare"];
  $termen = $row["termen"];
  $pret = $row["pret"];
  $valoarea = $row["valoarea"];
  $descrierea = $row["descrierea"];
  $cauza = $row["cauza"];
  $nota = $row["nota"];

  $beneficiar4 = $row["beneficiar4"];
  $contabil = $row["contabil"];
  $it = $row["it"];

  $inginer1_4 = $row['inginer1_4'];
  $inginer2_4 = $row['inginer2_4'];
  $inginer3_4 = $row['inginer3_4'];

    array_push($return_arr, array(
      'id' => $id,

      'chek1_4' => $chek1_4,
      'institutia' => $institutia,
      'locatia' => $locatia,
      'numar_inventar4' => $numar_inventar4,
     	'data_non' => $data_non,
    	'producator' => $producator,
      'anul_producerii' => $anul_producerii,
      'nume_dispozitiv4' => $nume_dispozitiv4,
      'model' => $model,
      'numar_serie' => $numar_serie,
      'numar_inventar2_4' => $numar_inventar2_4,
      'uzura' => $uzura,
      'data_exploatare' => $data_exploatare,
      'termen' => $termen,
      'pret' => $pret,
      'valoarea' => $valoarea,
      'descrierea' => $descrierea,
      'cauza' => $cauza,
      'nota' => $nota,

      'beneficiar4' => $beneficiar4,
      'contabil' => $contabil,
      'it' => $it,

      'inginer1_4' => $inginer1_4,
      'inginer2_4' => $inginer2_4,
      'inginer3_4' => $inginer3_4,
			));
}

echo json_encode($return_arr);

?>
