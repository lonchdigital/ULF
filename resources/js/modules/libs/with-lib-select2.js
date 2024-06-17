import $ from 'jquery';
import "../../../../node_modules/select2/dist/js/select2.js";

// //? select
$('.field .select-wrap select').select2({
	minimumResultsForSearch: -1,
	// dropdownParent: $('.select-wrap')
});

$('.select-choose-city').select2({
	minimumResultsForSearch: -1,
	placeholder: 'Оберіть ваше місто'
});

$('.select-choose-brand').select2({
	minimumResultsForSearch: -1,
	placeholder: 'Оберіть марку авто'
});
