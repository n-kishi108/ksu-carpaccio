<link rel="stylesheet" href="<?= base_url() ?>assets/css/history.css">
<div class="wrapper row">
	<div class="article-wrapper col-md-8">
		<article>
			<?php if(!$history): ?>
				閲覧履歴がありません
			<?php else: ?>
			<?php foreach($history as $row): ?>
				<div class="history-unit" onclick="pageJump('<?= $row['article-id'] ?>')">
					<div class="user-icon"></div>
					<div class="kernel">
						<h1 class="article-title"><?= $row['article-title'] ?></h1>
						<p class="article-head"><?= $row['article-head'] ?></p>
					</div>
				</div>
			<?php endforeach; ?>
			<?php endif; ?>
		</article>
	</div>
	<aside class="col-md-4">
		<div class="side-information">
			サイドメニュー
		</div>
	</aside>
</div>
