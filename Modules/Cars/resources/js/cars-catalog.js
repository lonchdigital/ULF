import $ from 'jquery';
import { setFilterParams } from './set-filter-params';
import { extractFilterParams } from './extract-filter-params';
import "./with-lib-svelte-range-slider-pips.js";

$(document).ready(function() {
    const $postFilterResult = $('#cars-list');
    const $postPaginationWrapper = $('#pagination-wrapper');
    const $showMore = $('#show-more');
    const $filterCarsButton = $('#filter-cars-button');
    const $filterCatalogSortLink = $('.art-select-options.art-sort-catalog a');
    const $modelSelectContainer = $('#select-choose-model-container');
    const $modelSelect = $('#select-choose-model');
    const $selectChooseManufacturer = $('#select-choose-manufacturer');

    runAjaxFilter();
    setDynamicModels();

    $selectChooseManufacturer.on('change', function() {
        let artThis = $(this);
        setDynamicModels(artThis);
    });

    function setDynamicModels(artThis = null){
        let manufacturerId = artThis ? artThis.val() : $selectChooseManufacturer.val();
        
        $modelSelect.empty();
        $modelSelect.append('<option value="0">'+ translations['choose_model'] +'</option>');

        if (manufacturerId !== '0' && window.manufacturersData) {
            $modelSelectContainer.removeClass('d-none');
            const models = window.manufacturersData[manufacturerId].models;

            $.each(models, function(modelId, model) {
                let isSelected = (modelId == window.model) ? 'selected' : '';
                $modelSelect.append(`<option value="${modelId}" ${isSelected}>${model}</option>`);
            });
        } else {
            $modelSelectContainer.addClass('d-none');
        }
    }

    $postPaginationWrapper.on('click', 'li a', function(event) {
        event.preventDefault();

        const urlParams = new URLSearchParams($(this).attr('href').split('?')[1]);
        const pageNumber = urlParams.get('page');

        runAjaxFilter(pageNumber);
        $('html, body').animate({scrollTop: 0}, 'slow');
    });

    $showMore.on('click', function(event) {
        event.preventDefault();

        let pageNumber = parseInt($('#pagination-wrapper .active').text(), 10) + 1;
        runAjaxFilter(pageNumber, true);
    });

    $filterCarsButton.on('click', function (event) {
        buildUrlFromParamsAndFollowIt(event);
    });
    $filterCatalogSortLink.on('click', function (event) {
        let artThis = $(this);
        buildUrlFromParamsAndFollowIt(event, artThis);
    });

    function buildUrlFromParamsAndFollowIt(event, artThis = null) {
        event.preventDefault();

        // Create object URLSearchParams and set params
        let params = new URLSearchParams(window.location.search);
        params = setFilterParams(params, artThis);

        const newUrl = `${window.location.pathname}?${params.toString()}`;
        window.location.href = newUrl;
    }

    function runAjaxFilter(pageNumber = null, showMore = false) {
        // $postFilterResult.html('<div class="art-loader-post-wrapper"><div class="loader">Шукаю, зачекайте...</div></div>');
        // $postPaginationWrapper.html('');

        let filters = {};
        filters = extractFilterParams(filters);

        ajaxThematicFilter(
            function (data) {
                if( data['documents'].length > 0 ) {
                    // $postFilterResult.removeClass('art-posts-nothing-found');
                    $postPaginationWrapper.html(data['paginationHTML']);
                    handFilterResult(data['documents'], showMore);

                    let currentPage = parseInt($('#pagination-wrapper .active').text(), 10);
                    let pageNumbers = $postPaginationWrapper.find('.page-link')
                        .map(function() {
                            return parseInt($(this).text().trim(), 10);
                        }).get();
                    let maxPageNumber = Math.max(...pageNumbers);


                    if (Number.isInteger(currentPage) && Number.isInteger(maxPageNumber)) {
                        if(currentPage >= maxPageNumber) {
                            $showMore.addClass('d-none');
                        } else {
                            $showMore.removeClass('d-none');
                        }
                    } else {
                        $showMore.addClass('d-none');
                    }

                } else {
                    $postFilterResult.addClass('art-posts-nothing-found');
                    $postPaginationWrapper.html('');
                    $showMore.addClass('d-none');
                    nothingFound();
                }
            },
            function () {
                console.error('init: error during Filter.');
            },
            pageNumber,
            filters
        );
    }

    function ajaxThematicFilter(success, fail, pageNumber = null, filters = null)
    {
        const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        const appUrl = document.head.querySelector('meta[name="app-url"]').content;

        $.ajax({
            url: `${appUrl}/cars`,
            type: 'post',
            data: {
                _token: csrfToken,
                pageNumber: pageNumber,
                filters: filters
            },
            dataType: 'json'
        }).done(function(data) {
            success(data);
        }).fail(function () {
            fail();
        });
    }

    function handFilterResult(data, showMore)
    {
        let documentsToAppend = '';
        if(data.length > 0) {
            data.forEach(function (document, index) {
                documentsToAppend += getDocumentHTML(document);
            });
        } else {
            for (let key in data) {
                documentsToAppend += getDocumentHTML(data[key]);
            }
        }

        if(showMore === true) {
            let currentContent = $postFilterResult.html();
            $postFilterResult.html(currentContent + documentsToAppend);
        } else {
            $postFilterResult.html(documentsToAppend);
        }
    }

    function getDocumentHTML(document)
    {
        let monthlyPayment = ``;
        let carLabel = ``;

        if (document['car_additional']['monthly_payment']) {
            monthlyPayment = `
            <div class="price mb-1">
                <span class="currency">$</span>
                <span class="value">${document['car_additional']['monthly_payment']}</span> / ${translations['month']}
            </div>
            `;
        }

        if( document['status_id'] === 2 ) {
            carLabel = `
                    <div class="in-subscription">${translations['in_subscription']}</div>
                `;
        } else {
            if(document['car_additional']['car_label']) {
                if(document['car_additional']['car_label_color_id'] === 2) {
                    carLabel = `
                    <div class="discount label-red">${document['car_additional']['car_label']}</div>
                `;
                } else {
                    carLabel = `
                    <div class="discount">${document['car_additional']['car_label']}</div>
                `;
                }
            }
        }

        return `
            <div class="content1 col-12 col-md-6 col-lg-4">
                <div class="our-fleet-preview--item">
                    <a href="${document['car_additional']['car_url']}">
                        <div class="name">${document['car_additional']['car_name']}</div>
                    </a>
                    <div class="wrap-img">
                        <a href="${document['car_additional']['car_url']}">
                            <img src="${document['car_additional']['car_image_url']}" alt="Car image">
                        </a>
                    </div>
                    ${monthlyPayment}
                    <a href="${document['car_additional']['car_url']}" class="btn-arrow btn btn-block">
                        <span>${document['car_additional']['car_short_desc']}</span>
                    </a>
                    ${carLabel}
                </div>
            </div>
        `;
    }


    function nothingFound()
    {
        let nothingFound = `
        <div class="art-nothing-found">
            <div class="nothing-found-data">
                <img src="/static_images/clouds.png" alt="nothing found">
                <p class="h3">${translations['nothing_found']}</p>
            </div>
        </div>
        `;

        $postFilterResult.html(nothingFound);
    }

    // select button
    let filtersButton = $('.filters-button .art-order');
    filtersButton.on('click', function(event) {
        let artThis = $(this);

        if(artThis.hasClass('active')) {
            artThis.removeClass('active');
        } else {
            artThis.addClass('active');
        }
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest(filtersButton).length) {
            filtersButton.removeClass('active');
        }
    });

});
