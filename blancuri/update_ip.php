<?php
session_start();

include_once 'db_connect.php';
if(isset($_POST['btn-update']))
{

  $id = $_POST['id'];
  $section_id = $_POST["section_id"];
  $cabinet = $_POST['cabinet'];
  $numepc = $_POST['numepc'];
  $ip = $_POST["ip"];
  $mac = $_POST["mac"];
  $net = $_POST["net"];
  $coment = $_POST["coment"];
  $name = $_SESSION['user']['username'];

  $query = "UPDATE ip SET section_id='$section_id', cabinet='$cabinet', numepc='$numepc', ip='$ip', mac='$mac', net='$net', coment='$coment', name='$name' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location:  ip.php');
 ?>
