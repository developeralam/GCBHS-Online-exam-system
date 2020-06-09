<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../lib/Session.php';
include_once $filepath.'/../lib/Database.php';
/**
 * Admin Class
 */
class Admin
{
	public $db;
	function __construct()
	{
		$this->db = new Database();	
	}
	//Select All User
	public function getallUser()
	{
		$query = "SELECT * FROM tbl_user";
		$result = $this->db->select($query);
		return $result;
	}

	//Delete User
	public function deleteUser($id)
	{
		$query = "DELETE FROM tbl_user WHERE user_id = '$id'";
		$delete = $this->db->delete($query);
		
		if ($delete) {
			$msg = '<div class="alert alert-success">User Delete Successfully</div>';
			return $msg;
		}else{
			$msg = '<div class="alert alert-danger">Something Went Wrong</div>';
			return $msg;
		}
	}

	//Select All Question
	public function getallQuestion()
	{
		$query = "SELECT * FROM tbl_ques";
		$select = $this->db->delete($query);
		return $select;
	}

	//Delete Question
	public function deleteQues($id)
	{
		$query = "DELETE FROM tbl_ques WHERE ques_id = '$id'";
		$delete = $this->db->delete($query);
		if ($delete) {
			$msg = '<div class="alert alert-success">User Delete Successfully</div>';
			return $msg;
		}else{
			$msg = '<div class="alert alert-danger">Something Went Wrong</div>';
			return $msg;
		}
	}

	//Get Last Question No
	public function lastQuesNo()
	{
		$query = "SELECT * FROM tbl_ques ORDER BY ques_id DESC LIMIT 1";
		$selected_row = $this->db->select($query);
		if ( $selected_row->num_rows != 0) {
			$result = $selected_row->fetch_assoc();
			return $result['quesNo']+1;
		}else{
			return 1;
		}
	}
	//Add Question
	public function addQuestion($data)
	{
		$quesNo = (int)$data['quesNo'];
		$quesName = mysqli_real_escape_string($this->db->link, $data['quesName']);
		$ans = array();
		$ans[1] = mysqli_real_escape_string($this->db->link, $data['ansOne']);
		$ans[2] = mysqli_real_escape_string($this->db->link, $data['ansTwo']);
		$ans[3] = mysqli_real_escape_string($this->db->link, $data['ansThree']);
		$ans[4] = mysqli_real_escape_string($this->db->link, $data['ansFour']);
		$rightAns = (int)$data['rightAns'];

		$query = "INSERT INTO tbl_ques(quesNo, quesName) VALUES('$quesNo', '$quesName')";
		$insertques = $this->db->insert($query);
		if ($insertques) {
			foreach ($ans as $key => $value) {
				if ($value != '') {
					if ($rightAns == $key) {
						$ansQuery = "INSERT INTO tbl_ans(quesNo, ansName, rightAns) VALUES('$quesNo', '$value', '1')";
					}else{
						$ansQuery = "INSERT INTO tbl_ans(quesNo, ansName, rightAns) VALUES('$quesNo', '$value', '0')";
					}
					$inserted_row = $this->db->insert($ansQuery);
					if ($inserted_row) {
						continue;
					}else{
						die();
					}
				}
			}
			$msg = '<div class="alert alert-success">Question Inserted Successfully</div>';
			return $msg;
		}
	}

	//Admin Login
	public function adminLogin($email, $password)
	{
		$email = mysqli_real_escape_string($this->db->link, $email);
		$password = mysqli_real_escape_string($this->db->link, $password);
		if (empty($email) or empty($password)) {
			$msg = '<div class="alert alert-danger"><strong>Error!!</strong>Field Must not be empty</div>';
			echo $msg;
			exit();
		}else{
			$password = md5($password);
			$query = "SELECT * FROM tbl_admin WHERE email = '$email' AND password='$password'";
			$selected_row = $this->db->select($query);
			if ($selected_row != false) {
				$data = $selected_row->fetch_assoc();
				Session::init();
				Session::set('admin-login', true);
				Session::set('admin-id', $data['admin_id']);
				Session::set('admin-name', $data['name']);
				echo "admin-login";
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!!</strong>Field Must not be empty</div>';
				echo $msg;
				exit();
			}
		}
	}
}