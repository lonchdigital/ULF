import $ from 'jquery';
// import { createPopper } from '@popperjs/core';
import 'bootstrap';

//? modal
$('.btn-modal-close').on('click', function () {
	var originalText = $(this).text(); // Зберігаємо початковий текст кнопки
	$(this).addClass('active');

	if ($(this).hasClass('active')) {
		$(this).text('Відправлено');
	}

	$('.modal').on('hidden.bs.modal', function () {
		$('.btn-modal-close').each(function () {
			$(this).removeClass('active').text(originalText); // Встановлюємо початковий текст та видаляємо клас active
		});
	});

});

//? tooltip info field


/*
$(function () {
	var tooltipInfo = ['<div class="tooltip tooltip-help-info" role="tooltip">',
		'<div class="arrow"></div>',
		'<div class="tooltip-inner">',
		'</div>',
		'</div>'].join('');

	$('.i-info').tooltip({
		trigger: "hover", //hover focus click manual
		html: true,
		placement: "top",
		template: tooltipInfo,
		// fallbackPlacement: ["top"],
		// строго в заданому напрямку, не дає можливості при скролі позиціонувати в інші сторони
	});
});*/
