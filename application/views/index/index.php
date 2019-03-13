<style>
	button {
		width: 200px;
		height: 50px;
		position: relative;
	}
</style>

<?php
session_start();
if(isset($_SESSION['id'])):
	//user.phpでまとめてもいいかも?
?>
<p>Hello, <?= $_SESSION['id'] ?>さん</p>
<a href="<?= base_url() ?>logout/"><button type="button" class="btn btn-info">log out</button></a>
<div class="post_sec">
	<form action="<?= base_url() ?>post/" method="post">
		<input type="text" name="title" placeholder="タイトル">
		<textarea name="head" placeholder="見出し"></textarea>
		<textarea name="article" placeholder="本文"></textarea>
		<input type="submit" value="投稿">
	</form>
</div>
<div class="timeline">
	<?php
		while($row = $timeline->fetch_assoc()) {
			echo '<section class="timeline-post-data">';
			echo '<h2 class="post-title">'.$row['title'].'</h2>';
			echo '<h3 class="head">'.$row['head'].'</h3>';
			echo '<p class="article">'.$row['article'].'</[p]>';
			echo "</section>";
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
<style>
	div.post_sec {
		width: 400px;
		height: 700px;
		background: #526488;
		padding: 10px 25px;
		display: inline-block;
		float: left;
	}
	input[name='title'] {
		width: 350px;
		height: 50px;
		line-height: 50px;
		margin: 10px 0;
	}
	textarea[name='head'] {
		width: 350px;
		height: 100px;
		margin: 10px 0;
	}
	textarea[name='article'] {
		width: 350px;
		height: 360px;
		margin: 10px 0;
	}
	textarea{resize: none;}
	input[type='submit'] {
		width: 100px;
		height: 30px;
		background: #fff;
		color: #526488;
		margin: 20px auto;
	}
	div.timeline {
		float: left;
		width: 400px;
		height: 700px;
		background: #fff;
		margin-left: 20px;
		padding: 10px 25px;
		display: inline-block;
		box-shadow: 0 0 40px 10px rgba(0, 0, 0, 0.2);
		overflow: scroll;
	}
	section.timeline-post-data {
		padding: 10px 0;
		border-bottom: solid 1px #aaa;
	}
	section.timeline-post-data h2{
		font-size: 40px;
	}

	section.timeline-post-data h3{
		font-size: 32px;
	}
	section.timeline-post-data p{
		font-size: 18px;
	}
</style>
