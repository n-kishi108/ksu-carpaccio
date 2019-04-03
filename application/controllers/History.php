<?php
session_start();
class History extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('historyModel');
	}
	public function index() {
		if(!isset($_SESSION['id'])){
			header('Location:'.base_url().'login/');
		}
		$data['history'] = $this->historyModel->view_history();
		// var_dump($data['history']);
		// exit;
		$this->load->view('templates/header');
		$this->load->view('history/index', $data);
		$this->load->view('templates/footer');
	}
}
?>
