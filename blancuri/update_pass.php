<?php
include_once 'db_connect.php';
if(isset($_POST['btn-update_pass']))
{


  $id = $_POST['id'];

  $password = $_POST["password"];

  $query = "UPDATE user SET password=MD5('$password') where id='$id' ";

  mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
 }

   header('Location:  users.php');
 ?>
