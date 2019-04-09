<?php
class Account_Helper extends CI_Model {

	private $mysqli;
	private $accountlist;

	public function __construct() {
		parent::__construct();
		if(session_status() == PHP_SESSION_NONE) {
			echo 'Error: セッションが開始されていないため、正常に処理を開始できませんでした。';
			exit;
		}
		$this->load->helper(array('url', 'mysqli_connect'));
		$this->mysqli = _connect();
		$this->accountlist = $this->get_existing_account_list();
	}

	/*
	アカウントリスト取得用メソッド
	*/
	private function get_existing_account_list() {
		$sql = "SELECT * FROM `account`";
		$result = $this->mysqli->query($sql);
		$data = array();
		while($row = $result->fetch_assoc()) {
			array_push($data, $row);
		}
		return $data
	}

	/*
	悪いパターンの文字列をを蹴り飛ばすメソッド
	*/
	private function is_bad_pattern() {
		if(!(isset($post_data['id']) && isset($post_data['password'])) || preg_match("/[^\s　]/", $post_data['id']) || preg_match("/[^\s　]/", $post_data['password'])){
			return true;
		}
		return false;
	}

	/*
	アカウント登録用メソッド
	*/
	public function signup($id, $password, $username) {
		if(array_search($id, $this->accountlist)) {
			$sql = "INSERT INTO `account` (`id`, `password`, `username`) VALUES ('".$id."', '".$password."', '".$username."')";
			if(!$this->mysqli->query($sql)) return false;
			echo "アカウント登録に成功しました。トップに戻ります。";
			return true;
		}else{
			echo "そのアカウントはすでに存在しています！";
			return false;
		}
	}

	/*
	ログイン用メソッド
	*/
	public function login($id, $password) {
		$sql = "SELECT `id`, `username` FROM `account` WHERE `id`='".$id."' AND `password`='".$password."'";
		//SQL文が成功したら表示処理
		$result = $this->mysqli->query($sql);
		if(!$result) return;
		while($row = $result->fetch_assoc()){
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			return true;
		}
		return false;
	}

	/*
	ログアウト用メソッド
	*/
	public function logout() {
		//controllerに配置するかmodelに配置するか悩んだので待機
	}

	/*
	ユーザ名取得用メソッド
	*/
	public function get_username($id) {
		$sql = "SELECT `username` FROM `account` WHERE `id` = '".$id."'";
		$result = $this->mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			return $row['username'];
		}
		return '';
	}

	/*
	ユーザid取得用メソッド
	*/
	public function get_userid() {
		//理論上これは矛盾が生じるため不採用
	}

	/*
	プロフィールにおけるアイコン画像の取得用メソッド
	*/
	public function get_icon($id) {
		$sql = "SELECT `icon` FROM `account` WHERE `id` = '".$id."'";
		$result = $this->mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			return $row['icon'];
		}
		return '';
	}

	/*
	プロフィールにおける背景画像取得用メソッド
	*/
	public function get_background($id) {
		$sql = "SELECT `background` FROM `account` WHERE `id` = '".$id."'";
		$result = $this->mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			return $row['background'];
		}
		return '';
	}

	/*
	一言メッセージ取得用メソッド
	*/
	public function get_introduction($id) {
		$sql = "SELECT `message` FROM `account` WHERE `id` = '".$id."'";
		$result = $this->mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			return $row['message'];
		}
		return '';
	}

	/*
	投稿記事数用メソッド
	*/
	public function get_post_num($id) {
		$sql = "SELECT `postnum` FROM `account` WHERE `id` = '".$id."'";
		$result = $this->mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			return $row['postnum'];
		}
		return '';
	}

	/*
	高評価数取得用メソッド
	*/
	public function get_good_num($id) {
		$sql = "SELECT `good` FROM `account` WHERE `id` = '".$id."'";
		$result = $this->mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			return $row['good'];
		}
		return '';
	}

	/*
	低評価数取得用メソッド
	*/
	public function get_bad_num($id) {
		$sql = "SELECT `bad` FROM `account` WHERE `id` = '".$id."'";
		$result = $this->mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			return $row['bad'];
		}
		return '';
	}

	/*
	投稿記事取得用メソッド
	*/
	public function get_post_list($id) {
		$sql = "SELECT * FROM `post` WHERE `id`='".$id."' ORDER BY `date` DESC";
		$result = $this->mysqli->query($sql);
		$list = array();
		while($row = $result->fetch_assoc()) {
			array_push($list, $row);
		}
		return $list;
	}

	/*
	閲覧履歴取得用メソッド
	*/
	public function get_view_history($id) {
		$sql = "SELECT * FROM `history` WHERE `user-id`='".$id."' ORDER BY `last` DESC";
		$result = $this->mysqli->query($sql);
		$data = array();
		while($row = $result->fetch_assoc()) {
			array_push($data, $row);
		}
		return $data;
	}

	/*
	閲覧履歴追加用メソッド
	*/
	public function add_view_history($id) {
		$sql = "SELECT * FROM `history` WHERE `user-id`='".$id."' ORDER BY `last` DESC";
		$result = $this->mysqli->query($sql);
		$data = array();

		while($row = $result->fetch_assoc()) {
			array_push($data, $row);
		}
		return $data;
	}

	/*
	時間割取得用メソッド
	*/
	public function get_timestamp($id) {
		$date = array('sun', 'mon', 'tue', 'wed', 'thu', 'fri');
		$section = array(1, 2, 3, 4, 5);
		$timestamp = array();

		$sql = "SELECT * FROM `timestamp` WHERE `id` = '".$id."'";
		$result = $this->mysqli->query($sql);
		$data = array();
		while($row = $result->fetch_assoc()) {
			array_push($data, $row);
		}
		$data = array();
		foreach($date as $d) {
			foreach($section as $s) {
				$sql = "SELECT `classroom_key` FROM `timestamp` WHERE `id` = '".$id."' AND `day` = '".$d."' AND `time` = '".$s."'";
				$result = $this->mysqli->query($sql);
				while($row = $result->fetch_assoc()) {
					$data[$d][$s] = $row['classroom_key'];
				}
			}
		}
		return $data;
	}

	/*
	フォローしているユーザを取得するメソッド
	*/
	public function get_follow_list($id) {
		$sql = "SELECT `opponent` FROM `follow_relationship` WHERE `myself` = '".$id."' ORDER BY `date` DESC";
		$result = $this->mysqli->query($sql);
		$list = array();
		while($row = $result->fetch_assoc()) {
			array_push($list, $row['opponent']);
		}
		return $list;
	}

	/*
	フォローされているユーザを取得するメソッド
	*/
	public function get_follower_list($id) {
		$sql = "SELECT `myself` FROM `follow_relationship` WHERE `opponent` = '".$id."' ORDER BY `date` DESC";
		$result = $this->mysqli->query($sql);
		$list = array();
		while($row = $result->fetch_assoc()) {
			array_push($list, $row['myself']);
		}
		return $list;
	}

	/*
	チャンネル登録用メソッド
	*/
	public function channel_registration($userid, $opponentid) {
		$now = date('YmdHis');
		$sql = "INSERT INTO `follow_relationship` (`myself`, `opponent`, `date`) VALUES ('".$userid."', '".$opponentid."', '".$now."')";
		$result = $this->mysqli->query($sql);
		if($result) return true;
		else return false;
	}
}
?>
