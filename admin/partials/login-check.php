<?php 
	if (!isset($_SESSION['user'])) {
		$_SESSION['not-login-message'] = "<div class='error'>Pleasr login to access Admin Panel </div>";
		header('location:'.SITEURL.'admin/login.php');
	}

 ?>