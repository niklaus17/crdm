<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM sections where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $name = $row['name'];
    $cabinet = $row['cabinet'];
    $percentage = $row['percentage'];
    $data_insert = $row['data_insert'];

    array_push($return_arr, array(
      "id" => $id,
      "name" => $name,
      "cabinet" => $cabinet,
			'percentage' => $percentage,
			'data_insert' => $data_insert,
			));
}


echo json_encode($return_arr);

?>
