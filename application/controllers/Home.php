<?php
session_start();
class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('timeline');
		$this->load->model('ajax');
	}
	public function index() {
		if(!isset($_SESSION['id'])){
			header('Location:'.base_url().'login/');
		}
		$data['history'] = $this->getHistory();
		$data['showmode'] = $this->ajax->getShowMode($_SESSION['id']);
		if(!$data['showmode']) $data['showmode'] = 'nomal';

		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		// $this->load->view('templates/footer');
	}

	public function getHistory() {
		$result = $this->timeline->history($_SESSION['id']);
		return $result;
		while($row = $result->fetch_assoc()) {
			return $row;
		}
		return array();
	}
}
?>
