<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>練習①</title>
		<style>
			* {
				margin: 0;
				padding: 0;
				border: none;
				font-size: 0;
			}
			body {
				background: #efefef;
			}
			header {
				width: 100%;
				height: 75px;
				position: fixed;
				z-index: 999;
				background: WHITE;
			}
			.title {
				margin: 0 auto;
				width: 90%;
				height: 75px;
				line-height: 75px;
				color: #222;
				font-weight: bold;
				font-size: 20px;
				text-align: center;
			}
			.wrapper {
				position: relative;
				width: 90%;
				margin: 0 auto;
				padding-top: 75px;
			}
			main {
				padding-top: 50px;
				margin: 0 auto;
			}
			.timeline {
				width: 50%;
				height: 800px;
				overflow: scroll;
				/* background: #2f313d; */
				float: left;
			}
			.posted-article {
				position: relative;
				width: 90%;
				min-height: 200px;
				margin: 0 auto;
				padding: 20px 5%;
				display: block;
			}
			.posted-article:not(:last-child) {
				border-bottom: solid 1px #222;
			}
			.article-title {
				font-size: 36px;
				color: #222;
				display: block;
				min-height: 50px;
				line-height: 50px;
			}
			.article-main {
				font-size: 16px;
				min-height: 129px;
				color: #222;
				display: block;
			}
			.article-time {
				float: right;
				color: gray;
				font-size: 14px;
				display: block;
				vertical-align: bottom;
			}
			.post-area {
				width: 46%;
				padding: 2%;
				height: 800px;
				background:none;
				float: right;
			}
			input[type='text'], textarea {
				border-radius: 5px;
			}
			input[type='text'] {
				width: 98%;
				padding: 0 2%;
				height: 50px;
				line-height: 50px;
				font-size: 20px;
				border: solid 1px #00aaff;
				margin-bottom: 20px;
				display: block;
			}
			textarea {
				width: 98%;
				padding: 1% 2%;
				height: 200px;
				resize: none;
				border: solid 1px #00aaff;
				font-size: 16px;
				display: block;
			}
			input[type='submit'] {
				width: 100px;
				height: 50px;
				line-height: 50px;
				font-size: 20px;
				background: #00aaff;
				color: #fff;
				margin: 20px 0;
				display: block;
				float: right;
				transition: .2s;
			}
			input[type='text']:focus, textarea:focus {
				outline: none;
				border-color: RED;
			}
			input[type='submit']:hover {
				background: WHITE;
				border: solid 1px #00aaff;
				color: #00aaff;
				width: 98px;
				height: 48px;
				border-radius: 10px;
			}
			input[type='submit']:focus {
				outline: none;
			}
			#dummy {
				text-align: center;
				width: 100px;
				height: 50px;
				line-height: 50px;
				font-size: 20px;
				background: #aaa;
				color: #454545;
				margin: 20px 0;
				display: block;
				float: right;
			}
		</style>
	</head>
	<body>
		<header>
			<h1 class="title">とりあえず投稿機能作ります。</h1>
		</header>
		<div class="wrapper">
			<main>
				<div class="timeline">
					<?php
					//mysqlへログインしてデータベースへ接続
					$mysqli = new mysqli("localhost", "root", "", "carpaccio_ren01");

					//接続確認
					if ($mysqli->connect_error) {
					    echo $mysqli->connect_error;
					    exit();
					}

					$mysqli->set_charset("utf8");

					//投稿記事を降順で表示
					$sql = "SELECT * FROM `post` ORDER BY 'time' DESC";
					//SQL文が成功したら表示処理
					$result = $mysqli->query($sql);
					if($result){
						while ($row = $result->fetch_assoc()) {
							echo '<artile class="posted-article">';
							echo '<h2 class="article-title">'.$row['title'].'</h2>';
							echo '<p class="article-main">'.$row['article'].'</p>';
							echo '<small class="article-time">'.$row['time'].'</small>';
							echo '</artile>';
						}
					}else echo "データの取得に失敗しました。";
					//指定のデータベースへの接続を切断
					$mysqli->close();
					?>

				</div>
				<div class="post-area">
					<form action="post.php" method="post">
						<input id="text" type="text" name="title" placeholder="ここに見出し" onChange="change()">
						<textarea id="textarea" name="textarea" placeholder="ここに本文" onChange="change()"></textarea>
						<div id="dummy">投稿</div>
						<script>
							function change(){
								var el_dummy = document.getElementById('dummy');
								var el_submit = document.getElementById('submit')
								//ダミーボタンが表示されていたら
								if(el_dummy != null || el_submit == null) {
									//ダミーボタンを削除
									el_dummy.parentNode.removeChild(el_dummy);
								}else{
									// 投稿ボタンを削除
									el_submit.parentNode.removeChild(el_submit);
								}

								var dom = document.getElementById('textarea');

								//どちらかが{未入力、半角や全角の空白のみ、改行のみ}ならば
								if(!document.getElementById('text').value.match(/\S/g) || !document.getElementById('textarea').value.match(/\S/g)) {
									//ダミーボタンを作成
									dom.insertAdjacentHTML('afterend', '<div id="dummy">投稿</div>');
									// document.parentNode.insertBefore('<div id="dummy">投稿</div>');
								}else{
									//投稿ボタンを作成
									dom.insertAdjacentHTML('afterend', '<input id="submit" type="submit" value="投稿">');
									// document.parentNode.insertBefore('<input id="submit" type="submit" value="投稿">');
								}
							}
						</script>
					</form>
				</div>
			</main>
		</div>
	</body>
</html>
