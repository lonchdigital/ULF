import $ from 'jquery';

var btn = $('#btnTop');

$(window).scroll(function () {
	if ($(window).scrollTop() > 122) {
		btn.addClass('show');
	} else {
		btn.removeClass('show');
	}
});

btn.on('click', function (e) {
	e.preventDefault();
	$('html, body').animate({ scrollTop: 0 }, '122');
});

