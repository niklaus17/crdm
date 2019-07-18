<?php

include_once 'db_connect.php';
if(isset($_POST['btn-update']))
{

  $id = $_POST['id'];
 	$day = $_POST['day'];
	$blanc_id = $_POST["blanc_id"];
  $section_id = $_POST["section_id"];
  $number = $_POST["number"];
  $tip_id = $_POST["tip_id"];
  $name = $_SESSION['user']['username'];
  $query = "UPDATE blancuri SET day='$day', blanc_id='$blanc_id', section_id='$section_id', number='$number', tip_id='$tip_id', user='$name' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }
   header('Location:  blancuri.php');
 ?>
