<?php
$title = 'サンプル';
$current_url = current_url();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--IE対応-->
		<meta name="viewport" content="width=1080">
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
		<!--レスポンシブ対応-->
		<title><?= $title ?></title>
		<!-- favicon読み込み -->
		<link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon/favicon.ico" /> <!--ファビコン設定-->
		<!-- cssファイル読み込み -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css" /> <!--Bootstrap読み込み-->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/component.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/header.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css"> <!--ここにメインのレイアウト-->

		<!-- js読み込み -->
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
		<script src="<?= base_url() ?>assets/js/style.js"></script>
	</head>
	<body>
		<nav class="navigation">
			<section class="hamburger">
				<div class="hamburger-wrapper" onclick="">
					<div class="hamburger-main">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</section>
			<section class="menu">
				<ul>
					<?php
						$page_url = array(
							array(
								'url' => base_url(),
								'title' => 'ホーム'
							),
							array(
								'url' => base_url().'history/',
								'title' => '履歴'
							),
							array(
								'url' => base_url().'postedit/',
								'title' => '投稿'
							),
							array(
								'url' => base_url().'search/',
								'title' => '検索'
							),
							array(
								'url' => base_url().'home/',
								'title' => 'マイページ'
							),
							array(
								'url' => base_url().'logout/',
								'title' => 'ログアウト'
							),
							array(
								'url' => base_url().'login/',
								'title' => 'ログイン'
							),
							array(
								'url' => base_url().'signup/',
								'title' => 'アカウント登録'
							)
						);
						foreach($page_url as $el) {
							if($el['title'] == 'ログアウト' && !isset($_SESSION['id'])) continue;
							if($el['title'] == 'ログイン' && isset($_SESSION['id'])) continue;
							if($el['title'] == 'アカウント登録' && isset($_SESSION['id'])) continue;
							if($el['url'] == $current_url) {
								echo '<li class="current">';
							}else{
								echo '<li>';
							}
							echo '<a href="'.$el['url'].'">'.$el['title'].'</a>';
							echo '</li>';
						}
					?>
				</ul>
			</section>
		</nav>
		<main>
