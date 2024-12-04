function initQuillEditors(callback) {
    const toolbarOptions = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        ['bold', 'italic', 'underline', 'strike', 'link', 'image'],
        ['blockquote'],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'script': 'sub' }, { 'script': 'super' }],
        [{ 'color': [] }],
        [{ 'align': [] }],
        ['clean']
    ];

    $('.rich-editor').each(function () {
        const quill = new Quill($(this)[0], {
            modules: { toolbar: toolbarOptions },
            theme: 'snow'
        });

        const language = $(this).parent().attr('language');
        const fieldName = $(this).parent().attr('data-field-name');

        callback(quill, fieldName, language);
    });
}