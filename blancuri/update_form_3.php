<?php

include_once 'db_connect.php';
if(isset($_POST['btn-update_3']))
{

  $id = $_POST['id'];
  $cabinet3 = $_POST['cabinet3'];
  $section_id = $_POST['section_id'];
  $executor3 = $_POST['executor3'];
 	$nume_dispozitiv3 = $_POST['nume_dispozitiv3'];
	$anul_producerii_dispozitiv3 = $_POST["anul_producerii_dispozitiv3"];
  $model_dispozitiv3 = $_POST["model_dispozitiv3"];
  $nr_serie_dispozitiv3 = $_POST["nr_serie_dispozitiv3"];
  $producator_dispozitiv3 = $_POST["producator_dispozitiv3"];
  $numar_inventar3 = $_POST["numar_inventar3"];

  $model_1_3 = $_POST["model_1_3"];
  $model_2_3 = $_POST["model_2_3"];
  $model_3_3 = $_POST["model_3_3"];
  $model_4_3 = $_POST["model_4_3"];

  $nr_serie_1_3 = $_POST["nr_serie_1_3"];
  $nr_serie_2_3 = $_POST["nr_serie_2_3"];
  $nr_serie_3_3 = $_POST["nr_serie_3_3"];
  $nr_serie_4_3 = $_POST["nr_serie_4_3"];

  $chek1_3 = $_POST["chek1_3"];
  $respons = $_POST["respons"];
  $chek2_3 = $_POST["chek2_3"];
  $luni3 = $_POST["luni3"];
  $comentarii3 = str_replace("'", "''",$_POST["comentarii3"]);

  $beneficiar3 = $_POST["beneficiar3"];
  $inginer1_3 = $_POST["inginer1_3"];
  $inginer2_3 = $_POST["inginer2_3"];
  $inginer3_3 = $_POST["inginer3_3"];
  $name = $_SESSION['user']['username'];

  $query = "UPDATE formular_3 SET cabinet3='$cabinet3', section_id='$section_id', executor3='$executor3', nume_dispozitiv3='$nume_dispozitiv3',
  anul_producerii_dispozitiv3='$anul_producerii_dispozitiv3',  model_dispozitiv3='$model_dispozitiv3', nr_serie_dispozitiv3='$nr_serie_dispozitiv3',
  producator_dispozitiv3='$producator_dispozitiv3', numar_inventar3='$numar_inventar3', model_1_3='$model_1_3', model_2_3='$model_2_3', model_3_3='$model_3_3',
  model_4_3='$model_4_3', nr_serie_1_3='$nr_serie_1_3', nr_serie_2_3='$nr_serie_2_3', nr_serie_3_3='$nr_serie_3_3',  nr_serie_4_3='$nr_serie_4_3', chek1_3='$chek1_3',
  respons='$respons', chek2_3='$chek2_3', luni3='$luni3',  comentarii3='$comentarii3', beneficiar3='$beneficiar3',  inginer1_3='$inginer1_3', inginer2_3='$inginer2_3',
  inginer3_3='$inginer3_3', name='$name' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location: formular.php');
 ?>
