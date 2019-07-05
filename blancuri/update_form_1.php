<?php

include_once 'db_connect.php';
if(isset($_POST['btn-update_1']))
{

  $id = $_POST['id'];
  $cabinet = $_POST["cabinet"];
  $section_id = $_POST["section_id"];
  $executor = $_POST["executor"];
  $nume_dispozitiv = $_POST["nume_dispozitiv"];
  $anul_producerii_dispozitiv = $_POST["anul_producerii_dispozitiv"];
  $model_dispozitiv = $_POST["model_dispozitiv"];
  $nr_serie_dispozitiv = $_POST["nr_serie_dispozitiv"];
  $producator_dispozitiv = $_POST["producator_dispozitiv"];
  $numar_inventar = $_POST["numar_inventar"];
  $denumire_piesa = $_POST["denumire_piesa"];
  $model_piesa = $_POST["model_piesa"];
  $producator_piesa = $_POST["producator_piesa"];
  $anul_producerii_piesa = $_POST["anul_producerii_piesa"];
  $nr_serie_dispozitiv_piesa = $_POST["nr_serie_dispozitiv_piesa"];
  $part_number = $_POST["part_number"];
  $denumire_piesa_instal = $_POST["denumire_piesa_instal"];
  $model_piesa_instal = $_POST["model_piesa_instal"];
  $producator_piesa_instal = $_POST["producator_piesa_instal"];
  $anul_producerii_piesa_instal = $_POST["anul_producerii_piesa_instal"];
  $nr_serie_dispozitiv_instal = $_POST["nr_serie_dispozitiv_instal"];
  $altele = $_POST["altele"];
  $data_instalarii = $_POST["data_instalarii"];
  $garantie = $_POST["garantie"];
  $net = $_POST["net"];
  $comentarii = str_replace("'", "''",$_POST["comentarii"]);
  $beneficiar = $_POST["beneficiar"];
  $furnizor = $_POST["furnizor"];
  $furnizor1 = $_POST["furnizor1"];
  $furnizor2 = $_POST["furnizor2"];
  $name = $_SESSION['user']['username'];

  $query = "UPDATE formular SET cabinet='$cabinet', section_id='$section_id', executor='$executor', nume_dispozitiv='$nume_dispozitiv', anul_producerii_dispozitiv='$anul_producerii_dispozitiv',
  model_dispozitiv='$model_dispozitiv', nr_serie_dispozitiv='$nr_serie_dispozitiv', producator_dispozitiv='$producator_dispozitiv', numar_inventar='$numar_inventar',
  denumire_piesa='$denumire_piesa', model_piesa='$model_piesa', producator_piesa='$producator_piesa', anul_producerii_piesa='$anul_producerii_piesa', nr_serie_dispozitiv_piesa='$nr_serie_dispozitiv_piesa',
  part_number='$part_number', denumire_piesa_instal='$denumire_piesa_instal', model_piesa_instal='$model_piesa_instal', producator_piesa_instal='$producator_piesa_instal',
  anul_producerii_piesa_instal='$anul_producerii_piesa_instal', nr_serie_dispozitiv_instal='$nr_serie_dispozitiv_instal', altele='$altele', data_instalarii='$data_instalarii',
  garantie='$garantie', net='$net', comentarii='$comentarii', beneficiar='$beneficiar', furnizor='$furnizor', furnizor1='$furnizor1', furnizor2='$furnizor2', name='$name' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location: formular.php');
 ?>
