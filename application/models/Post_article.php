<?php
class Post_article extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	public function post($data) {
		$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		$sql = "INSERT INTO `post` (`id`, `title`, `head`, `article`) VALUES('".$data['id']."','".$data['title']."','".$data['head']."','".$data['article']."')";
		if(!$mysqli->query($sql)) return false;
		return true;
	}
}
?>
