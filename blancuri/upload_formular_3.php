<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
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

  $data_proc = $_POST["data_proc"];
  $data_inst = $_POST["data_inst"];
  $chek1_3 = $_POST["chek1_3"];
  $respons = $_POST["respons"];
  $chek2_3 = $_POST["chek2_3"];
  $luni3 = $_POST["luni3"];
  $comentarii3 = $_POST["comentarii3"];

  $beneficiar3 = $_POST["beneficiar3"];
  $inginer1_3 = $_POST["inginer1_3"];
  $inginer2_3 = $_POST["inginer2_3"];
  $inginer3_3 = $_POST["inginer3_3"];
  $name = $_SESSION['user']['username'];

 	$sql="INSERT INTO formular_3(cabinet3, section_id, executor3, nume_dispozitiv3, anul_producerii_dispozitiv3, model_dispozitiv3, nr_serie_dispozitiv3,
    producator_dispozitiv3, numar_inventar3, data_proc, data_inst, chek1_3, respons, chek2_3, luni3, comentarii3, beneficiar3, inginer1_3, inginer2_3, inginer3_3, name)

        VALUES('$cabinet3', '$section_id', '$executor3', '$nume_dispozitiv3', '$anul_producerii_dispozitiv3', '$model_dispozitiv3', '$nr_serie_dispozitiv3',
          '$producator_dispozitiv3', '$numar_inventar3', '$data_proc', '$data_inst', '$chek1_3', '$respons', '$chek2_3', '$luni3', '$comentarii3', '$beneficiar3', '$inginer1_3', '$inginer2_3', '$inginer2_3', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='formular.php';
 		</script>
