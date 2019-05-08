<?php
session_start();
class Signup extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ajax');
	}
	public function index() {
		$data['showmode'] = 'nomal';

		$this->load->view('templates/header', $data);
		$this->load->view('signup/index');
		// $this->load->view('templates/footer');
	}
}
 ?>
