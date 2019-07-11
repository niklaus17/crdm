<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload-problema']))
{

  $id = $_POST['id'];
 	$data = $_POST['data'];
	$casa = $_POST["casa"];
  $problema = str_replace("'", "''",$_POST["problema"]);
  $solutia = str_replace("'", "''",$_POST["solutia"]);

 	$sql="INSERT INTO violin(data, casa, problema, solutia) VALUES( '$data', '$casa', '$problema', '$solutia')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }
 ?>
 <script>
 		window.location.href='violin.php';
 		</script>
