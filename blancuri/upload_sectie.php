<?php
session_start();

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{
  $id = $_POST['id'];
  $section = $_POST['section'];
 	$sql="INSERT INTO sectie (id, section) VALUES('$id', '$section')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='section.php';
 		</script>
,
