<?php
session_start();
include('header.php');
include('navbar.php');
include_once("db_connect.php");
?>
	<script src="js/ipv4_input.js"></script>

<title>Admin - Adaugă conținut</title>

<body>

<?php if (isset($_SESSION['userid'])) { ?>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Adăugați informația necesară</h4>
   </div>

		<div class="modal-body">
			<form action="upload.php" method="post" enctype="multipart/form-data" id="insert_form">

			<label>IP:</label>
			<div id="demo" class="well"></div>
				<div class="row center-block">
					<button id="clear" class="btn btn-primary">Șterge</button>
				</div><br>

			<label>Cabinetul:</label>
			<input type="text" name="last_name" class="form-control" required><br>

			<label>Selectați un fișier pentru încărcare "PDF","HTML":</label>
			<input type="file" name="file" accept=".pdf,.html" class="form-control"/><br>
			<button type="submit" name="btn-upload" class="btn btn-primary">Încărcați</button>

			</form>

		</div>
		<div class="modal-footer">
		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	 </div>
	</div>
</div>

		 <?php
		}
	else {
			?>
					<h3 class="jumbotron text-center"><a href="login.php"> Va rugam sa va logati ..</a></h3>
			<?php  }
			 if(isset($_GET['fail']))
			{
				?>
				  <div class="alert alert-danger alert-dismissible fade in">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Problemă!</strong> Problemă în timpul încărcării fișierelor!
				 </div>
		  <?php		}		?>


<div class="col-sm-12 text-center">
	<div align="right">
    <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Adăugați tab 1</button>
	</div><br>
		<table class="table table-striped table-bordered">
    	<tr class="success " style="font-weight:bold">
					<td>Nr.</td>
					<td>IP</td>
					<td>Cabinetul</td>
					<td>Nume fișier</td>
					<td>Acțiuni</td>
    	</tr>
    	<?php
					$count=1;
					$sql="SELECT * FROM tbl_uploads order by id";
					$result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
					while($row = mysqli_fetch_array ($result_set) )
					{
			?>
    <tr>
				<td><?= $count++ ?></td>
				<td><?= $row['first_name'] ?></td>
				<td><?= $row['last_name'] ?></td>
				<td><?= $row['file'] ?></td>
				<td>
						<a href="uploads/<?php echo $row['file'] ?>" target="_blank"><i class="glyphicon glyphicon-eye-open text-primary"></i></a>
							<?php if (isset($_SESSION['userid'])) { ?>
						<a href="edit.php?id=<?php echo $row['id'] ?>&edit=1&file=<?php  echo $row["file"] ?>"><i class="glyphicon glyphicon-edit text-primary"></i></a>
						<a href="#" class="confirm-delete" data-id="<?php  echo $row["id"] ?>"><i class="glyphicon glyphicon-trash text-danger"></i></a>
							<?php		}		?>
			  </td>
		</tr>

<!-- /.modal-For Delete file insert-->
	<div id="myModal<?= $row["id"]?>" class="modal fade">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Confirmă ștergera</h4>
		  </div>
		  <div class="modal-body">
			<p>Șterge <?php echo '<span class="text-danger" >' . $row["first_name"] . ' ' . $row["last_name"] . '<br />' . $row["file"] . '</span> '; ?></p>
		  </div>
		  <div class="modal-footer">
			 <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'] ?>&delete=1&file=<?php  echo $row["file"] ?>">Confirmă</a>
			  <a href="#" data-dismiss="modal" class="btn btn-secondary btn-cancel">Anulează</a>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
  <?php 	} ?>
	<!-- /END .modal-For Delete file insert-->
    </table>
</div>

<!-- Al 2-lea tabel -->

<div class="col-sm-12">
	<div align="right">
    <button type="button" data-toggle="modal" data-target="#add_data_Modal2" class="btn btn-warning">Adăugați tab 2</button>
	</div><br>

	<div class="col-sm-12 text-center">
	    <table class="table table-bordered table-striped">
	  <thead>
	    <tr class="info text-center">
	      <th>Sectia</th>
	      <th>Cabinetul</th>
	      <th>Procente %</th>
				<th>Data</th>
				<th>Edit</th>
	    </tr>
	  </thead>
	  <tbody id="sections">
	    <tr>
	      <td class="rotate"><a href="#" onclick="getData('usg')"><div class="btn active">USG</div></td></a>
	      <td></td>
	      <td>
				  <div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="70"
					  aria-valuemin="0" aria-valuemax="100" style="width:70%">
						70%
					  </div>
					</div>
			</td>
			<td></td>
			<td>
				<a href="#" class="modal-edit" type="button" data-toggle="modal" data-target="#edit_data_Modal2">
					<i class="glyphicon glyphicon-edit text-primary"></i>
				</a >
			</td>

	    </tr>
	    <tr>
	      <td class="rotate"><a href="#" onclick="getData('df')"><div class="btn">DF</div></td></a>
	      <td></td>
	      <td>
		  <div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
				70%
			  </div>
			</div>
			</td>
			<td></td>
			<td>
				<a href="#" class="modal-edit" type="button" data-toggle="modal" data-target="#edit_data_Modal2">
					<i class="glyphicon glyphicon-edit text-primary"></i>
				</a >
			</td>
	    </tr>
	    <tr>
	      <td class="rotate"><a href="#" onclick="getData('esvm')"><div class="btn">ESVM</div></td></a>
	      <td></td>
	      <td>
		  <div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
				70%
			  </div>
			</div>
			</td>
			<td></td>
			<td>
				<a href="#" class="modal-edit" type="button" data-toggle="modal" data-target="#edit_data_Modal2">
					<i class="glyphicon glyphicon-edit text-primary"></i>
				</a >
			</td>
	    </tr>
	    <tr>
	      <td class="rotate"><a href="#" onclick="getData('lcd')"><div class="btn">LCD</div></td></a>
	      <td></td>
	      <td>
		  <div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
				70%
			  </div>
			</div>
			</td>
			<td></td>
			<td>
				<a href="#" class="modal-edit" type="button" data-toggle="modal" data-target="#edit_data_Modal2">
					<i class="glyphicon glyphicon-edit text-primary"></i>
				</a >
			</td>
	    </tr>
	    <tr>
	      <td class="rotate"><a href="#" onclick="getData('lmn')"><div class="btn">LMN</div></td></a>
	      <td></td>
	      <td>
		  <div class="progress">
			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
				70%
			  </div>
			</div>
			</td>
			<td></td>
			<td>
				<a href="#" class="modal-edit" type="button" data-toggle="modal" data-target="#edit_data_Modal2">
					<i class="glyphicon glyphicon-edit text-primary"></i>
				</a >
			</td>
	    </tr>
	  </tbody>
	</table>
</div>
</div>

<!-- Al 2-lea modal pentru tabel 2-->
<?php if (isset($_SESSION['userid'])) { ?>

<div id="add_data_Modal2" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Date despre încărcarea cernelei</h4>
   </div>
   <div class="modal-body">
    <form action="upload.php" method="post" enctype="multipart/form-data" id="insert_form2">
			<label>Alege-ți secția</label>

      <select name="section" class="form-control">
       <option value="none">SELECT</option>
       <option value="usg">Secţia Ultrasonografie Generală</option>
       <option value="df">Secţia Diagnostic Funcțional</option>
 			<option value="esvm">Secţia Ecocardiografie și Studiul Vaselor Magistrale</option>
       <option value="lcd">Laboratorul de Diagnostic Clinic</option>
 			<option value="lmn">Laboratorul Medicină Nucleară</option>
      </select>
      <br />
     <label>Cabinetul</label>
     <input type="text" name="cabinet" class="form-control" />
     <br />
		 <label>Alege-ți secția</label>
		 <select name="procente" class="form-control">
			<option value="0">0%</option>
			<option value="25">25%</option>
		 <option value="50">50%</option>
			<option value="75">75%</option>
		 <option value="100">100%</option>
		 </select>
		 <br />
		 <label for="start">Start date:</label><br>
			<input type="date" name="day"><br>
		 <br >
     <input type="submit" name="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
  <?php 	} ?>


	<?php if (isset($_SESSION['userid'])) { ?>

	<div id="edit_data_Modal2" class="modal fade">
	 <div class="modal-dialog">
	  <div class="modal-content">
	   <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal">&times;</button>
	    <h4 class="modal-title">Date despre încărcarea cernelei</h4>
	   </div>
	   <div class="modal-body">
	    <form action="updateSection.php" method="post" enctype="multipart/form-data" id="insert_form2">
				<label>Alege-ți secția</label>
				<input type="hidden" name="id" id="id" value="">
	      <select name="section" id="section" class="form-control">
					<option value="none">SELECT</option>
	       <option value="usg">Secţia Ultrasonografie Generală</option>
	       <option value="df">Secţia Diagnostic Funcțional</option>
	 			<option value="esvm">Secţia Ecocardiografie și Studiul Vaselor Magistrale</option>
	       <option value="lcd">Laboratorul de Diagnostic Clinic</option>
	 			<option value="lmn">Laboratorul Medicină Nucleară</option>
	      </select>
	      <br />
	     <label>Cabinetul</label>
	     <input type="text" name="cabinet" id="cabinet" class="form-control" />
	     <br />
			 <label>Alege-ți secția</label>
			 <select name="procente" id="procente" class="form-control">
				<option value="0">0%</option>
				<option value="25">25%</option>
			 <option value="50">50%</option>
				<option value="75">75%</option>
			 <option value="100">100%</option>
			 </select>
			 <br />
			 <label for="start">Start date:</label><br>
				<input type="date" id="start" name="day"><br>
			 <br >
	     <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />

	    </form>
	   </div>
	   <div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	   </div>
	  </div>
	 </div>
	</div>
	  <?php 	} ?>


<script> <!-- Confirm pentru delete modal -->
		$('.confirm-delete').on('click', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			$('#myModal' + id).modal('show');
		});
</script>

<script> <!-- IP -->
		$(function() {
			$("#demo").ipv4_input();
			$(".ipv4-cell").attr("name", "ip[]");
			$(".ipv4-cell").css("width", "24%")
			$("#clear").click(function() {
			$("#demo").ipv4_input("clear");
			})
		});
</script>

<script>
		$(document).ready(function() {
			getData('usg');
		})
		var sectionList;
		function getData(type) {
			$.ajax({
				url: "getData.php?type=" + type,
				type: 'get',
					dataType: 'JSON',
			}).done(function(response) {
				sectionList = response;
				for(let i =0; i < 5; i++) {
					if(response[i] != undefined) {
						var color = '';
						if(response[i].percentage < 50) color = 'red';
						else if( response[i].percentage < 75) color = 'yellow';
						else color = 'green';
						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(2)").text(response[i].cabinet);
						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(3) div div").css('width', response[i].percentage + '%')
							.text(response[i].percentage + '%')
							.css('background-color', color)
							.css('color', '#000');
						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(4)").text(response[i].data_insert);
						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(5) a").data("id", response[i].id)
							.css("display", "block");
					} else {
						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(2)").text("");
						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(3) div div").css('width', 0).text(0);
						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(4)").text("");
						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(5) a").css("display", "none");
					}
				}
			});
		}
</script>

<script type="text/javascript">

$(document).ready(function() {

	setTimeout(function() {
		for(let i = 0; i < sectionList.length; i++) {
			var charge_date = +new Date(sectionList[i].data_insert);
			var id = sectionList[i].id;
			var percentage = sectionList[i].percentage;
			var now = Date.now();
			var interval = now - charge_date;

			var newPercentage = -1;
			if((percentage < 25 && interval > 1209600000) ||
				(percentage < 75 && interval > 907200000) ||
				(percentage < 100 && interval > 604800000) ||
				(percentage == 100 && interval > 302400000)) {
					newPercentage = percentage - 25;
			}
			for(let i = 0; i < 10000; i++) {}
			if(newPercentage > -1 ) {
				$.post("updateCartridge.php", { 'id': id, 'percentage': newPercentage})
					.done(function(data) {
						var color = '';
						if(sectionList[i].percentage -25 < 50) color = 'red';
						else if( sectionList[i].percentage -25 < 75) color = 'yellow';
						else color = 'green';
						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(3) div div").css('width', sectionList[i].percentage -25 + '%')
							.text(sectionList[i].percentage -25 + '%')
							.css('background-color', color)
							.css('color', '#000');
					});
			}
		}
	}, 2000);


});

</script>

<script>
		// Add active class to the current button (highlight it)
		var header = document.getElementById("sections");
		var btns = header.getElementsByClassName("btn");
		for (var i = 0; i < btns.length; i++) {
			btns[i].addEventListener("click", function() {
			var current = document.getElementsByClassName("active");
			current[0].className = current[0].className.replace(" active", "");
			this.className += " active";
			});
		}
</script>

	<script type="text/javascript">
		$(".modal-edit").click(function() {
			id = $(this).data('id');
			$.get("getSections.php", {id: id}).done( function(data) {
				data = JSON.parse(data);
				$("#id").val(data[0].id);
				$("#section").val(data[0].name);
				$("#cabinet").val(data[0].cabinet);
				$("#procente").val(data[0].percentage);
				$("#start").val(data[0].data_insert);
			});
		});
	</script>



</body>
