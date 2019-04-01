<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM tipul where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $format = $row['format'];

    array_push($return_arr, array(
      "id" => $id,
      "format" => $format,
			));
}

echo json_encode($return_arr);

?>
