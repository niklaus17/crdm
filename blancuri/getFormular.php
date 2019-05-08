<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM formular where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $cabinet = $row['cabinet'];
    $section_id = $row['section_id'];
    $executor = $row['executor'];

    array_push($return_arr, array(
      "id" => $id,
      "cabinet" => $cabinet,
      'section_id' => $section_id,
      "executor" => $executor,
			));
}

echo json_encode($return_arr);

?>
