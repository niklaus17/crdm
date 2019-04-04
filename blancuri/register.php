<?php
include('header.php');
include('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.header {
			background: #222222;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">

		<?php echo display_error(); ?>


		<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" class="form-control" name="username" placeholder="User name" value="<?php echo $username; ?>">
			</div>

		<div class="input-group">
	      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	      <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
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
			<button type="submit" class="btn btn-success" name="register_btn"> + Create user</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>
