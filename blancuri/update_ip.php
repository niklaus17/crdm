<?php
session_start();

include_once 'db_connect.php';
if(isset($_POST['btn-update']))
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
  $coment = $_POST["coment"];

  $name = $_SESSION['user']['username'];

  $query = "UPDATE ip SET section_id='$section_id', cabinet='$cabinet', ip='$ip', mac='$mac', coment='$coment' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location:  ip.php');
 ?>
