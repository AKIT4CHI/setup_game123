<?php 
	include('../config/constants.php');

	//1. Get the Id of the category
	echo $id = $_GET['id'];
	//2. Create sql query to delete category
	$sql = "DELETE FROM tbl_category WHERE id = $id";
	//3. Execute the query
	$res = mysqli_query($conn, $sql);

	//4. check whether the query is executed or not
	if ($res==TRUE) {

		$_SESSION['delete-cat'] = "<div class = 'success'>Category deleted successfully.</div>";
		header('location:'.SITEURL."admin/manage-category.php");
	}
	else{
		$_SESSION['delete-cat'] = "<div class = 'erroe'>Failed to add category</div>";
		header('location:'.SITEURL."admin/manage-category.php");

	}




?>