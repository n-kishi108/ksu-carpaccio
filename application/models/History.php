<?php
// session_start();
class History extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function history($id) {
		$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		$sql = "SELECT * FROM `post` WHERE `id`='".$id."'";
		$result = $mysqli->query($sql);
		return $result;
	}
}
 ?>
