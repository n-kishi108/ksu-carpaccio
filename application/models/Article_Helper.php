<?php
class Article_Helper extends CI_Model {

	private $mysqli;

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'mysqli_connect'));
		$this->mysqli = _connect();
	}

	/*
	記事を投稿するためのメソッド
	*/
	public function post($id, $title, $head, $article) {
		$date = date('YmdHis');
		$article_id = $date.uniqid();
		$sql = "INSERT INTO `post` (`id`, `title`, `head`, `article`, `date`, `good`, `bad`, `article-id`) VALUES ('$id','$title','$head','$article', '$date', '0', '0', '$article_id')";
		if(!$this->mysqli->query($sql)) return false;
		return true;
	}

	/*
	タグの登録メソッド
	*/
	public function regist_tag() {
		return;
	}

	/*
	記事のタイトルを取得するためのメソッド
	*/
	public function get_title() {
		return;
	}

	/*
	記事の見出しを取得するためのメソッド
	*/
	public function get_head() {
		return;
	}

	/*
	記事の投稿日時を取得するためのメソッド
	*/
	public function get_date() {
		return;
	}

	/*
	記事の本文を取得するためのメソッド
	*/
	public function get_main() {
		return;
	}

	/*
	記事に投稿された画像パスを取得するメソッド
	*/
	public function get_images() {
		return;
	}

	/*
	記事の高評価数を取得するためのメソッド
	*/
	public function get_good_num() {
		return;
	}

	/*
	記事の低評価数を取得するためのメソッド
	*/
	public function get_bad_num() {
		return;
	}

	/*
	コメント件数を取得するためのメソッド
	*/
	public function get_comment_num() {
		return;
	}

	/*
	投稿者のユーザidを取得するためのメソッド
	*/
	public function get_userid() {
		return;
	}

	/*
	投稿者のユーザ名を取得するためのメソッド
	*/
	public function get_username() {
		return;
	}

	/*
	投稿者のアイコン画像を取得するためのメソッド
	*/
	public function get_user_icon() {
		return;
	}

	/*
	投稿者の背景画像を取得するためのメソッド
	*/
	public function get_user_background() {
		return;
	}

	/*
	記事idを取得するためのメソッド
	*/
	public function get_article_id() {
		return;
	}

	/*
	記事を再編集するためのメソッド
	*/
	public function reedit_article() {
		return;
	}

	/*
	記事を削除するためのメソッド
	*/
	public function delete_article() {
		return;
	}
}
?>
