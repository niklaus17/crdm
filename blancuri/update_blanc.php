<?php
session_start();

include_once 'db_connect.php';
if(isset($_POST['btn-update']))
{

  $id = $_POST['id'];
 	$day = $_POST['day'];
	$model = $_POST["model"];
  $section_id = $_POST["section_id"];
  $number = $_POST["number"];
  $tip_id = $_POST["tip_id"];
  $name = $_SESSION['name'];
  $query = "UPDATE blancuri SET day='$day', model='$model', section_id='$section_id', number='$number', tip_id='$tip_id', name='$name' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location:  blancuri.php');
 ?>
