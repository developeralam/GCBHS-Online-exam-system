<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../config/config.php';
/**
 * Database Class
 */
class Database
{
	public $hostdb = HOST_DB;
	public $userdb = USER_DB;
	public $passdb = PASS_DB;
	public $namedb = NAME_DB;
	public $link;
	public $error;

	
	function __construct()
	{
		$this->connectDB();
	}
	//Connecting Database
	public function connectDB()
	{
		$this->link = new mysqli($this->hostdb, $this->userdb, $this->passdb, $this->namedb);
		if (!$this->link) {
			$this->error = "Connection Failed".$this->link->connect_error;
			return false;
		}
	}
	//Read Data
	public function select($query)
	{
		$selected_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($selected_row->num_rows > 0){
			return $selected_row;
		}else{
			return false;
		}
	}

	//Insert Data
	public function insert($query)
	{
		$inserted_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if ($inserted_row) {
			return $inserted_row;
		}else{
			return false;
		}
	}

	//Update Data
	public function update($query)
	{
		$updated_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if ($updated_row) {
			return $updated_row;
		}else{
			return false;
		}
	}

	//Delete Data
	public function delete($query)
	{
		$deleted_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if ($deleted_row) {
			return $deleted_row;
		}else{
			return false;
		}
	}

}