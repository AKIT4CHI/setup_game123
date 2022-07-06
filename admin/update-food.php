<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Udpate Product</h1>
		<br><br>

		<?php
			$id = $_GET['id'];


			$sql = "SELECT * FROM tbl_food WHERE id = '$id'";
			
			$res = mysqli_query($conn, $sql);

			if ($res==TRUE) {
				
				$count = mysqli_num_rows($res);

				if ($count==1) {
					
					$row = mysqli_fetch_assoc($res);

					$title = $row['title'];
					$description = $row['description'];
					$price = $row['price'];
					$current_image = $row['image_name'];
					$featured = $row['featured'];
					$active = $row['active'];
				}
				else{
					header('location:'.SITEURL."admin/manage-food.php");
				}
			}


		 ?>


		<form action="" method="POST" enctype="multipart/form-data">

			<table class="tbl-30">

				<tr>
					<td>Title: </td>
					<td>
						<input type="text" name="title" placeholder="Product title" value="<?php echo $title; ?>">
					</td>
				</tr>

				<tr>
					<td>Description: </td>
					<td>
						<textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
					</td>
				</tr>

				<tr>
					<td>Current Image: </td>
					<td>
						<?php 
							if ($current_image != "") {
								
								?><img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width = "100px"><?php

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
					<td>Price: </td>
					<td>
						<input type="number" name="price" value="<?php echo $price; ?>">
					</td>
				</tr>

				<tr>
					<td>Category: </td>
					<td>
						<select name="category">
							<?php 
								//Create php code to display category from database
								//1. Create SQL to get active category
								$sql1 = "SELECT * FROM tbl_category WHERE active = 'Yes'";
								$res1 = mysqli_query($conn, $sql1);

								$count1 = mysqli_num_rows($res1);
								$sn=1;

								if ($count1 > 0) {
									// We have category
									while ($row = mysqli_fetch_assoc($res1)) {
										//Get the details
										$id1 = $row['id'];
										$title = $row['title'];
										?>
										<option value="<?php echo $id1; ?>"><?php echo $title; ?></option>
										<?php 
									}
								}
								else{
									// we don't have category
									?>
									<option value="0">No category Found</option>
									<?php 
								}

								//2. Display on dropdown

							 ?>
							
						</select>
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
					<td colspan="2">
						<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Update Product" class="btn-secondary">
					</td>
				</tr>



			</table>

		</form>

		<?php
			if (isset($_POST['submit'])) {

			
			$title1 = $_POST['title'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			$category = $_POST['category'];
			

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
					$image_info = explode (".", $image_name);
					$ext = end ($image_info);

					//Rename the image
					$image_name = "Food_Name_".rand(0000, 9999).".".$ext;// e.g "Food_category_153.jpg"

					$source_path = $_FILES['image']['tmp_name'];

					$destination_path = "../images/food/".$image_name;

					//Finally upload the image
					$upload = move_uploaded_file($source_path, $destination_path);

					//check whether the image is uploaded or not
					//And if the image is not uploaded then we will stop the process and redirect with error message
					if ($upload==false) {
						//Set Message
						$_SESSION['upload'] = "<div class = 'error'>Failed to upload Image.";
						//redirect to add food page
						header('location'.SITEURL."admin/update-food.php");
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

			$query = mysqli_query($conn, "SELECT * FROM tbl_food WHERE title = '$title'");
			if (mysqli_num_rows($query)>0 && ($title1!=$title)) {
				
				$_SESSION['title-exist'] = "<div class = 'error'>Sorry this title already exists.</div>";
				header('location:'.SITEURL."admin/add-food.php");
			}
			else{

				
				$sql2 = "UPDATE tbl_food SET
				title = '$title1',
				price  = $price,
				image_name = '$image_name',
				description = '$description',
				featured = '$featured',
				active = '$active',
				category_id = '$category'
				WHERE id = $id";

				$res2 = mysqli_query($conn, $sql2);	

				if ($res2==TRUE) {

					$_SESSION['update-food'] = "<div class = 'success'> Product updated successfully</div>";
					header('location:'.SITEURL."admin/manage-food.php");
				}
				else{

					$_SESSION['update-food'] = "<div class = 'error'> Failed to update Product</div>";
					header('location:'.SITEURL."admin/manage-food.php");

				}

			}

			

			
		}
		
		 ?>
	</div>
</div>









<?php include('partials/footer.php'); ?>