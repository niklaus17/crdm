<?php
include('header.php');
include('navbar.php');
include_once("db_connect.php");
?>

<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="img/logo.png" />
	<style>
	.header {
		background: #222222;
	}
	</style>
</head>

<body>
<?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { ?>
	<div class="col-md-6 col-md-offset-3">
	<div class="header">
		<h2>Admin - Utilizatorii</h2>
	</div>
	<div class="content">

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="img/admin_profile.jpg"  >

			<div>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						<br><br>

					</small>
	</div>
</div>
						<table class="table table-bordered table-striped" style="text-align: center;">

						 <tr class="success " style="font-weight:bold">
								 <td>Nr.</td>
								 <td>Numele utilizator</td>
								 <td>Email</td>
								 <td>Tipul utilizator</td>
								 <td>Actiuni</td>
						 </tr>

						 <?php
						 $count=1;
						 $sql="SELECT * FROM user order by id";
						 $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
						 while($row = mysqli_fetch_array ($result_set) )
						 {
						 ?>

						 <tr>
				 				<td><?= $count++ ?></td>
				 				<td><?= $row['username'] ?></td>
				 				<td><?= $row['email'] ?></td>
				 				<td><?= $row['user_type'] ?></td>
				 				<td>
									<a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal">
										<i class="glyphicon glyphicon-edit text-primary"></i>
									</a >
									<a href="#" class="confirm-delete" data-id="<?php  echo $row["id"] ?>"><i class="glyphicon glyphicon-trash text-danger"></i></a>
						   </td>
							 <!-- /.modal-For Delete date -->
								 <div id="delete_Modal<?= $row["id"]?>" class="modal fade">
									 <div class="modal-dialog">
									 <div class="modal-content">
										 <div class="modal-header">
										 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										 <h4 class="modal-title">Confirmă ștergera</h4>
										 </div>
										 <div class="modal-body">
										 <p>Șterge <?php echo '<span class="text-danger" >' . $row["username"] . ' ' . $row["email"] . '</span> ' ?></p>
										 </div>
										 <div class="modal-footer">
											<a class="btn btn-primary" href="delete_user.php?id=<?php echo $row['id'] ?>">Confirmă</a>
											 <a href="#" data-dismiss="modal" class="btn btn-danger btn-cancel">Anulează</a>
										 </div>
									 </div><!-- /.modal-content -->
									 </div><!-- /.modal-dialog -->
								 </div><!-- /.modal -->
								 <!-- /END .modal-For Delete file insert-->
							 <?php 	} ?>

						 	</table>
      <a href="create_user.php"><button type="submit" class="btn btn-success" name="register_btn">+ Adaugă utilizator</button></a>
			<a href="home.php"><button type="button" class="btn btn-danger">Anulează</button></a>

</div>
</div>

<!-- /.modal-For Update date -->

  <div id="edit_data_Modal" class="modal fade">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Editati informația necesară</h4>
     </div>
  		<div class="modal-body">
  			<form action="update_users.php" method="post" enctype="multipart/form-data" id="edit_form">
  			<label>Username:</label>
  			<input type="text" name="username" id="username" class="form-control" required><br>
  			<label>Email:</label>
  			<input type="email" name="email" id="email" class="form-control" ><br>
  			<label>User type</label>
  			<input type="hidden" name="id" id="edit-id">
  			<select name="user_type" id="user_type" class="form-control">
				<option value="user">User</option>
				<option value="admin">Admin</option>
  			</select>
        <br>

  		<div class="modal-footer">
      <button type="submit" name="btn-update" id="update" class="btn btn-primary">Editati</button>
  		 <button type="button" class="btn btn-danger" data-dismiss="modal">Anulează</button>
       </form>
  		</div>
  	 </div>
  	</div>
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

	 <!-- Modal Edit -->
	 <script type="text/javascript">
	   $(".modal-edit").click(function() {
	     id = $(this).data('id');
	     $.get("getUsers.php", {id: id}).done( function(data) {
	       data = JSON.parse(data);
	       $("#edit-id").val(data[0].id);
	       $("#username").val(data[0].username);
	       $("#email").val(data[0].email);
	       $("#user_type").val(data[0].user_type);
	       $("#password").val(data[0].password);
	     });
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
</html>
