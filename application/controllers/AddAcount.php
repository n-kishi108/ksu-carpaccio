<?php
session_start();
class AddAcount extends CI_Controller {
	public $array;
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->array = array(
			'id' => $_POST['id'],
			'password' => $_POST['password'],
			'acount_name' => $_POST['acount_name']
		);
		$this->load->model('signup');
	}
	public function index() {
		list($id, $name) = $this->signup->signin($this->array);
		if(isset($id) && isset($name)) {
			$_SESSION['id'] = $id;
			$_SESSION['username'] = $name;
			//ログインに成功した場合の処理
			echo $name.'さん、こんにちは。';
			header('Location: '.base_url());
		}else {
			exit('アカウント登録に失敗しました。');
		}
	}
}
?>
