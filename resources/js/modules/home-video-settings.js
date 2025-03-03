
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

            // Игнорируем видео внутри #customer-stories-mobile
            if (video.closest("#customer-stories-mobile")) return;

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

    // observe video NOT in #customer-stories AND NOT in #customer-stories-mobile
    allVideos.forEach((video) => {
        if (!video.closest("#customer-stories") && !video.closest("#customer-stories-mobile")) {
            videoObserver.observe(video);
        }
    });



    // Customer stories section
    const customerStoriesSection = document.getElementById("customer-stories");
    if (customerStoriesSection) {

        window.lastClickedVideo = null;
        let lastPlayedIndex = null; // Запоминаем индекс последнего видео

        document.querySelectorAll('#customer-stories-pc .video-wrap').forEach(videoWrap => {
            videoWrap.addEventListener('click', function (event) {
                const video = this.querySelector('video');
                if (!video) return;

                const rect = video.getBoundingClientRect();
                const clickX = event.clientX - rect.left;
                const zoneStart = rect.width * 0.2; // 20% от левого края
                const zoneEnd = rect.width * 0.8; // 80% от левого края

                if (clickX >= zoneStart && clickX <= zoneEnd) {
                    if (video.paused) {
                        video.play();
                        window.lastClickedVideo = video; // Запоминаем видео, по которому кликнули
                        lastPlayedIndex = Array.from(videosInSection).indexOf(video); // Запоминаем его индекс
                    } else {
                        video.pause();
                        window.lastClickedVideo = null;
                    }
                }
            });
        });

        const videosInSection = Array.from(customerStoriesSection.querySelectorAll(".specific-player"))
            .filter(video => !video.closest("#customer-stories-mobile")); // Исключаем мобильные видео

        let currentVideoIndex = 0;

        // Функция для запуска следующего видео
        const playNextVideoInSection = () => {
            if (lastPlayedIndex !== null) {
                currentVideoIndex = lastPlayedIndex; // Если есть запомненный индекс, используем его
                lastPlayedIndex = null; // Сбрасываем после воспроизведения
            }

            if (currentVideoIndex >= videosInSection.length) return;

            let videoToPlay = window.lastClickedVideo || videosInSection[currentVideoIndex]; // Приоритет на кликнутое видео
            window.lastClickedVideo = null; // Сбрасываем после воспроизведения

            videosInSection.forEach(video => {
                if (video !== videoToPlay) {
                    video.pause();
                    video.closest(".video-wrap").classList.remove("playing");
                }
            });

            const videoWrap = videoToPlay.closest(".video-wrap");
            videoWrap.classList.add("playing");

            videoToPlay.play().catch((error) => {
                console.warn("Автовоспроизведение заблокировано:", error);
            });

            videoToPlay.onended = () => {
                videoWrap.classList.remove("playing");
                currentVideoIndex++;
                playNextVideoInSection();
            };
        };

        // Следим за видимостью секции
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    playNextVideoInSection();
                } else {
                    videosInSection.forEach((video) => {
                        video.pause();
                        video.closest(".video-wrap").classList.remove("playing");
                    });
                }
            });
        }, { threshold: 0.5 });

        sectionObserver.observe(customerStoriesSection);
    }


});


// iOS fix
document.addEventListener('touchstart', () => {
    document.querySelectorAll('.specific-player').forEach(video => {
        video.play().catch(error => {
            console.warn('Автовоспроизведение на iOS не удалось, пробуем еще раз.', error);
        });
    });
}, { once: true });