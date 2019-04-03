<link rel="stylesheet" href="<?= base_url() ?>assets/css/timetable.css">
<div class="wrapper">
	<h1>時間割</h1>
	<div class="content">
		<?php
		$place = '総合グラウンド';
		$col = ['mon', 'tue', 'wed', 'thu', 'fri'];
		$row = ['one', 'two', 'three', 'four', 'five'];
		?>
		<?php foreach($row as $time): ?>
		<?php foreach($col as $day): ?>

		<div class="class-unit <?= $day ?> <?= $time ?>" onclick="">
			<h1>保健・体育</h1>
			<h2><?= $place ?></h2>
		</div>

		<?php endforeach; ?>
		<?php endforeach; ?>
	</div>
</div>
