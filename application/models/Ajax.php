<?php
	class Ajax extends CI_Model {
		// private $post;
		private $mysqli;
		private $date;
		public function __construct() {
			parent::__construct();
			$this->mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		}

		public function good($get) {
			$good = 0;
			$sql = "SELECT `good`, `date` FROM `comment` WHERE `comment_id` = '".$get['comment_id']."'";
			$result = $this->mysqli->query($sql);
			while($row = $result->fetch_assoc()) {
				$good = $row['good'] + 1;
				$this->date = $row['date'];
			}
			$this->insert('good', $good, $get);
			return $good;
		}

		public function bad($get) {
			$bad = 0;
			$sql = "SELECT `bad`, `date` FROM `comment` WHERE `comment_id` = '".$get['comment_id']."'";
			$result = $this->mysqli->query($sql);
			while($row = $result->fetch_assoc()) {
				$bad = $row['bad'] + 1;
				$this->date = $row['date'];
			}
			$this->insert('bad', $bad, $get);
			return $bad;
		}

		private function insert($evaluation, $num, $get) {
			$sql = "UPDATE `comment` SET `".$evaluation."` = '".$num."', `date` = '".$this->date."' WHERE `comment_id` = '".$get['comment_id']."'";
			$result = $this->mysqli->query($sql);
			// $this->toRefrectView($evaluation, $num, $get);
			return;
		}

		public function toRefrectView($evaluation, $num, $get) {
			$sql = "SELECT `".$evaluation."` FROM `comment` WHERE `comment_id` = '".$get['comment_id']."'";
			$result = $this->mysqli->query($sql);
			while($row = $result->fetch_assoc()) {
				$bad = $row['bad'] + 1;
				$this->date = $row['date'];
			}
		}

		function load($article_id) {
			$sql = "SELECT * FROM `comment` WHERE `article-id` = '".$article_id."' ORDER BY `date` DESC";
			$result = $this->mysqli->query($sql);
			$array = array();
			while($row = $result->fetch_assoc()) {
				array_push($array, $row);
			}
			return $array;
		}

		public function update_showmode($id, $mode) {
			if(!$this->data_isExists('viewmode', 'id', $id)) {
				$sql = "INSERT INTO `viewmode` (`id`, `mode`) VALUES ('$id', '$mode')";
				$result = $this->mysqli->query($sql);
				return ($result)?true:false;
			}else{
				$sql = "UPDATE `viewmode` SET `id`='$id', `mode`='$mode' WHERE `id` = '$id'";
				$result = $this->mysqli->query($sql);
				return ($result)?true:false;
			}
			return false;
		}

		public function data_isExists($table, $column, $id) {
			$sql = "SELECT * FROM `$table` WHERE `$column` = '$id'";
			$result = $this->mysqli->query($sql);
			while($row = $result->fetch_assoc()) {
				return true;
			}
			return false;
		}

		public function getShowMode($id) {
			$sql = "SELECT * FROM `viewmode` WHERE `id`='$id'";
			$result = $this->mysqli->query($sql);
			while($row = $result->fetch_assoc()) {
				return $row['mode'];
			}
			return null;
		}

		// public function show($get) {
		// 	return;
		// }
	}
?>
