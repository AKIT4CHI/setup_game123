<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Setup Game System</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>

	<div class="login">
		<h1 class="text-center">Login</h1><br><br>

		<?php
		if (isset($_SESSION['login'])) {
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}

		if (isset($_SESSION['no-login-message'])) {
			
			echo $_SESSION['no-login-message'];
			unset($_SESSION['no-login-message']);
		}
		 ?>

		<!-- Login Form Starts Here -->
		<form action="" method="POST" class="text-center">
			Username: <br>
			<input type="text" name="username" placeholder="Enter Username"><br><br>
			Password: <br>
			<input type="password" name="password" placeholder="Enter Password"><br><br>

			<input type="submit" name="submit" class="btn-primary"><br><br>
		</form>





		<!-- Login Form Ends Here -->
		<p class="text-center">Created By - <a href="www.chouaibkaddouri.com">Chouaib Kaddouri</a></p>
	</div>

</body>
</html>



<?php
	
	//Check Wheter the Submit is clicked or not
	if (isset($_POST['submit'])) {

		//Process For login
		//1. Get the data from login form
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		//2. Sql To chek wheter the user with username and password exist or not
		$sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

		//3. Execute the Query
		$res = mysqli_query($conn, $sql);

		//4. Count Rows TO check Wheter the user exist or not
		$count = mysqli_num_rows($res);

		if ($count==1) {
			
			//User Available And Login Success
			$_SESSION['login'] = "<div class = 'success'>Login Successfull. </div>";
			$_SESSION['user'] = $username; //To check whether the user is logged in or not and logout will unset it
			header('location:'.SITEURL."admin/");

		}
		else{

			//User not Available and Logi Fail
			$_SESSION['login'] = "<div class = 'error text-center'>Login Failed Username or password doesn't match </div>";
			header('location:'.SITEURL."admin/login.php");

		}
	}
 ?>