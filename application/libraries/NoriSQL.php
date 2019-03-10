<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class NoriSQL {
		private $mysqli; //mysqliは外部では使わないことを想定
		public $table; //テーブル名をフィールドにすることでより扱いやすくなる。

		/*
		想定の引数は連想配列であり、
		'host' => gethostname,
		'user' => username,
		'password' => password,
		'database' => database
		である。new mysqliと一緒である。
		*/
		public function __construct($parameter) {
			// echo "<pre>";
			// print_r(func_get_args());
			// echo "</pre>";
			// exit();
			// $parameter = func_get_args()[0];
			if($parameter){
				$this->mysqli = new mysqli($parameter['host'], $parameter['user'], $parameter['password'], $parameter['database']);
				$this->table = $parameter['table'];
				$this->mysqli->set_charset("utf-8");
			}
		}

		public function __destruct() {
			if(isset($this->mysqli)) $this->mysqli->close();
		}

		public function login($id, $password) {
			$sql = "SELECT `id` FROM `".$this->table."` WHERE `id`='".$id."' AND `password`='".$password."'";
			//SQL文が成功したら表示処理
			$result = $this->mysqli->query($sql);
			if(!$result) return false;
			session_start();
			while($row = $result->fetch_assoc()){
				$_SESSION['id'] = $row['id'];
			}
			return true;
		}

		public function logout() {
			session_start();
			$_SESSION = array();
			// セッションクッキーを削除
			if (isset($_COOKIE["PHPSESSID"])) {
			  setcookie("PHPSESSID", '', time() - 1800, '/');
			}
			session_destroy();
		}

		public function signup($id, $password) {
			if(!(isset($id) && isset($password)) || preg_match("/[^\s　]/", $id) || preg_match("/[^\s　]/", $password)){
				//アカウントが存在しているかを確認
				if($this->is_exist_acount($id)) {
					echo 'そのアカウントはすでに存在しています。';
					return false;
				}else{
					//アカウント登録開始
					return $this->add_acountData($id, $password);
				}
			}
		}

		private function is_exist_acount($id) {
			//アカウントの存在確認
			$sql = "SELECT `id` FROM `".$this->table."` WHERE `id`='".$id."'";
			$result = $this->mysqli->query($sql);
			if(!$result) return false;
			while($result->fetch_assoc()){
				return true;
			}
		}

		private function add_acountData($id, $password) {
			session_start();
			//SQL文で挿入
			$sql = "INSERT INTO `".$this->table."` (`id`, `password`) VALUES ('".$id."', '".$password."')";
			if(!$this->mysqli->query($sql)) return false;
			echo "アカウント登録に成功しました。トップに戻ります。";
			$_SESSION['id'] = $id;
			return true;
		}
	}
?>
