<?php
class AjaxController extends CI_Controller {
	private $get;
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ajax');
		$this->load->model('post_article');
	}
	public function index() {
		if(!(isset($_GET['comment_id']) && isset($_GET['user_id']) && isset($_GET['f']))) exit;
		$this->get = array(
			'comment_id' => $_GET['comment_id'],
			'user_id' => $_GET['user_id'],
			'f' => $_GET['f']
		);
		$count = 0;
		switch($this->get['f']) {
			case 'good':
				$count = $this->ajax->good($this->get);
			break;
			case 'bad':
				$count = $this->ajax->bad($this->get);
			break;
		}
		echo $count; //これがreturnの代わり。消しちゃダメ！ゼッタイ！！
	}

	public function autoUpdate() {
		$data = $this->ajax->load($_GET['article_id']);
		echo json_encode($data);
	}

	public function send_to_comment() {
		$article = array(
			'article-id' => $_GET['article_id'],
			'comment' => $_GET['comment']
		);
		if($article['comment'] != ''){
			$is_post = $this->post_article->putComment($article);
		}
		if($is_post) {
			echo '';
		}else{
			exit('投稿に失敗しました');
		}
	}
}
?>
