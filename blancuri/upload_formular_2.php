<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{

  $id = $_POST['id'];

  $cabinet = $_POST['cabinet'];
  $section_id = $_POST['section_id'];
  $executor = $_POST['executor'];
 	$nume_dispozitiv = $_POST['nume_dispozitiv'];
	$anul_producerii_dispozitiv = $_POST["anul_producerii_dispozitiv"];
  $model_dispozitiv = $_POST["model_dispozitiv"];
  $nr_serie_dispozitiv = $_POST["nr_serie_dispozitiv"];
  $producator_dispozitiv = $_POST["producator_dispozitiv"];
  $numar_inventar = $_POST["numar_inventar"];
  $desc_defect = $_POST["desc_defect"];
  $cauza_defect = $_POST["cauza_defect"];
  $actiuni = $_POST["actiuni"];
  $data_instalarii = $_POST["data_instalarii"];
  $ore = $_POST["ore"];
  $chek = $_POST["chek"];
  $materiale = $_POST["materiale"];
  $comentarii = $_POST["comentarii"];
  $beneficiar = $_POST["beneficiar"];
  $inginer1 = $_POST["inginer1"];
  $inginer2 = $_POST["inginer2"];
  $inginer3 = $_POST["inginer3"];
  $name = $_SESSION['user']['username'];

 	$sql="INSERT INTO formular_2(cabinet, section_id, executor, nume_dispozitiv, anul_producerii_dispozitiv, model_dispozitiv, nr_serie_dispozitiv,
    producator_dispozitiv, numar_inventar, desc_defect, cauza_defect, actiuni, data_instalarii, ore, chek, materiale, comentarii, beneficiar, inginer1, inginer2, inginer3, name)

        VALUES('$cabinet', '$section_id', '$executor', '$nume_dispozitiv', '$anul_producerii_dispozitiv', '$model_dispozitiv', '$nr_serie_dispozitiv',
          '$producator_dispozitiv', '$numar_inventar', '$desc_defect', '$cauza_defect', '$actiuni', '$data_instalarii', '$ore', '$chek', '$materiale', '$comentarii', '$beneficiar', '$inginer1', '$inginer2', '$inginer3', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='formular.php';
 		</script>
