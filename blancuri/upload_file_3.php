<?php
include_once 'db_connect.php';
if(isset($_POST['btn-upload3']))
{

	$file_types = ["application/pdf"];


  $id = $_POST['id'];
	$file = round(microtime(true) * 10) . "-" . $_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];

	$folder="uploads/";

	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case

	$final_file=str_replace(' ','-',$new_file_name);

	if(move_uploaded_file($file_loc,$folder.$final_file))
	{

		$sql="INSERT INTO uploads3 ( file, formular_id) VALUES('$final_file', '$id')";
		mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
		$_REQUEST['success'] = 'success';
		?>

		<script>
        window.location.href='formular.php?success';
        </script>

		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='formular.php?fail';
        </script>
		<?php
	}
}
?>
