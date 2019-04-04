<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{
  $format = $_POST["format"];
 	$sql="INSERT INTO tipul (format) VALUES('$format')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='type.php';
 		</script>
