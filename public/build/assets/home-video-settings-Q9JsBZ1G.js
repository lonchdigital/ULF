document.addEventListener("DOMContentLoaded",function(){const n=document.getElementById("section-top"),l=n.querySelector("video.d-none.d-sm-block"),u=n.querySelector("video.d-sm-none"),o=window.innerWidth>=767?l:u;o&&(o.autoplay=!0,o.muted=!0,o.loop=!0,new IntersectionObserver(c=>{c.forEach(s=>{s.isIntersecting?o.play().catch(r=>{console.warn("Автовоспроизведение заблокировано браузером:",r)}):o.pause()})},{threshold:.5}).observe(n))});document.addEventListener("DOMContentLoaded",function(){const n=document.querySelectorAll(".specific-player");n.forEach(e=>{e.muted=!0,e.playsinline=!0}),(()=>{const e=document.createElement("button");e.style.display="none",document.body.appendChild(e),e.click(),document.body.removeChild(e)})();const u=new IntersectionObserver(e=>{e.forEach(c=>{const s=c.target,r=s.closest(".video-wrap");if(!r)return;const t=r.querySelector(".btn-video-play-pause");s.closest("#customer-stories-mobile")||(c.isIntersecting?(s.play().catch(i=>{console.warn("Автовоспроизведение заблокировано браузером:",i)}),t&&t.classList.add("active"),r.classList.add("playing")):(s.pause(),t&&t.classList.remove("active"),r.classList.remove("playing")))})},{threshold:.5});n.forEach(e=>{!e.closest("#customer-stories")&&!e.closest("#customer-stories-mobile")&&u.observe(e)});const o=document.getElementById("customer-stories");if(o){const e=Array.from(o.querySelectorAll(".specific-player")).filter(t=>!t.closest("#customer-stories-mobile"));let c=0;const s=()=>{if(c>=e.length)return;const t=e[c],i=t.closest(".video-wrap"),a=i.querySelector(".btn-video-play-pause");a&&a.classList.add("active"),i.classList.add("playing"),t.play().catch(d=>{console.warn("Автовоспроизведение заблокировано браузером:",d)}),t.onended=()=>{a&&a.classList.remove("active"),i.classList.remove("playing"),c++,s()}};new IntersectionObserver(t=>{t.forEach(i=>{i.isIntersecting?s():e.forEach(a=>{a.pause();const d=a.closest(".video-wrap"),p=d.querySelector(".btn-video-play-pause");p&&p.classList.remove("active"),d.classList.remove("playing")})})},{threshold:.5}).observe(o)}});document.addEventListener("touchstart",()=>{document.querySelectorAll(".specific-player").forEach(n=>{n.play().catch(l=>{console.warn("Автовоспроизведение на iOS не удалось, пробуем еще раз.",l)})})},{once:!0});
