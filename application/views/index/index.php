<style>
	button {
		width: 200px;
		height: 50px;
		position: relative;
	}
</style>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/index.css">
<?php
// session_start();
if(isset($_SESSION['id'])):
	//user.phpでまとめてもいいかも?
?>
<!-- <p>Hello, <?= $_SESSION['id'] ?>さん</p> -->
<div class="timeline">
	<?php
		while($row = $timeline->fetch_assoc()) {
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
				if($row['id'] == $_SESSION['id']) {
					echo '<a href="#"><b>編集</b></a>';
				}
				echo "</section>";
				break;
			}
		}
	// $this->setTimeline();
	?>
</div>
<?php else:
	//guest.phpでまとめてもいいかも？
?>
<a href="<?= base_url() ?>login/"><button type="button" class="btn btn-info" name="button">ログイン画面へGO</button></a>
<a href="<?= base_url() ?>signup/"><button type="button" class="btn btn-info" name="button">アカウント登録</button></a>
<?php endif; ?>
