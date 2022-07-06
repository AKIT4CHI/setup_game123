<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Admin</h1>

		<br><br>

		<?php

			if (isset($_SESSION['title-update-exist'])) {
				echo $_SESSION['title-update-exist'];
				unset($_SESSION['title-update-exist']);
			}
			//1.get id
			$id = $_GET['id'];

			$sql = "SELECT * FROM tbl_category WHERE id = '$id'";

			$res = mysqli_query($conn, $sql);



			if ($res==TRUE) {

				$count = mysqli_num_rows($res);

				if ($count==1) {
					//Get the Details
					$row = mysqli_fetch_assoc($res);

					$title = $row['title'];
					$current_image = $row['image_name'];
					$featured = $row['featured'];
					$active = $row['active'];
				}
				else{
					header('location:'.SITEURL."admin/manage-category.php");
				}
				
			}
		 ?>

		 <form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title: </td>
					<td>
						<input type="text" name="title" placeholder="category title" value="<?php echo $title ?>">
					</td>
				</tr>

				<tr>
					<td>Current Image: </td>
					<td>
						<?php 
							if ($current_image != "") {
								
								?><img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width = "100px"><?php

							}
							else{
								echo "<div class = 'error'>Image is not available.</div>";
							}
						?>
					</td>
				</tr>

				<tr>
					<td>Select Image: </td>
					<td>
						<input type="file" name="image" value=""><br><br>
						<input type="checkbox" name="image" value="<?php echo $current_image ?>" checked> Keep same image
					</td>
				</tr>




				<tr>
					<td>Featured:  </td>
					<td>
						<input type="radio" name="featured" value="Yes" <?php if ($featured=="Yes") {
							
						?> checked <?php } ?>> Yes
						<input type="radio" name="featured" value="No" <?php if ($featured=="No") {
							
						?> checked <?php } ?>> No
					</td>
				</tr>
				<tr>
					<td>Active: </td>
					<td>
						<input type="radio" name="active" value="Yes" <?php if ($active=="Yes") {
							
						?> checked <?php } ?>> Yes
						<input type="radio" name="active" value="No" <?php if ($active=="No") {
							
						?> checked  <?php } ?>> No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Update category" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>


<?php
	if (isset($_POST['submit'])) {
			
			$id = $_POST['id'];
			$title1 = $_POST['title'];
			
			

			//For radio if checked or not, we need to check whether the button is selected or not
			if (isset($_POST['featured'])) {
				
				$featured = $_POST['featured'];
			}
			else{
				$featured = "No";
			}
			if (isset($_POST['active'])) {
				
				$active = $_POST['active'];
			}
			else{
				$active = "No";
			}
			
			
			//check whether the image is selected or not and set the value for image name accordinaly


			//print_r($_FILES['image']);

			//die();

			if (isset($_FILES['image']['name'])) {

				//upload the image
				//To upload the image we need source path and destination path
				$image_name = $_FILES['image']['name'];

				if ($image_name != "") {
					//Auto Rename our image
					//Get the extension of our image
					$ext = end(explode('.', $image_name));

					//Rename the image
					$image_name = "Food_category_".rand(000, 999).'.'.$ext;// e.g "Food_category_153.jpg"

					$source_path = $_FILES['image']['tmp_name'];

					$destination_path = "../images/category/".$image_name;

					//Finally upload the image
					$upload = move_uploaded_file($source_path, $destination_path);

					//check whether the image is uploaded or not
					//And if the image is not uploaded then we will stop the process and redirect with error message
					if ($upload==false) {
						//Set Message
						$_SESSION['upload'] = "<div class = 'error'>Failed to upload Image.";
						//redirect to add category page
						header('location'.SITEURL."admin/add-category.php");
						//stop the process
						die();
					}
				}

				
			}
			else{
				//don't upload the image and set the image_value as blank
				$image_name = "";
			}
			if (isset($_POST['image'])) {
				
				$image_name = $current_image;
			}

			$query = mysqli_query($conn, "SELECT * FROM tbl_category WHERE title = '$title'");
			if (mysqli_num_rows($query)>0 && ($title1!=$title) ) {
				
				$_SESSION['title-update-exist'] = "<div class = 'error'>Sorry this title already exists.</div>";
				header('location:'.SITEURL."admin/update-category.php");
			}
			else{
				$sql1 = "UPDATE tbl_category SET
				title = '$title1',
				image_name = '$image_name',
				featured = '$featured',
				active = '$active'
				WHERE id = $id
			";

			$res1 = mysqli_query($conn, $sql1);

			if ($res1==TRUE) {

				$_SESSION['add-category'] = "<div class = 'success'> category updated successfully</div>";
				header('location:'.SITEURL."admin/manage-category.php");
			}
			else{

				$_SESSION['add-category'] = "<div class = 'error'> Failed to update category</div>";
				header('location:'.SITEURL."admin/manage-category.php");

			}
		}
			}


			

			
 ?>
















<?php include('partials/footer.php'); ?>