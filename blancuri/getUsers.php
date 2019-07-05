<?php include('db_connect.php');

$return_arr = array();

$id = $_GET['id'];


$query = "SELECT * FROM user where id = '$id'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
    $user_type = $row['user_type'];
    // $password = $row['password'];

    array_push($return_arr, array(
      "id" => $id,
      "username" => $username,
      "email" => $email,
			'user_type' => $user_type,
      // 'password' => $password
			));
}

echo json_encode($return_arr);

?>
