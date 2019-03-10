<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url'); // urlヘルパーを呼び出す。
	}

	public function index() { //読み込みたいビュー(html)を順番に書く。$thisはCI_Controllerのことを指し、viewsディレクトリのなかのxxxをloadしていますよと行ったニュアンスになる。
		$this->load->view('templates/header'); // views/templates/header.phpの呼び出し
		$this->load->view('index/index'); // views/index/index.phpの呼び出し
		$this->load->view('templates/footer'); // views/templates/footer.phpの呼び出し
	}
}
?>
