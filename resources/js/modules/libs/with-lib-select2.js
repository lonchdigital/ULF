import $ from 'jquery';
import "../../../../node_modules/select2/dist/js/select2.js";

// //? select
let commonSelect = $('.field .select-wrap select');
if (commonSelect.length) {
    commonSelect.select2({
        minimumResultsForSearch: -1,
        // dropdownParent: $('.select-wrap')
    });
}

let selectChooseCity = $('.select-choose-city');
if (selectChooseCity.length) {
    selectChooseCity.select2({
        minimumResultsForSearch: -1,
        placeholder: 'Оберіть ваше місто'
    });
}

let selectChooseBrand = $('.select-choose-brand');
if (selectChooseBrand.length) {
    selectChooseBrand.select2({
        minimumResultsForSearch: -1,
        placeholder: 'Оберіть марку авто'
    });
}
