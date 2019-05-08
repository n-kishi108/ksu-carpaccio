<?php
session_start();
class HttpRequestController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){}

	public function setNavSize() {
		// if(isset($_SESSION)) {
		// 	var_dump($_SESSION);
		// 	exit;
		// }else{
		// 	echo 'ほげ';
		// 	exit;
		// }
		// echo 'hello';

		// if(isset($_POST)) {
		// 	var_dump($_POST);
		// 	exit;
		// }else{
		// 	echo 'ほげ';
		// 	exit;
		// }
		$_SESSION['showmode'] = $_POST['mode'];
		echo $_SESSION['showmode'];
	}
}
?>
