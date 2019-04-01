<?php
session_start();
include('header.php');
include('navbar.php');
include_once("db_connect.php");
?>


<title>Add type</title>

<body>

<?php if (isset($_SESSION['userid'])) { ?>

<!-- /.modal-For insert date -->

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Adăugați informația necesară</h4>
   </div>

		<div class="modal-body">
			<form action="upload_blanc.php" method="post" enctype="multipart/form-data" id="insert_form">

			<label>Data:</label>
			<input type="date" name="day" class="form-control" required><br>

			<label>Modelul blancului:</label>
			<input type="text" name="model" class="form-control" required><br>

			<label>Alege-ți secția</label>
			<input type="hidden" name="id" id="id" value="">
			<select name="section" id="section" class="form-control" required>
			<option value="">SELECT</option>
      <option value="LCD Laboratorul de Diagnostic Clinic">LCD Laboratorul de Diagnostic Clinic</option>
			<option value="USG Sectia Ultrasonografie Generala">USG Secţia Ultrasonografie Generală</option>
      <option value="RTC Sectia Radiologie si tomografie computerizata">RTC Secţia Radiologie si tomografie computerizata</option>
			<option value="DF Sectia Diagnostic Functional">DF Secţia Diagnostic Funcțional</option>
			<option value="ESVM Sectia Ecocardiografie si Studiul Vaselor Magistrale">ESVM Secţia Ecocardiografie și Studiul Vaselor Magistrale</option>
			<option value="LMN Laboratorul Medicina Nucleara">LMN Laboratorul Medicină Nucleară</option>
      <option value="IRM Imagistica prin rezonanta magnetica">IRM Imagistică prin rezonanță magnetică</option>
      <option value="SMEI Monitorizare, Evaluare si Integrare">SMEI Monitorizare, Evaluare și Integrare</option>
      <option value="IT Tehnologii Informationale">Tehnologii Informaționale</option>
      <option value="Resurse Umane">Resurse Umane</option>
      <option value="Administratia">Administraţia</option>
      <option value="Consultativa">Consultaivă</option>
      <option value="Endoscopie">Endoscopie</option>
			</select><br>

			<label class="col-sm-2">Nr. de blancuri:</label>
      <div class="col-sm-4">
			<input type="text" name="number" class="form-control" required>
      </div>
              <label class="col-sm-2">Tipul de hirtie</label>
                <div class="col-sm-4">
                        <select class="form-control" id="tip" name="tip" required>
                            <option value="">SELECT</option>
                            <option value="A4">A4</option>
                            <option value="A5">A5</option>
                            <option value="A3">A3</option>
                            <option value="Plic_CD">Plicuri CD</option>
                            <option value="Plic_C5">Plicuri C5</option>
                            <option value="Plic_C6">Plicuri C6</option>
                            <option value="Plic_DL">Plicuri DL</option>
                        </select>
                      </div> <br><br>

		</div>
		<div class="modal-footer">
      <button type="submit" name="btn-upload" class="btn btn-primary">Încărcați</button>
		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
    </form>
	 </div>
	</div>
</div>



<div class="col-sm-12 text-center">


	<div align="right">
  <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Adăugați </button>
	</div><br>

		<table class="table table-bordered table-striped" id= "table-id">
      <thead>
    	<tr class="success " style="font-weight:bold">

					<td>Data</td>
					<td>Modelul blancului</td>
					<td>Secția</td>
					<td>Nr. de blancuri / formatul</td>
					<td>Utilizator</td>
					<td>Editează / Șterge</td>
    	</tr>
      <?php
          $count=1;
          if(isset($_COOKIE['from_date']) && isset($_COOKIE['to_date'])) {
            $_POST['from_date'] = $_COOKIE['from_date'];
            $_POST['to_date'] = $_COOKIE['to_date'];
            $sql="SELECT * FROM blancuri where day BETWEEN '" . $_COOKIE["from_date"] . "' AND '".$_COOKIE["to_date"]."'";
          } else {
            $sql="SELECT * FROM blancuri order by id DESC";
          }
          ?>
          <script type="text/javascript">
            document.cookie = 'from_date=; Max-Age=-99999999;';
            document.cookie = 'to_date=; Max-Age=-99999999;';
          </script>

          <?php
          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
          while($row = mysqli_fetch_array ($result_set) )
          {
      ?>
    </thead>
<tbody id="myTable">
    <tr>
				<td><?= $row['day'] ?></td>
				<td><?= $row['model'] ?></td>
				<td><?= $row['section'] ?></td>
				<td><?= $row['number'] ?> - ( <?= $row['tip'] ?> )</td>
				<td><?= $row['name'] ?></td>
				<td>
							<?php if (isset($_SESSION['userid'])) { ?>

            <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal">
    					<i class="glyphicon glyphicon-edit text-primary"></i>
    				</a >
						<a href="#" class="confirm-delete" data-id="<?php  echo $row["id"] ?>"><i class="glyphicon glyphicon-trash text-danger"></i></a>
							<?php		}		?>
			  </td>
		</tr>



<!-- /.modal-For Delete date -->
	<div id="delete_Modal<?= $row["id"]?>" class="modal fade">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Confirmă ștergera</h4>
		  </div>
		  <div class="modal-body">
			<p>Șterge <?php echo '<span class="text-danger" >' . $row["model"] . ' ' . $row["section"] . '</span> '; ?></p>
		  </div>
		  <div class="modal-footer">
			 <a class="btn btn-danger" href="delete_blanc.php?id=<?php echo $row['id'] ?>">Confirmă</a>
			  <a href="#" data-dismiss="modal" class="btn btn-secondary btn-cancel">Anulează</a>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  <?php 	} ?>
	<!-- /END .modal-For Delete file insert-->
</tbody>
    </table>

</div>


<!-- /.modal-For Update date -->
<?php if (isset($_SESSION['userid'])) { ?>

  <div id="edit_data_Modal" class="modal fade">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Editati informația necesară</h4>
     </div>
  		<div class="modal-body">
  			<form action="update_blanc.php" method="post" enctype="multipart/form-data" id="edit_form">
  			<label>Data:</label>
  			<input type="date" name="day" id="day" class="form-control" required><br>
  			<label>Modelul blancului:</label>
  			<input type="text" name="model" id="model" class="form-control" required><br>
  			<label>Alege-ți secția</label>
  			<input type="hidden" name="id" id="edit-id">
  			<select name="section" id="section" class="form-control">
  			<option value="">SELECT</option>
        <option value="LCD Laboratorul de Diagnostic Clinic">LCD Laboratorul de Diagnostic Clinic</option>
  			<option value="USG Sectia Ultrasonografie Generala">USG Secţia Ultrasonografie Generală</option>
        <option value="RTC Sectia Radiologie si tomografie computerizata">RTC Secţia Radiologie si tomografie computerizata</option>
  			<option value="DF Sectia Diagnostic Functional">DF Secţia Diagnostic Funcțional</option>
  			<option value="ESVM Sectia Ecocardiografie si Studiul Vaselor Magistrale">ESVM Secţia Ecocardiografie și Studiul Vaselor Magistrale</option>
  			<option value="LMN Laboratorul Medicina Nucleara">LMN Laboratorul Medicină Nucleară</option>
        <option value="IRM Imagistica prin rezonanta magnetica">IRM Imagistică prin rezonanță magnetică</option>
        <option value="SMEI Monitorizare, Evaluare si Integrare">SMEI Monitorizare, Evaluare și Integrare</option>
        <option value="IT Tehnologii Informationale">Tehnologii Informaționale</option>
        <option value="Resurse Umane">Resurse Umane</option>
        <option value="Administratia">Administraţia</option>
        <option value="Consultativa">Consultaivă</option>
        <option value="Endoscopie">Endoscopie</option>
  			</select>
        <br>

  			<label class="col-sm-2">Nr. de blancuri:</label>
        <div class="col-sm-4">
  			<input type="text" name="number" id="number" class="form-control" required>
        </div>

        <label class="col-sm-2">Tipul de hirtie</label>
        <div class="col-sm-4">
            <select class="form-control" id="tip" name="tip" required>
                <option value="">SELECT</option>
                <option value="A4">A4</option>
                <option value="A5">A5</option>
                <option value="A3">A3</option>
                <option value="Plic_CD">Plicuri CD</option>
                <option value="Plic_C5">Plicuri C5</option>
                <option value="Plic_C6">Plicuri C6</option>
                <option value="Plic_DL">Plicuri DL</option>
            </select>
          </div>

          <br><br>

  		</div>
  		<div class="modal-footer">
      <button type="submit" name="btn-update" id="update" class="btn btn-primary">Editati</button>
  		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </form>
  		</div>
  	 </div>
  	</div>
  </div>

  </div>
  <?php 	} ?>

<?php
}
else {
 ?>
     <h3 class="jumbotron text-center"><a href="login.php"> Va rugam sa va logati ...</a></h3>
 <?php  }
  if(isset($_GET['fail']))
 {
   ?>
 <?php		}		?>

<!-- Confirm pentru delete modal -->
<script>
		$('.confirm-delete').on('click', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			$('#delete_Modal' + id).modal('show');
		});
</script>

<!-- Modal Edit -->
<script type="text/javascript">
  $(".modal-edit").click(function() {
    id = $(this).data('id');
    $.get("getBlancuri.php", {id: id}).done( function(data) {
      data = JSON.parse(data);
      $("#edit-id").val(data[0].id);
      $("#day").val(data[0].day);
      $("#model").val(data[0].model);
      $(`#section option[value="${data[0].section}"]`).attr('selected', 'selected');
      $("#number").val(data[0].number);
      $(`#tip option[value="${data[0].tip}"]`).attr('selected','selected');
      $("#name").val(data[0].tip);
    });
  });
</script>


</body>
