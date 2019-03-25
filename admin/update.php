<?php
include_once 'db_connect.php';

$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];

$file_types = ["application/pdf","text/html"];

$nums = $_POST["ip"];
$ip = "";
for($i = 0; $i < 4; $i++) {
	if($i == 3) {
			$ip .= $nums[$i];
			break;
	}
	$ip .= $nums[$i] . ".";
}
$first_name = $ip;


if(strlen($_FILES['file']['name']) > 0) {

	$sql="SELECT * FROM  tbl_uploads where id = $id ";

	$result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
	$result = mysqli_fetch_array ($result_set);

	if(file_exists('uploads/' . $result['file'])) {
		unlink('uploads/' . $result['file']);
	}

	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];

	$folder="uploads/";




	if(!in_array($file_type, $file_types)) {
		?>
			<script>
			window.location.href='addinfo.php?fail';
			</script>
		<?php

		return;
	}





	$new_size = $file_size/1024;
	// new file size in KB

	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case

	$final_file=str_replace(' ','-',$new_file_name);

	$sql="update tbl_uploads set first_name='$first_name' , last_name='$last_name', file='$final_file', type='$file_type', size='$file_size'  where id = '$id'";

	move_uploaded_file($file_loc,$folder.$final_file);


} else {
	$sql="update tbl_uploads set first_name='$first_name' , last_name='$last_name' where id = '$id'";
}

$result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
$result = mysqli_fetch_array ($result_set);

header('Location: addinfo.php');
?>
