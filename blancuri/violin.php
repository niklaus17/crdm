<?php
include('header.php');
include('navbar.php');
?>
<style media="screen">
  ul {
    list-style-type: none;
    margin: 0 0 10px, 0;
    text-align: left;
    padding: 0;
  }
  .dots {
    font-size: 1.2em;
    line-height: 1.2em;
  }
</style>
<title>CRDM - Violin Problems</title>

<link href="css/summernote.css" rel="stylesheet">
<script src="js/summernote.js"></script>

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
  			<form action="upload_violin.php" method="post" enctype="multipart/form-data" id="insert_form">

  			<label>Data:</label>
  			<input type="text" name="data" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd" required><br>

        <input type="hidden" name="id" id="id" value="">

  			<label>Casa:</label>
        <select name="casa" id="casa" class="form-control" required>
          <option value="">SELECT</option>
          <option value="Casa 1">Casa 1</option>
          <option value="Casa 2">Casa 2</option>
          <option value="Casa 3">Casa 3</option>
          <option value="Casa 4">Casa 4</option>
          <option value="Casa 5">Casa 5</option>
          <option value="Casa 6">Casa 6</option>
          <option value="Casa 7">Casa 7</option>
          <option value="Registratura 1">Registratura 1</option>
          <option value="Registratura 2">Registratura 2</option>
          <option value="Registratura 3">Registratura 3</option>
          <option value="Registratura 4">Registratura 4</option>
          <option value="154/1">154/1</option>
          <option value="154/2">154/2</option>
          <option value="154/3">154/3</option>
          <option value="154/4">154/4</option>
          <option value="other">Other</option>
        </select><br>

  			<label>Problema:</label>
  			<textarea name="problema" rows="2" class="form-control summernote" required></textarea><br>

  			<label>Solutia:</label>
  			<textarea name="solutia" rows="2" class="form-control summernote" required></textarea><br>
  		</div>
  		<div class="modal-footer">
        <button type="submit" name="btn-upload-problema" class="btn btn-primary">Încărcați</button>
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
          <td>Casa</td>
          <td>Problema</td>
          <td>Soluția</td>
          <td>Fișierele</td>
          <td>Acțiune</td>
      </tr>

      <?php
          $count=1;
            $sql="SELECT * FROM violin where data BETWEEN";
            $sql="SELECT * FROM violin order by id DESC";

          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
          while($row = mysqli_fetch_array ($result_set) )
          {
      ?>
    </thead>
<tbody id="myTable">
  <!-- Modal -->
  <div class="modal fade" id="myModal<?= $row['id']?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Fișiere încarcate</h4>
        </div>
        <div class="modal-body">
          <?php
            $sql="SELECT * FROM violin_file where violin_id = " . $row['id'];
            $result_set_files=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
            $total = $result_set_files->num_rows;
            echo '<ul>';
            while($rowIn = mysqli_fetch_array ($result_set_files) )
            {
              echo "<li><a href=\"uploads_violin/" . $rowIn['file'] . "\" target=\"blank\" > " . $rowIn['file'] . "</a> din " .  explode(' ', $rowIn['data_upload'])[0] ;
              if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
                echo "<span class='glyphicon glyphicon-trash pull-right text-danger confirm-delete-file' data-id=" . $rowIn['id'] . " style='cursor:pointer'></span>"."</li>";
            } else echo '</li>';

          ?>
          <?php		}	  echo '</ul>'	?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <tr>
        <td width="8%"><?= $row['data'] ?></td>
        <td width="13%"><?= $row['casa'] ?></td>
        <td width="30%" style="text-align: justify;"><?= strlen($row['problema']) > 60 ? substr($row['problema'],0, 60) : $row['problema']?> <a href='#'
          class="modal-read_more" type="button" data-toggle="modal" data-target="#read_more_prob<?= $row['id'] ?>"><?= strlen($row['problema']) > 60 ? '<span class="dots">...</span>' : ''?> </a></td>
        <td width="30%" style="text-align: justify;"><?= strlen($row['solutia']) > 60 ? substr($row['solutia'],0, 60) : $row['solutia']?> <a href='#'
          class="modal-read_more" type="button" data-toggle="modal" data-target="#read_more_sol<?= $row['id'] ?>"><?= strlen($row['solutia']) > 60 ? '<span class="dots">...</span>' : ''?> </a></td>
        <td width="8%"><button type="button" class="btn btn-info btn-xs btn-add-file" data-toggle="modal" data-target="#myModal<?= $row['id']?>">View files <span class="badge"> <?= $total ?></span></button></td>

        <td width="8%">
              <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { ?>
            <a href="#" class="modal-edit-file" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal">
              <button type="button" class="btn btn-primary btn-xs btn-add-file">Add file</button>
            </a>
            <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal">
              <i class="glyphicon glyphicon-edit text-primary"></i>
            </a >
            <a href="#" class="confirm-delete" data-id="<?php  echo $row["id"] ?>"><i class="glyphicon glyphicon-trash text-danger"></i></a>
              <?php		}		?>
        </td>
    </tr>

    <!-- /.modal-For read more problema -->
<div id="read_more_prob<?= $row["id"]?>" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-body">
      <label>Problema:</label> <br>
       <p style="text-align: justify;"><?= $row['problema'] ?></p>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
</div>

    <!-- /.modal-For read more solutia -->
    <div id="read_more_sol<?= $row["id"]?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <label>Solutia:</label> <br>
             <p style="text-align: justify;"><?= $row['solutia'] ?></p>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<!-- /.modal-For Delete date -->
  <div id="delete_Modal<?= $row["id"]?>" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Confirmă ștergera</h4>
      </div>
      <div class="modal-body">
      <p>Șterge <?php echo '<span class="text-danger" >' . $row["casa"] . '</span> '; ?></p>
      </div>
      <div class="modal-footer">
       <a class="btn btn-danger" href="delete_violin.php?id=<?php echo $row['id'] ?>">Confirmă</a>
        <a href="#" data-dismiss="modal" class="btn btn-secondary btn-cancel">Anulează</a>
      </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <?php 	} ?>
  <!-- /END .modal-For Delete file insert-->
</tbody>
    </table>

    <!-- /.modal-For upload file -->
    <div id="upload_data_Modal" class="modal fade upload-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Încărcați fișiere</h3>
          </div>
          <div class="modal-body">

            <form action="violin_file.php" method="post" enctype="multipart/form-data" id="upload_form">

              <input type="hidden" name="id" id="violin_id">
              <label>Selectați un fișier pentru încărcare PDF, PNG, JPEG, DOCS:</label>
              <input type="file" name="file" accept=".pdf, .png, .jpeg, .doc, docx." id="file" class="form-control" />
              <br>

          </div>
          <div class="modal-footer">
            <button type="submit" name="btn-upload-file" class="btn-upload" class="btn btn-primary">Upload</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>
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

        <!-- /.modal-For edit form -->
    <div id="edit_data_Modal" class="modal fade">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editati informația necesară</h4>
       </div>
        <div class="modal-body">
          <form action="update_violin.php" method="post" enctype="multipart/form-data" id="edit_form">

            <label>Data:</label>
      			<input type="text" name="data" id="data" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd"><br>

            <input type="hidden" name="id" id="edit-rec-id">

            <label>Casa:</label>
            <select name="casa" id="casa" class="form-control" required>
              <option value="">SELECT</option>
              <option value="Casa 1">Casa 1</option>
              <option value="Casa 2">Casa 2</option>
              <option value="Casa 3">Casa 3</option>
              <option value="Casa 4">Casa 4</option>
              <option value="Casa 5">Casa 5</option>
              <option value="Casa 6">Casa 6</option>
              <option value="Casa 7">Casa 7</option>
              <option value="Registratura 1">Registratura 1</option>
              <option value="Registratura 2">Registratura 2</option>
              <option value="Registratura 3">Registratura 3</option>
              <option value="Registratura 4">Registratura 4</option>
              <option value="154/1">154/1</option>
              <option value="154/2">154/2</option>
              <option value="154/3">154/3</option>
              <option value="154/4">154/4</option>
              <option value="other">Other</option>
            </select><br>

      			<label>Problema:</label>
      			<textarea name="problema" rows="2" id="problema" class="form-control summernote" required></textarea><br>

      			<label>Solutia:</label>
      			<textarea name="solutia" rows="2" id="solutia" class="form-control" required></textarea><br>

        </div>
        <div class="modal-footer">
        <button type="submit" name="btn-update" id="update" class="btn btn-primary">Editati</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </form>
        </div>
       </div>
      </div>
    </div>

    <?php
   }
  else {
     ?>
         <h3 class="jumbotron text-center"><a href="login.php"> Va rugam sa va logati ...</a></h3>
     <?php  }
     {
       ?>
     <?php		}		?>

     <!-- edit text  -->
  <script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
  </script>


  <!-- Modal Edit -->
  <script type="text/javascript">
    $(".modal-edit").click(function() {
      id = $(this).data('id');
      $.get("getViolin.php", {id: id}).done( function(data) {
        data = JSON.parse(data);
        $("#edit-rec-id").val(id);
        $("#data").val(data[0].data);
        $(`#casa option[value="${data[0].casa}"]`).attr('selected','selected');
        // $("#problema").val(data[0].problema);
        $('#problema').summernote('code', data[0].problema);
        $('#solutia').summernote('code', data[0].solutia);
        // $("#solutia").val(data[0].solutia);
      });
    });
  </script>

  <!-- Modal Upload File -->
  <script type="text/javascript">
    $(".modal-edit-file").click(function() {
      id =  $(this).data('id');
      $('#violin_id').val(id);
    });
  </script>

  <!-- Delete file -->
  <script type="text/javascript">
      $('.confirm-delete-file').on('click',
      function() {
        if(confirm("Stergeti fisierul?")) {
          id = $(this).data('id');
            window.location.href= 'delete_file_violin.php?id=' + id;
        } } );
  </script>

  <!-- Confirm pentru delete modal -->
  <script>
  		$('.confirm-delete').on('click', function(e) {
  			e.preventDefault();
  			var id = $(this).data('id');
  			$('#delete_Modal' + id).modal('show');
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
