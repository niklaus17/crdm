<?php
include('header.php');
include('navbar.php');
?>

<title>CRDM - Formular</title>

<body>
  <?php if (isset($_SESSION['user'])) { ?>

  <!-- /.modal-For insert date -->

  <div id="add_data_Modal" class="modal fade">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Formular de instalare a piesei de schimb/accesoriu la dispozitivul medical</h4>
     </div>

  		<div class="modal-body">
  			<form action="upload_formular.php" method="post" enctype="multipart/form-data" id="insert_form">


          <label>Date beneficiar:</label>
          <table class="table table-bordered">
            <tr>
              <th style="vertical-align: middle;">Cabinetul:</th>
              <td><input type="text" name="cabinet" class="form-control"></td>
              <th rowspan="2" style="vertical-align: middle;">Executor:</th>
              <td rowspan="2" style="vertical-align: middle;"><input type="text" name="executor" class="form-control"></td>
            </tr>
            <tr>
              <th style="vertical-align: middle;">Sectia:</th>
              <td><input type="hidden" name="id" id="id" value="">
                <select name="section_id" id="section_id" class="form-control">
                      <option value="">SELECT</option>
                      <?php
                          $sql="SELECT * FROM sectie";
                          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          while($row = mysqli_fetch_array ($result_set) )
                          {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['section'] ."</option>";
                          }
                      ?>
                </select>
              </td>
            </tr>
          </table>


<label>Date dispozitiv medical:</label>
<table class="table table-bordered">
  <tr>
    <td>Denumire dispozitiv:</td>
    <td><input type="text" name="nume_dispozitiv" class="form-control"></td>
    <td>Anul producerii:</td>
    <td><input type="date" name="anul_producerii_dispozitiv" class="form-control"></td>
  </tr>
  <tr>
    <td>Model:</td>
    <td><input type="text" name="model_dispozitiv" class="form-control"></td>
    <td>Nr. serie:</td>
    <td colspan="4"><input type="text" name="nr_serie_dispozitiv" class="form-control"></td>
  </tr>
  <tr>
    <td>Producator:</td>
    <td><input type="text" name="producator_dispozitiv" class="form-control"></td>
    <td>Numar inventar:</td>
    <td colspan="4"><input type="text" name="numar_inventar" class="form-control"></td>
  </tr>
</table>

<label>Date piesa/accesoriu:</label>
<table class="table table-bordered">
  <tr>
    <td>Denumire piesa/accesoriu:</td>
    <td><input type="text" name="denumire_piesa" class="form-control"></td>
    <td>Anul producerii:</td>
    <td><input type="date" name="anul_producerii_piesa" class="form-control"></td>
  </tr>
  <tr>
    <td>Model:</td>
    <td><input type="text" name="model_piesa" class="form-control"></td>
    <td>Nr. serie:</td>
    <td colspan="4"><input type="text" name="nr_serie_dispozitiv_piesa" class="form-control"></td>
  </tr>
  <tr>
    <td>Producator:</td>
    <td><input type="text" name="producator_piesa" class="form-control"></td>
    <td>Part number:</td>
    <td colspan="4"><input type="text" name="part_number" class="form-control"></td>
  </tr>
</table>

<label>Date cu privire la dispozitivul medical pentru care a fost instalata piesa/accesoriul:</label>
<table class="table table-bordered">
    <tr>
      <td>Denumire piesa/accesoriu:</td>
      <td><input type="text" name="denumire_piesa_instal" class="form-control"></td>
      <td>Anul producerii:</td>
      <td><input type="date" name="anul_producerii_piesa_instal" class="form-control"></td>
    </tr>
    <tr>
      <td>Model:</td>
      <td><input type="text" name="model_piesa_instal" class="form-control"></td>
      <td>Nr. serie:</td>
      <td><input type="text" name="nr_serie_dispozitiv_instal" class="form-control"></td>
    </tr>
    <tr>
      <td>Producator:</td>
      <td><input type="text" name="producator_piesa_instal" class="form-control"></td>
      <td>Altele*:</td>
      <td><input type="text" name="altele" class="form-control"></td>
    </tr>
</table>

<label>Inspectie/Test de functionalitate:</label>
<table class="table table-bordered">
  <tr>
    <td>Data instalarii/ Monatarii:</td>
    <td><input type="date" name="data_instalarii" class="form-control"></td>
    <td>Perioada de garantie:</td>
    <td><input type="number" name="garantie" class="form-control" placeholder="luni"></td>
  </tr>
  <tr>
    <td>Test de operare (verificarea functionalitatii)</td>
    <td colspan="4">
      <input name="net" type="radio" value="Da"> Da &nbsp;&nbsp;
      <input name="net" type="radio" value="Nu"> Nu
    </td>
  </tr>
</table>

<label for="comment">Comentarii:</label>
<textarea class="form-control" rows="3" name="comentarii"></textarea><br>

<table class="table table-bordered">
  <tr>
    <td><strong>Beneficiar:</strong></td>
    <td><strong>Executor/Furnizor:</strong></td>
  </tr>
  <tr>
    <td><input type="text" name="beneficiar" class="form-control" placeholder="nume, prenume"></td>
    <td><input type="text" name="furnizor" class="form-control" placeholder="nume, prenume"></td>
  </tr>
</table>
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
  <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Formular de instalare</button>
  </div><br>
  <?php		}		?>


<table class="table table-bordered table-striped" id= "table-id">
  <thead>
  <tr class="success " style="font-weight:bold">

      <td>Denumire dispozitiv</td>
      <td>Model</td>
      <td>Producator</td>
      <td>Anul producerii</td>
      <td>File</td>
      <td>Utilizator</td>
      <td>Acțiune</td>
  </tr>

  <?php
      $count=1;
        $sql="SELECT * FROM formular order by id DESC";
      ?>
      <?php
      $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
      while($row = mysqli_fetch_array ($result_set) )
      {
  ?>

</thead>
<tbody id="myTable">
<tr>
    <td><?= $row['nume_dispozitiv'] ?></td>
    <td><?= $row['model_dispozitiv'] ?></td>
    <td><?= $row['producator_dispozitiv'] ?></td>
    <td><?= $row['anul_producerii_dispozitiv'] ?></td>
    <td><?= $row['file'] ?></td>
    <td><?= $row['name'] ?></td>

          <?php if (isset($_SESSION['user'])) { ?>
    <td>

        <a href="raport.php?id=<?php echo $row['id'] ?>" target="_blank">
         <i class="glyphicon glyphicon-eye-open text-primary"></i>
        </a>
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
  <p>Șterge <?php echo '<span class="text-danger" >Cabinetul: ' . $row["cabinet"] . ', Executor: ' . $row["executor"] . '<br />' . $row["file"] . '</span> '; ?></p>
  </div>
  <div class="modal-footer">
    <a class="btn btn-danger" href="delete_formular.php?id=<?php echo $row['id'] ?>&delete=1&file=<?php  echo $row["file"] ?>">Confirmă</a>
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
<?php if (isset($_SESSION['user'])) { ?>

  <div id="edit_data_Modal<?= $row['id']?>" class="modal fade">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Editati informația necesară</h4>
     </div>
  		<div class="modal-body">

        	<form action="update_formular.php" method="post" enctype="multipart/form-data" id="edit_form">

            <label>Date beneficiar:</label>
            <table class="table table-bordered">
              <tr>
                <th style="vertical-align: middle;">Cabinetul:</th>
                <td><input type="text" id="cabinet" class="form-control" disabled></td>
                <th style="vertical-align: middle;">Executor:</th>
                <td style="vertical-align: middle;"><input type="text" id="executor" class="form-control" disabled></td>
              </tr>
              </table>
              <input type="hidden" name="id" id="edit-id">
              <label>Selectați un fișier pentru încărcare PDF:</label>
    			    <input type="file" name="file" accept=".pdf,.html" id="file" class="form-control"/><br>

      </div>
      <div class="modal-footer">
      <button type="submit" name="btn-update" id="update" class="btn btn-primary">Editati</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </form>
      </div>
     </div>
    </div>
  </div>
  <?php 	} ?>

  <!-- Modal Edit -->
  <script type="text/javascript">
    $(".modal-edit").click(function() {
      id = $(this).data('id');
      $.get("getFormular.php", {id: id}).done( function(data) {
        data = JSON.parse(data);
        $("#edit-id").val(data[0].id);
        $("#cabinet").val(data[0].cabinet);
        $("#executor").val(data[0].executor);
        $("#file").val(data[0].file);

      });


      console.log($("#edit-id").val());
    });
  </script>

<!-- Confirm pentru delete modal -->
<script>
		$('.confirm-delete').on('click', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			$('#delete_Modal' + id).modal('show');
		});
</script>
</body>
