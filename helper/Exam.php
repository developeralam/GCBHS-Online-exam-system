<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../lib/Database.php';
/**
 * Exam Class
 */
class Exam
{
	public $db;
	function __construct()
	{
		$this->db = new Database();
	}
	public function getQueRows()
	{
		$query = "SELECT * FROM tbl_ques";
		$selected_row = $this->db->select($query);
		return $selected_row->num_rows;
	}

	//Get all question by number
	public function getQuebynumber($qNo){
		$query = "SELECT quesName FROM tbl_ques WHERE quesNo = '$qNo' LIMIT 1";
		$selected_row = $this->db->select($query)->fetch_assoc();
		return $selected_row['quesName'];
	}

	//Get Ans by number
	public function getAnsbynumber($qNo)
	{
		$query = "SELECT * FROM tbl_ans WHERE quesNo = '$qNo'";
		$selected_row = $this->db->select($query);
		return $selected_row;
	}

	//Get Question Number
	public function quesNo()
	{
		$blank = [];
		$i = 0;
		$query = "SELECT quesNo FROM tbl_ques";
		$selected_row = $this->db->select($query);
		while ($data = $selected_row->fetch_assoc()) {
			$blank += [$i => $data['quesNo']];
			$i++;
		}
		return $blank;
	}

}