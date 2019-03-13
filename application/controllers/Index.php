<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url'); // urlヘルパーを呼び出す。
		$this->load->model('timeline');
	}

	public function index() { //読み込みたいビュー(html)を順番に書く。$thisはCI_Controllerのことを指し、viewsディレクトリのなかのxxxをloadしていますよと行ったニュアンスになる。
		$data['timeline'] = $this->setTimeline();
		$this->load->view('templates/header'); // views/templates/header.phpの呼び出し
		$this->load->view('index/index', $data); // views/index/index.phpの呼び出し
		$this->load->view('templates/footer'); // views/templates/footer.phpの呼び出し
	}

	public function setTimeline() {
		$result = $this->timeline->timeline();
		return $result;
		while($row = $result->fetch_assoc()) {
			return $row;
			// echo "<section>";
			// echo '<h2 class="title">'.$row['title'].'</h2>';
			// echo '<h3 class="head">'.$row['head'].'</h3>';
			// echo '<p class="article">'.$row['article'].'</[p]>';
			// echo "</section>";
		}
		return array();
	}
}
?>
