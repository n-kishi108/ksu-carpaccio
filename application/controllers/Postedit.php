<?php
session_start();
class Postedit extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ajax');
	}
	public function index() {
		$data['showmode'] = $this->ajax->getShowMode($_SESSION['id']);
		if(!$data['showmode']) $data['showmode'] = 'nomal';

		$this->load->view('templates/header', $data); // views/templates/header.phpの呼び出し
		$this->load->view('post/index'); // views/index/index.phpの呼び出し
		// $this->load->view('templates/footer'); // views/templates/footer.phpの呼び出し
	}
}
?>
