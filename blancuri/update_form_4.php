<?php

include_once 'db_connect.php';
if(isset($_POST['btn-update_4']))
{

  $id = $_POST['id'];

  $chek1_4 = $_POST["chek1_4"];
  $institutia = $_POST["institutia"];
  $locatia = $_POST["locatia"];
  $numar_inventar4 = $_POST["numar_inventar4"];
  $data_non = $_POST["data_non"];
  $producator = $_POST["producator"];
  $anul_producerii = $_POST["anul_producerii"];
  $nume_dispozitiv4 = $_POST["nume_dispozitiv4"];
  $model = $_POST["model"];
  $numar_serie = $_POST["numar_serie"];
  $numar_inventar2_4 = $_POST["numar_inventar2_4"];
  $uzura = $_POST["uzura"];
  $data_exploatare = $_POST["data_exploatare"];
  $termen = $_POST["termen"];
  $pret = $_POST["pret"];
  $valoarea = $_POST["valoarea"];
  $descrierea = $_POST["descrierea"];
  $cauza = $_POST["cauza"];
  $nota = $_POST["nota"];
  $beneficiar4 = $_POST["beneficiar4"];
  $contabil = $_POST["contabil"];
  $it = $_POST["it"];
  $inginer1_4 = $_POST["inginer1_4"];
  $inginer2_4 = $_POST["inginer2_4"];
  $inginer3_4 = $_POST["inginer3_4"];
  $name = $_SESSION['user']['username'];

  $query = "UPDATE formular_4 SET chek1_4='$chek1_4', institutia='$institutia', locatia='$locatia', numar_inventar4='$numar_inventar4', data_non='$data_non',
  producator='$producator', anul_producerii='$anul_producerii', nume_dispozitiv4='$nume_dispozitiv4', model='$model', numar_serie='$numar_serie',
  numar_inventar2_4='$numar_inventar2_4', uzura='$uzura', data_exploatare='$data_exploatare', termen='$termen', pret='$pret', valoarea='$valoarea',
  descrierea='$descrierea', cauza='$cauza', nota='$nota', beneficiar4='$beneficiar4', contabil='$contabil', it='$it', inginer1_4='$inginer1_4',
  inginer2_4='$inginer2_4', inginer3_4='$inginer3_4', name='$name' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location: formular.php');
 ?>
