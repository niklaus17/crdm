<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM violin where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $data = $row['data'];
    $casa = $row['casa'];
    $problema = $row['problema'];
    $solutia = $row['solutia'];

    array_push($return_arr, array(
      "id" => $id,
      "data" => $data,
      "casa" => $casa,
			'problema' => $problema,
			'solutia' => $solutia,
			));
}

echo json_encode($return_arr);

?>
