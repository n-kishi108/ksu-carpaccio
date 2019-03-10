<?php
if(!isset($_POST['title']) || !isset($_POST['textarea']) || preg_match("/[^\s　]/", $_POST['text']) || preg_match("/[^\s　]/", $_POST['textarea'])){
	//mysqlへログインしてデータベースへ接続
	$mysqli = new mysqli("localhost", "root", "", "carpaccio_ren01");

	//接続確認
	if ($mysqli->connect_error) {
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset("utf8");

	//SQL文で挿入
	$sql = "INSERT INTO `post` (
		`title`, `article`, `time`
	) VALUES (
		'".$_POST['title']."', '".$_POST['textarea']."', '".date("Y-m-d H:i:s")."'
	)";
	$result = $mysqli->query($sql);
	if($result)echo "成功";
	else echo "失敗";
	//指定のデータベースへの接続を切断
	$mysqli->close();
}
header('Location: index.php');
?>
