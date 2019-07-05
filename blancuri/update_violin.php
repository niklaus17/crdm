<?php

include_once 'db_connect.php';
if(isset($_POST['btn-update']))
{

  $id = $_POST['id'];
  $data = $_POST['data'];
  $casa = $_POST['casa'];
  $problema = str_replace("'", "''",$_POST['problema']);
  $solutia = str_replace("'", "''",$_POST['solutia']);

  $query = "UPDATE violin SET data='$data', casa='$casa', problema='$problema', solutia='$solutia' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location:  violin.php');
 ?>
