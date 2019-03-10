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
<?php else:
	//guest.phpでまとめてもいいかも？
?>
<a href="<?= base_url() ?>login/"><button type="button" class="btn btn-info" name="button">ログイン画面へGO</button></a>
<a href="<?= base_url() ?>signup/"><button type="button" class="btn btn-info" name="button">アカウント登録</button></a>
<?php endif; ?>
