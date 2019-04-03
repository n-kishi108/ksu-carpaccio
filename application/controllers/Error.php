<?php
class Error extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function error_404() {
		$data = array();
		$this->output->set_status_header('404');
		$this->load->view('error/404', $data);
	}
}
?>
