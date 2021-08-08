$(document).ready(function () {
	$('.screenUp').click(function () {
		$('body, html').animate(
			{
				scrollTop: '0px',
			},
			300
		);
	});

	$(window).scroll(function () {
		if ($(this).scrollTop() > 0) {
			$('.screenUp').slideDown(300);
		} else {
			$('.screenUp').slideUp(300);
		}
	});
});
