<?php
include('header.php');
include('navbar.php');
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
<script src="js/ipv4_input.js"></script>
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
			<form action="upload_ip.php" method="post" enctype="multipart/form-data" id="insert_form">

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

        <label class="col-sm-2">Cabinetul:</label>
        <div class="col-sm-4">
        <input type="text" name="cabinet" class="form-control">
        </div>

        <label class="col-sm-2">Nume PC:</label>
        <div class="col-sm-4">
  			<input type="text" name="numepc" class="form-control">
        </div><br>

        <div class="col-sm-12">
        <label>IP:</label>
        <div id="demo" class="well"></div>
      </div><br>

        <label class="col-sm-2">Mac address:</label>
        <div class="col-sm-4">
        <input type="text" name="mac" class="form-control">
      </div><br>

        <label>Conexiune net:</label>&nbsp;&nbsp;
        <input name="net" type="radio" value="Da"> Da &nbsp;&nbsp;
        <input name="net" type="radio" value="Nu"> Nu <br><br>

        <label for="comment">Comentariu:</label>
        <textarea class="form-control" rows="3" name="coment" id="comment"></textarea>


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

  <div class="col-md-2">
       <div class="input-group">
          <input class="form-control" id="myInput" type="text" placeholder="Caută...">
            <div class="input-group-btn">
                <button class="btn btn-default" id="myInput" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
  </div>


	<div align="right">
  <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Adăugați</button>
	</div><br>

		<table class="table table-bordered table-striped" id= "table-id">
      <thead>
    	<tr class="success " style="font-weight:bold">

          <td>Secția</td>
					<td>Cabinetul</td>
          <td>Nume PC</td>
					<td>IP</td>
					<td>Mac address</td>
          <td>Internet</td>
          <td>Comentariu</td>
          <td>Utilizator</td>
					<td>Acțiune</td>
    	</tr>
      <?php
          $count=1;
            $sql="SELECT * FROM ip order by id DESC";
          ?>
          <?php
          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
          while($row = mysqli_fetch_array ($result_set) )
          {
      ?>

    </thead>
<tbody id="myTable">
    <tr>
      <td>
        <?php
        $section_id = $row['section_id'];
        $section_query = "SELECT  section from sectie where id = " . $section_id;
        $result = mysqli_query($conn, $section_query) or die(mysqli_error($conn));
        $section_name = mysqli_fetch_assoc($result)['section'];
        echo $section_name;
        ?>
       </td>
				<td><?= $row['cabinet'] ?></td>
        <td><?= $row['numepc'] ?></td>
				<td><?= $row['ip'] ?></td>
        <td><?= $row['mac'] ?></td>
        <td><?= $row['net'] ?></td>
        <td><?= $row['coment'] ?></td>
        <td><?= $row['name'] ?></td>

				<td>
							<?php if (isset($_SESSION['user'])) { ?>

            <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal">
    					<i class="glyphicon glyphicon-edit text-primary"></i>
    				</a >
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
			<p>Șterge <?php echo '<span class="text-danger" >Cab -' . $row["cabinet"] . ' &nbsp;IP:' . $row["ip"] . '</span> '; ?></p>
		  </div>
		  <div class="modal-footer">
			 <a class="btn btn-danger" href="delete_ip.php?id=<?php echo $row['id'] ?>">Confirmă</a>
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
  			<form action="update_ip.php" method="post" enctype="multipart/form-data" id="edit_form">

          <label>Alege-ți secția</label>
    			<input type="hidden" name="id" id="edit-id">
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
          <br>

          <label class="col-sm-2">Cabinetul:</label>
           <div class="col-sm-4">
          <input type="text" name="cabinet" id="cabinet" class="form-control">
           </div>

           <label class="col-sm-2">Nume PC:</label>
           <div class="col-sm-4">
           <input type="text" name="numepc" id="numepc" class="form-control">
           </div><br>

          <div class="col-sm-12">
          <label >IP:</label>
          <div id="demo2" class="well" ></div>
        </div><br>

          <label class="col-sm-2">Mac address:</label>
           <div class="col-sm-4">
          <input type="text" name="mac" id="mac" class="form-control">
        </div><br>&nbsp;&nbsp;

          <label>Conexiune net:</label><br>&nbsp;&nbsp;
          <input name="net" type="radio" id="netDa" value="Da"> Da &nbsp;&nbsp;
          <input name="net" type="radio" id="netNu" value="Nu"> Nu <br><br>

         <label for="comment">Comentariu:</label>
         <textarea class="form-control" rows="3" name="coment" id="coment"></textarea>


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



<!-- Modal Edit -->
<script type="text/javascript">
  $(".modal-edit").click(function() {
    id = $(this).data('id');
    $.get("getIp.php", {id: id}).done( function(data) {
      data = JSON.parse(data);
      $("#edit-id").val(data[0].id);
      $(`#section_id option[value="${data[0].section_id}"]`).attr('selected', 'selected');
      $("#cabinet").val(data[0].cabinet);
      $("#numepc").val(data[0].numepc);
      ip = data[0].ip;
      ip = ip.split('.');

      $($("#demo2 .ipv4-cell")[0]).val(ip[0]);
      $($("#demo2 .ipv4-cell")[1]).val(ip[1]);
      $($("#demo2 .ipv4-cell")[2]).val(ip[2]);
      $($("#demo2 .ipv4-cell")[3]).val(ip[3]);
      $("#mac").val(data[0].mac);
      $("#net").val(data[0].net);
      if (data[0].net == 'Da') {
        $("#netDa").prop("checked", true);
      }
      else {
        $("#netNu").prop("checked", true);
      }
      $("#coment").val(data[0].coment);
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


<script> <!-- IP -->
		$(function() {
			$("#demo").ipv4_input();
			$("#demo2").ipv4_input();
			$(".ipv4-cell").attr("name", "ip[]");
			$(".ipv4-cell").css("width", "24%")

		});
</script>


</body>
