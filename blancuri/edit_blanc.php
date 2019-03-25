<?php
include_once 'db_connect.php';
include('header.php');

$id = $_GET["id"];

$sql="SELECT * FROM  blancuri where id = $id ";
$result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
$result = mysqli_fetch_array ($result_set);

$day = $result["day"];
$model = $result["model"];
$section = $result["section"];
$number = $result["number"];
$tip = $result["tip"];
$name = $result["name"];


?>
<script src="js/ipv4_input.js"></script>
<div class="container"><br>
	<div class="row">

		<div class="form-group">
      <form action="update_blanc.php" method="post" enctype="multipart/form-data" id="update_form">

			<label>Data:</label>
			<input type="date" name="day"  value = "<?= $day?>" class="form-control" required><br>

			<label>Modelul blancului:</label>
			<input type="text" name="model" value = "<?= $model?>" class="form-control" required><br>

			<label>Alege-ți secția</label>
			<input type="hidden" name="id" id="id">
			<select name="section" value = "<?= $section?>" id="section" class="form-control" required>
			<option value="">SELECT</option>
      <option value="LCD">LCD Laboratorul de Diagnostic Clinic</option>
			 <option value="USG">USG Secţia Ultrasonografie Generală</option>
       <option value="RTC">RTC Secţia Radiologie si tomografie computerizata</option>
			 <option value="DF">DF Secţia Diagnostic Funcțional</option>
			<option value="ESVM">ESVM Secţia Ecocardiografie și Studiul Vaselor Magistrale</option>
			<option value="LMN">LMN Laboratorul Medicină Nucleară</option>
			</select>
      <br>

			<label class="col-sm-2">Nr. de blancuri:</label>
      <div class="col-sm-4">
			<input type="text" name="number" value = "<?= $number?>" class="form-control" required>
      </div>


                    <label class="col-sm-2">Tipul de hirtie</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="tip" name="tip" value = "<?= $tip?>" required>
                            <option value="">SELECT</option>
                            <option value="A4">A4</option>
                            <option value="A5">A5</option>
                            <option value="A3">A3</option>
                            <option value="Plicuri">Plicuri</option>
                        </select>
                      </div>


                    <br><br>

			<button type="submit" name="btn-upload" class="btn btn-primary">Încărcați</button>

			</form>

		</div>

</div>
</div>


</body>
</html>
