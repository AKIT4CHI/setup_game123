<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Admin</h1>
		<br><br>

		<?php 
				if (isset($_SESSION['add'])) {
					echo $_SESSION['add'];//Displaying Session Message
					unset($_SESSION['add']);//Removing Session Message
				}
				if (isset($_SESSION['user-exist'])) {
					echo $_SESSION['user-exist'];//Displaying Session Message
					unset($_SESSION['user-exist']);//Removing Session Message
				}
			?>

		<form action="" method="POST"><fieldset><legend>Add Admin</legend>

			<table class="tbl-30">
				<tr>
					<td>Full Name: </td>
					<td>
						<input type="text" name="full_name" placeholder="Enter Your name" required>
					</td>
				</tr>

				<tr>
					<td>Email: </td>
					<td>
						<input type="email" name="email" placeholder="Enter Your Email" value="" required>
					</td>
				</tr>



				<tr>
					<td>Username: </td>
					<td>
						<input type="text" name="username" placeholder="Enter Your username" value="" required>
					</td>
				</tr>

				<tr>
					<td>Phone: </td>
					<td>
						<input type="tel" name="phone" placeholder="Enter Your Phone Number" value="" required>
					</td>
				</tr>

				<tr>
					<td>Sexe: </td>
					<td>
						<input type="radio" name="sexe" value="Male" required> Male
						<input type="radio" name="sexe" value="Female" required> Female
					</td>
				</tr>
				<tr>
					<td>Adress: </td>
					<td>
						<input type="tel" name="adress" placeholder="Enter Your Adress" value="" required>
					</td>
				</tr>


				<tr>
					<td>Password: </td>
					<td>
						<input type="password" name="password" placeholder="Enter Your password" value="" required>
					</td>
				</tr>
				<tr>
					<td>Confirm Password: </td>
					<td>
						<input type="password" name="confirm_password" placeholder="Enter Your password" value="" required>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
					</td>
				</tr>

			</table>



		</fieldset></form>


	</div>
</div>



<?php include('partials/footer.php'); ?>



<?php 
	//Process the value from the value and save it in database
	//check wheter the button is clicked or not

	if (isset($_POST['submit'])) {
		// Button Clicked
		//echo "button clicked";

		//1. Get the Data from form
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$phone = $_POST['phone'];
		$sexe = $_POST['sexe'];
		$adress = $_POST['adress'];
		$password = md5($_POST['password']); //Password Encryption with MD5
		$confirm_password = md5($_POST['confirm_password']);
		

		//2. SQL Query to save data to database
		$query= mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username='$username'");
		
		
		if (mysqli_num_rows($query) > 0) {
			
			$_SESSION['user-exist'] = "<div class = 'error'>Sorry this username already exists.</div>";
			header('location:'.SITEURL."admin/add-admin.php");
			
		}
		else{
			if ($confirm_password!=$password) {
				echo '<script>alert("Your entered passwords dont match")</script>';
			}
			else{
				$sql = "INSERT INTO tbl_admin SET
				full_name='$full_name',
				email='$email',
				username='$username',
				phone='$phone',
				sexe='$sexe',
				adress='$adress',
				password='$password'
				";
				//4.executing query and saving data in database
				$res = mysqli_query($conn, $sql) or die(mysqli_error());
				//5. check wheter the (query is executed) data is inerted or not and display appropriate message
				if ($res==TRUE) {
					//Data inserted
					//echo "Data inserted";
					//Create a variable to Display a Message
					$_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
					//Redirect page to manage admin
					header("location:".SITEURL.'admin/manage-admin.php');
				}
				else{
					//Data failed to insert
					//echo "Failed to insert Data";
					//Create a variable to Display a Message
					$_SESSION['add'] = "<div class='error'>Failed To add to Admin</div>";
					//Redirect page to Add admin
					header("location:".SITEURL.'admin/add-admin.php');
				}
				}

			}
			
		
		}
		

		
	

?>