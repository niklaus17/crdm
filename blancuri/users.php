<?php
include('header.php');
include('navbar.php');
include_once("db_connect.php");

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first as admin";
		header('location: login.php');
	}

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

	<div class="col-md-6 col-md-offset-3">
	<div class="header">
		<h2>Admin - Utilizatorii</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="img/admin_profile.jpg"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
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
								 <td>Șterge</td>
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
<?php endif ?>
