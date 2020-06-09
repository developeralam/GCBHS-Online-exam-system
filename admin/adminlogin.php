<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../helper/Admin.php';
	$admin = new Admin();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$admin->adminLogin($email, $password);
	}