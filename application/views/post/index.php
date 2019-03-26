<link rel="stylesheet" href="<?= base_url() ?>assets/css/post.css">

<div class="wrapper">
	<form action="<?= base_url() ?>post/" method="post">
		<nav class="post-navigation block">
			<input type="submit" value="投稿">
		</nav>
		<div class="title-wrapper block">
			<input type="text" name="title" placeholder="タイトルを入力してください。">
		</div>
		<div class="editor-wrapper">
			<input type="text" name="head" placeholder="見出しを描いてください。">
		</div>
	</form>
</div>

<div class="post_sec">
	<form action="<?= base_url() ?>post/" method="post">
		<input type="text" name="title" placeholder="タイトル">
		<textarea name="head" placeholder="見出し"></textarea>
		<textarea name="article" placeholder="本文"></textarea>
		<input type="submit" value="投稿">
	</form>
</div>
