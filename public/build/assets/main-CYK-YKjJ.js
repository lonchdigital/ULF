import{$ as e}from"./jquery-vEc8DvAz.js";function V(t){let o=t,r;function n(i){if(window.innerWidth<=i){r||(r=document.querySelector('meta[name="viewport"]'));let c=document.querySelector('meta[name="viewport"]'),a=document.createElement("meta");a.setAttribute("name","viewport"),a.setAttribute("content",`width=${i}`),document.head.replaceChild(a,c)}else if(r&&document.querySelector('meta[name="viewport"]')!=r){let c=document.querySelector('meta[name="viewport"]');document.head.replaceChild(r,c)}}window.addEventListener("resize",function(){n(o)}),n(o)}function H(){let t=window.navigator.userAgent.toLowerCase(),o;switch(!0){case t.indexOf("edge")>-1:o="msEdge";break;case t.indexOf("edg/")>-1:o="chrEdge";break;case(t.indexOf("opr")>-1&&!!window.opr):o="opera";break;case(t.indexOf("chrome")>-1&&!!window.chrome):o="сhrome";break;case t.indexOf("trident")>-1:o="ie";break;case t.indexOf("firefox")>-1:o="firefox";break;case t.indexOf("safari")>-1:o="safari";break;default:o="other"}(o=="safari"||o=="firefox")&&V(400)}H();var T=e("#btnTop");e(window).scroll(function(){e(window).scrollTop()>122?T.addClass("show"):T.removeClass("show")});T.on("click",function(t){t.preventDefault(),e("html, body").animate({scrollTop:0},"122")});e(document).ready(function(){let t=document.querySelector("body"),o=document.querySelector(".navbar-toggler"),r=document.querySelector(".popup-bg-body"),n=!0;o.addEventListener("click",function(i){n?(t.classList.add("lock"),r.classList.add("open"),n=!1,setTimeout(function(){n=!0},1e3)):i.preventDefault()}),setInterval(function(){e(r).hasClass("collapsed")&&(t.classList.remove("lock"),r.classList.remove("open"))},100)});e(document).mouseup(function(t){!e(".header").is(t.target)&&e(".header").has(t.target).length===0&&(e(".popup-bg-body").removeClass("open"),e("body").removeClass("lock"))});N(e(".header .languages .current-lang .current-lang--inner"),e(".header .languages .current-lang .submenu"),e(".header .languages .current-lang"));function N(t,o,r){e(document).mouseup(function(n){r.is(n.target)||r.has(n.target).length!==0?r.hasClass("active")?(t.is(n.target)||t.has(n.target).length!==0)&&t.hasClass("active")&&(o.removeClass("active"),r.removeClass("active"),t.removeClass("active")):(o.addClass("active"),r.addClass("active"),t.addClass("active")):!o.is(n.target)&&o.has(n.target).length===0&&(o.removeClass("active"),r.removeClass("active"),t.removeClass("active"))})}let W=0;e(window).scroll(function(t){let o=e(this).scrollTop();e(window).width()<=1023&&(o>W&&e(window).scrollTop()>=15?e(".header-main").addClass("header--show"):e(window).scrollTop()<=15&&e(".header-main").removeClass("header--show")),W=o});let I=15,k=!1;e(window).scroll(function(){k||(window.requestAnimationFrame(function(){let t=e(window).scrollTop(),o=e(".footer").offset().top,r=e(window).height();e(window).width()<768&&(t>I?e(".toolbar-fixed").removeClass("--show").addClass("--hide"):t<=0?e(".toolbar-fixed").removeClass("--hide").addClass("--show"):e(".toolbar-fixed").removeClass("--hide").addClass("--show"),t+r>=o&&e(".toolbar-fixed").removeClass("--show").addClass("--hide")),I=Math.max(t,0),k=!1}),k=!0)});let D=15,q=!1;e(window).scroll(function(){q||(window.requestAnimationFrame(function(){let t=e(window).scrollTop(),o=e(".footer").offset().top,r=e(window).height();e(window).width()<768&&(t>D?e(".toolbar-test-drive-request").removeClass("--show").addClass("--hide"):t<=0?e(".toolbar-test-drive-request").removeClass("--hide").addClass("--show"):e(".toolbar-test-drive-request").removeClass("--hide").addClass("--show"),t+r>=o&&e(".toolbar-test-drive-request").removeClass("--show").addClass("--hide")),D=Math.max(t,0),q=!1}),q=!0)});function X(t){var o=0;t.each(function(){e(this).css("height","auto");var r=e(this).height();r>o&&(o=r)}),t.height(o)}window.addEventListener("resize",t=>{});window.addEventListener("load",function(){setTimeout(()=>{},500)},!1);e(document).ready(function(){X(e(".our-fleet-preview .our-fleet-preview--item .name"))});function g(t){if(e(t).length>0){var o=e("header").outerHeight(),r=e(t).offset().top-o-20;e("html, body").animate({scrollTop:r},"slow")}}e(document).ready(function(){function t(){var r=e(window).width(),n=r<1024;n&&e(".our-fleet .content.our-fleet-search").remove()}function o(){var r=e(window).width(),n=r>=768;n&&e(".tinder-catalog").remove()}t(),o(),e(window).resize(function(){t(),o()})});function z(t,o,r){function n(a,l){return Array.from(Array(l-a+1),(f,m)=>m+a)}var i=1,s=r-i*2-3>>1,c=r-i*2-2>>1;return t<=r?n(1,t):o<=r-i-1-c?n(1,r-i-1).concat([0]).concat(n(t-i+1,t)):o>=t-i-1-c?n(1,i).concat([0]).concat(n(t-i-1-c-s,t)):n(1,i).concat([0]).concat(n(o-s,o+c)).concat([0]).concat(n(t-i+1,t))}e(function(){var t="#questions",o=e("#questions .content").length,r=11,n=Math.ceil(o/r),i=7,s;function c(a){return a<1||a>n?!1:(s=a,e(t+" .content").hide().slice((s-1)*r,s*r).show(),e(t+" .pagination li").slice(1,-1).remove(),z(n,s,i).forEach(l=>{e("<li>").addClass("page-item "+(l?"current-page ":"")+(l===s?"active ":"")).append(e("<a>").addClass("page-link").attr({href:"javascript:void(0)"}).text(l||"...")).insertBefore(t+" #next-page")}),!0)}e("#questions .pagination").append(e("<li>").addClass("page-item button-slider-prev").attr({id:"previous-page"}).append(e('<a><svg><use xlink:href="img/icons/icons.svg#i-arrow-right">').addClass("page-link").attr({href:"javascript:void(0)"})),e("<li>").addClass("page-item button-slider-next").attr({id:"next-page"}).append(e('<a><svg><use xlink:href="img/icons/icons.svg#i-arrow-right">').addClass("page-link").attr({href:"javascript:void(0)"}))),e("#questions").show(),c(1),e(document).on("click",t+" .pagination li.current-page:not(.active)",function(){var a=+e(this).text();c(a),g(t)}),e(t+" #next-page").on("click",function(){var a=s+1;c(a),g(t)}),e(t+" #previous-page").on("click",function(){var a=s-1;c(a),g(t)})});e(function(){var t=".our-fleet",o=e(".our-fleet .content").length,r=screen.width;if(r<768)var n=5;else if(r<1024)var n=8;else var n=12;var i=Math.ceil(o/n),s=7,c;function a(l){return l<1||l>i?!1:(c=l,e(t+" .content").hide().slice((c-1)*n,c*n).show(),e(t+" .pagination li").slice(1,-1).remove(),z(i,c,s).forEach(f=>{e("<li>").addClass("page-item "+(f?"current-page ":"")+(f===c?"active ":"")).append(e("<a>").addClass("page-link").attr({href:"javascript:void(0)"}).text(f||"...")).insertBefore(t+" #next-page")}),!0)}e(".our-fleet .pagination").append(e("<li>").addClass("page-item button-slider-prev").attr({id:"previous-page"}).append(e('<a><svg><use xlink:href="img/icons/icons.svg#i-arrow-right">').addClass("page-link").attr({href:"javascript:void(0)"})),e("<li>").addClass("page-item button-slider-next").attr({id:"next-page"}).append(e('<a><svg><use xlink:href="img/icons/icons.svg#i-arrow-right">').addClass("page-link").attr({href:"javascript:void(0)"}))),e(".our-fleet").show(),a(1),e(document).on("click",t+" .pagination li.current-page:not(.active)",function(){var l=+e(this).text();a(l),g(t)}),e(t+" #next-page").on("click",function(){var l=c+1;a(l),g(t)}),e(t+" #previous-page").on("click",function(){var l=c-1;a(l),g(t)}),e(".our-fleet .btn-show-more").on("click",function(){var l=screen.width;l<"768"?n+=5:l<"1024"?n+=4:n+=3,i=Math.ceil(o/n),a(c)})});let F=document.querySelector("body"),B=document.querySelector(".btn-filter"),b=document.querySelector(".popup-bg-body-filter"),L=!0;B&&B.addEventListener("click",function(t){L?(F.classList.add("lock-filter"),b.classList.add("open"),L=!1,setTimeout(function(){L=!0},1e3)):t.preventDefault()});setInterval(function(){b&&e(b).hasClass("collapsed")&&(F.classList.remove("lock-filter"),b.classList.remove("open"))},100);const p=document.body.querySelector(".tinder-cards");if(p){let M=function(d){d.addEventListener("pointerdown",E)},C=function(d,u,h,v){n.style.transform=`translate3d(${d}px, ${u}px, 0) rotate(${h}deg)`,i.style.opacity=Math.abs(d/innerWidth*2.1),i.className=`is-like ${d>0?"like":"nope"}`,v&&(n.style.transition=`transform ${v}ms`)},E=function({clientX:d,clientY:u}){s=d,c=u,A=parseInt(n.style.zIndex),n.addEventListener("pointermove",O),n.addEventListener("pointerup",w),n.addEventListener("pointerleave",w)},O=function({clientX:d,clientY:u}){a=d-s,l=u-c,C(a,l,a/innerWidth*50)},w=function(){n.style.zIndex=A,n.removeEventListener("pointermove",O),n.removeEventListener("pointerup",w),n.removeEventListener("pointerleave",w),Math.abs(a)>p.clientWidth/2?(n.removeEventListener("pointerdown",E),y()):$()},y=function(){const d=Math.abs(a)/a*innerWidth*1.3,u=l/a*d;C(d,u,d/innerWidth*50,innerWidth);const h=n,v=n.nextElementSibling;if(v)M(v),n=v,i=n.children[0],setTimeout(()=>{h&&h.parentNode===p&&p.removeChild(h),m=!1},innerWidth);else if(!f){const S=document.createElement("div");S.classList.add("card","end");const x=document.createElement("div");x.classList.add("card-text"),x.textContent="Автомобілі за підпискою - мінімум забов'язань, максимум свободи",S.appendChild(x),p.appendChild(S),document.querySelectorAll(".tinder button").forEach(j=>{j.style.pointerEvents="none"}),setTimeout(()=>{p.contains(h)&&p.removeChild(h),m=!1},innerWidth),n.removeEventListener("pointerdown",E),f=!0}},$=function(){C(0,0,0,100),setTimeout(()=>n.style.transition="",100)},t=[];const o=p.querySelectorAll(".card");let r=o.length;o.forEach(d=>{d.style.zIndex=r,r--});let n=p.querySelector(".card:first-child"),i=n.children[0],s=0,c=0,a=0,l=0,f=!1;M(n);let m=!1,A=r;document.querySelector(".tinder .i-like").onclick=()=>{const d=n.querySelector(".name"),u=d?d.textContent:null;u&&t.push(u),console.log(t.join(", ")),m||(m=!0,a=1,l=0,y())},document.querySelector(".tinder .i-dislike").onclick=()=>{m||(m=!0,a=-1,l=0,y())},document.querySelector(".tinder .i-favorite").onclick=()=>{const d=n.querySelector(".name"),u=d?d.textContent:null;u&&t.push(u),m||(m=!0,n.classList.add("favorite"),a=1,l=0,y())},document.addEventListener("DOMContentLoaded",function(){document.getElementById("tinderForm").addEventListener("submit",function(d){d.preventDefault();const u=document.getElementById("tinderForm"),h=new FormData(u);h.append("favorite_cars",t.join(", ")),console.log(h),fetch("/api/favorite-cars",{method:"POST",body:h}).then(v=>v.json()).then(v=>{v.success?alert("Form submitted successfully!"):alert("There was an error submitting the form.")}).catch(v=>console.error("Error:",v))})})}e(document).on("click",'a.anchor[href^="#"]',function(t){var o=e(this);e("html, body").stop().animate({scrollTop:e(o.attr("href")).offset().top-70},800),t.preventDefault()});document.addEventListener("DOMContentLoaded",function(){var t=document.querySelectorAll(".subscription-period-benefits");t.forEach(function(r){var n=r.querySelectorAll(".subscription-period-benefits--item");if(n.length>5)for(var i=5;i<n.length;i++)n[i].classList.add("d-none")});var o=document.querySelectorAll(".subscription-period-tab .btn-more");o.forEach(function(r){r.addEventListener("click",function(){for(var n=this.previousElementSibling,i=n.querySelectorAll(".subscription-period-benefits--item"),s=5;s<i.length;s++)i[s].classList.contains("d-none")?i[s].classList.remove("d-none"):i[s].classList.add("d-none");n.querySelectorAll(".d-none").length>0?this.textContent="Усі фішки":this.textContent="Сховати"})})});document.addEventListener("DOMContentLoaded",function(){var t=document.querySelectorAll(".subscription-features");t.forEach(function(r){var n=r.querySelectorAll(".subscription-features--item");if(n.length>8)for(var i=8;i<n.length;i++)n[i].classList.add("d-none")});var o=document.querySelectorAll(".subscription-features-content .btn-more");o.forEach(function(r){r.addEventListener("click",function(){for(var n=this.previousElementSibling,i=n.querySelectorAll(".subscription-features--item"),s=8;s<i.length;s++)i[s].classList.contains("d-none")?i[s].classList.remove("d-none"):i[s].classList.add("d-none");n.querySelectorAll(".d-none").length>0?this.textContent="Показати Більше":this.textContent="Сховати"})})});document.addEventListener("DOMContentLoaded",function(){var t=document.querySelectorAll(".customer-stories-main .scroll-gallery--item");if(t.length>0){let c=function(){for(var a=Math.min(r+o,n.length),l=r;l<a;l++){n[l].style.display="block";var f=n[l].querySelector("a");f&&f.setAttribute("data-fancybox","scroll-gallery")}r=a,r>=n.length&&(i.style.display="none")};var o=window.innerWidth>=1024?6:4,r=o,n=document.querySelectorAll(".customer-stories-main .scroll-gallery--item"),i=document.querySelector(".customer-stories-main .btn-show-more"),i=document.querySelector(".btn-show-more");i&&i.addEventListener("click",c);for(var s=o;s<n.length;s++)n[s].style.display="none";n.forEach(function(a,l){if(l<o){var f=a.querySelector("a");f&&f.setAttribute("data-fancybox","scroll-gallery")}})}});
