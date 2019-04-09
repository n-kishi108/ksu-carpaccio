<link rel="stylesheet" href="<?= base_url() ?>assets/css/post.css">

<div class="wrapper">
	<form action="<?= base_url() ?>post/" method="post">
		<nav class="post-navigation block">
			<input type="submit" value="投稿">
		</nav>
		<div class="title-wrapper block">
			<input type="text" name="title" placeholder="タイトルを入力してください。">
		</div>
		<div class="editor-wrapper row">
			<div class="editor-main col-xl-9">
				<input type="text" name="head" placeholder="見出しを描いてください。">
				<textarea name="article" placeholder="本文"></textarea>
			</div>
			<aside class="tags-wrapper col-xl-3">
				<div class="editor-tags">
					<form action="index.html" method="post">
						<input type="text" name="tags" placeholder="タグを入力">
						<button type="button" name="button">追加</button>
					</form>
					<div class="tags-list">
					</div>
				</div>
			</aside>
		</div>
	</form>
</div>
