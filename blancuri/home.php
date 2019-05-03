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
						 <a href="create_user.php"><button type="submit" class="btn btn-success" name="register_btn">+ Adaugă utilizator</button></a>
						 <a href="section.php"><button type="submit" class="btn btn-success" name="">+ Adaugă secție</button></a>
						 <a href="type.php"><button type="submit" class="btn btn-success" name="">+ Adaugă format</button></a>
						 <a href="cabinet.php"><button type="submit" class="btn btn-success" name="">+ Adaugă cabinete</button></a>
						 <a href="users.php"><button type="submit" class="btn btn-success" name="">Vezi utilizatorii</button></a><br><br>
						<a href="index.php"><button type="button" class="btn btn-danger">Anulează</button></a>
					</small>

				<?php endif ?>
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

</body>
</html>
