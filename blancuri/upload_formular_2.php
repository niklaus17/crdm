<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
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
  $actiuni = $_POST["actiuni"];
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

 	$sql="INSERT INTO formular_2(cabinet2, section_id, executor2, nume_dispozitiv2, anul_producerii_dispozitiv2, model_dispozitiv2, nr_serie_dispozitiv2,
    producator_dispozitiv2, numar_inventar2, desc_defect, cauza_defect, actiuni, data_instalarii2, ore, chek, materiale, comentarii2, beneficiar2, inginer1, inginer2, inginer3, name)

        VALUES('$cabinet2', '$section_id', '$executor2', '$nume_dispozitiv2', '$anul_producerii_dispozitiv2', '$model_dispozitiv2', '$nr_serie_dispozitiv2',
          '$producator_dispozitiv2', '$numar_inventar2', '$desc_defect', '$cauza_defect', '$actiuni', '$data_instalarii2', '$ore', '$chek', '$materiale', '$comentarii2', '$beneficiar2', '$inginer1', '$inginer2', '$inginer3', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='formular.php';
 		</script>
