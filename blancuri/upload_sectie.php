<?php
include_once("db_connect.php");

if(isset($_POST['btn-upload']))
{

  $section = $_POST['section'];
 	$sql="INSERT INTO sectie (section) VALUES('$section')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='section.php';
 		</script>
,
