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
	<div class="header">
		<h2>Admin - Home Page</h2>
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
						 <a href="create_user.php"><button type="submit" class="btn btn-success" name="register_btn"> + Create user</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 <a href="section.php"><button type="submit" class="btn btn-success" name=""> + Add section</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 <a href="type.php"><button type="submit" class="btn btn-success" name=""> + Add type</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 <a href="users.php"><button type="submit" class="btn btn-success" name="">View users</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
						<a href="index.php"><button type="button" class="btn btn-danger">Cancel</button></a>
					</small>

				<?php endif ?>
			</div>
		</div>



	</div>

</body>
</html>
