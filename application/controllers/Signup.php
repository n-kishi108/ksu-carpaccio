<?php
class Signup extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		$this->load->helper('url');
		$this->load->view('templates/header');
		$this->load->view('signup/index');
		// $this->load->view('templates/footer');
	}
}
 ?>
