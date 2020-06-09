<?php
ob_start();
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/inc/header.php';
	  Session::checkAdminSession();

	//Insert Question
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$addques = $admin->addQuestion($_POST);
	}
	//Get Last Question No
	$quesNo = $admin->lastQuesNo();
?>
<div class="container-fluied p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="text-center font-italic">Add Question</h3>
		</div>
		<div class="card-body">
			<form action="" method="post" class="w-75 m-auto">
				<?php
					if (isset($addques)) {
						echo $addques;
					}
				?>
				<div class="form-group">
					<label for="quesNo" class="font-weight-bold">Question No</label>
					<input type="number" value="<?php
						if(isset($quesNo)){
							echo $quesNo;
						}
					?>" class="form-control" name="quesNo" placeholder="Question No">
				</div>
				<div class="form-group">
					<label for="quesName" class="font-weight-bold">Question Name</label>
					<input type="text" class="form-control" name="quesName" placeholder="Question Name">
				</div>
				<div class="form-group">
					<label for="ansOne" class="font-weight-bold">Answer One</label>
					<input type="text" class="form-control" name="ansOne" id="ansOne" placeholder="Answer One">
				</div>
				<div class="form-group">
					<label for="ansTwo" class="font-weight-bold">Answer Two</label>
					<input type="text" class="form-control" name="ansTwo" id="ansTwo" placeholder="Answer Two">
				</div>
				<div class="form-group">
					<label for="ansThree" class="font-weight-bold">Answer Three</label>
					<input type="text" class="form-control" name="ansThree" id="ansThree" placeholder="Answer Three">
				</div>
				<div class="form-group">
					<label for="ansFour" class="font-weight-bold">Answer Four</label>
					<input type="text" class="form-control" name="ansFour" id="ansFour" placeholder="Answer Four">
				</div>
				<div class="form-group">
					<label for="rightAns" class="font-weight-bold">Right Answer</label>
					<input type="number" class="form-control" name="rightAns" id="rightAns" placeholder="Right Answer">
				</div>
				<input type="submit" class="btn btn-success" value="Submit">
			</form>
		</div>
	</div>
</div>
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/inc/footer.php';
	ob_end_flush();
?>