 
<?php include('partials/menu.php') ?>
	<!-- Main Section Starts -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Dashboard</h1>
			<br><br>

			<?php
		if (isset($_SESSION['login'])) {
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}
		 ?><br><br>
			
			<div class="col-4 text-center">
				<?php
					$sql = "SELECT * FROM tbl_category";
					$res = mysqli_query($conn, $sql);
					$count = mysqli_num_rows($res)
				 ?>
				<h1><?php echo $count; ?></h1>
				<br>
				Categories
			</div>
			<div class="col-4 text-center">
				<?php
					$sql1 = "SELECT * FROM tbl_food";
					$res1 = mysqli_query($conn, $sql1);
					$count1 = mysqli_num_rows($res1)
				 ?>
				<h1><?php echo $count1; ?></h1>
				<br>
				Products
			</div>
			<div class="col-4 text-center">
				<?php
					$sql2 = "SELECT * FROM tbl_order WHERE status='Ordered'";
					$res2 = mysqli_query($conn, $sql2);
					$count2 = mysqli_num_rows($res2);
				 ?>
				<h1><?php echo $count2; ?></h1>
				<br>
				Total Orders To manage
			</div>
			<div class="col-4 text-center">
				<?php
					$sql3 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered' AND (order_date >= NOW() - INTERVAL 1 DAY)";
					$res3 = mysqli_query($conn, $sql3);
					$row = mysqli_fetch_assoc($res3);
					$total = $row['Total'];
					if ($total == 0) {
						$total = 0;
					}
				 ?>
				<h1><?php echo $total; ?> DH</h1>
				<br>
				Revenue Generated in the last 24hrs
			</div>
			<div class="col-4 text-center">
				<?php
					$sql3 = "SELECT SUM(total) AS Total1 FROM tbl_order WHERE status='Delivered' AND (order_date >= NOW() - INTERVAL 1 MONTH)";
					$res3 = mysqli_query($conn, $sql3);
					$row1 = mysqli_fetch_assoc($res3);
					$total1 = $row1['Total1'];
					if ($total1 == 0) {
						$total1 = 0;
					}
				 ?>
				<h1><?php echo $total1; ?> DH</h1>
				<br>
				Revenue Generated in the last Month
			</div>

			<div class="clearfix"></div>

		</div>
	</div>
	<!-- Main Section Ends -->

<?php include('partials/footer.php') ?>