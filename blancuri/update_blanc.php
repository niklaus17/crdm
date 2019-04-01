<?php
session_start();

include_once 'db_connect.php';
if(isset($_POST['btn-update']))
{

  $id = $_POST['id'];
 	$day = $_POST['day'];
	$model = $_POST["model"];
  $section = $_POST["section"];
  $number = $_POST["number"];
  $tip = $_POST["tip"];
  $name = $_SESSION['name'];
  $query = "UPDATE blancuri SET day='$day', model='$model', section='$section', number='$number', tip='$tip', name='$name' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location:  blancuri.php');
 ?>
