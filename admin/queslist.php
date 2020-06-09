<?php
ob_start();
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/inc/header.php';
	Session::checkAdminsession();
	//Delete User
	if (isset($_GET['delques'])) {
		$id = (int)$_GET['delques'];
		$result = $admin->deleteQues($id);
	}
?>
<div class="container-fluied p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="text-center font-italic">Add Question</h3>
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
						$selected_rows = $admin->getallQuestion();
						if ($selected_rows) {
							$i = 0;
							while ($data = $selected_rows->fetch_assoc()) {
							$i++;
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $data['quesName'];?></td>
						<td><a href="?delques=<?php echo $data['ques_id']; ?>" class="btn btn-danger">Delete</a></td>
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