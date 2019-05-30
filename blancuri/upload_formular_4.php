<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{

  $id = $_POST['id'];

  $chek1 = $_POST["chek1"];
  $institutia = $_POST['institutia'];
  $locatia = $_POST['locatia'];
  $numar_inventar = $_POST['numar_inventar'];
 	$data_non = $_POST['data_non'];
	$producator = $_POST["producator"];
  $anul_producerii = $_POST["anul_producerii"];
  $nume_dispozitiv = $_POST["nume_dispozitiv"];
  $model = $_POST["model"];
  $numar_serie = $_POST["numar_serie"];
  $numar_inventar_2 = $_POST["numar_inventar_2"];
  $uzura = $_POST["uzura"];
  $data_exploatare = $_POST["data_exploatare"];
  $termen = $_POST["termen"];
  $pret = $_POST["pret"];
  $valoarea = $_POST["valoarea"];
  $descrierea = $_POST["descrierea"];
  $cauza = $_POST["cauza"];
  $nota = $_POST["nota"];

  $beneficiar = $_POST["beneficiar"];
  $contabil = $_POST["contabil"];
  $it = $_POST["it"];

  $inginer1 = $_POST["inginer1"];
  $inginer2 = $_POST["inginer2"];
  $inginer3 = $_POST["inginer3"];
  $name = $_SESSION['user']['username'];

 	$sql="INSERT INTO formular_4(chek1, institutia, locatia, numar_inventar, data_non, producator, anul_producerii, nume_dispozitiv, model, numar_serie, numar_inventar_2, uzura, data_exploatare,
    termen, pret, valoarea, descrierea, cauza, nota, beneficiar, contabil, it, inginer1, inginer2, inginer3, name)

        VALUES('$chek1', '$institutia', '$locatia', '$numar_inventar', '$data_non', '$producator', '$anul_producerii', '$nume_dispozitiv', '$model', '$numar_serie', '$numar_inventar_2', '$uzura',
          '$data_exploatare', '$termen', '$pret', '$valoarea', '$descrierea', '$cauza', '$nota', '$beneficiar', '$contabil', '$it', '$inginer1', '$inginer2', '$inginer3', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='formular.php';
 		</script>
