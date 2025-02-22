<?php
include('header.php');
include('navbar.php');
?>

<title>CRDM - Blancuri</title>

<body>

<?php if (isset($_SESSION['user'])) { ?>

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
			<input type="text" name="day" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd" required><br>

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

      <label>Modelul blancului:</label>
      <input type="hidden" name="id" id="id" value="">
      <select name="blanc_id" id="blanc_id" class="form-control" required>
      </select><br>

			<label class="col-sm-2">Nr. de blancuri:</label>
      <div class="col-sm-4">
			<input type="text" name="number" class="form-control" required>
      </div>
              <label class="col-sm-2">Tipul de hirtie</label>
                <div class="col-sm-4">
                        <select class="form-control" id="tip_id" name="tip_id" required>
                            <option value="">SELECT</option>
                            <?php
                                $sql="SELECT * FROM tipul";
                                $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                                while($row = mysqli_fetch_array ($result_set) )
                                {
                                  echo "<option value=\"" . $row['id'] . "\">" . $row['format'] ."</option>";
                                }
                            ?>
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

  <div class="col-md-1 form-group"> 	<!--		Show Numbers Of Rows 		-->

			 		<select class="form-control" name="state" id="maxRows">
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

    <div class="col-md-3">
          <div class="input-group input-daterange">
              <input type="text" class="form-control datepicker-here" name="from_date" id="from_date" placeholder="De pe data...">
              <div class="input-group-addon">to</div>
              <input type="text" class="form-control datepicker-here" name="to_date" id="to_date" placeholder="Pâna pe data...">
          </div>
    </div>

  <div class="col-md-3">
    <input type="button" name="range" id="range" value="Vizualizare" class="btn btn-success"/>
    <button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary">Raport PDF</button>
 </div>

  <div class="col-md-2">
       <div class="input-group">
          <input class="form-control" id="myInput" type="text" placeholder="Caută...">
            <div class="input-group-btn">
                <button class="btn btn-default" id="myInput" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
  </div>


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
					<td>Acțiune</td>
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
				<td><?php
        $blanc_id = $row['blanc_id'];
        $blanc_query = "SELECT  blanc from model_blanc where id = " . $blanc_id;
        $result = mysqli_query($conn, $blanc_query) or die(mysqli_error($conn));
        $blanc_name = mysqli_fetch_assoc($result)['blanc'];
        echo $blanc_name;
        ?>
      </td>
				<td>
          <?php
          $section_id = $row['section_id'];
          $section_query = "SELECT  section from sectie where id = " . $section_id;
          $result = mysqli_query($conn, $section_query) or die(mysqli_error($conn));
          $section_name = mysqli_fetch_assoc($result)['section'];
          echo $section_name;
          ?>
         </td>
				<td><?= $row['number'] ?> - ( <?php
          $type_id =  $row['tip_id'];
          $type_query = "SELECT  format from tipul where id = " . $type_id;
          $result = mysqli_query($conn, $type_query)  or die(mysqli_error($conn));
          $type_name = mysqli_fetch_assoc($result)['format'];
          echo $type_name;
        ?> )</td>
				<td><?= $row['user'] ?></td>
				<td>
							<?php if (isset($_SESSION['user'])) { ?>

            <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal">
    					<i class="glyphicon glyphicon-edit text-primary"></i>
    				</a ><?php		}		?>


            <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { ?>
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
			<p>Înregistrărea din data de <?php echo '<span class="text-danger" >' . $row["day"] . '</span> '; ?></p>
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
<?php if (isset($_SESSION['user'])) { ?>

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
  			<input type="text" name="day" id="edit_day" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd" required><br>

        <label>Alege-ți secția</label>
        <input type="hidden" name="id" id="edit_id" value="">
        <select name="section_id" id="edit_section_id" class="form-control" required>
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

        <label>Modelul blancului:</label>
        <select name="blanc_id" id="edit_blanc_id" class="form-control" required>
        </select><br>

  			<label class="col-sm-2">Nr. de blancuri:</label>
        <div class="col-sm-4">
  			<input type="text" name="number" id="edit_number" class="form-control" required>
        </div>

        <label class="col-sm-2">Tipul de hirtie</label>
        <div class="col-sm-4">
            <select class="form-control" id="edit_tip_id" name="tip_id" required>
              <option value="">SELECT</option>
              <?php
                  $sql="SELECT * FROM tipul";
                  $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                  while($row = mysqli_fetch_array ($result_set) )
                  {
                    echo "<option value=\"" . $row['id'] . "\">" . $row['format'] ."</option>";
                  }
              ?>
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

  <?php
 }
else {
   ?>
       <h3 class="jumbotron text-center"><a href="login.php"> Va rugam sa va logati ...</a></h3>
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

  <!-- Date range -->
  <script>
    $(document).ready(function(){
    	$(function(){
    		$("#from_date").datepicker();
    		$("#to_date").datepicker();
    	});

      $('#pdf').click(function () {
        url = '';
          <?php if(isset($_POST['from_date'])) {?>
              url = `generate_pdf.php?from_date=<?=$_POST['from_date']?>\&to_date=<?=$_POST['to_date']?>`;
            <?php } else {?>
              url = `generate_pdf.php`;
            <?php } ?>
            window.open(url, '_blank');
      })

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
    			alert("Selectați data!");
    		}
    	});
    });
  </script>

  <!-- Modal Edit -->
  <script type="text/javascript">
    $(".modal-edit").click(function() {
      id = $(this).data('id');
      $.get("getBlancuri.php", {id: id}).done( function(data) {
        data = JSON.parse(data);
        $("#edit_id").val(data[0].id);
        $("#edit_day").val(data[0].day);
        $(`#edit_section_id option[value="${data[0].section_id}"]`).attr('selected', 'selected');

        $.get("getBlankBySection.php", {id: data[0].section_id}).done( function(data) {
          data = JSON.parse(data);

          $('#edit_blanc_id').empty();
          $('#edit_blanc_id').append(`<option value="">SELECT</OPTION>`)
          for (let row of data) {
            $('#edit_blanc_id').append(`<option value="${row['id']}">${row['blanc']}</OPTION>`)
          }

        }).done( function() {
          $(`#edit_blanc_id option[value="${data[0].blanc_id}"]`).attr('selected', 'selected');

          $("#edit_number").val(data[0].number);
          $(`#edit_tip_id option[value="${data[0].tip_id}"]`).attr('selected','selected');
          $("#user").val(data[0].user);
        });



      });
    });
  </script>


  <!-- on change -->
  <script>
  $("#section_id, #edit_section_id").change(function() {
    id = $(this).find(":selected").val();
    $.get("getBlankBySection.php", {id: id}).done( function(data) {
      data = JSON.parse(data);

      $('#blanc_id, #edit_blanc_id').empty();
      $('#blanc_id, #edit_blanc_id').append(`<option value="">SELECT</OPTION>`)
      for (let row of data) {
        $('#blanc_id, #edit_blanc_id').append(`<option value="${row['id']}">${row['blanc']}</OPTION>`)
      }
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
