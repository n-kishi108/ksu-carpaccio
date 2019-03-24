<?php
session_start();
class Post extends CI_Controller {
	public $array;
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->array = array(
			'id' => $_SESSION['id'],
			'title' => $_POST['title'],
			'head' => $_POST['head'],
			'article' => $_POST['article']
		);
		$this->load->model('post_article');
	}
	public function index() {
		$result = $this->post_article->post($this->array);
		if($result) {
			header('Location: '.base_url());
			exit;
		}else{
			exit('投稿に失敗しました。');
		}
	}
}
 ?>
