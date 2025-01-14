import{$ as r}from"./jquery-CqDs7TUd.js";function _(e,i){let s=document.getElementById("sort-catalog-input");i!==null&&(s.value=i.data("value")),s.value!=0?e.set("order",s.value):e.delete("order");let c=document.querySelector(".graduation-year-from").value;c?e.set("yearFrom",c):e.delete("yearFrom");let y=document.querySelector(".graduation-year-to").value;y?e.set("yearTo",y):e.delete("yearTo");let p=document.querySelector(".select-choose-fuel-types").value;p&&p!=0?e.set("fuelType",p):e.delete("fuelType");let u=[];document.querySelectorAll(".body-type-input").forEach(d=>{d.checked&&u.push(d.value)}),u.length>0?e.set("bodyTypes",u.join(",")):e.delete("bodyTypes");let f=[];document.querySelectorAll(".dryver-type-input").forEach(d=>{d.checked&&f.push(d.value)}),f.length>0?e.set("driverTypes",f.join(",")):e.delete("driverTypes");let v=document.querySelector(".engine-volume-from").value;v?e.set("engineFrom",v):e.delete("engineFrom");let m=document.querySelector(".engine-volume-to").value;return m?e.set("engineTo",m):e.delete("engineTo"),e}function $(e){return e.yearFrom=o("yearFrom"),e.yearTo=o("yearTo"),e.orderValue=o("order"),e.fuelType=o("fuelType")?o("fuelType").split(",").map(Number):[],e.bodyTypes=o("bodyTypes")?o("bodyTypes").split(",").map(Number):[],e.driverTypes=o("driverTypes")?o("driverTypes").split(",").map(Number):[],e.engineFrom=o("engineFrom"),e.engineTo=o("engineTo"),e}function o(e){const i=window.location.href;e=e.replace(/[\[\]]/g,"\\$&");const c=new RegExp("[?&]"+e+"(=([^&#]*)|&|#|$)").exec(i);return c?c[2]?decodeURIComponent(c[2].replace(/\+/g," ")):"":null}r(document).ready(function(){const e=r("#cars-list"),i=r("#pagination-wrapper"),s=r("#show-more"),c=r("#filter-cars-button"),y=r(".art-select-options.art-sort-catalog a");u(),i.on("click","li a",function(t){t.preventDefault();const n=new URLSearchParams(r(this).attr("href").split("?")[1]).get("page");u(n),r("html, body").animate({scrollTop:0},"slow")}),s.on("click",function(t){t.preventDefault();let l=parseInt(r("#pagination-wrapper .active").text(),10)+1;u(l,!0)}),c.on("click",function(t){p(t)}),y.on("click",function(t){let l=r(this);p(t,l)});function p(t,l=null){t.preventDefault();let n=new URLSearchParams(window.location.search);n=_(n,l);const a=`${window.location.pathname}?${n.toString()}`;window.location.href=a}function u(t=null,l=!1){let n={};n=$(n),f(function(a){if(a.documents.length>0){i.html(a.paginationHTML),v(a.documents,l);let g=parseInt(r("#pagination-wrapper .active").text(),10),b=i.find(".page-link").map(function(){return parseInt(r(this).text().trim(),10)}).get(),h=Math.max(...b);Number.isInteger(g)&&Number.isInteger(h)?g>=h?s.addClass("d-none"):s.removeClass("d-none"):s.addClass("d-none")}else e.addClass("art-posts-nothing-found"),i.html(""),d()},function(){console.error("init: error during Filter.")},t,n)}function f(t,l,n=null,a=null){const g=document.head.querySelector('meta[name="csrf-token"]').content,b=document.head.querySelector('meta[name="app-url"]').content;r.ajax({url:`${b}/cars`,type:"post",data:{_token:g,pageNumber:n,filters:a},dataType:"json"}).done(function(h){t(h)}).fail(function(){l()})}function v(t,l){let n="";if(t.length>0)t.forEach(function(a,g){n+=m(a)});else for(let a in t)n+=m(t[a]);if(l===!0){let a=e.html();e.html(a+n)}else e.html(n)}function m(t){let l="",n="";return t.car_additional.monthly_payment&&(l=`
            <div class="price mb-1">
                <span class="currency">$</span>
                <span class="value">${t.car_additional.monthly_payment}</span> / ${translations.month}
            </div>
            `),t.status_id===2?n=`
                    <div class="in-subscription">${translations.in_subscription}</div>
                `:t.car_additional.car_label&&(t.car_additional.car_label_color_id===2?n=`
                    <div class="discount label-red">${t.car_additional.car_label}</div>
                `:n=`
                    <div class="discount">${t.car_additional.car_label}</div>
                `),`
            <div class="content1 col-12 col-md-6 col-lg-4">
                <div class="our-fleet-preview--item">
                    <a href="${t.car_additional.car_url}">
                        <div class="name">${t.car_additional.car_name}</div>
                    </a>
                    <div class="wrap-img">
                        <a href="${t.car_additional.car_url}">
                            <img src="${t.car_additional.car_image_url}" alt="Car image">
                        </a>
                    </div>
                    ${l}
                    <a href="${t.car_additional.car_url}" class="btn-arrow btn btn-block">
                        <span>${t.car_additional.car_short_desc}</span>
                    </a>
                    ${n}
                </div>
            </div>
        `}function d(){e.html(`
        <div class="art-nothing-found">
            <div class="nothing-found-data">
                <img src="/img/clouds.png" alt="nothing found">
                <p class="h3">За обраними фільтрами матеріалів в системі не знайдено. Спробуйте інший запит</p>
            </div>
        </div>
        `)}let T=r(".filters-button .art-order");T.on("click",function(t){let l=r(this);l.hasClass("active")?l.removeClass("active"):l.addClass("active")}),r(document).on("click",function(t){r(t.target).closest(T).length||T.removeClass("active")})});
