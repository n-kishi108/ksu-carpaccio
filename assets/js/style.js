$(function() {
	const list = new Array('.navigation', 'main');

	$(window).on('load', function() {
		if(sessionStorage.getItem('navsize') != 'nomal') {
			set_nav_default('50px', 'show', 'hide');
		}else{
			set_nav_default('200px', 'hide', 'show');
		}
		$('.navigation').addClass('transition005s');
		$('main').addClass('transition005s');
	});

	function set_nav_default(size, rmclass, adclass) {
		const cl = (size === '200px') ? 'nomal' : 'short';
		$('.navigation').addClass(cl);
		$('main').addClass(cl);
		$('#toggle_area').removeClass(rmclass).addClass(adclass);
	}

	$('#toggle_area').on('click', function(){
		if($('.navigation').hasClass('nomal')) {
			for(let el of list) {
				$(el).removeClass('nomal').addClass('short');
			}
			sessionStorage.navsize = 'short';
		}else if($('.navigation').hasClass('short')) {
			for(let el of list) {
				$(el).removeClass('short').addClass('nomal');
			}
			sessionStorage.navsize = 'nomal';
		}
	});
});
