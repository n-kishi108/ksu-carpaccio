<style>
	button {
		width: 200px;
		height: 50px;
		position: relative;
	}
</style>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/index.css">
<div class="timeline">
	<?php
		$i = 1;
		while($row = $timeline->fetch_assoc()) {
			$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
			$sql = "SELECT `username` FROM `account` WHERE `id`='".$row['id']."'";
			$result = $mysqli->query($sql);
			while($r_row = $result->fetch_assoc()){
				echo '<section class="timeline-post-data">';
				echo '<div class="post-header">';
				echo '<div class="user-icon"></div>';
				echo '<h1 class="user-name">'.$r_row['username'].'<span class="user-id">@'.$row['id'].'</span></h1>';
				echo '</div>';
				echo '<h2 class="post-title">'.$row['title'].'</h2>';
				echo '<h3 class="head">'.$row['head'].'</h3>';
				echo '<p class="article">'.$row['article'].'</[p]>';
				echo '<br />';
				if(isset($_SESSION['id']) && $row['id'] == $_SESSION['id']) {
					echo '<b class="cp-btn" onclick="edit('.$i.')">編集</b>';
				}
				echo "</section>";
				break;
			}
			$i++;
		}
	?>
</div>
