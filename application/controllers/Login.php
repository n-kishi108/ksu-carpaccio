<?php
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		$this->load->helper('url'); // urlヘルパーを呼び出す。
		$this->load->view('templates/header'); // views/templates/header.phpの呼び出し
		$this->load->view('login/index'); // views/index/index.phpの呼び出し
		$this->load->view('templates/footer'); // views/templates/footer.phpの呼び出し
	}
}
?>
