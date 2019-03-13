<?php
session_start();
if(isset($_SESSION['id'])):
 ?>
 <p>こんにちは！<?= $_SESSION['id'] ?>さん</p>
<?php else: ?>
 <p>こんにちは！ゲストさん</p>
<?php endif; ?>
<p>パラリラパラリラ</p>
<div class="post_sec">
	<form action="<?= base_url() ?>post/" method="post">
		<input type="text" name="title" placeholder="タイトル">
		<textarea name="head" placeholder="見出し"></textarea>
		<textarea name="article" placeholder="本文"></textarea>
		<input type="submit" value="投稿">
	</form>
</div>


<style>
	div.post_sec {
		width: 400px;
		height: 700px;
		background: #526488;
		padding: 10px 25px;
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
</style>
