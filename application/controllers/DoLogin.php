<?php
session_start();
class DoLogin extends CI_Controller {
	public $array;
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->array = array(
			'id' => $_POST['id'],
			'password' => $_POST['password']
		);
		$this->load->model('login');
	}
	public function index() {
		list($id, $username) = $this->login->login($this->array);
		if(isset($id) && isset($username)) {
			$_SESSION['id'] = $id;
			$_SESSION['username'] = $username;
			//ログインに成功した場合の処理
			echo $_SESSION['username'].'さん、こんにちは。';
			header('Location: '.base_url());
			exit;
		}else {
			exit('ログインに失敗しました。');
		}
	}
}
?>
