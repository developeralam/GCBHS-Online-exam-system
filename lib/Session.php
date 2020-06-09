<?php
/**
 * Session Class
 */
class Session
{
	//Session Initialize
	public static function init()
	{
		if (version_compare(phpversion(), '5.4.0', '<')) {
			if (session_id() == '') {
				session_start();
			}
		}else{
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
		}
	}
	//Set value into session
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	//Get value from session
	public static function get($key)
	{
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}else{
			return false;
		}
	}
	//Check User Session
	public static function chckUserSession()
	{
		self::init();
		if (self::get('user-login') == false) {
			self::destroy();	
			header("Location:index.php");
		}	
	}
	//Check User Login
	public static function chckUserLogin()
	{
		self::init();
		if (self::get('user-login') == true) {
			header("Location:exam.php");
		}	
	}
	//Check Admin Session
	public static function checkAdminSession()
	{
		self::init();
		if (self::get('admin-login') == false) {
			self::destroy();
			header("Location:login.php");
		}
	}
	//Check Admin Login
	public static function checkAdminLogin()
	{
		self::init();
		if (self::get('admin-login') == true) {
			header("Location:index.php");
		}
	}
	//Session Destroy
	public static function destroy()
	{
		session_destroy();
		session_unset();
	}
}