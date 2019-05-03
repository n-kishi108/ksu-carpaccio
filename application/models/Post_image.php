<?php
class Post_image extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	//お前、本当はコントローラでいいんじゃねえの??()
	public function save_image($file) {
		$file_tmp = $file['tmp_name'];
		$save_point = APPPATH.'uploads/'.date("Y/m/d").'/';
		$filename = $file['name'];
		$result = $this->_save($file_tmp, $save_point, $filename);
		if($result) {
			return $save_point.$filename;
		}else{
			return '';
		}
	}

	//ファイルを保存するの巻
	private function _save($tmp, $place, $target) {
		if(file_exists($place)) {
			//保存処理
			$result = @move_uploaded_file($tmp, $place.$target);
			return $result;
		}else {
			if(mkdir($place, 0755, true)) {
				//確実に権限を変更しておく
				chmod($place, 0755);
				return _save($tmp, $place, $target);
			}
		}
		//なんとなくfalseを返す
		return false;
	}
}
?>
