<?php
class Post_detail extends CI_Model {
	private $mysqli;
	public function __construct() {
		parent::__construct();
		$this->mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
	}

	public function call_article($article_id) {
		$sql = "SELECT * FROM `post` WHERE `article-id` = '".$article_id."'";
		$result = $this->mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			return $row;
		}
	}

	public function get_comment($article_id) {
		$sql = "SELECT * FROM `comment` WHERE `article-id` = '".$article_id."' ORDER BY `date` DESC";
		$result = $this->mysqli->query($sql);
		return $result;
	}
}
?>
