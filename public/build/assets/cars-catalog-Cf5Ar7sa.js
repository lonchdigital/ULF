import{$ as r}from"./jquery-CqDs7TUd.js";r(document).ready(function(){const i=r("#cars-list"),o=r("#pagination-wrapper"),s=r("#show-more"),m=r("#filter-cars-button");d(),o.on("click","li a",function(e){e.preventDefault();const a=new URLSearchParams(r(this).attr("href").split("?")[1]).get("page");d(a),r("html, body").animate({scrollTop:0},"slow")}),s.on("click",function(e){e.preventDefault();let t=parseInt(r("#pagination-wrapper .active").text(),10)+1;d(t,!0)}),m.on("click",function(e){g(e)});function g(e){e.preventDefault();const t=document.querySelector(".select-choose-brand").value,a=new URLSearchParams(window.location.search);t?a.set("brand",t):a.delete("brand");const n=`${window.location.pathname}?${a.toString()}`;console.log(n),window.location.href=n}function d(e=null,t=!1){let a=b("order");h(function(n){if(n.documents.length>0){o.html(n.paginationHTML),v(n.documents,t);let l=parseInt(r("#pagination-wrapper .active").text(),10),p=o.find(".page-link").map(function(){return parseInt(r(this).text().trim(),10)}).get(),c=Math.max(...p);Number.isInteger(l)&&Number.isInteger(c)?l>=c?s.addClass("d-none"):s.removeClass("d-none"):s.addClass("d-none")}else i.addClass("art-posts-nothing-found"),o.html(""),_()},function(){console.error("init: error during Filter.")},e,a)}function h(e,t,a=null,n=null){const l=document.head.querySelector('meta[name="csrf-token"]').content,p=document.head.querySelector('meta[name="app-url"]').content;r.ajax({url:`${p}/cars`,type:"post",data:{_token:l,pageNumber:a,catalogOrder:n},dataType:"json"}).done(function(c){e(c)}).fail(function(){t()})}function v(e,t){let a="";if(e.length>0)e.forEach(function(n,l){a+=f(n)});else for(let n in e)a+=f(e[n]);if(t===!0){let n=i.html();i.html(n+a)}else i.html(a)}function f(e){let t="",a="";return e.car_additional.monthly_payment&&(t=`
            <div class="price mb-1">
                <span class="currency">$</span>
                <span class="value">${e.car_additional.monthly_payment}</span> / ${translations.month}
            </div>
            `),e.status_id===2?a=`
                    <div class="in-subscription">${translations.in_subscription}</div>
                `:e.car_additional.car_label&&(e.car_additional.car_label_color_id===2?a=`
                    <div class="discount label-red">${e.car_additional.car_label}</div>
                `:a=`
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
                    ${t}
                    <a href="${e.car_additional.car_url}" class="btn-arrow btn btn-block">
                        <span>${e.car_additional.car_short_desc}</span>
                    </a>
                    ${a}
                </div>
            </div>
        `}function _(){i.html(`
        <div class="art-nothing-found">
            <div class="nothing-found-data">
                <img src="/img/clouds.png" alt="nothing found">
                <p class="h3">За обраними фільтрами матеріалів в системі не знайдено. Спробуйте інший запит</p>
            </div>
        </div>
        `)}function b(e){const t=window.location.href;e=e.replace(/[\[\]]/g,"\\$&");const n=new RegExp("[?&]"+e+"(=([^&#]*)|&|#|$)").exec(t);return n?n[2]?decodeURIComponent(n[2].replace(/\+/g," ")):"":null}let u=r(".filters-button .art-order");u.on("click",function(e){let t=r(this);t.hasClass("active")?t.removeClass("active"):t.addClass("active")}),r(document).on("click",function(e){r(e.target).closest(u).length||u.removeClass("active")})});
