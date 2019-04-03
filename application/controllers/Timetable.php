<?php
session_start();
class Timetable extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index() {
		$this->load->view('templates/header');
		$this->load->view('timetable/index');
		$this->load->view('templates/footer');
	}
}
?>
