<?php
session_start();

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{

  $id = $_POST['id'];
 	$day = $_POST['day'];
	$model = $_POST["model"];
  $section = $_POST["section"];
  $number = $_POST["number"];
  $tip = $_POST["tip"];
  $name = $_SESSION['name'];
 	$sql="INSERT INTO blancuri(day, model, section, number, tip, name) VALUES( '$day', '$model', '$section', '$number', '$tip', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='index.php';
 		</script>
