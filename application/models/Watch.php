<?php
class Watch extends CI_Model {
	private $mysqli;
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
	}

	public function addLog($article_id) {
		//閲覧履歴を追加
		$select = $this->getLog($article_id);
		$db_data = array();
		while($row = $select->fetch_assoc()) {
			array_push($db_data, $row);
		}
		// var_dump($db_data);
		// exit;
		if(!$db_data) {
			$this->setLog($article_id);
		}else{
			$this->update_to_log($db_data, $article_id);
		}
	}

	private function getLog($article_id) {
		$sql = "SELECT * FROM `history` WHERE `user-id`='".$_SESSION['id']."' AND `article-id`='".$article_id."'";
		$result = $this->mysqli->query($sql);
		return $result;
	}

	private function setLog($article_id) {
		//insert into
		$date = date('YmdHis');
		$sql = "INSERT INTO `history` (`user-id`, `article-id`, `last`, `count`) VALUES ('".$_SESSION['id']."', '".$article_id."', '".$date."', '1')";
		$result = $this->mysqli->query($sql);
		if($result){
			return $result;
		}else{
			exit('予期せぬエラーが発生しました。::閲覧履歴を登録できませんでした。');
		}
	}

	private function update_to_log($data, $article_id) {
		//update set
		$cnt = intval($data[0]['count']);
		$cnt++;
		$now = date('YmdHis');
		$sql = "UPDATE `history` SET `last` = '".$now."', `count` = '".$cnt."' WHERE `user-id` = '".$_SESSION['id']."' AND `article-id` = '".$article_id."'";
		$result = $this->mysqli->query($sql);
		if($result){
			return $result;
		}else{
			exit('予期せぬエラーが発生しました。::閲覧履歴を登録できませんでした。');
		}
	}
}
?>
