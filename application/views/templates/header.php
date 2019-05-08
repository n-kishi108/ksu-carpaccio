<?php
$title = 'サンプル';
$current_url = current_url();
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--IE対応-->
		<!-- <meta name="viewport" content="width=1080, initial-scale=1"> -->
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0" />
		<!--レスポンシブ対応-->
		<title><?= $title ?></title>
		<!-- favicon読み込み -->
		<link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon/favicon.ico" /> <!--ファビコン設定-->
		<!-- cssファイル読み込み -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css" /> <!--Bootstrap読み込み-->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-grid.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/component.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/header.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css"> <!--ここにメインのレイアウト-->

		<!-- js読み込み -->
		<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
		<script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
		<!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
		<script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
		<script src="<?= base_url() ?>assets/js/database.js"></script>
		<!-- <script src="<?= base_url() ?>assets/js/style.js"></script> -->
		<!-- <script src="<?= base_url() ?>assets/js/helper.js?uri=<?= base_url()?>"></script> -->
		<?php if($current_url == base_url().'home'): ?>
		<script src="<?= base_url() ?>assets/js/mypage.js"></script>
		<?php endif; ?>
		<script>
			<!--
			let mode = '<?=$showmode?>';
			function pageJump(parameter) {
				var uri = '<?= base_url() ?>';
				if(parameter != "") location.href = uri + 'detail?id=' + parameter;
			}

			const list = new Array('.navigation', 'main');

			$(window).on('load', function() {
				$('.navigation').addClass('transition005s');
				$('main').addClass('transition005s');
			});

			$(function() {
				$('#toggle_area').on('click', function(){
					if($('.navigation').hasClass('nomal')) {
						for(let el of list) {
							$(el).removeClass('nomal').addClass('short');
						}
						mode = 'short';
					}else if($('.navigation').hasClass('short')) {
						for(let el of list) {
							$(el).removeClass('short').addClass('nomal');
						}
						mode = 'nomal';
					}
					$.ajax({
						type: 'GET',
						url: 'configController/showmode?mode=' + mode,
						processData: false,
						contentType: false,
					});
				});
			});
			-->
		</script>
	</head>
	<body>
		<?php if(isset($showmode)): ?>
			<?php if($showmode == 'nomal'):?>
				<nav class="navigation nomal">
			<?php elseif($showmode == 'short'):?>
				<nav class="navigation short">
			<?php endif;?>
		<?php else: ?>
			<nav class="navigation">
		<?php endif; ?>
		<!-- <nav class="navigation"> -->
			<section id="toggle_area" class="hamburger show">
				<div class="hamburger-wrapper">
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
								'title' => 'ホーム',
								'icon' => 'home'
							),
							array(
								'url' => '',
								// 'url' => base_url().'alert',
								'title' => '通知',
								'icon' => 'notifications'
							),
							array(
								'url' => base_url().'history',
								'title' => '履歴',
								'icon' => 'restore'
							),
							array(
								'url' => base_url().'favorite',
								'title' => 'お気に入り',
								// 'icon' => 'favorite'
								'icon' => 'grade'
							),
							array(
								'url' => base_url().'postedit',
								'title' => '投稿',
								'icon' => 'add'
							),
							array(
								'url' => base_url().'search',
								'title' => '検索',
								'icon' => 'search'
							),
							array(
								'url' => base_url().'home',
								'title' => 'マイページ',
								'icon' => 'person'
							),
							array(
								'url' => base_url().'home/friend',
								'title' => '友達',
								'icon' => 'people'
							),
							array(
								'url' => base_url().'timetable',
								'title' => '時間割',
								'icon' => 'date_range'
							),
							array(
								'url' => base_url().'setting',
								'title' => '設定',
								'icon' => 'settings'
							),
							array(
								'url' => base_url().'logout',
								'title' => 'ログアウト',
								'icon' => 'directions_run'
							),
							array(
								'url' => base_url().'login',
								'title' => 'ログイン',
								'icon' => 'dashboard'
							),
							array(
								'url' => base_url().'signup',
								'title' => 'アカウント登録',
								'icon' => 'person_add'
							)
						);
						$blacklist = (isset($_SESSION['id'])) ? array('ログイン', 'アカウント登録') : array('通知', '履歴', 'お気に入り', '投稿', '友達', 'マイページ', '設定', 'ログアウト');
					foreach($page_url as $el) :
						if(in_array($el['title'], $blacklist)) continue;
						if($el['url'] == $current_url) :
					?>

					<li class="current">
					<?php else: ?>
					<li>
					<?php endif; ?>
						<a href="<?= $el['url'] ?>">
							<span class="material-icons"><?= $el['icon'] ?></span>
							<span><?= $el['title']?></span>
						</a>
					</li>

					<?php endforeach; ?>
				</ul>
			</section>
		</nav>
		<?php if($current_url == base_url().'home'): ?>
			<header>
				<?= $_SESSION['username'] ?>
			</header>
		<?php endif; ?>
		<!-- <main> -->
		<?php if(isset($showmode)): ?>
			<?php if($showmode == 'nomal'):?>
				<main class="nomal">
			<?php elseif($showmode == 'short'):?>
				<main class="short">
			<?php endif;?>
		<?php else: ?>
			<main>
		<?php endif; ?>
