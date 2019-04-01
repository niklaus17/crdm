<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM sectie where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $section = $row['section'];

    array_push($return_arr, array(
      "id" => $id,
			'section' => $section,
			));
}

echo json_encode($return_arr);

?>
