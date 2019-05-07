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

  $name = $_SESSION['user']['username'];

 	$sql="INSERT INTO formular(cabinet, section_id, executor, nume_dispozitiv, anul_producerii_dispozitiv, model_dispozitiv, nr_serie_dispozitiv, producator_dispozitiv, numar_inventar, name)
        VALUES('$cabinet', '$section_id', '$executor', '$nume_dispozitiv', '$anul_producerii_dispozitiv', '$model_dispozitiv', '$nr_serie_dispozitiv', '$producator_dispozitiv', '$numar_inventar', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='formular.php';
 		</script>
