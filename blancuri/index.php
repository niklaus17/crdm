<?php
session_start();
include('header.php');
include('navbar.php');
include_once("db_connect.php");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<title>CRDM - Blancuri</title>

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
			</select>
      <br>

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
                      </div>
                    <br><br>




		</div>
		<div class="modal-footer">
      <button type="submit" name="btn-upload" class="btn btn-primary">Încărcați</button>
		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
    </form>
	 </div>
	</div>
</div>

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


<div class="col-sm-12 text-center">

  <div class="col-md-2 form-group"> 	<!--		Show Numbers Of Rows 		-->

			 		<select class  ="form-control" name="state" id="maxRows">
						 <option value="5000">Arata toate rândurile</option>
						 <option value="5">5</option>
						 <option value="10">10</option>
						 <option value="15">15</option>
						 <option value="20">20</option>
						 <option value="50">50</option>
						 <option value="70">70</option>
						 <option value="100">100</option>
						</select>

			  	</div>


  <div class="col-md-2">
  <input type="text" name="from_date" id="from_date" class="form-control" placeholder="De pe data..."/>
</div>
  <div class="col-md-2">
  <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Pâna pe data..."/>
</div>
  <div class="col-md-2">
  <input type="button" name="range" id="range" value="Vizualizare" class="btn btn-success"/>
  <input type="button" name="reset" id="reset" value="Reset" class="btn btn-success"/>
</div>

  <div class="col-md-2">
       <div class="input-group">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <div class="input-group-btn">
                <button class="btn btn-default" id="myInput" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
  </div>


	<div align="right">
  <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Adăugați </button>
	</div><br>

		<table class="table table-bordered table-striped" id= "table-id">

    	<tr class="success " style="font-weight:bold">

					<td>Data</td>
					<td>Modelul blancului</td>
					<td>Secția</td>
					<td>Nr. de blancuri</td>
					<td>Utilizator</td>
					<td>Editeaza / Sterge</td>
    	</tr>
      <?php
          $count=1;
          if(isset($_COOKIE['from_date']) && isset($_COOKIE['to_date'])) {
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
<tbody id="myTable">
    <tr>
				<td><?= $row['day'] ?></td>
				<td><?= $row['model'] ?></td>
				<td><?= $row['section'] ?></td>
				<td><?= $row['number'] ?> - (<?= $row['tip'] ?>)</td>
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

    </table>
    </tbody>

    <!--		Start Pagination -->
			<div class='pagination-container' >
				<nav>
				  <ul class="pagination">

            <li data-page="prev" >
								     <span> < <span class="sr-only">(current)</span></span>
								    </li>
				   <!--	Here the JS Function Will Add the Rows -->
        <li data-page="next" id="prev">
								       <span> > <span class="sr-only">(current)</span></span>
								    </li>
				  </ul>
				</nav>
			</div>
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
  <?php 	} ?>


<!-- Confirm pentru delete modal -->
<script>
		$('.confirm-delete').on('click', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			$('#delete_Modal' + id).modal('show');
		});
</script>

<!-- Date range -->
<script>
$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat: 'yy-mm-dd'
	});
	$(function(){
		$("#from_date").datepicker();
		$("#to_date").datepicker();
	});
  $('#range').click(function(){
		var from_date = $('#from_date').val();
		var to_date = $('#to_date').val();
		if(from_date != '' && to_date != '')
		{
      document.cookie = "from_date = " + from_date;
      document.cookie = "to_date = " + to_date;
      location.reload();
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
$('#reset').click( function() {
  document.cookie = 'from_date=; Max-Age=-99999999;';
  document.cookie = 'to_date=; Max-Age=-99999999;';
  location.reload();
})
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

<!-- Search -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<!-- Paginarea in tabel -->
<script>
getPagination('#table-id');
//getPagination('.table-class');
//getPagination('table');

function getPagination (table){

var lastPage = 1 ;

$('#maxRows').on('change',function(evt){
//$('.paginationprev').html('');						// reset pagination


lastPage = 1 ;
$('.pagination').find("li").slice(1, -1).remove();
var trnum = 0 ;									// reset tr counter
var maxRows = parseInt($(this).val());			// get Max Rows from select option

if(maxRows == 5000 ){

$('.pagination').hide();
}else {

$('.pagination').show();
}

var totalRows = $(table+' tbody tr').length;		// numbers of rows
$(table+' tr:gt(0)').each(function(){			// each TR in  table and not the header
trnum++;									// Start Counter
if (trnum > maxRows ){						// if tr number gt maxRows

$(this).hide();							// fade it out
}if (trnum <= maxRows ){$(this).show();}// else fade in Important in case if it ..
});											//  was fade out to fade it in
if (totalRows > maxRows){						// if tr total rows gt max rows option
var pagenum = Math.ceil(totalRows/maxRows);	// ceil total(rows/maxrows) to get ..
                  //	numbers of pages
for (var i = 1; i <= pagenum ;){			// for each page append pagination li
$('.pagination #prev').before('<li data-page="'+i+'">\
          <span>'+ i++ +'<span class="sr-only">(current)</span></span>\
        </li>').show();
}											// end for i
} 												// end if row count > max rows
$('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
$('.pagination li').on('click',function(evt){		// on click each page
evt.stopImmediatePropagation();
evt.preventDefault();
var pageNum = $(this).attr('data-page');	// get it's number

var maxRows = parseInt($('#maxRows').val());			// get Max Rows from select option

if(pageNum == "prev" ){
if(lastPage == 1 ){return;}
pageNum  = --lastPage ;
}
if(pageNum == "next" ){
if(lastPage == ($('.pagination li').length -2) ){return;}
pageNum  = ++lastPage ;
}

lastPage = pageNum ;
var trIndex = 0 ;							// reset tr counter
$('.pagination li').removeClass('active');	// remove active class from all li
$('.pagination [data-page="'+lastPage+'"]').addClass('active');// add active class to the clicked
// $(this).addClass('active');					// add active class to the clicked
$(table+' tr:gt(0)').each(function(){		// each tr in table not the header
trIndex++;								// tr index counter
// if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
$(this).hide();
}else {$(this).show();} 				//else fade in
}); 										// end of for each tr in table
});										// end of on click pagination list

}).val(10).change();
            // end of on select change
    // END OF PAGINATION
}

$(function(){
// Just to append id number for each row
$('table tr:eq(0)').prepend('<th> Nr. </th>')

var id = 0;

$('table tr:gt(0)').each(function(){
id++
$(this).prepend('<td>'+id+'</td>');
});
})
</script>
</body>
