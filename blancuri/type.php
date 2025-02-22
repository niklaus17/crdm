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
			<form action="upload_type.php" method="post" enctype="multipart/form-data" id="insert_form">

			<label>Formatul hârtiei:</label>
			<input type="text" name="format" class="form-control" required><br>

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
  <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Adăugați formatul</button>
  <a href="home.php"><button type="button" class="btn btn-danger">Anulează</button></a>
	</div><br>

		<table class="table table-bordered table-striped" style="text-align: center;">

    	<tr class="success " style="font-weight:bold">

        <td>Nr.</td>
        <td>Formatul</td>
        <td>Acțiuni</td>
        </tr>

        <?php
        $count=1;
        $sql="SELECT * FROM tipul order by id";
        $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
        while($row = mysqli_fetch_array ($result_set) )
        {
        ?>

     <tr>
        <td><?= $count++ ?></td>
				<td><?= $row['format'] ?></td>
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
            			<p>Șterge <?php echo '<span class="text-danger" >' . $row["format"] . '</span> '; ?></p>
            		  </div>
            		  <div class="modal-footer">
            			 <a class="btn btn-danger" href="delete_type.php?id=<?php echo $row['id'] ?>">Confirmă</a>
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
              			<form action="update_type.php" method="post" enctype="multipart/form-data" id="edit_form">

              			<label>Modelul blancului:</label>
                    <input type="hidden" name="id" value="<?=$row['id']?>">
              			<input type="text" name="format"  class="form-control" required><br>
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
    $.get("getType.php", {id: id}).done( function(data) {
      data = JSON.parse(data);
      $("#edit_data_Modal" + id + " [name='format']").val(data[0].format);
    });
  });
</script>


</body>
