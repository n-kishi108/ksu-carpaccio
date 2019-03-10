<?php
class Login extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	public function login($post_data) {//ログイン機能
		$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		$sql = "SELECT `id`, `username` FROM `account` WHERE `id`='".$post_data['id']."' AND `password`='".$post_data['password']."'";
		//SQL文が成功したら表示処理
		$result = $mysqli->query($sql);
		if(!$result) return;
		while($row = $result->fetch_assoc()){
			return array($row['id'], $row['username']);
		}
		return;
	}
}
?>
