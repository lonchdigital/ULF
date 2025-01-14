import{$ as r}from"./jquery-CqDs7TUd.js";r(document).ready(function(){const o=r("#cars-list"),d=r("#pagination-wrapper"),u=r("#show-more"),h=r("#filter-cars-button");p(),d.on("click","li a",function(e){e.preventDefault();const n=new URLSearchParams(r(this).attr("href").split("?")[1]).get("page");p(n),r("html, body").animate({scrollTop:0},"slow")}),u.on("click",function(e){e.preventDefault();let t=parseInt(r("#pagination-wrapper .active").text(),10)+1;p(t,!0)}),h.on("click",function(e){y(e)});function y(e){e.preventDefault();const t=new URLSearchParams(window.location.search),n=document.querySelector(".select-choose-fuel-types").value;n?t.set("fuelType",n):t.delete("fuelType");const a=[];document.querySelectorAll(".body-type-input").forEach(l=>{l.checked&&a.push(l.value)}),a.length>0?t.set("bodyTypes",a.join(",")):t.delete("bodyTypes");const i=[];document.querySelectorAll(".dryver-type-input").forEach(l=>{l.checked&&i.push(l.value)}),i.length>0?t.set("driverTypes",i.join(",")):t.delete("driverTypes");const c=`${window.location.pathname}?${t.toString()}`;window.location.href=c}function p(e=null,t=!1){let n={};n.orderValue=s("order"),n.fuelType=s("fuelType")?s("fuelType").split(",").map(Number):[],n.bodyTypes=s("bodyTypes")?s("bodyTypes").split(",").map(Number):[],n.driverTypes=s("driverTypes")?s("driverTypes").split(",").map(Number):[],g(function(a){if(a.documents.length>0){d.html(a.paginationHTML),v(a.documents,t);let i=parseInt(r("#pagination-wrapper .active").text(),10),c=d.find(".page-link").map(function(){return parseInt(r(this).text().trim(),10)}).get(),l=Math.max(...c);Number.isInteger(i)&&Number.isInteger(l)?i>=l?u.addClass("d-none"):u.removeClass("d-none"):u.addClass("d-none")}else o.addClass("art-posts-nothing-found"),d.html(""),b()},function(){console.error("init: error during Filter.")},e,n)}function g(e,t,n=null,a=null){const i=document.head.querySelector('meta[name="csrf-token"]').content,c=document.head.querySelector('meta[name="app-url"]').content;r.ajax({url:`${c}/cars`,type:"post",data:{_token:i,pageNumber:n,filters:a},dataType:"json"}).done(function(l){e(l)}).fail(function(){t()})}function v(e,t){let n="";if(e.length>0)e.forEach(function(a,i){n+=m(a)});else for(let a in e)n+=m(e[a]);if(t===!0){let a=o.html();o.html(a+n)}else o.html(n)}function m(e){let t="",n="";return e.car_additional.monthly_payment&&(t=`
            <div class="price mb-1">
                <span class="currency">$</span>
                <span class="value">${e.car_additional.monthly_payment}</span> / ${translations.month}
            </div>
            `),e.status_id===2?n=`
                    <div class="in-subscription">${translations.in_subscription}</div>
                `:e.car_additional.car_label&&(e.car_additional.car_label_color_id===2?n=`
                    <div class="discount label-red">${e.car_additional.car_label}</div>
                `:n=`
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
                    ${n}
                </div>
            </div>
        `}function b(){o.html(`
        <div class="art-nothing-found">
            <div class="nothing-found-data">
                <img src="/img/clouds.png" alt="nothing found">
                <p class="h3">За обраними фільтрами матеріалів в системі не знайдено. Спробуйте інший запит</p>
            </div>
        </div>
        `)}function s(e){const t=window.location.href;e=e.replace(/[\[\]]/g,"\\$&");const a=new RegExp("[?&]"+e+"(=([^&#]*)|&|#|$)").exec(t);return a?a[2]?decodeURIComponent(a[2].replace(/\+/g," ")):"":null}let f=r(".filters-button .art-order");f.on("click",function(e){let t=r(this);t.hasClass("active")?t.removeClass("active"):t.addClass("active")}),r(document).on("click",function(e){r(e.target).closest(f).length||f.removeClass("active")})});
