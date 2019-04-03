<?php
class AccountModel extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function getAccountData($userid) {
		$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		$sql = "SELECT * FROM `account` WHERE `id` = '".$userid."'";
		$result = $mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			return $row;
		}
	}
}
?>
