
// hero header video
document.addEventListener("DOMContentLoaded", function () {
    const videoContainer = document.getElementById("section-top");
    const desktopVideo = videoContainer.querySelector("video.d-none.d-sm-block");
    const mobileVideo = videoContainer.querySelector("video.d-sm-none");

    const video = window.innerWidth >= 767 ? desktopVideo : mobileVideo;

    if (video) {
        video.autoplay = true;
        video.muted = true;
        video.loop = true;

        // Инициализируем IntersectionObserver
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    video.play().catch((error) => {
                        console.warn("Автовоспроизведение заблокировано браузером:", error);
                    });
                } else {
                    video.pause();
                }
            });
        }, { threshold: 0.5 }); // Порог видимости 50%

        // Начинаем наблюдать за блоком #section-top
        observer.observe(videoContainer);
    }
});



// other videos
document.addEventListener("DOMContentLoaded", function () {
    // make sure we have muted, playsinline
    const allVideos = document.querySelectorAll(".specific-player");
    allVideos.forEach((video) => {
        video.muted = true;
        video.playsinline = true;
    });

    // user activity imitation
    const simulateUserInteraction = () => {
        const fakeButton = document.createElement("button");
        fakeButton.style.display = "none";
        document.body.appendChild(fakeButton);
        fakeButton.click();
        document.body.removeChild(fakeButton);
    };
    simulateUserInteraction();

    // Ready to drive section
    const videoObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const video = entry.target;
            const videoWrap = video.closest(".video-wrap");
            if (!videoWrap) return;

            const playPauseButton = videoWrap.querySelector(".btn-video-play-pause");

            if (entry.isIntersecting) {
                video.play().catch((error) => {
                    console.warn("Автовоспроизведение заблокировано браузером:", error);
                });

                if (playPauseButton) {
                    playPauseButton.classList.add("active");
                }
                videoWrap.classList.add("playing");
            } else {
                video.pause();

                if (playPauseButton) {
                    playPauseButton.classList.remove("active");
                }
                videoWrap.classList.remove("playing");
            }
        });
    }, { threshold: 0.5 });

    // observe video NOT in #customer-stories
    allVideos.forEach((video) => {
        if (!video.closest("#customer-stories")) {
            videoObserver.observe(video);
        }
    });



    // Customer stories section 
    const customerStoriesSection = document.getElementById("customer-stories");

    if (customerStoriesSection) {
        const videosInSection = Array.from(customerStoriesSection.querySelectorAll(".specific-player"));
        let currentVideoIndex = 0;

        // play video one by one
        const playNextVideoInSection = () => {
            if (currentVideoIndex >= videosInSection.length) return;

            const video = videosInSection[currentVideoIndex];
            const videoWrap = video.closest(".video-wrap");
            const playPauseButton = videoWrap.querySelector(".btn-video-play-pause");

            if (playPauseButton) {
                playPauseButton.classList.add("active");
            }
            videoWrap.classList.add("playing");

            video.play().catch((error) => {
                console.warn("Автовоспроизведение заблокировано браузером:", error);
            });

            video.onended = () => {
                if (playPauseButton) {
                    playPauseButton.classList.remove("active");
                }
                videoWrap.classList.remove("playing");

                currentVideoIndex++;
                playNextVideoInSection();
            };
        };

        // Observe section on screen
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    playNextVideoInSection();
                } else {
                    // stop all video if we do not see section
                    videosInSection.forEach((video) => {
                        video.pause();
                        const videoWrap = video.closest(".video-wrap");
                        const playPauseButton = videoWrap.querySelector(".btn-video-play-pause");

                        // Убираем классы для всех видео
                        if (playPauseButton) {
                            playPauseButton.classList.remove("active");
                        }
                        videoWrap.classList.remove("playing");
                    });
                }
            });
        }, { threshold: 0.5 });

        // Run observer
        sectionObserver.observe(customerStoriesSection);
    }
});


