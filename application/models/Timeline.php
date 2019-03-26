<?php
class Timeline extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	public function timeline() {
		$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		$sql = "SELECT * FROM `post` ORDER BY `date` DESC";
		$result = $mysqli->query($sql);
		return $result;
	}

	public function history($id) {
		$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		$sql = "SELECT * FROM `post` WHERE `id`='".$id."' ORDER BY `date` DESC";
		$result = $mysqli->query($sql);
		return $result;
	}
}
?>
