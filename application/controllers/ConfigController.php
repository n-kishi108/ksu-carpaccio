<?php
session_start();
class ConfigController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ajax');
	}

	public function showmode() {
		if(isset($_GET['mode'])) {
			$result = $this->ajax->update_showmode($_SESSION['id'], $_GET['mode']);
			echo $_GET['mode'];
		}
		echo 'FALSE';
	}
}
?>
