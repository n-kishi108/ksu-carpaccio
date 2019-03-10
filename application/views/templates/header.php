<?php
$title = 'サンプル';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--IE対応-->
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!--レスポンシブ対応-->
		<title><?= $title ?></title>
		<!-- favicon読み込み -->
		<link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon/favicon.ico" /> <!--ファビコン設定-->
		<!-- cssファイル読み込み -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css" /> <!--Bootstrap読み込み-->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css"> <!--ここにメインのレイアウト-->

		<!-- js読み込み -->
		<script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
		<script src="<?= base_url() ?>assets/js/style.js"></script>
	</head>
	<body>
		<header>
			ここにヘッダの情報
		</header>
		<main>
