<?php
include('header.php');
include('db_connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="col-md-4 col-md-offset-4">
	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" action="login.php">

		<?php echo display_error();?>

		<div class="input-group">
	      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
	    </div>
	    <div class="input-group">
	      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	      <input id="password" type="password" class="form-control" name="password" placeholder="Parola">
	    </div>

		<div class="input-group">
			<button type="submit" class="btn btn-success" name="login_btn">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <a href="index.php"><button type="button" class="btn btn-danger">Cancel</button></a>
		</div>


	</form>

</div>

</body>
</html>
