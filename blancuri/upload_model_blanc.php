<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{
  $id = $_POST['id'];
  $blanc = $_POST["blanc"];
  $section_id = $_POST["section_id"];
 	$sql="INSERT INTO model_blanc (blanc, section_id) VALUES('$blanc', '$section_id')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='model_blanc.php';
 		</script>
