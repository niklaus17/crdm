<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM blancuri where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $day = $row['day'];
    $model = $row['model'];
    $section_id = $row['section_id'];
    $number = $row['number'];
    $tip_id = $row['tip_id'];
    $name = $row['name'];

    array_push($return_arr, array(
      "id" => $id,
      "day" => $day,
      "model" => $model,
			'section_id' => $section_id,
			'number' => $number,
      'tip_id' => $tip_id,
      "name" => $name,
			));
}

echo json_encode($return_arr);

?>
