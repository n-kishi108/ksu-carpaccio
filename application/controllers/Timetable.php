<?php
session_start();
class Timetable extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ajax');
	}
	public function index() {
		$data['showmode'] = $this->ajax->getShowMode($_SESSION['id']);
		if(!$data['showmode']) $data['showmode'] = 'nomal';

		$this->load->view('templates/header', $data);
		$this->load->view('timetable/index');
		$this->load->view('templates/footer');
	}
}
?>
