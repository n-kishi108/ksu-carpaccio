<?php
session_start();
class Postedit extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	public function index() {
		$this->load->view('templates/header'); // views/templates/header.phpの呼び出し
		$this->load->view('post/index'); // views/index/index.phpの呼び出し
		// $this->load->view('templates/footer'); // views/templates/footer.phpの呼び出し
	}
}
?>
