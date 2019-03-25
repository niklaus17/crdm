<?php
include_once 'db_connect.php';
include('header.php');

$id = $_GET["id"];

$sql="SELECT * FROM  tbl_uploads where id = $id ";
$result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
$result = mysqli_fetch_array ($result_set);

$first_name = $result["first_name"];
$last_name = $result["last_name"];

?>
<script src="js/ipv4_input.js"></script>
<div class="container"><br>
	<div class="row">

		<div class="form-group">
			<form action="update.php" method="post" enctype="multipart/form-data" class="form-group">
				<input type="hidden" name ="id" value = "<?= $id?>">

				<label>IP:</label>
				<div id="demo" class="well"></div>

				<label>Cabinetul:</label>
				<input type="text" name="last_name" class="form-control" value="<?= $last_name?>"><br>

				<label>Selectați un fișier pentru încărcare "PDF","HTML":</label>
				<input type="file" name="file" accept=".pdf,.html" class="form-control" /><br>
				<button type="submit" name="btn-upload" class="btn btn-primary">Reupload</button>
				<button id="cancel" name="cancel" class="btn btn-danger" value="1">Cancel</button>

			</form>

		</div>

    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Problem While File Uploading !</label>
        <?php
	}
	?>
</div>
</div>

<script>
	$(function() {
		$("#demo").ipv4_input();
		$(".ipv4-cell").attr("name", "ip[]");

		$("#clear").click(function() {
			$("#demo").ipv4_input("clear");
		})
		var ipString = "<?= $first_name ?>";
		var ip = ipString.split('.');
		var ipInputs = $("[name='ip[]']");

		for(let i = 0; i < ipString.length; i++) {
			$(ipInputs[i]).val(ip[i]);
		}
	});
</script>

</body>
</html>
