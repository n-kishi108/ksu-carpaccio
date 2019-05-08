function addEvaluation(userId, commentId, evaluation) {
	if(commentId == '') return;

	// $.ajaxSetup({
	// 	type: 'GET',
	// 	url: 'ajaxController/',
	// 	async: false,
	// });
	//
	// let send = {
	// 	'comment_id': commentId,
	// 	'user_id': userId,
	// 	'f': evaluation
	// };
	//
	// let result = $.ajax({ data: $.param(send) }).responseText;
	//
	// $('#comment-' + commentId + '-' + evaluation + ' > div.evaluation-count p').text(result);

	$.ajax({
		type: 'GET',
		url: 'ajaxController/',
		data: {
			'comment_id': commentId,
			'user_id': userId,
			'f': evaluation
		},
		anync: false
	}).done(function(data) {
		$('#comment-' + commentId + '-' + evaluation + ' > div.evaluation-count p').text(data);
	})

}

// var interval_id = setInterval(update, 1000);
function autoUpdate(article_id, session_id) {
	setInterval(function(){
		$.ajaxSetup({
			type: 'GET',
			url: 'ajaxController/autoUpdate',
			async: false,
		});

		let send = {
			'article_id': article_id
		};

		let result = $.ajax({ data: $.param(send) }).responseText;
		result = JSON.parse(result);
		// console.log(result);

		//ここからDOM挿入
		for(var comment of result) {
		// for(var i = 0; i < result.length; i++) {
		// console.log('dom-' + comment['comment_id']);
			if(document.querySelector('#dom-' + comment['comment_id'])) {
				//eval更新
				$('#comment-' + comment['comment_id'] + '-good > div.evaluation-count p').text(comment['good']);
				$('#comment-' + comment['comment_id'] + '-bad > div.evaluation-count p').text(comment['bad']);
			}else {
				$(function(){
					$('#comment-list').prepend('<article class="comment-unit" id="dom-' + comment['comment_id'] + '"></article>'); //第一引数の要素を第二引数の要素の先頭に配置
					$('#dom-' + comment['comment_id']).prepend('<div class="comment-header"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-header').prepend('<div class="user-icon"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-header').append('<div class="account_headline-data"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-header > .account_headline-data').prepend('<h1 class="user-name">本来はここにユーザネーム</h1>');

					$('#dom-' + comment['comment_id'] + ' > .comment-header > .account_headline-data').append('<h2 class="user-id">@' + comment['user-id'] + '</h2>');

					$('#dom-' + comment['comment_id'] + ' > .comment-header').append('<div class="post-time-wrapper"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-header > .post-time-wrapper').append('<small class="comment-date">' + comment['date'] + '</small>');

					$('#dom-' + comment['comment_id']).append('<div class="comment-article-wrapper"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-article-wrapper').append('<pre></pre>');

					$('#dom-' + comment['comment_id'] + ' > .comment-article-wrapper pre').prepend('<p class="comment-article">' + comment['comment'] + '</p>');

					$('#dom-' + comment['comment_id']).append('<div class="comment-footer"></div>');

					/*goodボタン*/
					$('#dom-' + comment['comment_id'] + ' > .comment-footer').append('<div class="evaluation-wrapper" id="comment-' + comment['comment_id'] + '-good" onclick="addEvaluation(\'' + session_id + '\', \'' + comment['comment_id'] + '\', \'good\')"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper:first-child').append('<div class="evaluation-icon"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper:first-child > .evaluation-icon').append('<p class="material-icons">thumb_up_alt</p>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper:first-child > .evaluation-icon').append('<small>good</small>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper:first-child').append('<div class="evaluation-count"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper:first-child > .evaluation-count').append('<p>' + comment['good'] + '</p>');

					/*badボタン*/
					$('#dom-' + comment['comment_id'] + ' > .comment-footer').append('<div class="evaluation-wrapper" id="comment-' + comment['comment_id'] + '-bad" onclick="addEvaluation(\'' + session_id + '\', \'' + comment['comment_id'] + '\', \'bad\')"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper').append('<div class="evaluation-icon"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper:last-child > .evaluation-icon').append('<p class="material-icons">thumb_up_alt</p>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper:last-child > .evaluation-icon').append('<small>bad</small>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper:last-child').append('<div class="evaluation-count"></div>');

					$('#dom-' + comment['comment_id'] + ' > .comment-footer > .evaluation-wrapper:last-child > .evaluation-count').append('<p>' + comment['bad'] + '</p>');
				});
			}
		}
	}, 1000);
}

function sendComment() {
	// alert('send');
	$.ajaxSetup({
		type: 'GET',
		url: 'ajaxController/send_to_comment',
		async: false,
	});

	let send = {
		'comment': $('#comment-article').val(),
		'article_id': $('#article-id').val()
	};
	let result = $.ajax({ data: $.param(send) }).responseText;
	$('#comment-article').val('');
	// result = JSON.parse(result);
}
