import{$ as r}from"./jquery-CqDs7TUd.js";r(document).ready(function(){r("#call-back-form").submit(function(o){o.preventDefault();let t=r(this),n=new FormData(this);t.find(".field-error").remove();let e=t.find(".btn-modal-send");l(function(a){a&&(t.find(".field-error").remove(),t.find('input[name="name_drive"]').val(""),t.find('input[name="phone_drive"]').val(""),t.find('input[type="checkbox"]').prop("checked",!1),e.addClass("active"),e.addClass("btn-modal-close"),e.text(`${translations.send}`))},function(a){e.removeClass("active"),e.removeClass("btn-modal-close"),e.text(`${translations.call_me_back}`),a.status===422?i(a.responseJSON.errors,n,t):console.error("[Email]: error during sending the message.")},n)});function i(o,t,n){for(let e in o)e!="agree_drive"&&n.find('input[name="'+e+'"]').val(""),n.find("."+e+"-field").after(`<div class="field-error field--help-info small-txt text-red mb-2">${o[e]}</div>`)}function l(o,t,n){const e=document.head.querySelector('meta[name="app-url"]').content;r.ajax({url:`${e}/feedback/call-back-form`,type:"post",data:n,contentType:!1,processData:!1,dataType:"json"}).done(function(a){o(a)}).fail(function(a){t(a)})}});
