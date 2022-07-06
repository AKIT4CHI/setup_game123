<?php include('partials/menu.php') ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Manage Products</h1>
		<br><br>

		<?php 
			if (isset($_SESSION['add-food'])) {
				echo $_SESSION['add-food'];
				unset($_SESSION['add-food']);
			}
			if (isset($_SESSION['delete-food'])) {
				echo $_SESSION['delete-food'];
				unset($_SESSION['delete-food']);
			}
			if (isset($_SESSION['update-food'])) {
				echo $_SESSION['update-food'];
				unset($_SESSION['update-food']);
			}
		?>
		<br><br>


			<!-- Button to add Admin -->
			<a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Product</a>
			<br><br><br>
			

			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
					<th>Title</th>
					<th>Descrition</th>
					<th>Price</th>
					<th>Category</th>
					<th>Image</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Actions</th>


				</tr>

				<?php
					$sql = "SELECT * FROM tbl_food";

					$res = mysqli_query($conn, $sql);


					$count = mysqli_num_rows($res);

					$sn = 1;

					if ($count > 0) {
						
						while ($row = mysqli_fetch_assoc($res)) {
							
							$id = $row['id'];
							$title = $row['title'];
							$description = $row['description'];
							$price = $row['price'];
							$category_id = $row['category_id'];
							$image_name = $row['image_name'];
							$featured = $row['featured'];
							$active = $row['active'];

							$sql1 = "SELECT * FROM tbl_category WHERE id=$category_id";
							$res1 = mysqli_query($conn, $sql1);
							$row1 = mysqli_fetch_assoc($res1);
							$category = $row1['title'];
							?>

							<tr>
								<td class="prdct"><?php echo $sn++; ?></td>
								<td class="prdct"><?php echo $title; ?></td>
								<td class="prdct"><?php echo $description; ?></td>
								<td class="prdct"><?php echo $price; ?></td>
								<td class="prdct"><?php echo $category; ?></td>
								

								<td class="prdct">
									<?php
									//check whether the image has a name or not
									if ($image_name!=="") {

										?>
										<img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" width = "100px">

										<?php
									}
									else{
										//Display the messgage
										echo "<div class = 'error'>Image is not available</div>";
									}
								 ?>
								</td>
								<td class="prdct"><?php echo $featured; ?></td>
								<td class="prdct"><?php echo $active; ?></td>
								<td class="prdct">
									<a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary" title="Update Product"><i class="fa fa-refresh" aria-hidden="true"></i></a>
									<a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>" class="btn-danger" title="Delete Product"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</td>
							</tr>
							<?php 

						}
					}
					else{
						echo "<div class = 'error'>No Product available.</div>";
					}



				 ?>

				
			</table>
	</div>
</div>


<?php include('partials/footer.php'); ?>