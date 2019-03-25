<?php
include_once 'db_connect.php';
if(isset($_POST['btn-upload']))
{

	$file_types = ["application/pdf","text/html"];



	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	// $first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];




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


	$folder="uploads/";

		if(!in_array($file_type, $file_types)) {
			?>
				<script>
				window.location.href='addinfo.php?fail';
				</script>
			<?php

			return;
		}


	// new file size in KB
	$new_size = $file_size/1024;
	// new file size in KB

	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case

	$final_file=str_replace(' ','-',$new_file_name);

	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO tbl_uploads(first_name, last_name, file,type, size) VALUES( '$first_name', '$last_name', '$final_file','$file_type', '$file_size')";
		mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='addinfo.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='addinfo.php?fail';
        </script>
		<?php
	}
} else {

 $cabinet = $_POST["cabinet"];

  $percentage = $_POST["procente"];
  $section = $_POST["section"];
	$day = $_POST['day'];
	$sql="INSERT INTO sections(name, cabinet, percentage, data_insert) VALUES( '$section', '$cabinet', '$percentage', '$day')";
	mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
}
?>
<script>
		window.location.href='addinfo.php?success';
		</script>
