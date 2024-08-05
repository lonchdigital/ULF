import $ from 'jquery';
import iconUrl from '$img/icons/icons.svg';

// Функція для плавної прокрутки до елемента
function scrollToElement(element) {
	if ($(element).length > 0) {
		var headerHeight = $('header').outerHeight();
		var targetScroll = $(element).offset().top - headerHeight - 20;
		$('html, body').animate({ scrollTop: targetScroll }, 'slow');
	}
}

$(document).ready(function () {
	// Функція, що видяляє our-fleet-search з розмітки на екранах від 1024 пікселів

	function removeElementOnSmallScreens() {
		var windowWidth = $(window).width();
		var isSmallScreen = windowWidth < 1024;

		if (isSmallScreen) {
			// Видалити .our-fleet-search з DOM, якщо він існує
			$('.our-fleet .content.our-fleet-search').remove();
		}
	}

	function removeElementOnLargeScreens() {
		var windowWidth = $(window).width();
		var isLargeScreen = windowWidth >= 768;

		if (isLargeScreen) {
			// Видалити .tinder з DOM, якщо він існує
			$('.tinder-catalog').remove();
		}
	}


	// Викликати функцію при завантаженні сторінки
	removeElementOnSmallScreens();
	removeElementOnLargeScreens();

	// Викликати функцію при зміні розміру вікна
	$(window).resize(function () {
		removeElementOnSmallScreens();
		removeElementOnLargeScreens();
	});

	// Перевірка на пристрій
	var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
});

//? pagination
function getPageList(totalPages, page, maxLength) {
	if (maxLength < 5) throw "maxLength must be at least 5";

	function range(start, end) {
		return Array.from(Array(end - start + 1), (_, i) => i + start);
	}

	var sideWidth = maxLength < 9 ? 1 : 2;
	var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
	var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
	if (totalPages <= maxLength) {
		// no breaks in list
		return range(1, totalPages);
	}
	if (page <= maxLength - sideWidth - 1 - rightWidth) {
		// no break on left of page
		return range(1, maxLength - sideWidth - 1)
			.concat([0])
			.concat(range(totalPages - sideWidth + 1, totalPages));
	}
	if (page >= totalPages - sideWidth - 1 - rightWidth) {
		// no break on right of page
		return range(1, sideWidth)
			.concat([0])
			.concat(
				range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages)
			);
	}
	// Breaks on both sides
	return range(1, sideWidth)
		.concat([0])
		.concat(range(page - leftWidth, page + rightWidth))
		.concat([0])
		.concat(range(totalPages - sideWidth + 1, totalPages));
}

//? pagination questions
$(function () {
	var targetElement = '#questions';
	var numberOfItems = $("#questions .content").length;
	var limitPerPage = 11;
	var totalPages = Math.ceil(numberOfItems / limitPerPage);
	var paginationSize = 7;
	var currentPage;

	function showPage(whichPage) {
		if (whichPage < 1 || whichPage > totalPages) return false;
		currentPage = whichPage;
		$(targetElement + " .content").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();
		$(targetElement + " .pagination li").slice(1, -1).remove();
		getPageList(totalPages, currentPage, paginationSize).forEach(item => {
			$("<li>").addClass("page-item " + (item ? "current-page " : "") + (item === currentPage ? "active " : ""))
				.append($("<a>").addClass("page-link").attr({ href: "javascript:void(0)" }).text(item || "..."))
				.insertBefore(targetElement + " #next-page");
		});
		return true;
	}

	// Include the prev/next buttons:
	$("#questions .pagination").append(
		$("<li>").addClass("page-item button-slider-prev").attr({ id: "previous-page" }).append(
			$(`<a><svg><use xlink:href="${iconUrl}#i-arrow-right">`)
				.addClass("page-link")
				.attr({
					href: "javascript:void(0)"
				})
			// .text("Prev")
		),
		$("<li>").addClass("page-item button-slider-next").attr({ id: "next-page" }).append(
			$(`<a><svg><use xlink:href="${iconUrl}#i-arrow-right">`)
				.addClass("page-link")
				.attr({
					href: "javascript:void(0)"
				})
			// .text("Next")
		)
	);
	// Show the page links
	$("#questions").show();
	showPage(1);

	$(document).on("click", targetElement + " .pagination li.current-page:not(.active)", function () {
		var targetPage = +$(this).text();
		showPage(targetPage);
		scrollToElement(targetElement);
	});

	$(targetElement + " #next-page").on("click", function () {
		var nextPage = currentPage + 1;
		showPage(nextPage);
		scrollToElement(targetElement);
	});

	$(targetElement + " #previous-page").on("click", function () {
		var prevPage = currentPage - 1;
		showPage(prevPage);
		scrollToElement(targetElement);
	});
});

//? pagination our-fleet
$(function () {
	var targetElement = '.our-fleet';
	var numberOfItems = $(".our-fleet .content").length;
	var w = screen.width;
	if (w < 768) {
		var limitPerPage = 5;
	} else if (w < 1024) {
		var limitPerPage = 8;
	} else {
		var limitPerPage = 12;
	}
	var totalPages = Math.ceil(numberOfItems / limitPerPage);
	var paginationSize = 7;
	var currentPage;

	function showPage(whichPage) {
		if (whichPage < 1 || whichPage > totalPages) return false;
		currentPage = whichPage;
		$(targetElement + " .content").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();
		$(targetElement + " .pagination li").slice(1, -1).remove();
		getPageList(totalPages, currentPage, paginationSize).forEach(item => {
			$("<li>").addClass("page-item " + (item ? "current-page " : "") + (item === currentPage ? "active " : ""))
				.append($("<a>").addClass("page-link").attr({ href: "javascript:void(0)" }).text(item || "..."))
				.insertBefore(targetElement + " #next-page");
		});
		return true;
	}

	// Include the prev/next buttons:
	$(".our-fleet .pagination").append(
		$("<li>").addClass("page-item button-slider-prev").attr({ id: "previous-page" }).append(
			$(`<a><svg><use xlink:href="${iconUrl}#i-arrow-right">`)
				.addClass("page-link")
				.attr({
					href: "javascript:void(0)"
				})
			// .text("Prev")
		),
		$("<li>").addClass("page-item button-slider-next").attr({ id: "next-page" }).append(
			$(`<a><svg><use xlink:href="${iconUrl}#i-arrow-right">`)
				.addClass("page-link")
				.attr({
					href: "javascript:void(0)"
				})
			// .text("Next")
		)
	);
	// Show the page links
	$(".our-fleet").show();
	showPage(1);


	$(document).on("click", targetElement + " .pagination li.current-page:not(.active)", function () {
		var targetPage = +$(this).text();
		showPage(targetPage);
		scrollToElement(targetElement);
	});

	$(targetElement + " #next-page").on("click", function () {
		var nextPage = currentPage + 1;
		showPage(nextPage);
		scrollToElement(targetElement);
	});

	$(targetElement + " #previous-page").on("click", function () {
		var prevPage = currentPage - 1;
		showPage(prevPage);
		scrollToElement(targetElement);
	});

	$(".our-fleet .btn-show-more").on("click", function () {
		var w = screen.width;
		if (w < '768') {
			limitPerPage += 5;
		} else
			if (w < '1024') {
				limitPerPage += 4;
			}
			else {
				limitPerPage += 3;
			}
		// limitPerPage += 3; // Increase limitPerPage by its initial value
		totalPages = Math.ceil(numberOfItems / limitPerPage);
		showPage(currentPage); // Show the current page with the updated limitPerPage
	});



});
