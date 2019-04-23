<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM ip where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $section_id = $row['section_id'];
    $cabinet = $row['cabinet'];
    $ip = $row['ip'];
    $mac = $row['mac'];
    $coment = $row['coment'];

    array_push($return_arr, array(
      "id" => $id,
      'section_id' => $section_id,
      "cabinet" => $cabinet,
      "mac" => $mac,
			'coment' => $coment,
      "ip" => $ip
			));
}

echo json_encode($return_arr);

?>
