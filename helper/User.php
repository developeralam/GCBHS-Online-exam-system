<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../lib/Session.php';
include_once $filepath.'/../lib/Database.php';
/**
 * User Class
 */
class User
{
	public $db;
	function __construct()
	{
		$this->db = new Database();
	}

	//User Login
	public function userLogin($username, $password)
	{
		$msg = '';
		$username = mysqli_real_escape_string($this->db->link, $username);
		$password = mysqli_real_escape_string($this->db->link, $password);
		if (empty($username) or empty($password)) {
			$msg  = '<div class="alert alert-danger"><strong>Error!!</strong>Feild Must Not Be Empty</div>';
			echo $msg;
			exit();
		}else{
			$password = md5($password);
			$query = "SELECT * FROM tbl_user WHERE email = '$username' AND password = '$password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$data = $result->fetch_assoc();
				Session::init();
				Session::set('user-login', true);
				Session::set('user-id', $data['user_id']);
				Session::set('user-name', $data['name']);
				Session::set('login-msg', 'Login Successfull');
				echo "login";
				exit();

			}else{
				$msg  = '<div class="alert alert-danger"><strong>Error!!</strong>Something went wrong</div>';
				echo $msg;
				exit();
			}
		}
	}

	//Check Email Function
	private function checkEmail($email)
	{
		$query = "SELECT email FROM tbl_user where email = '$email'";
		$selected_row = $this->db->select($query)->num_rows;
		if ($selected_row > 0) {
			return true;
		}else{
			return false;
		}
	}
}