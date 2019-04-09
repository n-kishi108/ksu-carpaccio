<?php
class Timeline extends CI_Model {
	private $mysqli;
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'mysqli_connect'));
		$this->mysqli = _connect();
	}
	public function timeline() {
		$sql = "SELECT * FROM `post` ORDER BY `date` DESC";
		$result = $this->mysqli->query($sql);
		return $result;
	}

	public function history($id) {
		$sql = "SELECT * FROM `post` WHERE `id`='".$id."' ORDER BY `date` DESC";
		$result = $this->mysqli->query($sql);
		return $result;
	}
}
?>
