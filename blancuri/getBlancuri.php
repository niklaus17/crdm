<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM blancuri where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $day = $row['day'];
    $model = $row['model'];
    $section = $row['section'];
    $number = $row['number'];
    $tip = $row['tip'];
    $name = $row['name'];

    array_push($return_arr, array(
      "id" => $id,
      "day" => $day,
      "model" => $model,
			'section' => $section,
			'number' => $number,
      'tip' => $tip,
      "name" => $name,
			));
}


echo json_encode($return_arr);

?>
