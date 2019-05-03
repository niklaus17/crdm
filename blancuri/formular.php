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
  			<form action="upload_blanc.php" method="post" enctype="multipart/form-data" id="insert_form">

<label>Date dispozitiv medical:</label>

<table class="table table-bordered">
  <tr>
    <td>Denumire dispozitiv:</td>
    <td><input type="text" class="form-control"></td>
    <td>Anul producerii:</td>
    <td><input type="text" class="form-control"></td>
  </tr>
  <tr>
    <td>Model:</td>
    <td><input type="text" class="form-control"></td>
    <td>Nr. serie:</td>
    <td colspan="4"><input type="text" class="form-control"></td>
  </tr>
  <tr>
    <td>Producator:</td>
    <td><input type="text" class="form-control"></td>
    <td>Numar inventar:</td>
    <td colspan="4"><input type="text" class="form-control"></td>
  </tr>
</table>

<label>Date beneficiar:</label>
<table class="table table-bordered">
  <tr>
    <th style="vertical-align: middle;">Cabinetul:</th>
    <td><input type="text" class="form-control"></td>
    <th rowspan="2" style="vertical-align: middle;">Executor:</th>
    <td rowspan="2" style="vertical-align: middle;"><input type="text" class="form-control"></td>
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

<label>Date piesa/accesoriu:</label>
<table class="table table-bordered">
  <tr>
    <td>Denumire piesa/accesoriu:</td>
    <td><input type="text" class="form-control"></td>
    <td>Anul producerii:</td>
    <td><input type="text" class="form-control"></td>
  </tr>
  <tr>
    <td>Model:</td>
    <td><input type="text" class="form-control"></td>
    <td>Nr. serie:</td>
    <td colspan="4"><input type="text" class="form-control"></td>
  </tr>
  <tr>
    <td>Producator:</td>
    <td><input type="text" class="form-control"></td>
    <td>Part number:</td>
    <td colspan="4"><input type="text" class="form-control"></td>
  </tr>
</table>

<label>Date cu privire la dispozitivul medical pentru care a fost instalata piesa/accesoriul:</label>
<table class="table table-bordered">
    <tr>
      <td>Denumire piesa/accesoriu:</td>
      <td><input type="text" class="form-control"></td>
      <td>Anul producerii:</td>
      <td><input type="text" class="form-control"></td>
    </tr>
    <tr>
      <td>Model:</td>
      <td><input type="text" class="form-control"></td>
      <td>Nr. serie:</td>
      <td><input type="text" class="form-control"></td>
    </tr>
    <tr>
      <td>Producator:</td>
      <td><input type="text" class="form-control"></td>
      <td>Altele*:</td>
      <td><input type="text" class="form-control"></td>
    </tr>
</table>

<label>Inspectie/Test de functionalitate:</label>
<table class="table table-bordered">
  <tr>
    <td>Data instalarii/ Monatarii:</td>
    <td><input type="date" class="form-control"></td>
    <td>Perioada de garantie:</td>
    <td><input type="number" class="form-control" placeholder="luni"></td>
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
<textarea class="form-control" rows="3" name="coment" id="comment"></textarea><br>

<table class="table table-bordered">
  <tr>
    <td><strong>Beneficiar:</strong></td>
    <td><strong>Executor/Furnizor:</strong></td>
  </tr>
  <tr>
    <td><input type="text" class="form-control" placeholder="nume, prenume"></td>
    <td><input type="text" class="form-control" placeholder="nume, prenume"></td>
  </tr>
</table>
</div>

  		<div class="modal-footer">
       <button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary">Generati PDF</button>
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
</div>

<script type="text/javascript">
    $('#pdf').click(function () {
      url = '';
        <?php if(isset($_POST['from_date'])) {?>
          <?php } else {?>
            url = `generate_pdf_form.php`;
          <?php } ?>
          window.open(url, '_blank');
    })
</script>
</body>
