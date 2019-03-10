<?php
// session_start();
class Signup extends CI_Model {
	public $mysqli;
	public function __construct() {
		parent::__construct();
		$this->mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
	}
	public function signin($post_data) {
		if(!(isset($post_data['id']) && isset($post_data['password'])) || preg_match("/[^\s　]/", $post_data['id']) || preg_match("/[^\s　]/", $post_data['password'])){
			//アカウントが存在しているかを確認
			if($this->is_exist_acount($post_data['id'])) {
				echo 'そのアカウントはすでに存在しています。';
				return false;
			}else{
				//アカウント登録開始
				return $this->add_acountData($post_data['id'], $post_data['password'], $post_data['acount_name']);
			}
		}
	}

	private function is_exist_acount($id) {
		//アカウントの存在確認
		$sql = "SELECT `id` FROM `account` WHERE `id`='".$id."'";
		$result = $this->mysqli->query($sql);
		if(!$result) return false;
		while($result->fetch_assoc()){
			return true;
		}
	}

	private function add_acountData($id, $password, $name) {
		//SQL文で挿入
		$sql = "INSERT INTO `account` (`id`, `password`, `username`) VALUES ('".$id."', '".$password."', '".$name."')";
		if(!$this->mysqli->query($sql)) return false;
		echo "アカウント登録に成功しました。トップに戻ります。";
		return array($id, $name);
	}
}
?>
