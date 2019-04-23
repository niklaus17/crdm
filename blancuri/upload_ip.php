<?php

include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{

  $id = $_POST['id'];
  $section_id = $_POST["section_id"];
 	$cabinet = $_POST['cabinet'];

  $nums = $_POST["ip"];
  $ip = "";
  for($i = 0; $i < 4; $i++) {
    if($i == 3) {
        $ip .= $nums[$i];
        break;
    }
    $ip .= $nums[$i] . ".";
  }
  $ip = $ip;

  $mac = $_POST["mac"];
  $net = $_POST["net"];
  $coment = $_POST["coment"];
  $name = $_SESSION['user']['username'];

 	$sql="INSERT INTO ip(section_id, cabinet, ip, mac, net, coment, name) VALUES('$section_id', '$cabinet', '$ip', '$mac', '$net', '$coment', '$name')";

 	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
 }

 ?>
 <script>
 		window.location.href='ip.php';
 		</script>
