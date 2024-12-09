
//TODO:: editor without nofollow

// function initQuillEditors(callback) {
//     const toolbarOptions = [
//         [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
//         ['bold', 'italic', 'underline', 'strike', 'link', 'image'],
//         ['blockquote'],
//         [{ 'list': 'ordered' }, { 'list': 'bullet' }],
//         [{ 'script': 'sub' }, { 'script': 'super' }],
//         [{ 'color': [] }],
//         [{ 'align': [] }],
//         ['clean']
//     ];

//     $('.rich-editor').each(function () {
//         const quill = new Quill($(this)[0], {
//             modules: { toolbar: toolbarOptions },
//             theme: 'snow'
//         });

//         const language = $(this).parent().attr('language');
//         const fieldName = $(this).parent().attr('data-field-name');

//         callback(quill, fieldName, language);
//     });
// }

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

    // standart link module
    const Link = Quill.import('formats/link');

    class CustomLink extends Link {
        static create(value) {
            const node = super.create(value);
            node.setAttribute('rel', 'nofollow'); // Добавляем rel="nofollow"
            return node;
        }
    
        static formats(domNode) {
            return domNode.getAttribute('href'); // return only URL
        }
    
        format(name, value) {
            if (name === 'rel') {
                if (value) {
                    this.domNode.setAttribute('rel', value);
                } else {
                    this.domNode.removeAttribute('rel');
                }
            } else {
                super.format(name, value);
            }
        }
    }

    // register custom link format
    Quill.register(CustomLink, true);

    // init editor
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



// TODO:: editor with nofollow and popup window
// function initQuillEditors(callback) {
//     const toolbarOptions = [
//         [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
//         ['bold', 'italic', 'underline', 'strike', 'link', 'image'],
//         ['blockquote'],
//         [{ 'list': 'ordered' }, { 'list': 'bullet' }],
//         [{ 'script': 'sub' }, { 'script': 'super' }],
//         [{ 'color': [] }],
//         [{ 'align': [] }],
//         ['clean']
//     ];

//     // Переопределяем стандартный модуль ссылок
//     const Link = Quill.import('formats/link');

//     class CustomLink extends Link {
//         static create(value) {
//             const node = super.create(value.href || ''); // Убедитесь, что значение `href` всегда есть
//             if (value.rel === 'nofollow') {
//                 node.setAttribute('rel', 'nofollow');
//             } else if (value.rel) {
//                 node.removeAttribute('rel'); // Убираем ненужный атрибут, если он пустой
//             }
//             return node;
//         }
    
//         static formats(domNode) {
//             const format = super.formats(domNode);
//             return {
//                 href: format,
//                 rel: domNode.getAttribute('rel') || null
//             };
//         }
    
//         format(name, value) {
//             if (name === 'rel') {
//                 if (value) {
//                     this.domNode.setAttribute('rel', value);
//                 } else {
//                     this.domNode.removeAttribute('rel');
//                 }
//             } else {
//                 super.format(name, value);
//             }
//         }
//     }

//     // Регистрируем кастомный модуль ссылок
//     Quill.register(CustomLink, true);

//     // Инициализация редакторов
//     $('.rich-editor').each(function () {
//         const quill = new Quill($(this)[0], {
//             modules: { toolbar: toolbarOptions },
//             theme: 'snow'
//         });

//         const language = $(this).parent().attr('language');
//         const fieldName = $(this).parent().attr('data-field-name');

//         // Подключение кастомного окна для ссылок
//         quill.getModule('toolbar').addHandler('link', function () {
//             showCustomLinkDialog(quill);
//         });

//         callback(quill, fieldName, language);
//     });
// }


// function showCustomLinkDialog(quill) {
//     const range = quill.getSelection();
//     if (!range) {
//         alert('Сначала выделите текст для добавления ссылки.');
//         return;
//     }

//     // Удаляем существующий диалог, если он остался
//     const existingDialog = document.getElementById('custom-link-dialog');
//     if (existingDialog) {
//         existingDialog.remove();
//     }

//     // Создаем кастомное окно для ввода ссылки
//     const dialog = document.createElement('div');
//     dialog.id = 'custom-link-dialog';
//     dialog.innerHTML = `
//         <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
//                     background: white; padding: 20px; border: 1px solid #ccc; z-index: 10000; box-shadow: 0 2px 10px rgba(0,0,0,0.2);">
//             <label>
//                 URL:
//                 <input type="text" id="custom-link-url" style="width: 100%; margin-bottom: 10px;">
//             </label>
//             <label>
//                 <input type="checkbox" id="custom-link-nofollow">
//                 Добавить rel="nofollow"
//             </label>
//             <div style="margin-top: 10px; text-align: right;">
//                 <button id="custom-link-add" style="margin-right: 10px;">Добавить</button>
//                 <button id="custom-link-cancel">Отмена</button>
//             </div>
//         </div>
//     `;
//     document.body.appendChild(dialog);

//     // Логика для кнопок
//     document.getElementById('custom-link-add').addEventListener('click', function () {
//         const url = document.getElementById('custom-link-url').value;
//         const nofollow = document.getElementById('custom-link-nofollow').checked;

//         if (url) {
//             quill.formatText(range.index, range.length, 'link', {
//                 href: url,
//                 rel: nofollow ? 'nofollow' : null
//             });
//         }

//         if (dialog && dialog.parentNode) {
//             dialog.parentNode.removeChild(dialog);
//         }
//     });

//     document.getElementById('custom-link-cancel').addEventListener('click', function () {
//         if (dialog && dialog.parentNode) {
//             dialog.parentNode.removeChild(dialog);
//         }
//     });
// }


function dynamicInitQuillEditors(callback, container = document) {
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

    const Link = Quill.import('formats/link');

    class CustomLink extends Link {
        static create(value) {
            const node = super.create(value);
            node.setAttribute('rel', 'nofollow'); // add rel="nofollow"
            return node;
        }
    
        static formats(domNode) {
            return domNode.getAttribute('href'); // return only URL
        }
    
        format(name, value) {
            if (name === 'rel') {
                if (value) {
                    this.domNode.setAttribute('rel', value);
                } else {
                    this.domNode.removeAttribute('rel');
                }
            } else {
                super.format(name, value);
            }
        }
    }

    Quill.register(CustomLink, true);

    container.querySelectorAll('.rich-editor:not([data-quill-initialized])').forEach(editor => {
        const quill = new Quill(editor, {
            modules: { toolbar: toolbarOptions },
            theme: 'snow'
        });

        editor.setAttribute('data-quill-initialized', 'true');

        const parentElement = editor.closest('.editor-container');
        const fieldName = parentElement?.getAttribute('data-field-name');
        const language = parentElement?.getAttribute('language');

        if (fieldName && language) {
            callback(quill, fieldName, language);
        }
    });
}


//TODO:: editor without nofollow
// function dynamicInitQuillEditors(callback, container = document) {
//     const toolbarOptions = [
//         [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
//         ['bold', 'italic', 'underline', 'strike', 'link', 'image'],
//         ['blockquote'],
//         [{ 'list': 'ordered' }, { 'list': 'bullet' }],
//         [{ 'script': 'sub' }, { 'script': 'super' }],
//         [{ 'color': [] }],
//         [{ 'align': [] }],
//         ['clean']
//     ];

//     container.querySelectorAll('.rich-editor:not([data-quill-initialized])').forEach(editor => {
//         const quill = new Quill(editor, {
//             modules: { toolbar: toolbarOptions },
//             theme: 'snow'
//         });

//         editor.setAttribute('data-quill-initialized', 'true');

//         const parentElement = editor.closest('.editor-container');
//         const fieldName = parentElement?.getAttribute('data-field-name');
//         const language = parentElement?.getAttribute('language');

//         if (fieldName && language) {
//             callback(quill, fieldName, language);
//         }
//     });
// }