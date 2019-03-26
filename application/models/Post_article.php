<?php
class Post_article extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	public function post($data) {
		$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
		$date = date('YmdHis');
		$sql = "INSERT INTO `post` (`id`, `title`, `head`, `article`, `date`) VALUES('".$data['id']."','".$data['title']."','".$data['head']."','".$data['article']."', '".$date."')";
		if(!$mysqli->query($sql)) return false;
		return true;
	}
}
?>
