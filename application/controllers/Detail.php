<?php
session_start();
class Detail extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('post_detail');
		$this->load->model('accountModel');
		$this->load->model('watch');
		$this->load->model('ajax');
	}
	public function index() {
		$data['article_id'] = $_GET['id'];
		$data['article'] = $this->post_detail->call_article($data['article_id']);
		$data['comment'] = $this->post_detail->get_comment($data['article']['article-id']);
		$data['account'] = $this->accountModel->getAccountData($data['article']['id']);
		$data['showmode'] = $this->ajax->getShowMode($_SESSION['id']);
		if(!$data['showmode']) $data['showmode'] = 'nomal';
		
		$this->watch->addLog($data['article']['article-id']);
		$this->load->view('templates/header.php', $data);
		$this->load->view('detail/index.php', $data);
		$this->load->view('templates/footer.php');
	}
}
?>
