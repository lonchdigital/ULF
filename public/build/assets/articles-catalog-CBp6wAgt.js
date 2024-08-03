import{$ as a}from"./jquery-CqDs7TUd.js";a(document).ready(function(){const r=a("#articles-list"),o=a("#pagination-wrapper"),l=a("#show-more");u(),o.on("click","li a",function(e){e.preventDefault();const t=new URLSearchParams(a(this).attr("href").split("?")[1]).get("page");u(t),a("html, body").animate({scrollTop:0},"slow")}),l.on("click",function(e){e.preventDefault();let i=parseInt(a("#pagination-wrapper .active").text(),10)+1;u(i,!0)});function u(e=null,i=!1){m(function(t){if(t.documents.length>0){o.html(t.paginationHTML),p(t.documents,i);let n=parseInt(a("#pagination-wrapper .active").text(),10),s=o.find(".page-link").map(function(){return parseInt(a(this).text().trim(),10)}).get(),c=Math.max(...s);Number.isInteger(n)&&Number.isInteger(c)?n>=c?l.addClass("d-none"):l.removeClass("d-none"):l.addClass("d-none")}else r.addClass("art-posts-nothing-found"),o.html(""),f()},function(){console.error("init: error during Filter.")},e)}function m(e,i,t=null){const n=document.head.querySelector('meta[name="csrf-token"]').content,s=document.head.querySelector('meta[name="app-url"]').content;a.ajax({url:`${s}/articles`,type:"post",data:{_token:n,pageNumber:t},dataType:"json"}).done(function(c){e(c)}).fail(function(){i()})}function p(e,i){let t="";if(e.length>0)e.forEach(function(n,s){t+=d(n)});else for(let n in e)t+=d(e[n]);if(i===!0){let n=r.html();r.html(n+t)}else r.html(t)}function d(e){return`
            <div class="content1 col-12 col-md-6 col-lg-4">
                <div class="our-fleet-preview--item">
                    <div class="wrap-img">
                        <a href="${e.article_additional.article_url}">
                            <img src="${e.image_url}" alt="Article image">
                        </a>
                    </div>
                    <div class="name">
                        <a href="${e.article_additional.article_url}">
                            ${e.article_additional.article_name}
                        </a>
                    </div>
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
