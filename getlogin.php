<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/helper/User.php';
	$user = new User();

	if ($_SERVER['REQUEST_METHOD']== 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user->userLogin($username, $password);
	}
