<?php include('partials/menu.php') ?>


<div class="main-content">
	<div class="wrapper">
		<h1>Change Password</h1>
		<br><br>

		<?php
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			}
		 ?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Current Password: </td>
					<td>
						<input type="password" name="current_password" placeholder="old password">
					</td>
				</tr>

				<tr>
					<td>New Password: </td>
					<td>
						<input type="password" name="new_password" placeholder="New Password">
					</td>
				</tr>

				<tr>
					<td>Confirm Password: </td>
					<td>
						<input type="password" name="confirm_password" placeholder="Confirm Password">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Change Password" class="btn-secondary">
					</td>
				</tr>

			</table>
			</form>
	</div>
</div>


<?php 

	//Check wheter the submit button is clicked or not
	if (isset($_POST["submit"])) {

		//echo "button is clicked";
	
		//1. Get the data from the form

		$id = $_POST['id'];
		$current_password = md5($_POST['current_password']);
		$new_password = md5($_POST['new_password']);
		$confirm_password = md5($_POST['confirm_password']);

		//2. check wheter the user with current id or password exist or not
		$sql = "SELECT * FROM tbl_admin WHERE id =$id AND password = '$current_password'";
		//Execute the Query

		$res = mysqli_query($conn, $sql);

		if ($res==TRUE) {

			//Check wheter the data is available or not

			$count = mysqli_num_rows($res);
			if ($count==1) {

				//User Exist and Password can be changed
				//Check whete the New password and confirm password match or not
				if ($new_password==$confirm_password) {

					//Update password
					$sql2 = "UPDATE tbl_admin SET
						password = '$new_password'
						WHERE id = $id
					";
					// execute the Query

					$res = mysqli_query($conn, $sql2);

					//check wheter the Query is executed or not

					if ($res==TRUE) {

						$_SESSION['change-pad'] = "<div class = 'success'>Password changed successfully</div>";
					header('location:'.SITEURL."admin/manage-admin.php");
					}
					
				}
				else{
					//Redirect to manage admin With Error Message
					echo '<script>alert("Your entered passwords dont match")</script>';

				}
			}
			else{
				//User does not Exist Set message and redirect
				echo '<script>alert("Your Current password is wrong")</script>';
			}
		}

		//3. check wheter the new passowrd and confirm match or not

		//4. change password if all above is true
	}
	

?>


<?php include('partials/footer.php') ?>