<?php
include('header.php');
include('navbar.php');
include_once("db_connect.php");
?>
<head>
	<title>Create user</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.header {
			background: #222222;
		}
	</style>
</head>
<body>
<?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { ?>

	<div class="col-md-4 col-md-offset-4">
	<div class="header">
		<h2>Admin - Creează utilizator</h2>
	</div>

	<form method="post" action="create_user.php">

		<?php echo display_error(); ?>

		<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" class="form-control" name="username" placeholder="Nume utilizator" value="<?php echo $username; ?>">
			</div>

		<div class="input-group">
	      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
	    </div>

		<div class="input-group">
     <span class="input-group-addon">Tip utilizator</span>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>

		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" class="form-control" name="password_1" placeholder="Parola">
		</div>

		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" class="form-control" name="password_2" placeholder="Confirma parola">
		</div>

		<div class="input-group">
			<button type="submit" class="btn btn-success" name="register_btn">+ Adaugă utilizator</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="home.php"><button type="button" class="btn btn-danger">Anulează</button></a>
		</div>
		</div>
	</form>

	<?php
	}
	else {
	 ?>
			 <h3 class="jumbotron text-center"><a href="login.php">Trebuie să vă conectați mai întâi ca administrator ...</a></h3>
	 <?php  }
	 {
		 ?>
		 <?php		}		?>

</body>
</html>
