<?php include('partials/menu.php');?>
	<div class="content">
		<div class="wrapper">
			<h2>Manage - Admin</h2>
			<div class="margin-40"></div>
			<?php if (isset($_SESSION['add'])) {
				echo $_SESSION['add'];
				unset($_SESSION['add']);
					}
				if (isset($_SESSION['delete'])) {
				 	echo $_SESSION['delete'];
				 	unset($_SESSION['delete']);
				 }
				if (isset($_SESSION['update'])) {
				 	echo $_SESSION['update'];
				 	unset($_SESSION['update']);
				 } 
				 if (isset($_SESSION['user-not-found'])) {
				 	echo $_SESSION['user-not-found'];
				 	unset($_SESSION['user-not-found']);
				 }
				 if (isset($_SESSION['password-not-match'])) {
				 	echo $_SESSION['password-not-match'];
				 	unset($_SESSION['password-not-match']);
				 }
				 if (isset($_SESSION['change-password-success'])) {
				 	echo $_SESSION['change-password-success'];
				 	unset($_SESSION['change-password-success']);
				 }
				 if (isset($_SESSION['change-password-fail'])) {
				 	echo $_SESSION['change-password-fail'];
				 	unset($_SESSION['change-password-fail']);
				 }
			?>
			<div class="margin-40"></div>
				<a href="add-admin.php" class="btn-primary">Add Admin</a>
				<div class="margin-40"></div>
			<table class="tbl-full">
				<tr>
					<th>STT</th>
					<th>Full Name</th>
					<th>User Name</th>
					<th>Actions</th>
				</tr>

				<?php 
					$sql = "SELECT * FROM tbl_admin";
					$res = mysqli_query($conn,$sql);
					if ($res==TRUE) {
						$count = mysqli_num_rows($res);
						$sn = 1;
						if ($count>0) {
							while ($row=mysqli_fetch_assoc($res)) {
								$id=$row['id'];
								$full_name=$row['full_name'];
								$username=$row['username'];
								?>

							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $full_name; ?></td>
								<td><?php echo $username; ?></td>
								<td>
								<a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Chang Password</a>
								<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
								<a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>				
								</td>
							</tr>


								<?php

							}
						}
						else{

						}
					}
				 ?>



			</table>
		</div>
	</div>

<?php include('partials/footer.php')?>