<?php
// session_start();
class Post_article extends CI_Model {
	private $mysqli;
	public function __construct() {
		parent::__construct();
		$this->mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
	}
	public function post($data) {
		$date = date('YmdHis');
		$article_id = $date.uniqid();
		$sql = "INSERT INTO `post` (`id`, `title`, `head`, `article`, `date`, `good`, `bad`, `article-id`) VALUES('".$data['id']."','".$data['title']."','','".$data['article']."', '".$date."', '0', '0', '".$article_id."')";
		echo $sql;
		exit;
		if(!$this->mysqli->query($sql)) return false;
		return true;
	}

	public function putComment($post) {
		$date = date('YmdHis');
		$article_id = $date.uniqid();
		$comment_id = $article_id.uniqid();
		$sql = "INSERT INTO `comment` (`user-id`, `article-id`, `comment`, `comment_id`, `date`, `good`, `bad`) VALUES('".$_SESSION['id']."', '".$post['article-id']."', '".$post['comment']."', '".$comment_id."', $date, '0', '0')";
		if(!$this->mysqli->query($sql)) return false;
		return true;
	}
}
?>
