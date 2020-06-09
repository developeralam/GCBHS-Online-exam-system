<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../lib/Database.php';
/**
 * Process Class
 */
class Process
{
	public $db;
	function __construct()
	{
		$this->db = new Database();
	}

	//Process Ans
	public function processAns($data)
	{
		$msg = "";
		$qNo = (int)$data['qNo'];
		$nextQue = $qNo+1;
		$right = $this->rightAns($qNo);
		$totalrow = $this->quesTotalrow();
		$finalPage = $this->finalPage($qNo)+1;
		$qNo = mysqli_real_escape_string($this->db->link, $qNo);
		$ans = mysqli_real_escape_string($this->db->link, $data['ans']);
		
		
			if (!isset($_SESSION['score'])) {
				$_SESSION['score'] = 0;
			}
			if ($ans == $right) {
				$_SESSION['score']++;
			}
			if ($totalrow == $finalPage) {
				header("Location:final.php");
			}else{
				header("Location:test.php?q=".$nextQue);
			}

		
	}

	private function rightAns($qNo){
		$query = "SELECT ans_id FROM tbl_ans WHERE quesNo = '$qNo' AND rightAns = 1";
		$selected_row = $this->db->select($query)->fetch_assoc();
		return $selected_row['ans_id'];
	}

	//Get Question Table Total Row
	private function quesTotalrow(){
		$query = "SELECT * FROM tbl_ques";
		$selected_row = $this->db->select($query)->num_rows;
		return $selected_row;
	}

	//Get Page No for Final Page
	private function finalPage($qNo){
		$query = "SELECT * FROM tbl_ques";
		$selected_row = $this->db->select($query)->num_rows;



		$blank = [];
		$i = 0;
		$query = "SELECT quesNo FROM tbl_ques";
		$selected_row = $this->db->select($query);
		while ($data = $selected_row->fetch_assoc()) {
			$blank += [$i => $data['quesNo']];
			$i++;
		}
		foreach ($blank as $key => $value) {
			if ($value == $qNo) {
				return $key;
			}
		}

	}
}
