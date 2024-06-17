import $ from 'jquery';

let lastScrollTop = 15;
let ticking = false;

$(window).scroll(function () {
	if (!ticking) {
		window.requestAnimationFrame(function () {
			let st = $(window).scrollTop();
			let footerOffset = $('.footer').offset().top;
			let windowHeight = $(window).height();

			if ($(window).width() < 768) {
				if (st > lastScrollTop) {
					$(".toolbar-fixed").removeClass("--show").addClass("--hide");
				} else if (st <= 0) {
					$(".toolbar-fixed").removeClass("--hide").addClass("--show");
				} else {
					$(".toolbar-fixed").removeClass("--hide").addClass("--show");
				}

				// Check if the footer is in view
				if (st + windowHeight >= footerOffset) {
					$(".toolbar-fixed").removeClass("--show").addClass("--hide");
				}
			}

			lastScrollTop = Math.max(st, 0);
			ticking = false;
		});
		ticking = true;
	}
});
