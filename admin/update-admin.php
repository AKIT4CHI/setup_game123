<?php include('partials/menu.php'); ?>


<div class="main-content">
	<div class="wrapper">
		<h1>Update Admin</h1>

		<br><br>

		<?php

			if (isset($_SESSION['user-update-exist'])) {
					echo $_SESSION['user-update-exist'];//Displaying Session Message
					unset($_SESSION['user-update-exist']);//Removing Session Message
				}
			//1. Get the ID of the selected Admin
			$id = $_GET['id'];

			//2. Create SQL Query to Get the Details
			$sql="SELECT * FROM tbl_admin WHERE id='$id'";

			//EXECUTE THE QUERY
			$res=mysqli_query($conn, $sql);

			//check wheter the query is executed ot not

			if ($res==TRUE) {
				// check wheter the data is available or not
				$count = mysqli_num_rows($res);
				// check wheter we have admin data or not
				if ($count==1) {
					// Get the Details
					//echo "Admin is Available";
					$row = mysqli_fetch_assoc($res);

					$full_name=$row['full_name'];
					$email=$row['email'];
					$username=$row['username'];
					$phone=$row['phone'];
					$sexe=$row['sexe'];
					$adress=$row['adress'];
				}
				else{
					//redirect TO Manage Admin page
					header('location:'.SITEURL.'admin/manage-admin.php');
				}
			}
		 ?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Full Name: </td>
					<td>
						<input type="text" name="full_name" placeholder="Enter Your name" value="<?php echo $full_name ?>" required>
					</td>
				</tr>

				<tr>
					<td>Email: </td>
					<td>
						<input type="email" name="email" placeholder="Enter Your Email" value="<?php echo $email ?>" required>
					</td>
				</tr>



				<tr>
					<td>Username: </td>
					<td>
						<input type="text" name="username" placeholder="Enter Your username" value="<?php echo $username ?>" required>
					</td>
				</tr>

				<tr>
					<td>Phone: </td>
					<td>
						<input type="tel" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $phone ?>" required>
					</td>
				</tr>

				<tr>
					<td>Sexe: </td>
					<td>
						<input type="radio" name="sexe" value="Male" <?php if ($sexe=="Male") {
							
						?> checked <?php } ?> required> Male
						<input type="radio" name="sexe" value="Female" <?php if ($sexe=="Female") {
							
						?> checked <?php } ?> required> Female
					</td>
				</tr>
				<tr>
					<td>Adress: </td>
					<td>
						<input type="tel" name="adress" placeholder="Enter Your Adress" value="<?php echo $adress ?>" required>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
					</td>
				</tr>
				
			</table>
			
		</form>
	</div>
</div>

<?php
	// check wheter the submit button is clicked or not
if (isset($_POST['submit'])) {

	//echo "Button clicked";
	//Get all values from form to update;
	$id = $_POST['id'];
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$username1 = $_POST['username'];
	$phone = $_POST['phone'];
	$sexe = $_POST['sexe'];
	$adress = $_POST['adress'];

	//Create SQL Query to update admin
	$query= mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username='$username'");
		if (mysqli_num_rows($query) > 0 && ($username!=$username1)) {
			
			
			
			echo '<script>alert("Sorry this username already exists")</script>';
		}
		else{
			$sql = "UPDATE tbl_admin SET 
				full_name='$full_name',
				email='$email',
				username='$username1',
				phone='$phone',
				sexe='$sexe',
				adress='$adress'
				WHERE id = '$id'
			";

				$res = mysqli_query($conn, $sql);

				//check wheter the query is executed or not
				if ($res==TRUE) {
					//Query executed and admin updated
					$_SESSION['update'] = "<div class='success'>Admin updated successfully. </div>";
					//Redirect To manage Admin page
					header("location:".SITEURL."admin/manage-admin.php");
				}
				else{
					//Failed to update admin
					$_SESSION['update'] = "<div class='erroe'>Failed to update admin. </div>";
					//Redirect To manage Admin page
					header("location:".SITEURL."admin/manage-admin.php");
				}
			}


	

	// EXECUTE  the Query

	
}
 ?>


<?php include('partials/footer.php') ?>