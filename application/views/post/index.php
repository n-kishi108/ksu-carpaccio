<link rel="stylesheet" href="<?= base_url() ?>assets/css/post.css">
<link href="http://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet" />

<div class="wrapper">
	<form action="<?= base_url() ?>post/" id="post" method="post">
		<div class="form-header">
			<div class="w100 h50 pv5">
				<input type="submit" value="投稿">
			</div>
			<div class="w100 h50 pv5">
				<input class="input-title w100 h40" type="text" name="title" placeholder="タイトルを入力してください" required />
			</div>
		</div>

		<div class="form-main">
			<div class="edit form-main-wrapper row">
				<div class="form-article col-xl-6">
					<div class="edit-wrapper">
						<div class="edit-header">
							<div class="form-header-wrapper">
								<span>編集</span>
								<ul>
									<?php
									$edit_nav = array(
										array(
											'icon' => 'code',
											'action' => 'code'
										),
										array(
											'icon' => 'format_list_bulleted',
											'action' => ''
										),
										array(
											'icon' => 'format_bold',
											'action' => 'b'
										),
										array(
											'icon' => 'format_underlined',
											'action' => 'u'
										),
										array(
											'icon' => 'strikethrough_s',
											'action' => 's'
										),
										array(
											'icon' => 'format_italic',
											'action' => 'i'
										),
										array(
											'icon' => 'link',
											'action' => 'a'
										),
										array(
											'icon' => 'format_color_text',
											'action' => ''
										),
										array(
											'icon' => 'image',
											'action' => ''
										)
									);
									?>
									<?php foreach($edit_nav as $el): ?>

									<?php if($el['icon'] == 'format_color_text'): ?>

									<li class="material-icons" onclick="" id="edit-font-color" style="color: #aaa;"><?= $el['icon'] ?></li>

									<?php elseif($el['icon'] == 'image'): ?>

									<li class="material-icons">
										<label for="file_info">

											<?= $el['icon'] ?>

											<input type="file" id="file_info" name="file_info" style="display: none;">

										</label>
									</li>

									<?php elseif($el['icon'] == 'link'): ?>

									<li class="material-icons" onclick="addTags('<?= $el['action'] ?>', 'edit_article');"><?= $el['icon'] ?></li>

									<?php else: ?>

									<li class="material-icons" onclick="addTags('<?= $el['action'] ?>', 'edit_article');"><?= $el['icon'] ?></li>
									<?php endif; ?>
									<?php endforeach; ?>

								</ul>
							</div>
						</div>

						<div class="edit-main">
							<textarea id="edit_article" name="article" placeholder="本文を記入"></textarea>
						</div>
					</div>
				</div>

				<div class="edit form-article col-xl-6">
					<div class="prev-wrapper">
						<div class="prev-header">
							<div class="form-header-wrapper">
								<span>プレビュー</span>
							</div>
						</div>

						<div id="prev-main">
							<pre></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script src="<?= base_url() ?>assets/js/textbox_controller.js"></script>
