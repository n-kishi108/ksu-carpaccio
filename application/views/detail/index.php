<link rel="stylesheet" href="<?= base_url() ?>assets/css/detail.css">
<div class="wrapper row">
	<div class="article-wrapper col-md-8">
		<article>
			<small><?= $article['date'] ?></small>
			<h1><?= $article['title'] ?></h1>
			<h2 class="preview">
				<p><?= $article['head'] ?></p>
			</h2>
			<p class="article"><?= $article['article'] ?></p>
		</article>
	</div>
	<aside class="col-md-4">
		<div class="side-information">
			<div class="profile-icon"></div>
			<h1 class="user-name"><?= $account['username'] ?></h1>
			<h2 class="user-id">@<?= $account['id'] ?></h2>
			<p class="user-profile"><?= $account['message']?></p>
		</div>
	</aside>
</div>

<section class="comment row">
	<section class="col-md-8">
		<h2>コメント</h2>
		<!-- <form action="<?= base_url(); ?>sendComment" method="post"> -->
		<!-- <form> -->
			<div class="comment-wrapper" id="form">
				<input id="article-id" type="hidden" name="article-id" value="<?= $article_id ?>">
				<textarea id="comment-article" name="comment"></textarea>
				<!-- <input type="submit" class="btn" value="コメントする"> -->
				<button class="btn" value="コメントする" onclick="sendComment()">コメントする</button>
			</div>
		<!-- </form> -->
		<div class="comment-list" id="comment-list">
			<?php if(!isset($comment)): ?>
				<p class="no-comment">コメントはありません。</p>
			<?php else: ?>

			<?php while($row = $comment->fetch_assoc()): ?>

			<article class="comment-unit" id="dom-<?= $row['comment_id'] ?>">
				<div class="comment-header">

					<div class="user-icon"></div>
					<div class="account_headline-data">
						<h1 class="user-name"><?= '本来はここにユーザネーム' ?></h1>
						<h2 class="user-id">@<?= $row['user-id'] ?></h2>
					</div>
					<div class="post-time-wrapper">
						<small class="comment-date"><?= $row['date'] ?></small>
					</div>

				</div>
				<div class="comment-article-wrapper">
					<pre>
						<p class="comment-article"><?= $row['comment'] ?></p>
					</pre>
				</div>
				<div class="comment-footer">
					<div class="evaluation-wrapper" id="comment-<?= $row['comment_id'] ?>-bad" onclick="addEvaluation('<?= $_SESSION['id'] ?>', '<?= $row['comment_id'] ?>', 'bad')">
						<div class="evaluation-icon">
							<p class="material-icons">thumb_down_alt</p>
							<small>not good</small>
						</div>
						<div class="evaluation-count">
							<p><?= $row['bad'] ?></p>
						</div>
					</div>

					<div class="evaluation-wrapper" id="comment-<?= $row['comment_id'] ?>-good" onclick="addEvaluation('<?= $_SESSION['id'] ?>', '<?= $row['comment_id'] ?>', 'good')">
						<div class="evaluation-icon">
							<p class="material-icons">thumb_up_alt</p>
							<small>good</small>
						</div>
						<div class="evaluation-count">
							<p><?= $row['good'] ?></p>
						</div>
					</div>
				</div>
			</article>

			<?php endwhile; ?>

			<?php endif; ?>
		</div>
		<script>
			autoUpdate('<?= $_GET['id'] ?>', '<?= $_SESSION['id'] ?>');
		</script>
	</section>
	<section class="col-md-4">
		<aside class="">
			関連記事
		</aside>
	</section>
</section>
