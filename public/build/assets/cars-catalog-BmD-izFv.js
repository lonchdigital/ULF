import{$ as i}from"./jquery-CqDs7TUd.js";i(document).ready(function(){const r=i("#cars-list"),l=i("#pagination-wrapper"),o=i("#show-more");d(),l.on("click","li a",function(a){a.preventDefault();const n=new URLSearchParams(i(this).attr("href").split("?")[1]).get("page");d(n),i("html, body").animate({scrollTop:0},"slow")}),o.on("click",function(a){a.preventDefault();let e=parseInt(i("#pagination-wrapper .active").text(),10)+1;d(e,!0)});function d(a=null,e=!1){p(function(n){if(n.documents.length>0){l.html(n.paginationHTML),m(n.documents,e);let t=parseInt(i("#pagination-wrapper .active").text(),10),s=l.find(".page-link").map(function(){return parseInt(i(this).text().trim(),10)}).get(),c=Math.max(...s);Number.isInteger(t)&&Number.isInteger(c)?t>=c?o.addClass("d-none"):o.removeClass("d-none"):o.addClass("d-none")}else r.addClass("art-posts-nothing-found"),l.html(""),f()},function(){console.error("init: error during Filter.")},a)}function p(a,e,n=null){const t=document.head.querySelector('meta[name="csrf-token"]').content,s=document.head.querySelector('meta[name="app-url"]').content;i.ajax({url:`${s}/cars`,type:"post",data:{_token:t,pageNumber:n},dataType:"json"}).done(function(c){a(c)}).fail(function(){e()})}function m(a,e){let n="";if(a.length>0)a.forEach(function(t,s){n+=u(t)});else for(let t in a)n+=u(a[t]);if(e===!0){let t=r.html();r.html(t+n)}else r.html(n)}function u(a){let e="",n="";return a.car_additional.monthly_payment&&(e=`
            <div class="price mb-1">
                <span class="currency">$</span>
                <span class="value">${a.car_additional.monthly_payment}</span> / міс.
            </div>
            `),a.car_additional.car_label&&(a.car_additional.car_label_color_id===2?n=`
                    <div class="discount label-red">${a.car_additional.car_label}</div>
                `:n=`
                    <div class="discount">${a.car_additional.car_label}</div>
                `),`
            <div class="content1 col-12 col-md-6 col-lg-4">
                <div class="our-fleet-preview--item">
                    <div class="name">${a.car_additional.car_name}</div>
                    <div class="wrap-img">
                        <img src="${a.car_additional.car_image_url}" alt="Car image">
                    </div>
                    ${e}
                    <a href="${a.car_additional.car_url}" class="btn-arrow btn btn-block">
                        <span>${a.car_additional.car_short_desc}</span>
                    </a>
                    ${n}
                </div>
            </div>
        `}function f(){r.html(`
        <div class="art-nothing-found">
            <div class="nothing-found-data">
                <img src="/img/clouds.png" alt="nothing found">
                <p class="h3">За обраними фільтрами матеріалів в системі не знайдено. Спробуйте інший запит</p>
            </div>
        </div>
        `)}});
