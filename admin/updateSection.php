<?php
include_once 'db_connect.php';

$id = $_POST['id'];
$section = $_POST['section'];
$cabinet = $_POST['cabinet'];
$procente = $_POST['procente'];
$day = $_POST['day'];

$query = "UPDATE sections SET name='$section', cabinet='$cabinet', percentage='$procente', data_insert='$day' where id='$id'";

mysqli_query($conn, $query);

  header('Location:  addinfo.php');
?>
