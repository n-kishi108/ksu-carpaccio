<style>
	button {
		width: 200px;
		height: 50px;
		position: relative;
	}
</style>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/index.css">
<div class="wrapper row">
	<div class="timeline col-md-8">
		<?php
			$i = 1;
			while($row = $timeline->fetch_assoc()):
				$mysqli = new mysqli('localhost', 'root', '', 'carpaccio');
				$sql = "SELECT `username` FROM `account` WHERE `id`='".$row['id']."'";
				$result = $mysqli->query($sql);
				while($r_row = $result->fetch_assoc()): ?>
		<section class="timeline-post-data" onclick="pageJump('<?= $row['article-id']?>')">
			<div class="post-header">
				<small class="post-time"><?= $row['date'] ?></small>
					<div class="user-icon"></div>
					<h1 class="user-name"><?= $r_row['username'] ?><span class="user-id">@<?= $row['id'] ?></span></h1>
					</div>
					<h2 class="post-title"><?= $row['title'] ?></h2>
					<h3 class="head"><?= $row['head'] ?></h3>
					<p class="article"><?= $row['article'] ?></p>
					<br />
					<?php if(isset($_SESSION['id']) && $row['id'] == $_SESSION['id']): ?>
					<b class="cp-btn" onclick="edit('<?= $i ?>)">編集</b>
					<?php endif; ?>
					</section>
					<?php break; ?>
				<?php endwhile; ?>
				<?php $i++; ?>
			<?php endwhile ?>
	</div>
	<aside class="col-md-4">
		<?php if($account == null): ?>
			hoge
		<?php else: ?>
		<div class="calender">
			<table>
				<tr>
					<?php for($i = 0; $i < 7; $i++): ?>
					<th></th>
					<?php endfor; ?>

					<?php for($i = 0; $i < 4; $i++): ?>
						<?php for($i = 0; $i < 7; $i++): ?>
					<td></td>
					<?php endfor; ?>
					<?php endfor; ?>
				</tr>
			</table>
		</div>
		<div class="side-information">
			<div class="profile-icon"></div>
			<h1 class="user-name"><?= $account['username'] ?></h1>
			<h2 class="user-id">@<?= $account['id'] ?></h2>
			<p class="user-profile"><?= $account['message']?></p>
		</div>
	<?php endif; ?>
	</aside>
</div>
