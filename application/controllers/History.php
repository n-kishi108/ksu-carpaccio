<?php
session_start();
class History extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('historyModel');
		$this->load->model('ajax');
	}
	public function index() {
		if(!isset($_SESSION['id'])){
			header('Location:'.base_url().'login/');
		}
		$data['history'] = $this->historyModel->view_history();
		$data['showmode'] = $this->ajax->getShowMode($_SESSION['id']);
		if(!$data['showmode']) $data['showmode'] = 'nomal';
		
		$this->load->view('templates/header'. $data);
		$this->load->view('history/index', $data);
		$this->load->view('templates/footer');
	}
}
?>
