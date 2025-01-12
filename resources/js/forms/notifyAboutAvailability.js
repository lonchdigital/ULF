import $ from "jquery";

$(document).ready(function() {

    $('#call-back-availability-form').submit(function(event) {
        event.preventDefault();
    
        let formTag = $(this);
        let formData = new FormData(this);
        formTag.find('.field-error').remove();

        let formSubmitButton = formTag.find('.btn-modal-send');
    
        runAjax(
            function(data) {
                if( data ) {
                    formTag.find('.field-error').remove(); // Remove current Form errors

                    formTag.find('input[name="email_drive"]').val('');
                    formTag.find('input[type="checkbox"]').prop('checked', false);

                    formSubmitButton.addClass('active');
                    formSubmitButton.addClass('btn-modal-close');
                    formSubmitButton.text(`${translations['send']}`);
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
    
    function userWriteReviewErrors(errors, formData, formTag)
    {
        for (let fieldName in errors) {
            if(fieldName != 'agree_drive') {
                formTag.find('input[name="'+ fieldName +'"]').val('');
            }
            formTag.find('.' + fieldName + '-field').after(`<div class="field-error field--help-info small-txt text-red mb-2">${errors[fieldName]}</div>`);
        }
    }
    
    function runAjax(success, fail, formData)
    {
        const appUrl = document.head.querySelector('meta[name="app-url"]').content;

        $.ajax({
            url: `${appUrl}/feedback/call-back-availability-form`,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function(data) {
            success(data);
        }).fail(function (xhr) {
            fail(xhr);
        });
    }

});