import $ from "jquery";

$(document).ready(function() {

    $('#form-any-questions').submit(function(event) {
        event.preventDefault();

        let formTag = $(this);
        let formData = new FormData(this);
        formTag.find('.field-error').remove();

        let formSubmitButton = formTag.find('.btn-modal-send');

        runAjax(
            function(data) {

                if( data['success'] ) {
                    formTag.find('.field-error').remove(); // Remove current Form errors

                    formTag.find('input[name="name_lead"]').val('');
                    formTag.find('input[name="phone_lead"]').val('');
                    formTag.find('input[type="checkbox"]').prop('checked', false);

                    formSubmitButton.addClass('active');
                    formSubmitButton.addClass('btn-modal-close');
                    formSubmitButton.text(`${translations['send']}`);

                    window.location.href = data['redirect'];
                }
            },
            function(xhr) {
                formSubmitButton.removeClass('active');
                formSubmitButton.removeClass('btn-modal-close');
                formSubmitButton.text(`${translations['call_me_back']}`);

                if (xhr.status === 422) {
                    userWriteReviewErrors(xhr.responseJSON.errors, formData, formTag);
                } else {
                    console.error('[Email]: error during sending the message.');
                }
            },
            formData
        );
    });

    function userWriteReviewErrors(errors, formData, formTag) {
        for (let fieldName in errors) {

            let inputField = formTag.find(`input[name="${fieldName}"], textarea[name="${fieldName}"], select[name="${fieldName}"]`);
            if (inputField.length && fieldName !== 'agree_lead') {
                inputField.val('');
            }

            formTag.find(`.${fieldName}-field .field-error`).remove();

            if (fieldName !== 'agree_lead') {
                inputField.after(`<div class="field-error field--help-info small-txt text-red mb-2">${errors[fieldName]}</div>`);
            } else {
                let inputField2 = formTag.find('#' + fieldName + '_error_select');
                inputField2.text(errors[fieldName]);
            }
        }
    }

    function runAjax(success, fail, formData)
    {
        const appUrl = document.head.querySelector('meta[name="app-url"]').content;

        $.ajax({
            url: `${appUrl}/feedback/store`,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function(data) {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ event: "submit_form_any_questions" });

            success(data);
            // console.log('submit_form_call_back_header');
        }).fail(function (xhr) {
            fail(xhr);
        });
    }

});