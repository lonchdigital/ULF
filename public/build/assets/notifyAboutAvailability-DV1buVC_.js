import{$ as o}from"./jquery-CqDs7TUd.js";o(document).ready(function(){o("#call-back-availability-form").submit(function(i){i.preventDefault();let a=o(this),n=new FormData(this);a.find(".field-error").remove();let e=a.find(".btn-modal-send");l(function(t){t&&(a.find(".field-error").remove(),a.find('input[name="email_drive"]').val(""),a.find('input[type="checkbox"]').prop("checked",!1),e.addClass("active"),e.addClass("btn-modal-close"),e.text(`${translations.send}`))},function(t){e.removeClass("active"),e.removeClass("btn-modal-close"),e.text(`${translations.call_me_back}`),t.status===422?r(t.responseJSON.errors,n,a):console.error("[Email]: error during sending the message.")},n)});function r(i,a,n){for(let e in i)e!="agree_drive"&&n.find('input[name="'+e+'"]').val(""),n.find("."+e+"-field").after(`<div class="field-error field--help-info small-txt text-red mb-2">${i[e]}</div>`)}function l(i,a,n){const e=document.head.querySelector('meta[name="app-url"]').content;o.ajax({url:`${e}/feedback/call-back-availability-form`,type:"post",data:n,contentType:!1,processData:!1,dataType:"json"}).done(function(t){i(t)}).fail(function(t){a(t)})}});
