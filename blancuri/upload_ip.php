<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{

  $id = $_POST['id'];
  $section_id = $_POST["section_id"];
  $cabinet = $_POST['cabinet'];
  $numepc = $_POST['numepc'];
  $ip = $_POST['ip'];
  $mac = $_POST["mac"];
  $net = $_POST["net"];
  $coment = $_POST["coment"];
  $name = $_SESSION['user']['username'];

 	$sql="INSERT INTO ip(section_id, cabinet, numepc, ip, mac, net, coment, name) VALUES('$section_id', '$cabinet', '$numepc', '$ip', '$mac', '$net', '$coment', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }

 ?>
 <script>
 		window.location.href='ip.php';
 		</script>
