<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM model_blanc where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $blanc = $row['blanc'];
    $section_id = $row['section_id'];

    array_push($return_arr, array(
      "id" => $id,
      "blanc" => $blanc,
      'section_id' => $section_id
			));
}

echo json_encode($return_arr);

?>
