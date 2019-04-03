<?php
	class SendComment extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('post_article');
		}

		public function index() {
			$result = $this->post_article->putComment($_POST);
			if($result) header('Location: '.base_url().'detail?id='.$_POST['article-id']);
			else exit('投稿できませんでした。');
		}
	}
?>
