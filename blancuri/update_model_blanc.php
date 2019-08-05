<?php

include_once 'db_connect.php';
if(isset($_POST['btn-update']))
{

  $id = $_POST['id'];
	$blanc = $_POST["blanc"];
  $section_id = $_POST["section_id"];
  $query = "UPDATE model_blanc SET  blanc='$blanc', section_id='$section_id' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location:  model_blanc.php');
 ?>
