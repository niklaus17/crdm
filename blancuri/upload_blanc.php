<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{

  $id = $_POST['id'];
 	$day = $_POST['day'];
	$model = $_POST["model"];
  $section_id = $_POST["section_id"];
  $number = $_POST["number"];
  $tip_id = $_POST["tip_id"];
  $user = $_SESSION['user']['username'];

 	$sql="INSERT INTO blancuri(day, model, section_id, number, tip_id, user) VALUES( '$day', '$model', '$section_id', '$number', '$tip_id', '$user')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='blancuri.php';
 		</script>
