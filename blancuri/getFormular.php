<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM formular where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

  $id = $row['id'];
  $director1 = $row['director1'];
  $cabinet = $row['cabinet'];
  $section_id = $row['section_id'];
  $executor = $row['executor'];
  $data1 = $row['data1'];
  $nume_dispozitiv = $row['nume_dispozitiv'];
  $anul_producerii_dispozitiv = $row['anul_producerii_dispozitiv'];
  $model_dispozitiv = $row['model_dispozitiv'];
  $nr_serie_dispozitiv = $row['nr_serie_dispozitiv'];
  $producator_dispozitiv = $row['producator_dispozitiv'];
  $numar_inventar = $row['numar_inventar'];
  $denumire_piesa = $row['denumire_piesa'];
  $model_piesa = $row['model_piesa'];
  $producator_piesa = $row['producator_piesa'];
  $anul_producerii_piesa = $row['anul_producerii_piesa'];
  $nr_serie_dispozitiv_piesa = $row['nr_serie_dispozitiv_piesa'];
  $part_number = $row['part_number'];
  $denumire_piesa_instal = $row['denumire_piesa_instal'];
  $model_piesa_instal = $row['model_piesa_instal'];
  $producator_piesa_instal = $row['producator_piesa_instal'];
  $anul_producerii_piesa_instal = $row['anul_producerii_piesa_instal'];
  $nr_serie_dispozitiv_instal = $row['nr_serie_dispozitiv_instal'];
  $altele = $row['altele'];
  $data_instalarii = $row['data_instalarii'];
  $garantie = $row['garantie'];
  $net = $row['net'];
  $comentarii = $row['comentarii'];
  $beneficiar = $row['beneficiar'];
  $furnizor = $row['furnizor'];
  $furnizor1 = $row['furnizor1'];
  $furnizor2 = $row['furnizor2'];

    array_push($return_arr, array(
      'id' => $id,
      'director1' => $director1,
      'cabinet' => $cabinet,
      'section_id' => $section_id,
      'executor' => $executor,
      'data1' => $data1,
      'nume_dispozitiv' => $nume_dispozitiv,
      'anul_producerii_dispozitiv' => $anul_producerii_dispozitiv,
      'model_dispozitiv' => $model_dispozitiv,
      'nr_serie_dispozitiv' => $nr_serie_dispozitiv,
      'producator_dispozitiv' => $producator_dispozitiv,
      'numar_inventar' => $numar_inventar,
      'denumire_piesa' => $denumire_piesa,
      'model_piesa' => $model_piesa,
      'producator_piesa' => $producator_piesa,
      'anul_producerii_piesa' => $anul_producerii_piesa,
      'nr_serie_dispozitiv_piesa' => $nr_serie_dispozitiv_piesa,
      'part_number' => $part_number,
      'denumire_piesa_instal' => $denumire_piesa_instal,
      'model_piesa_instal' => $model_piesa_instal,
      'producator_piesa_instal' => $producator_piesa_instal,
      'anul_producerii_piesa_instal' => $anul_producerii_piesa_instal,
      'nr_serie_dispozitiv_instal' => $nr_serie_dispozitiv_instal,
      'altele' => $altele,
      'data_instalarii' => $data_instalarii,
      'garantie' => $garantie,
      'net' => $net,
      'comentarii' => $comentarii,
      'beneficiar' => $beneficiar,
      'furnizor' => $furnizor,
      'furnizor1' => $furnizor1,
      'furnizor2' => $furnizor2,
			));
}

echo json_encode($return_arr);

?>
