<?php
class Logout extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->helper('url'); // urlヘルパーを呼び出す。
		session_start();
		$_SESSION = array();
		header('Location: '.base_url());
		exit;
	}
}
?>
