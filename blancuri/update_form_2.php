<?php

include_once 'db_connect.php';
if(isset($_POST['btn-update_2']))
{

  $id = $_POST['id'];
  $cabinet2 = $_POST['cabinet2'];
  $section_id = $_POST['section_id'];
  $executor2 = $_POST['executor2'];
 	$nume_dispozitiv2 = $_POST['nume_dispozitiv2'];
	$anul_producerii_dispozitiv2 = $_POST["anul_producerii_dispozitiv2"];
  $model_dispozitiv2 = $_POST["model_dispozitiv2"];
  $nr_serie_dispozitiv2 = $_POST["nr_serie_dispozitiv2"];
  $producator_dispozitiv2 = $_POST["producator_dispozitiv2"];
  $numar_inventar2 = $_POST["numar_inventar2"];
  $desc_defect = str_replace("'", "''",$_POST["desc_defect"]);
  $cauza_defect = str_replace("'", "''",$_POST["cauza_defect"]);
  $actiuni = str_replace("'", "''",$_POST["actiuni"]);
  $data_instalarii2 = $_POST["data_instalarii2"];
  $ore = $_POST["ore"];
  $chek = $_POST["chek"];
  $materiale = str_replace("'", "''",$_POST["materiale"]);
  $comentarii2 = str_replace("'", "''",$_POST["comentarii2"]);
  $beneficiar2 = $_POST["beneficiar2"];
  $inginer1 = $_POST["inginer1"];
  $inginer2 = $_POST["inginer2"];
  $inginer3 = $_POST["inginer3"];
  $name = $_SESSION['user']['username'];

  $query = "UPDATE formular_2 SET cabinet2='$cabinet2', section_id='$section_id', executor2='$executor2', nume_dispozitiv2='$nume_dispozitiv2', anul_producerii_dispozitiv2='$anul_producerii_dispozitiv2',
  model_dispozitiv2='$model_dispozitiv2', nr_serie_dispozitiv2='$nr_serie_dispozitiv2', producator_dispozitiv2='$producator_dispozitiv2', numar_inventar2='$numar_inventar2',
  desc_defect='$desc_defect', cauza_defect='$cauza_defect', actiuni='$actiuni', data_instalarii2='$data_instalarii2', ore='$ore', chek='$chek', materiale='$materiale',
  comentarii2='$comentarii2', beneficiar2='$beneficiar2', inginer1='$inginer1', inginer2='$inginer2', inginer3='$inginer3', name='$name' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location: formular.php');
 ?>
