<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url'); // urlヘルパーを呼び出す。
		$this->load->model('timeline');
		$this->load->model('accountModel');
		$this->load->model('ajax');
	}

	public function index() { //読み込みたいビュー(html)を順番に書く。$thisはCI_Controllerのことを指し、viewsディレクトリのなかのxxxをloadしていますよと行ったニュアンスになる。
		$data['timeline'] = $this->setTimeline();
		if(isset($_SESSION['id'])){
			$data['account'] = $this->accountModel->getAccountData($_SESSION['id']);
		}else{
			$data['account'] = null;
		}
		$data['showmode'] = $this->ajax->getShowMode($_SESSION['id']);
		if(!$data['showmode']) $data['showmode'] = 'nomal';
		$this->load->view('templates/header', $data); // views/templates/header.phpの呼び出し
		$this->load->view('index/index', $data); // views/index/index.phpの呼び出し
		// $this->load->view('templates/footer'); // views/templates/footer.phpの呼び出し
	}

	public function setTimeline() {
		$result = $this->timeline->timeline();
		return $result;
		while($row = $result->fetch_assoc()) {
			return $row;
		}
		return array();
	}
}
?>
