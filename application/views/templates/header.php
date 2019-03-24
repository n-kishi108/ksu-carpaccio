<?php
$title = 'サンプル';
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
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/header.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css"> <!--ここにメインのレイアウト-->

		<!-- js読み込み -->
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
		<script src="<?= base_url() ?>assets/js/style.js"></script>
		<style media="screen">
			/* header {
				width: 100vw;
				height: 50px;
				line-height: 50px;
				border-bottom: solid 1px #aaa;
			}
			header ul {
				width: 1000px;
				height: 50px;
				list-style: none;
				display: inline-block;
			}
			header ul a, header ul a:hover{
				text-decoration: none;
			}
			header ul a{
				width: 120px;
				height: 50px;
				display: inline-block;
			}
			header ul li {
				width: 120px;
				height: 50px;
				line-height: 50px;
				text-align: center;
				color: rgb(28, 41, 56);
				transition: .2s;
			}
			header ul a:hover > li{
				color: rgb(29, 161, 242);
				background: #dedede;
			} */
		</style>
	</head>
	<body>
		<!-- <header> -->
			<!-- ここにヘッダの情報 -->
			<!-- <ul>
				<a href="<?= base_url() ?>">
					<li>timeline</li>
				</a>
				<a href="<?= base_url() ?>home/">
					<li>home</li>
				</a>
			</ul>
		</header> -->

		<?php if(isset($_SESSION['id'])): ?>
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
					<li>
						<a href="<?= base_url() ?>">ホーム</a>
					</li>
					<li>
						<a href="<?= base_url() ?>history/">履歴</a>
					</li>
					<li>
						<a href="<?= base_url() ?>postedit/">投稿</a>
					</li>
					<li>
						<a href="<?= base_url() ?>search/">検索</a>
					</li>
					<li>
						<a href="<?= base_url() ?>home/">マイページ</a>
					</li>
					<?php if(isset($_SESSION['id'])): ?>
						<li>
							<a href="<?= base_url() ?>logout/">ログアウト</a>
						</li>
					<?php endif; ?>
				</ul>
			</section>
		</nav>
		<!-- <header>
			<section>
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<h1 class="user-name"><?= $_SESSION['username'] ?></h1>
				<h2 class="user-id">@<?= $_SESSION['id'] ?></h2>
				<nav>
					<ul>
						<li><a href="">▷classes</a></li>
						<li><a href="">▷timeschedule</a></li>
						<li><a href="">▷contribute</a></li>
					</ul>
				</nav>
			</section>
			<section>
				<h2>setting&private</h2>
				<h2>support</h2>
			</section>
			<section>
				<div class="circle"></div>
				<div class="circle"></div>
				<div class="circle"></div>
			</section>
		</header> -->
		<?php endif; ?>
		<main>
