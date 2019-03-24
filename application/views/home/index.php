<?php
if(!isset($_SESSION['id'])){
	header('Location:'. base_url());
}
 ?>
 <!-- <p>こんにちは！<?= $_SESSION['id'] ?>さん</p> -->
<main>
	<div class="about-user window-herf">
		<!-- ここにアカウント情報を表示 -->
		<div class="account-icon"></div>
		<div class="ac-name">ユーザネーム</div>
	</div>
	<div class="post-history window-herf">
		<!-- ここにタイムラインを表示 -->
		<?php
			$i=1;
			while($row = $history->fetch_assoc()) {
				$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
				$sql = "SELECT `username` FROM `account` WHERE `id`='".$row['id']."'";
				$result = $mysqli->query($sql);
				while($r_row = $result->fetch_assoc()){
					echo '<section class="history-post-data">';
					echo '<div class="post-header">';
					echo '<div class="user-icon"></div>';
					echo '<h1 class="user-name">'.$r_row['username'].'</h1>';
					echo '</div>';
					echo '<h2 class="post-title">'.$row['title'].'</h2>';
					echo '<h3 class="head">'.$row['head'].'</h3>';
					echo '<p class="article">'.$row['article'].'</[p]>';
					echo '<br />';
					echo '<b class="text-primary" style="text-decoration: underbar;" onclick="edit('.$i.')">編集</b>';
					echo "</section>";
					break;
				}
				$i++;
			}
		// $this->sethistory();
		?>
	</div>
	<script>
		function edit(child) {
			$('section.history-post-data:nth-child(' + child + ')').css({
				'height': '100vh'
			});
			$('section.history-post-data:not(:nth-child(' + child + '))').css({
				'display': 'none'
			});
			var old_dom = ['h2', 'h3', 'p', 'b'];
			for(old_dom in el) {
				$(el).remove();
			}
			$('section.history-post-data').append();
		}

		function edit_close() {
			//
		}
	</script>
</main>
<style media="screen">
	main{
		font-size: 0;
	}
	.window-herf {
		font-size: 16px;
		min-height: 100vh;
		vertical-align: top;
			width: 50vw;
			display: inline-block;
	}
	.account-icon{
		width: 400px;
		height: 400px;
		background-color: #aaa;
		border-radius: 200px;
		margin: 50px auto;
	}
	.ac-name{
		text-align: center;
		/* width: 50vw; */
		font-size: 40px;
	}

	.post-history {
		background: #eee;
	}

	section.history-post-data {
		background: #fff;
		width: 90%;
		min-height: 200px;
		margin: 20px auto;
		padding: 10px 25px;
		border-bottom: solid 1px #aaa;
	}
	section.history-post-data .post-header {
		width: 100%;
		height: 70px;
		padding: 10px 0;
	}
	section.history-post-data .user-icon {
		width: 50px;
		height: 50px;
		border-radius: 25px;
		background: #aaa;
		display: inline-block;
	}
	section.history-post-data .user-name {
		position: relative;
		font-size: 16px;
		line-height: 50px;
		margin-left: 20px;
		display: inline-block;
		vertical-align: top;
	}
	section.history-post-data h2{
		font-size: 40px;
	}

	section.history-post-data h3{
		font-size: 24px;
	}
	section.history-post-data p{
		font-size: 16px;
	}
	section.history-post-data b {
		display: block;
		margin-bottom: 50px;
		float: right;
	}
	section.history-post-data b:hover {
		cursor: pointer;
	}
</style>
