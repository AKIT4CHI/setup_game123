<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Order Status</h1>
		<br><br>

		<?php
			$id = $_GET['id'];

			$sql = "SELECT * FROM tbl_order WHERE id=$id";
			$res = mysqli_query($conn, $sql);
			$count = mysqli_num_rows($res);

			if ($count==1) {
				$row = mysqli_fetch_assoc($res);
				$customer_name = $row['customer_name'];
				$title = $row['food'];
				$total = $row['total'];
				$status = $row['status'];

			}
			else{

			}



		 ?>
		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Product Name: </td>
					<td><strong><?php echo $title; ?></strong></td>
				</tr>
				<tr>
					<td>Price: </td>
					<td><strong><?php echo $total; ?> DH</strong></td>
				</tr>

				<tr>
					<td>Customer Name: </td>
					<td><strong><?php echo $customer_name; ?></strong></td>
				</tr>

				<tr>
					<td>Status: </td>
					<td>
						<select name="status">
							<option <?php if ($status=="Ordered") {echo "selected";} ?> value="Ordered">Ordered</option>
							<option <?php if ($status=="On delivery") {echo "selected";} ?> value="On delivery">On delivery</option>
							<option <?php if ($status=="Delivered") {echo "selected";} ?> value="Delivered">Delivered</option>
							<option <?php if ($status=="Cancelled") {echo "selected";} ?> value="Cancelled">Cancelled</option>
						</select>
					</td>
				</tr>



				

				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Update Order" class="btn-secondary">
					</td>
				</tr>
				
			</table>
			
		</form>

		<?php
			if (isset($_POST['submit'])) {
				$id = $_POST['id'];
				$status = $_POST['status'];

				$sql2 = "UPDATE tbl_order SET
				status = '$status'
				WHERE id=$id
				";

				$res2 = mysqli_query($conn, $sql2);

				if ($res2==TRUE) {
					$_SESSION['update-order'] = '<script>alert("Order Status Updated !")</script>';
					header('location:'.SITEURL."admin/manage-order.php");
				}
				else{
					$_SESSION['update-order'] = '<script>alert("Failed to Update Order Status !")</script>';
					header('location:'.SITEURL."admin/manage-order.php");
				}
				
			}
		 ?>
	</div>
</div>









<?php include('partials/footer.php'); ?>


