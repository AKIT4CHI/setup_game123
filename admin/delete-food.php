<?php 


		include('../config/constants.php');

		$id = $_GET['id'];

		$sql = "DELETE FROM tbl_food WHERE id = '$id'";

		$res = mysqli_query($conn, $sql);


		if ($res==TRUE) {
			
			$_SESSION['delete-food'] = "<div class = 'success'>Product Deleted Successfully.</div";
			header('location:'.SITEURL."admin/manage-food.php");
		}
		else{
			$_SESSION['delete-food'] = "<div class = 'error'>Failed to delete Product.</div";
			header('location:'.SITEURL."admin/manage-food.php");
		}



 ?>