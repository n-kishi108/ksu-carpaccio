<?php
class Comment_Helper extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
}
?>
