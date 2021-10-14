<?php 
	
	include('../config/constants.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$sql = "DELETE FROM tbl_order WHERE id=$id";
		$res = mysqli_query($conn,$sql);
		if ($res == True) {
			$_SESSION['delete'] = "<div class='success'>Order Deleted Successfully</div>";
			header('location:'.SITEURL.'admin/manage-order.php');
		}
		else{
			$_SESSION['delete'] = "<div class='error'>Order Deleted Successfully</div>";
			header('location:'.SITEURL.'admin/manage-order.php');
		}

	}
	else{
		header('location:'.SITEURL.'admin/manage-order.php');
	}


 ?>