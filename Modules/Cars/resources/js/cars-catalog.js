import $ from 'jquery';

$(document).ready(function() {

    // Ajax Filter
    const $postFilterResult = $('#cars-list');
    const $postPaginationWrapper = $('#pagination-wrapper');
    const $showMore = $('#show-more');


    runAjaxFilter();


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


    function runAjaxFilter(pageNumber = null, showMore = false) {
        // $postFilterResult.html('<div class="art-loader-post-wrapper"><div class="loader">Шукаю, зачекайте...</div></div>');
        // $postPaginationWrapper.html('');

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
                    nothingFound();
                }
            },
            function () {
                console.error('init: error during Filter.');
            },
            pageNumber
        );
    }

    function ajaxThematicFilter(success, fail, pageNumber = null)
    {
        const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        const appUrl = document.head.querySelector('meta[name="app-url"]').content;

        $.ajax({
            url: `${appUrl}/cars`,
            type: 'post',
            data: {
                _token: csrfToken,
                pageNumber: pageNumber
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
                <span class="value">${document['car_additional']['monthly_payment']}</span> / міс.
            </div>
            `;
        }

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

        return `
            <div class="content1 col-12 col-md-6 col-lg-4">
                <div class="our-fleet-preview--item">
                    <div class="name">${document['car_additional']['car_name']}</div>
                    <div class="wrap-img">
                        <img src="${document['car_additional']['car_image_url']}" alt="Car image">
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
                <img src="/img/clouds.png" alt="nothing found">
                <p class="h3">За обраними фільтрами матеріалів в системі не знайдено. Спробуйте інший запит</p>
            </div>
        </div>
        `;

        $postFilterResult.html(nothingFound);
    }

});
