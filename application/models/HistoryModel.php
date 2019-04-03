<?php
// session_start();
class HistoryModel extends CI_Model {
	private $mysqli;
	public function __construct() {
		parent::__construct();
		$this->mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		$this->load->helper('url');
	}

	public function view_history() {

		$data = $this->get_history_data(); //閲覧情報
		$article_infrormation = $this->get_article_information(); //記事情報
		//記事情報を閲覧情報に紐付けする
		for($i = 0; $i < count($data); $i++) {
			foreach($article_infrormation as $art) {
				if($data[$i]['article-id'] == $art['article-id']) {
					$data[$i]['article-title'] = $art['title'];
					$data[$i]['article-head'] = $art['head'];
				}
			}
		}
		return $data;
	}

	private function get_history_data() {
		$sql = "SELECT * FROM `history` WHERE `user-id`='".$_SESSION['id']."' ORDER BY `last` DESC";
		$result = $this->mysqli->query($sql);
		$data = array();

		while($row = $result->fetch_assoc()) {
			array_push($data, $row);
		}
		return $data;
	}

	private function get_article_information() {
		$sql = "SELECT `title`, `head`, `article-id` FROM `post`";
		$result = $this->mysqli->query($sql);
		$data = array();

		while($row = $result->fetch_assoc()) {
			array_push($data, $row);
		}
		return $data;
	}
}
 ?>
