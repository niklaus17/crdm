<?php include('db_connect.php');

$percentage = $_POST['percentage'];
$id = $_POST['id'];
$query = "UPDATE sections SET percentage = '$percentage' WHERE id = '$id'";
$result = mysqli_query($conn,$query);

return $result;

?>
