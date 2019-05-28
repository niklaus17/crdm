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

  $data_proc = $_POST["data_proc"];
  $data_inst = $_POST["data_inst"];
  $term_expl = $_POST["term_expl"];
  $chek = $_POST["chek"];
  $respons = $_POST["respons"];
  $chek1 = $_POST["chek1"];
  $luni = $_POST["luni"];
  $comentarii = $_POST["comentarii"];

  $beneficiar = $_POST["beneficiar"];
  $inginer1 = $_POST["inginer1"];
  $inginer2 = $_POST["inginer2"];
  $inginer3 = $_POST["inginer3"];
  $name = $_SESSION['user']['username'];

 	$sql="INSERT INTO formular_3(cabinet, section_id, executor, nume_dispozitiv, anul_producerii_dispozitiv, model_dispozitiv, nr_serie_dispozitiv,
    producator_dispozitiv, numar_inventar, data_proc, data_inst, term_expl, chek, respons, chek1, luni, comentarii, beneficiar, inginer1, inginer2, inginer3, name)

        VALUES('$cabinet', '$section_id', '$executor', '$nume_dispozitiv', '$anul_producerii_dispozitiv', '$model_dispozitiv', '$nr_serie_dispozitiv',
          '$producator_dispozitiv', '$numar_inventar', '$data_proc', '$data_inst', '$term_expl', '$chek', '$respons', '$chek1', '$luni', '$comentarii', '$beneficiar', '$inginer1', '$inginer2', '$inginer3', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='formular.php';
 		</script>
