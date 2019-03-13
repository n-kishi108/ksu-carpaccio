<?php
class Timeline extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	public function timeline() {
		$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		$sql = "SELECT * FROM `post`";
		$result = $mysqli->query($sql);
		return $result;
	}
}
 ?>
