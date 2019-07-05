<?php
include_once 'db_connect.php';
if(isset($_POST['btn-update']))
{


  $id = $_POST['id'];
 	$username = $_POST['username'];
	$email = $_POST["email"];
  $user_type = $_POST["user_type"];
  // $password = $_POST["password"];

  $query = "UPDATE user SET username='$username', email='$email', user_type='$user_type' where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location:  users.php');
 ?>
