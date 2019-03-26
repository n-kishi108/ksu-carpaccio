<?php
session_start();
class History extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	public function index() {
		if(!isset($_SESSION['id'])){
			header('Location:'.base_url().'login/');
		}
		$this->load->view('templates/header');
		$this->load->view('history/index');
		$this->load->view('templates/footer');
	}
}
?>
