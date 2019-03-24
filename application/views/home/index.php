 <!-- <p>こんにちは！<?= $_SESSION['id'] ?>さん</p> -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/home.css">
	<div class="wrapper">
		<section class="about-user">
			<div class="account-background"></div>
			<div class="user-main-wrapper">
				<div class="account-icon"></div>
				<div class="account-name">
					<h1><?= $_SESSION['username'] ?></h1>
					<h2>@<?= $_SESSION['id'] ?></h2>
				</div>
			</div>
			<div class="account-about">
				<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
			</div>
		</section>
		<div class="timeline">
			<!-- ここにタイムラインを表示 -->
			<?php
				$i=1;
				while($row = $history->fetch_assoc()) {
					$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
					$sql = "SELECT `username` FROM `account` WHERE `id`='".$row['id']."'";
					$result = $mysqli->query($sql);
					while($r_row = $result->fetch_assoc()){
						echo '<section class="timeline-post-data">';
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
