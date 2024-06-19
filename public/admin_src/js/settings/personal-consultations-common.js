// import $ from "jquery";

$(function() {
    'use strict';

    const sidebarNotificationsNumber = $('#sidebar-notifications-number');
    const notificationsHeading = $('.notifications-heading');
    const $notificationsBox = $('#notificationsBox');
    const $adminHeaderBell = $('#admin-header-bell');
    const $adminHeaderBellIcon = $adminHeaderBell.find('i.bx-bell');


    runAjaxNotifications();

    function runAjaxCheckNewConsultations() {
        runAjaxNotifications();
    }
    setInterval(runAjaxCheckNewConsultations, 10000);


    function runAjaxNotifications()
    {
        getNewAdminNotifications(
            function (data) {
                if( data['newAdminNotificationsCount'] > 0 ) {
                    // sidebar
                    sidebarNotificationsNumber.removeClass('d-none');
                    sidebarNotificationsNumber.empty();
                    sidebarNotificationsNumber.html(data['newAdminPersonalConsultationsCount']);

                    // notification
                    if( !$adminHeaderBellIcon.hasClass('bx-tada') ) {
                        $adminHeaderBellIcon.addClass('bx-tada')
                    }
                    notificationsHeading.empty();
                    notificationsHeading.append(`
                        <div class="heading-title">
                            <h6>Повідомлення</h6>
                        </div>
                        <span>Нових: ${data['newAdminNotificationsCount']}</span>
                    `);
                    $adminHeaderBell.find('.active-status').remove();
                    $adminHeaderBell.append('<span class="active-status"></span>');

                    // notification list
                    handleNotificationsList(data['newAdminNotifications']);

                } else {
                    notificationsHeading.empty();
                    notificationsHeading.append(`
                        <div class="heading-title">
                            <h6>Нових повідомлень немає</h6>
                        </div>
                    `);

                    $adminHeaderBellIcon.removeClass('bx-tada');

                    $adminHeaderBell.find('.active-status').remove();
                }

            },
            function () {
                console.error('init: error.');
            },
        );
    }

    function getNewAdminNotifications(success, fail)
    {
        const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        const appUrl = document.head.querySelector('meta[name="app-url"]').content;

        $.ajax({
            url: `${appUrl}/new-consultation-notifications`,
            type: 'post',
            data: {
                _token: csrfToken,
            },
            dataType: 'json'
        }).done(function(data) {
            success(data);
        }).fail(function () {
            fail();
        });
    }


    function handleNotificationsList(data)
    {
        let postsToAppend = '';
        if(data.length > 0) {
            data.forEach(function (document, index) {
                postsToAppend += getNotificationHTML(document);
            });
        } else {
            for (let key in data) {
                postsToAppend += getNotificationHTML(data[key]);
            }
        }

        $notificationsBox.removeClass('d-none');
        $notificationsBox.empty();
        $notificationsBox.append(postsToAppend);
        $notificationsBox.append('</div><div class="slimScrollBar" style="background: rgb(140, 140, 140); width: 2px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 0px;"></div><div class="slimScrollRail" style="width: 2px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 0px;"></div>');
    }

    function getNotificationHTML(document)
    {
        return `<a href="${document['url']}" class="dropdown-item">
            <div>
                <span>${document['name']}</span>
                <p class="mb-0 font-12">${document['message']}</p>
            </div>
        </a>`;
    }

});
