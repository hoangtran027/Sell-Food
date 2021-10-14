<?php include('partials/menu.php'); ?>
<div class="content">
	<div class="wrapper">
		<h2>Manage Category</h2>
		<?php 
			if (isset($_SESSION['add'])) {
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			if (isset($_SESSION['delete'])) {
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);
			}
			if (isset($_SESSION['remove'])) {
				echo $_SESSION['remove'];
				unset($_SESSION['remove']);
			}
			if (isset($_SESSION['no-category-found'])) {
				echo $_SESSION['no-category-found'];
				unset($_SESSION['no-category-found']);
			}
			if (isset($_SESSION['update-category'])) {
				echo $_SESSION['update-category'];
				unset($_SESSION['update-category']);
			}
			if (isset($_SESSION['upload'])) {
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			if (isset($_SESSION['fail-remove'])) {
				echo $_SESSION['fail-remove'];
				unset($_SESSION['fail-remove']);
			}
		 ?>
			<div class="margin-40"></div>
			<table class="tbl-full">

				<a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
				<div class="margin-40"></div>

				<tr>
					<th>STT</th>
					<th>Title</th>
					<th>Image Name</th>
					<th>Features</th>
					<th>Active</th>
					<th>Actions</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM tbl_category";
						$res = mysqli_query($conn,$sql);
						if ($res==TRUE) {
							$count = mysqli_num_rows($res);
							$sn = 1;
							if ($count>0) {
								while ($row=mysqli_fetch_assoc($res)) {
									$id=$row['id'];
									$title=$row['title'];
									$image_name=$row['image_name'];
									$featured=$row['featured'];
									$active=$row['active'];
					?>

							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $title; ?></td>
								<td>
									<?php 
										if ($image_name!="") {
											?>
											<img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
											<?php
										}
										else{
											echo "<div class='error'>No Image Not Add</div>";
										}
									 ?>
								</td>
								<td><?php echo $featured; ?></td>
								<td><?php echo $active; ?></td>
								<td>
									<a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
									<a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Admin</a>	
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


<?php include('partials/footer.php'); ?>