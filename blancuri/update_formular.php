<?php
include_once 'db_connect.php';
if(isset($_POST['btn-update']))
{

	$file_types = ["application/pdf"];


  $id = $_POST['id'];

	$file = $_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];

	$folder="uploads/";

	// new file size in KB
	// $new_size = $file_size/1024;
	// new file size in KB

	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case

	$final_file=str_replace(' ','-',$new_file_name);

	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		// $sql="INSERT INTO formular ( file ) VALUES ( '$final_file' )";
    $query = "UPDATE formular SET file='$final_file' where id='$id' ";
		mysqli_query($conn, $query) or die("database error: ". mysqli_error($conn));
		?>
		<script>
		alert('successfully uploaded');
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
