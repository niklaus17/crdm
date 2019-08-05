<?php
include('header.php');
include('navbar.php');
include_once("db_connect.php");
?>

<title>Add type</title>

<body>

	<?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { ?>

<!-- /.modal-For insert date -->

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Adăugați informația necesară</h4>
   </div>

		<div class="modal-body">
			<form action="upload_model_blanc.php" method="post" enctype="multipart/form-data" id="insert_form">

			<label>Modelul blancului:</label>
			<input type="text" name="blanc" class="form-control" required><br>

			<label>Alege-ți secția</label>
			<input type="hidden" name="id" id="id" value="">
			<select name="section_id" id="section_id" class="form-control" required>
						<option value="">SELECT</option>
						<?php
								$sql="SELECT * FROM sectie";
								$result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
								while($row = mysqli_fetch_array ($result_set) )
								{
									echo "<option value=\"" . $row['id'] . "\">" . $row['section'] ."</option>";
								}
						?>
			</select><br>

		</div>
		<div class="modal-footer">
      <button type="submit" name="btn-upload" class="btn btn-primary">Încărcați</button>
		 <button type="button" class="btn btn-default" data-dismiss="modal">Anulează</button>
		</div>
    </form>
	 </div>
	</div>
</div>


	<div class="col-md-4 col-md-offset-4">

	<div align="center">
  <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Adăugați blancul</button>
  <a href="home.php"><button type="button" class="btn btn-danger">Anulează</button></a> <br> <br>

	<label>Alege-ți secția</label>
	<select name="section_id" id="filter_section_id" class="form-control" required>
				<option value="">SELECT</option>
				<?php
						$sql="SELECT * FROM sectie";
						$result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
						while($row = mysqli_fetch_array ($result_set) )
						{
							echo "<option value=\"" . $row['id'] . "\">" . $row['section'] ."</option>";
						}
				?>
	</select><br>

	</div><br>

		<table class="table table-bordered table-striped" style="text-align: center;">
			<thead>
    	<tr class="success " style="font-weight:bold">
        <!-- <td>Nr.</td> -->
        <th>Blancul</th>
				<th>sectia</th>
        <th>Acțiuni</th>
        </tr>
			</thead>
			<tbody id="myTable">

				<?php
				$count=1;
				$sql="SELECT * FROM model_blanc";
				$result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));

				while($row = mysqli_fetch_array ($result_set) )
				{
					$section_id = $row['section_id'];
					$section_query = "SELECT  section from sectie where id = " . $section_id;
					$result = mysqli_query($conn, $section_query) or die(mysqli_error($conn));
					$section_name = mysqli_fetch_assoc($result)['section'];
				?>

				 <tr>
					<td><?= $row['blanc'] ?></td>
					<td><?= $section_name ?></td>
					<td>
            <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal<?= $row['id']?>">
    					<i class="glyphicon glyphicon-edit text-primary"></i>
    				</a >
						<a href="#" class="confirm-delete" data-id="<?php  echo $row["id"] ?>"><i class="glyphicon glyphicon-trash text-danger"></i></a>
			  </td>

		</tr>


            <!-- /.modal-For Delete date -->
            	<div id="delete_Modal<?= $row['id']?>" class="modal fade">
            	  <div class="modal-dialog">
            		<div class="modal-content">
            		  <div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            			<h4 class="modal-title">Confirmă ștergera</h4>
            		  </div>
            		  <div class="modal-body">
            			<p>Șterge <?php echo '<span class="text-danger" >' . $row["blanc"] . '</span> '; ?></p>
            		  </div>
            		  <div class="modal-footer">
            			 <a class="btn btn-danger" href="delete_model_blanc.php?id=<?php echo $row['id'] ?>">Confirmă</a>
            			  <a href="#" data-dismiss="modal" class="btn btn-secondary btn-cancel">Anulează</a>
            		  </div>
            		</div><!-- /.modal-content -->
            	  </div><!-- /.modal-dialog -->
            	</div><!-- /.modal -->

            <!-- /.modal-For Update date -->

              <div id="edit_data_Modal<?= $row['id']?>" class="modal fade">
               <div class="modal-dialog">
                <div class="modal-content">
                 <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Editati informația necesară</h4>
                 </div>
              		<div class="modal-body">
              			<form action="update_model_blanc.php" method="post" enctype="multipart/form-data" id="edit_form">

              			<label>Modelul blancului:</label>
              			<input type="text" name="blanc" id="edit_blanc" class="form-control" required><br>

										<label>Alege-ți secția</label>
										<input type="hidden" name="id" id="edit-id">
										<select name="section_id" id="section_id" class="form-control" required>
													<option value="">SELECT</option>
													<?php
															$sqlIn="SELECT * FROM sectie";
															$resultSetIn=mysqli_query($conn, $sqlIn) or die("database error: ". mysqli_error($conn));
															while($rowIn = mysqli_fetch_array ($resultSetIn) )
															{
																echo "<option value=\"" . $rowIn['id'] . "\">" . $rowIn['section'] ."</option>";
															}
													?>
										</select><br>

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


						</tbody>
          </table>
        </div>

        <?php
       }
      else {
      	 ?>
      			 <h3 class="jumbotron text-center"><a href="login.php">Trebuie să vă conectați mai întâi ca administrator ...</a></h3>
      	 <?php  }
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
    $.get("getModel_Blanc.php", {id: id}).done( function(data) {
      data = JSON.parse(data);
			$("#edit-id").val(data[0].id);
      $("#edit_blanc").val(data[0].blanc);
			$(`#section_id option[value="${data[0].section_id}"]`).attr('selected', 'selected');
    });
  });


	$('#filter_section_id').change( function() {

		filter = $('#filter_section_id option:selected').text();
		select = $('#filter_section_id option:first-child').text();
		if(filter == select) {
			$('tbody').find('tr').show();
			return;
		}
		$('tbody').find('tr').each(function() {
				if($(this).find('td:nth-child(3)').text() !== filter) {
					$(this).hide();
				} else {
					$(this).show();
				}
			// }
		})
		// $('tr td:nth-child(2)').text());
	});





</script>




<!-- Paginarea in tabel -->
<script>
getPagination('#table-id');
function getPagination (table){
var lastPage = 1 ;
$('#maxRows').on('change',function(evt){
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

}).val(15).change();
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

<script>
$(document).ready( function() {

  var currentDate = currentDate = new Date();

  $('.datepicker-here').datepicker({
    dateFormat: 'yyyy-mm-dd',
    language: 'ro',
  });

  // Access instance of plugin
  $('.datepicker').css('z-index', '9999999');
  $('.datepicker-here').click( function() {
    if( $(this).val().length == 0 )
      $(this).data('datepicker').selectDate(new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate()));
  })
})
</script>

</body>
