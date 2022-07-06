<?php include('partials/menu.php') ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Category</h1>

		<br><br>

		<?php
			if (isset($_SESSION['add-category'])) {
				echo $_SESSION['add-category'];
				unset($_SESSION['add-category']);
			}

			if (isset($_SESSION['upload'])) {
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			if (isset($_SESSION['title-exist'])) {
				echo $_SESSION['title-exist'];
				unset($_SESSION['title-exist']);
			}

		 ?>

		<!-- add category form starts -->
		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title: </td>
					<td>
						<input type="text" name="title" placeholder="category title">
					</td>
				</tr>

				<tr>
					<td>Select Image: </td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>




				<tr>
					<td>Featured:  </td>
					<td>
						<input type="radio" name="featured" value="Yes" required> Yes
						<input type="radio" name="featured" value="No" required> No
					</td>
				</tr>
				<tr>
					<td>Active: </td>
					<td>
						<input type="radio" name="active" value="Yes" required> Yes
						<input type="radio" name="active" value="No" required> No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="add category" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>


		<!-- add category form ends -->

		<?php 
			//check whether the submit is clicked or not
		if (isset($_POST['submit'])) {
			
			$title = $_POST['title'];
			

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

				if ($image_name !="") {
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

			$query = mysqli_query($conn, "SELECT * FROM tbl_category WHERE title = '$title'");
			if (mysqli_num_rows($query)>0) {
				
				$_SESSION['title-exist'] = "<div class = 'error'>Sorry this title already exists.</div>";
				header('location:'.SITEURL."admin/add-category.php");
			}
			else{
				$sql = "INSERT INTO tbl_category SET
				title = '$title',
				image_name = '$image_name',
				featured = '$featured',
				active = '$active'
				";

			}

			

			$res = mysqli_query($conn, $sql);

			if ($res==TRUE) {

				$_SESSION['add-category'] = "<div class = 'success'> category added successfully</div>";
				header('location:'.SITEURL."admin/manage-category.php");
			}
			else{

				$_SESSION['add-category'] = "<div class = 'error'> Failed to add category</div>";
				header('location:'.SITEURL."admin/manage-category.php");

			}
		}
		?>
	</div>
</div>

<?php include('partials/footer.php') ?>