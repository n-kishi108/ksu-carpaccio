$(function() {
	const speed = 50;
	$('#toggle_area').on('click', function(){
		if($(this).hasClass('show')) {
			$('.navigation').animate({
				width: '50px'
			}, {
				duration: speed
			});
			$(this).removeClass('show');
			$(this).addClass('hide');
		}else if($(this).hasClass('hide')) {
			$('.navigation').animate({
				width: '200px'
			}, {
				duration: speed
			});
			$(this).removeClass('hide');
			$(this).addClass('show');
		}
	});
});
