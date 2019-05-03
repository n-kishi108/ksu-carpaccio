/**********
未入力判定
**********/
$(function() {
	textarea_background(0);
	to_reflect();
});

$('.input-title').on('input', function(e) {
		textarea_background(1);
		to_reflect();
	}
);

$('textarea[name="article"]').on({
	'input': function(e) {
		textarea_background(2);
		to_reflect();
	}
});

function textarea_background(val) {
	switch(val) {
		case 0:
			if($('.input-title:not(:focus)').val() == '') {
				$('.input-title').css('background', 'rgb(251, 250, 223)');
			}else{
				$('.input-title').css('background', 'rgb(255, 255, 255)');
			}

			if($('textarea[name="article"]:not(:focus)').val() == '') {
				$('textarea[name="article"]').css('background', 'rgb(251, 250, 223)');
			}else{
				$('textarea[name="article"]').css('background', 'rgb(255, 255, 255)');
			}
		break;

		case 1:
			if($('.input-title:not(:focus)').val() == '') {
				$('.input-title').css('background', 'rgb(251, 250, 223)');
			}else{
				$('.input-title').css('background', 'rgb(255, 255, 255)');
			}
		break;

		case 2:
			if($('textarea[name="article"]:not(:focus)').val() == '') {
				$('textarea[name="article"]').css('background', 'rgb(251, 250, 223)');
			}else{
				$('textarea[name="article"]').css('background', 'rgb(255, 255, 255)');
			}
		break;
	}
}

/**********
DOMの反映
**********/
function to_reflect() {
	$('#prev-main pre').empty();
	var dom = $('#edit_article').val();
	console.log(dom);
	$('#prev-main pre').append(dom);
}


/**********
タグ挿入
**********/
var isIE = (navigator.appName.toLowerCase().indexOf('internet explorer') + 1 ? 1 : 0);

function addTags(tag, obj) {
	let target = document.getElementById(obj);
	let pos = getAreaRange(target);

	let val = target.value;
	let range = val.slice(pos.start, pos.end);
	let beforeNode = val.slice(0, pos.start);
	let afterNode  = val.slice(pos.end);
	let insertNode;

	if (range || pos.start != pos.end) {
		if(tag == 'a') insertNode = '<' + tag + ' href="">' + range + '</' + tag + '>';
		else insertNode = '<' + tag + '>' + range + '</' + tag + '>';
		target.value = beforeNode + insertNode + afterNode;
	}else if (pos.start == pos.end) {
		if(tag == 'a') insertNode = '<' + tag + ' href="">' + range + '</' + tag + '>';
		else insertNode = '<' + tag + '>' + '</' + tag + '>';
		target.value = beforeNode + insertNode + afterNode;
	}
	to_reflect();
}

function getAreaRange(obj) {
	var pos = new Object();

	if (isIE) {
		obj.focus();
		var range = document.selection.createRange();
		var clone = range.duplicate();

		clone.moveToElementText(obj);
		clone.setEndPoint( 'EndToEnd', range );

		pos.start = clone.text.length - range.text.length;
		pos.end   = clone.text.length - range.text.length + range.text.length;
	}else if(window.getSelection()) {
		pos.start = obj.selectionStart;
		pos.end   = obj.selectionEnd;
	}
	return pos;
}

$('#file_info').change( function () {
	if (!this.files.length) {
		return;
	}
	if(this.files[0].type.indexOf('image') < 0) {
		alert('画像ファイル以外は添付できません。');
		return;
	}else{
		var formdata = new FormData($('#post').get(0));
		$.ajax({
			type: 'POST',
			url: 'post/imgupload/',
			data: formdata,
			processData: false,
			contentType: false,
			// async: false,
		})
		.done(function(data) {
			// $('#prev-main').append('<img src="' + data + '" width="100%">');
				$('#edit_article').append('&lt;img src="' + data + '" width="100%"&gt;');
		});

		// let send = {
		// 	''
		// };

		// let result = $.ajax({ data: $.param(send) }).responseText;
		//
		// $('#comment-' + commentId + '-' + evaluation + ' > div.evaluation-count p').text(result);
	}

	// var file = $(this).prop('files')[0];
	// var fr = new FileReader();
	// fr.onload = function() {
	// 	$('#prev-main').append('<img src="' + fr.result + '" width="100%">');
	// 	$('#edit_article').append('&lt;img src="' + fr.result + '" width="100%"&gt;');
	// }
	// fr.readAsDataURL(file);
	to_reflect();
});

// $('#file_info').on('change', function(e) {
// 	let file = e.target.files[0],
// 		reader = new FileReader();
//
// 	//画像ファイル以外は排除
// 	if(file.type.indexOf("image") < 0 || file == null){
// 		return false;
// 	}
// 	let imageFile = (function(file) {
// 		return function(e) {
// 			e.target.result;
// 		}
// 	})
//
// 	$('#prev-main').append('<img src="' + imageFile + '" width="100%">');
// });
