<?php
ob_start();
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/inc/header.php';
  Session::checkAdminSession();
	//Delete User
	if (isset($_GET['deluser'])) {
		$id = (int)$_GET['deluser'];
		$result = $admin->deleteUser($id);
	}
?>
<div class="container-fluied p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="text-center font-italic">User List</h3>
		</div>
		<div class="card-body">
			<table class="table table-striped w-75 m-auto">
				<?php
					if (isset($result)) {
						echo $result;
					}
				?>
				<thead>
					<tr>
						<th>SI</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$selected_rows = $admin->getallUser();
						if ($selected_rows) {
							while ($data = $selected_rows->fetch_assoc()) {
							
					?>
					<tr>
						<td><?php echo $data['user_id'];?></td>
						<td><?php echo $data['name'];?></td>
						<td><a href="?deluser=<?php echo $data['user_id']; ?>" class="btn btn-danger">Remove</a></td>
					</tr>
					<?php
						}}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/inc/footer.php';
	ob_end_flush();
?>