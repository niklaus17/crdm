<?php
	session_start();

	// connect to database
	$conn = mysqli_connect('localhost', 'root', '', 'crdm');
mysqli_set_charset($conn,"utf8");
	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array();

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}

	// REGISTER USER
	function register(){
		global $conn, $errors;

		// receive all input values from the form
		$email       =  e($_POST['email']);
		$username    =  e($_POST['username']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) {
			array_push($errors, "Numele de utilizator este necesar");
		}
		if (empty($email)) {
			array_push($errors, "E-mailul este necesar");
		}
		if (empty($password_1)) {
			array_push($errors, "Parola este necesara");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "Cele două parole nu se potrivesc");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO user (email, username, user_type, password)
						  VALUES('$email','$username', '$user_type', '$password')";
				mysqli_query($conn, $query);
				$_SESSION['success']  = "Utilizatorul nou creat!";
				header('location: home.php');
			}else{
				$query = "INSERT INTO user (email,username, user_type, password)
						  VALUES('$email', '$username', 'user', '$password')";
				mysqli_query($conn, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($conn);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "Sunteți conectat acum";
				header('location: index.php');
			}

		}

	}

	// return user array from their id
	function getUserById($id){
		global $conn;
		$query = "SELECT * FROM user WHERE id=" . $id;
		$result = mysqli_query($conn, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $conn, $email, $errors;

		// grap form values
		$email = e($_POST['email']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($email)) {
			array_push($errors, "E-mailul este necesar");
		}
		if (empty($password)) {
			array_push($errors, "Parola este necesara");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
			$results = mysqli_query($conn, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "Sunteți conectat acum";
					header('location: index.php');
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "Sunteți conectat acum";

					header('location: index.php');
				}
			}else {
				array_push($errors, "Combinație greșită de e-mail / parolă");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $conn;
		return mysqli_real_escape_string($conn, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>
