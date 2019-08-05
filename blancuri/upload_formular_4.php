<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{

  $id = $_POST['id'];

  $chek1_4 = $_POST["chek1_4"];
  $institutia = $_POST['institutia'];
  $locatia = $_POST['locatia'];
  $numar_inventar4 = $_POST['numar_inventar4'];
 	$data_non = $_POST['data_non'];
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
  $cauza = str_replace("'", "''",$_POST["cauza"]);
  $nota = str_replace("'", "''",$_POST["nota"]);

  $beneficiar4 = $_POST["beneficiar4"];
  $contabil = $_POST["contabil"];
  $it = $_POST["it"];

  $inginer1_4 = $_POST["inginer1_4"];
  $inginer2_4 = $_POST["inginer2_4"];
  $inginer3_4 = $_POST["inginer3_4"];
  $name = $_SESSION['user']['username'];

 	$sql="INSERT INTO formular_4(chek1_4, institutia, locatia, numar_inventar4, data_non, producator, anul_producerii, nume_dispozitiv4, model, numar_serie, numar_inventar2_4, uzura, data_exploatare,
    termen, pret, valoarea, descrierea, cauza, nota, beneficiar4, contabil, it, inginer1_4, inginer2_4, inginer3_4, name)

        VALUES('$chek1_4', '$institutia', '$locatia', '$numar_inventar4', '$data_non', '$producator', '$anul_producerii', '$nume_dispozitiv4', '$model', '$numar_serie', '$numar_inventar2_4', '$uzura',
          '$data_exploatare', '$termen', '$pret', '$valoarea', '$descrierea', '$cauza', '$nota', '$beneficiar4', '$contabil', '$it', '$inginer1_4', '$inginer2_4', '$inginer3_4', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='formular.php';
 		</script>
