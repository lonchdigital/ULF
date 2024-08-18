import{$ as r}from"./jquery-CqDs7TUd.js";r(document).ready(function(){const i=r("#cars-list"),o=r("#pagination-wrapper"),s=r("#show-more");d(),o.on("click","li a",function(e){e.preventDefault();const t=new URLSearchParams(r(this).attr("href").split("?")[1]).get("page");d(t),r("html, body").animate({scrollTop:0},"slow")}),s.on("click",function(e){e.preventDefault();let a=parseInt(r("#pagination-wrapper .active").text(),10)+1;d(a,!0)});function d(e=null,a=!1){let t=v("order");m(function(n){if(n.documents.length>0){o.html(n.paginationHTML),g(n.documents,a);let l=parseInt(r("#pagination-wrapper .active").text(),10),p=o.find(".page-link").map(function(){return parseInt(r(this).text().trim(),10)}).get(),c=Math.max(...p);Number.isInteger(l)&&Number.isInteger(c)?l>=c?s.addClass("d-none"):s.removeClass("d-none"):s.addClass("d-none")}else i.addClass("art-posts-nothing-found"),o.html(""),h()},function(){console.error("init: error during Filter.")},e,t)}function m(e,a,t=null,n=null){const l=document.head.querySelector('meta[name="csrf-token"]').content,p=document.head.querySelector('meta[name="app-url"]').content;r.ajax({url:`${p}/cars`,type:"post",data:{_token:l,pageNumber:t,catalogOrder:n},dataType:"json"}).done(function(c){e(c)}).fail(function(){a()})}function g(e,a){let t="";if(e.length>0)e.forEach(function(n,l){t+=f(n)});else for(let n in e)t+=f(e[n]);if(a===!0){let n=i.html();i.html(n+t)}else i.html(t)}function f(e){let a="",t="";return e.car_additional.monthly_payment&&(a=`
            <div class="price mb-1">
                <span class="currency">$</span>
                <span class="value">${e.car_additional.monthly_payment}</span> / міс.
            </div>
            `),e.car_additional.car_label&&(e.car_additional.car_label_color_id===2?t=`
                    <div class="discount label-red">${e.car_additional.car_label}</div>
                `:t=`
                    <div class="discount">${e.car_additional.car_label}</div>
                `),`
            <div class="content1 col-12 col-md-6 col-lg-4">
                <div class="our-fleet-preview--item">
                    <a href="${e.car_additional.car_url}">
                        <div class="name">${e.car_additional.car_name}</div>
                    </a>
                    <div class="wrap-img">
                        <a href="${e.car_additional.car_url}">
                            <img src="${e.car_additional.car_image_url}" alt="Car image">
                        </a>
                    </div>
                    ${a}
                    <a href="${e.car_additional.car_url}" class="btn-arrow btn btn-block">
                        <span>${e.car_additional.car_short_desc}</span>
                    </a>
                    ${t}
                </div>
            </div>
        `}function h(){i.html(`
        <div class="art-nothing-found">
            <div class="nothing-found-data">
                <img src="/img/clouds.png" alt="nothing found">
                <p class="h3">За обраними фільтрами матеріалів в системі не знайдено. Спробуйте інший запит</p>
            </div>
        </div>
        `)}function v(e){const a=window.location.href;e=e.replace(/[\[\]]/g,"\\$&");const n=new RegExp("[?&]"+e+"(=([^&#]*)|&|#|$)").exec(a);return n?n[2]?decodeURIComponent(n[2].replace(/\+/g," ")):"":null}let u=r(".filters-button .art-order");u.on("click",function(e){let a=r(this);a.hasClass("active")?a.removeClass("active"):a.addClass("active")}),r(document).on("click",function(e){r(e.target).closest(u).length||u.removeClass("active")})});
