// import { Fancybox } from "@fancyapps/ui/dist/fancybox/fancybox.esm.js";
import Plyr from 'plyr';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";
import Swiper from 'swiper/bundle';
import { Fancybox } from "@fancyapps/ui";
import iconUrl from '$img/icons/icons.svg';

//? Plyr
// Перевірка наявності аудіоплеєрів
const audioPlayers = document.querySelectorAll('.js-player');
let players; // Змінна players вище оголошується

if (audioPlayers.length > 0) {
	// Створення аудіоплеєрів з використанням Plyr та отримання посилань на них
	players = Plyr.setup('.js-player', {
		// Параметри конфігурації
		// clickToPlay: false
	});

	// Додаємо обробник подій для кожного аудіоплеєра
	players.forEach((player, i) => {
		player.on('play', () => {
			// При відтворенні ставимо решту плеєрів, крім поточного
			players.forEach((otherPlayer, a) => {
				if (a !== i) {
					otherPlayer.pause();
				}
			});
		});
	});
}

// Знаходимо всі контейнери відео, які мають клас .video-wrap--vissible
const videoWraps = document.querySelectorAll('.video-wrap--vissible');

videoWraps.forEach((videoWrap) => {
	// Знаходимо відеоплеєр і кнопку відтворення для поточного контейнера відео
	const videoPlayer = videoWrap.querySelector('.specific-player');
	const playPauseButton = videoWrap.querySelector('.btn-video-play-pause');

	if (videoPlayer && playPauseButton) {
		const plyrVideoPlayer = videoPlayer.plyr;

		playPauseButton.addEventListener('click', () => {

			if (plyrVideoPlayer.paused) {
				plyrVideoPlayer.play();
				plyrVideoPlayer.muted = false;
				playPauseButton.classList.add('active');
			} else {
				plyrVideoPlayer.pause();
				playPauseButton.classList.remove('active');
			}
		});

		plyrVideoPlayer.on('ended', () => {
			playPauseButton.classList.remove('active');
		});

		videoPlayer.addEventListener('click', (event) => {
			event.stopPropagation();
		});

		plyrVideoPlayer.on('pause', () => {
			if (!plyrVideoPlayer.playing) {
				playPauseButton.classList.remove('active');
			}
		});
	}
});


// Функція для зупинки всіх відео
function pauseAllVideos() {

	if (players) { // Перевірка на наявність players
		// Зупиняємо всі аудіоплеєри
		players.forEach(player => {
			player.pause();
		});
	}

	// Зупиняємо всі відеоплеєри
	document.querySelectorAll('.js-player').forEach(videoPlayer => {
		const plyrVideoPlayer = videoPlayer.plyr;
		if (plyrVideoPlayer.playing) {
			plyrVideoPlayer.pause();
			videoPlayer.querySelector('.btn-video-play-pause').classList.remove('active');
		}
	});

}

// Функція для зупинки всіх відео у історіях користувача
function pauseCubeVideos() {

	// Зупиняємо відео, які знаходяться в контейнерах .customer-stories
	document.querySelectorAll('.customer-stories .js-player').forEach(videoPlayer => {
		const plyrVideoPlayer = videoPlayer.plyr;
		if (plyrVideoPlayer.playing) {
			plyrVideoPlayer.pause();
			videoPlayer.querySelector('.btn-video-play-pause').classList.remove('active');
		}
	});
}


//? Swiper

//? section-top--swiper
new Swiper('.section-top--swiper', {
	slidesPerView: 7.5,
	spaceBetween: 16,
	loop: true,
	speed: 6000,
	autoplay: {
		enabled: true,
		delay: 1,
		// disableOnInteraction: false,
	},
	centeredSlides: true,
	allowTouchMove: false,
	breakpoints: {
		1400: {
		},
		1200: {
			slidesPerView: 5.5,
		},
		1024: {
			slidesPerView: 4.5,
		},
		768: {
			slidesPerView: 3.5,
		},
		0: {
			slidesPerView: 2.2,
		}
	},
});

//? section-top--swiper--rtl
new Swiper('.section-top--swiper--rtl', {
	slidesPerView: 7.5,
	spaceBetween: 16,
	loop: true,
	speed: 6000,
	autoplay: {
		enabled: true,
		delay: 1,
		// disableOnInteraction: false,
	},
	centeredSlides: true,
	allowTouchMove: false,
	breakpoints: {
		1400: {
		},
		1200: {
			slidesPerView: 5.5,
		},
		1024: {
			slidesPerView: 4.5,
		},
		768: {
			slidesPerView: 3.5,
		},
		0: {
			slidesPerView: 2.2,
		}
	},
});

//? gallery-car-thumbs--swiper
var SwiperWallpaperCollectionThumbs = new Swiper(".gallery-car-thumbs--swiper", {
	grabCursor: true,
	breakpoints: {
		1200: {
			slidesPerView: 6.4,
			spaceBetween: 25,
		},
		1024: {
			slidesPerView: 5.5,
			spaceBetween: 15,
		},
		768: {
			slidesPerView: 3.5,
			spaceBetween: 15,
		},
		575: {
			slidesPerView: 3.3,
			spaceBetween: 10,
		}
	},
})

//? gallery-car--swiper
new Swiper(".gallery-car--swiper", {
	grabCursor: true,
	slidesPerView: 1,
	loop: true,
	breakpoints: {
		1200: {
			spaceBetween: 25,
		},
		576: {
			spaceBetween: 20,
		},
		0: {
		}
	},
	pagination: {
		el: ".gallery-car--swiper .swiper-pagination",
		clickable: true,
	},
	thumbs: {
		swiper: SwiperWallpaperCollectionThumbs,
	}
})


//? story-cube

function forcePlayOnIOS(video) {
	const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

	if (isIOS) {
		console.warn('iOS detected, forcing play...');

		// Создаем клик-ивент для имитации действия пользователя
		const fakeClick = new Event('click', { bubbles: true });
		video.dispatchEvent(fakeClick);

		// Добавляем слушатель для обработки клика
		video.addEventListener('click', function () {
			video.play().then(() => {
				console.log('Видео запущено вручную после симуляции клика!');
			}).catch(err => console.error('Ошибка принудительного воспроизведения на iOS:', err));
		}, { once: true });
	}
}

document.addEventListener('DOMContentLoaded', function () {
	const swiperContainer = document.getElementById('customer-stories-mobile'); // Используем id контейнера

	// Функция для инициализации Swiper
	const initSwiper = () => {
		const swiper = new Swiper(".story-cube--swiper", {
			effect: 'fade',
			watchSlidesProgress: true,
			loop: true,
			autoplay: {
				delay: 15000, // Задержка по умолчанию
				disableOnInteraction: false
			},
			slidesPerView: 1,
			navigation: {
				nextEl: ".story-cube--next",
				prevEl: ".story-cube--prev",
			},
			pagination: {
				el: '.story-cube--pagination',
				clickable: true,
				renderBullet: function (index, className) {
					return '<div class="' + className + '"> <div class="swiper-pagination-progress"></div> </div>';
				}
			},
			on: {
				init() {
					// Принудительно переключаем на первый слайд после инициализации
					this.slideTo(0);

					// Запускаем видео в первом слайде
					const firstSlide = this.slides[0];
					const video = firstSlide.querySelector('video');
					if (video) {
						video.currentTime = 0; // Сбрасываем время на начало
						video.play().catch(error => {
							console.error('Ошибка воспроизведения видео:', error);
						});
					}
				},
				autoplayTimeLeft(swiper, time, progress) {
					const activeSlide = swiper.slides[swiper.activeIndex];
					const video = activeSlide.querySelector('video');
					const currentBullet = document.querySelectorAll('.story-cube--swiper .swiper-pagination-progress')[swiper.realIndex];

					if (!currentBullet) return;

					if (video) {
						// Синхронизируем прогресс с видео
						const videoProgress = (video.currentTime / video.duration) * 100;
						gsap.set(currentBullet, { width: `${videoProgress}%` });
					} else {
						// Синхронизируем прогресс с автоплеем
						const autoplayProgress = (1 - time / swiper.params.autoplay.delay) * 100;
						gsap.set(currentBullet, { width: `${autoplayProgress}%` });
					}
				},
				transitionEnd(swiper) {
					// Сбрасываем прогресс для всех буллетов
					let allBullets = $('.story-cube--swiper .swiper-pagination-progress');
					let bulletsBefore = allBullets.slice(0, swiper.realIndex);
					let bulletsAfter = allBullets.slice(swiper.realIndex, allBullets.length);
					if (bulletsBefore.length) { gsap.set(bulletsBefore, { width: '100%' }) }
					if (bulletsAfter.length) { gsap.set(bulletsAfter, { width: '0%' }) }
				},
				slideChange(swiper) {
					// Останавливаем и сбрасываем все видео на всех слайдах
					swiper.slides.forEach((slide) => {
						const video = slide.querySelector('video');
						if (video) {
							video.pause();
							video.currentTime = 0; // Всегда сбрасываем время в начало
						}
					});

					const activeSlide = swiper.slides[swiper.activeIndex];
					const video = activeSlide.querySelector('video');

					if (video) {
						// Останавливаем автоплей Swiper
						swiper.autoplay.stop();

						// Устанавливаем задержку автоплея = длительность видео
						video.onloadedmetadata = () => {
							swiper.params.autoplay.delay = video.duration * 1000;
						};

						// Гарантируем, что видео начинается с начала
						video.currentTime = 0;

						// Ожидаем, пока видео будет готово к воспроизведению
						const playVideo = () => {
							video.play()
								.then(() => {
									console.log('Видео запущено с начала');

									// Функция для обновления прогресса
									const updateProgress = () => {
										const currentBullet = document.querySelectorAll('.story-cube--swiper .swiper-pagination-progress')[swiper.realIndex];
										if (currentBullet && !video.paused && !video.ended) {
											const videoProgress = (video.currentTime / video.duration) * 100;
											gsap.set(currentBullet, { width: `${videoProgress}%` });
											requestAnimationFrame(updateProgress); // Продолжаем обновление
										}
									};
									updateProgress(); // Запускаем обновление прогресса
								})
								.catch(error => {
									console.error('Ошибка воспроизведения видео:', error);
									forcePlayOnIOS(video); // Применяем обходное решение для iOS
								});
						};

						// Если видео уже загружено, сразу запускаем
						if (video.readyState >= 3) {
							playVideo();
						} else {
							video.addEventListener('canplay', playVideo, { once: true });
						}

						// Когда видео заканчивается, переключаем на следующий слайд
						video.addEventListener('ended', () => {
							swiper.slideNext();
						}, { once: true });
					} else {
						// Если видео нет, запускаем стандартный Swiper autoplay
						swiper.params.autoplay.delay = 3000;
						swiper.autoplay.start();
					}
				}

			}
		});

		// Добавляем observer для слайдера
		const swiperObserver = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					// Если слайдер виден, запускаем автоплей
					swiper.autoplay.start();
				} else {
					// Если слайдер не виден, останавливаем автоплей
					swiper.autoplay.stop();
				}
			});
		}, { threshold: 0.5 }); // Порог видимости 50%

		swiperObserver.observe(swiperContainer);
	};

	// Инициализируем Swiper, когда секция становится видимой
	const observer = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				initSwiper();
				observer.disconnect(); // Отключаем observer после инициализации
			}
		});
	}, { threshold: 0.5 }); // Порог видимости 50%

	observer.observe(swiperContainer);
});

document.querySelectorAll('.video-wrap').forEach(videoWrap => {
	// Пропускаем элементы внутри секции #customer-stories-pc
	if (videoWrap.closest('#customer-stories-pc')) return;

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
			} else {
				video.pause();
			}
		}
	});
});


document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.btn-video-mute-toggle').forEach(button => {
		button.addEventListener('click', function () {
			const allVideos = document.querySelectorAll('video');
			const isMuted = !allVideos[0].muted;

			allVideos.forEach(video => {
				video.muted = isMuted;
			});

			document.querySelectorAll('.btn-video-mute-toggle').forEach(btn => {
				if (isMuted) {
					btn.classList.add('muted');
				} else {
					btn.classList.remove('muted');
				}
			});
		});
	});
});









const videoObserver = new IntersectionObserver((entries) => {
	entries.forEach(entry => {
		const video = entry.target;
		const slide = video.closest('.swiper-slide');
		if (!video || !slide) return;

		const swiper = document.querySelector('.story-cube--swiper').swiper;
		if (!swiper) return;

		const isActiveSlide = slide.classList.contains('swiper-slide-active');

		if (entry.isIntersecting && isActiveSlide) {
			video.currentTime = 0;

			if (video.paused) {
				video.play().catch(error => console.error(error));
			}
		} else {
			video.pause();
		}
	});
}, { threshold: 0.6 });

document.querySelectorAll('.story-cube--swiper video').forEach(video => {
	videoObserver.observe(video);
});









/*


function forcePlayOnIOS(video) {
	 const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
	 
	 if (isIOS) {
		  console.warn('iOS detected, forcing play...');

		  // Создаем клик-ивент для имитации действия пользователя
		  const fakeClick = new Event('click', { bubbles: true });
		  video.dispatchEvent(fakeClick);

		  // Добавляем слушатель для обработки клика
		  video.addEventListener('click', function () {
				video.play().then(() => {
					 console.log('Видео запущено вручную после симуляции клика!');
				}).catch(err => console.error('Ошибка принудительного воспроизведения на iOS:', err));
		  }, { once: true });
	 }
}



document.addEventListener('DOMContentLoaded', function () {
	 const swiperContainer = document.getElementById('customer-stories-mobile'); // Используем id контейнера

	 // Функция для инициализации Swiper
	 const initSwiper = () => {
		  const swiper = new Swiper(".story-cube--swiper", {
				effect: 'fade',
				watchSlidesProgress: true,
				loop: true,
				autoplay: {
					 delay: 15000, // Задержка по умолчанию
					 disableOnInteraction: false
				},
				slidesPerView: 1,
				navigation: {
					 nextEl: ".story-cube--next",
					 prevEl: ".story-cube--prev",
				},
				pagination: {
					 el: '.story-cube--pagination',
					 clickable: true,
					 renderBullet: function (index, className) {
						  return '<div class="' + className + '"> <div class="swiper-pagination-progress"></div> </div>';
					 }
				},
				on: {
					 init() {
						  // Принудительно переключаем на первый слайд после инициализации
						  this.slideTo(0);

						  // Запускаем видео в первом слайде
						  const firstSlide = this.slides[0];
						  const video = firstSlide.querySelector('video');
						  if (video) {
								video.currentTime = 0; // Сбрасываем время на начало
								video.play().catch(error => {
									 console.error('Ошибка воспроизведения видео:', error);
								});
						  }
					 },
					 autoplayTimeLeft(swiper, time, progress) {
						  const activeSlide = swiper.slides[swiper.activeIndex];
						  const video = activeSlide.querySelector('video');
						  const currentBullet = document.querySelectorAll('.story-cube--swiper .swiper-pagination-progress')[swiper.realIndex];

						  if (!currentBullet) return;

						  if (video) {
								// Синхронизируем прогресс с видео
								const videoProgress = (video.currentTime / video.duration) * 100;
								gsap.set(currentBullet, { width: `${videoProgress}%` });
						  } else {
								// Синхронизируем прогресс с автоплеем
								const autoplayProgress = (1 - time / swiper.params.autoplay.delay) * 100;
								gsap.set(currentBullet, { width: `${autoplayProgress}%` });
						  }
					 },
					 transitionEnd(swiper) {
						  // Сбрасываем прогресс для всех буллетов
						  let allBullets = $('.story-cube--swiper .swiper-pagination-progress');
						  let bulletsBefore = allBullets.slice(0, swiper.realIndex);
						  let bulletsAfter = allBullets.slice(swiper.realIndex, allBullets.length);
						  if (bulletsBefore.length) { gsap.set(bulletsBefore, { width: '100%' }) }
						  if (bulletsAfter.length) { gsap.set(bulletsAfter, { width: '0%' }) }
					 },
					 slideChange(swiper) {
					// Останавливаем и сбрасываем все видео на всех слайдах
					swiper.slides.forEach((slide) => {
						const video = slide.querySelector('video');
						if (video) {
							video.pause();
							video.currentTime = 0; // Всегда сбрасываем время в начало
						}
					});
				
					const activeSlide = swiper.slides[swiper.activeIndex];
					const video = activeSlide.querySelector('video');
				
					if (video) {
						// Останавливаем автоплей Swiper
						swiper.autoplay.stop();
				
						// Устанавливаем задержку автоплея = длительность видео
						video.onloadedmetadata = () => {
							swiper.params.autoplay.delay = video.duration * 1000;
						};
				
						// Гарантируем, что видео начинается с начала
						video.currentTime = 0;
				
						// Ожидаем, пока видео будет готово к воспроизведению
						const playVideo = () => {
							video.play()
								.then(() => {
									console.log('Видео запущено с начала');
				
									// Функция для обновления прогресса
									const updateProgress = () => {
										const currentBullet = document.querySelectorAll('.story-cube--swiper .swiper-pagination-progress')[swiper.realIndex];
										if (currentBullet && !video.paused && !video.ended) {
											const videoProgress = (video.currentTime / video.duration) * 100;
											gsap.set(currentBullet, { width: `${videoProgress}%` });
											requestAnimationFrame(updateProgress); // Продолжаем обновление
										}
									};
									updateProgress(); // Запускаем обновление прогресса
								})
								.catch(error => {
									console.error('Ошибка воспроизведения видео:', error);
									forcePlayOnIOS(video); // Применяем обходное решение для iOS
								});
						};
				
						// Если видео уже загружено, сразу запускаем
						if (video.readyState >= 3) {
							playVideo();
						} else {
							video.addEventListener('canplay', playVideo, { once: true });
						}
				
						// Когда видео заканчивается, переключаем на следующий слайд
						video.addEventListener('ended', () => {
							swiper.slideNext();
						}, { once: true });
					} else {
						// Если видео нет, запускаем стандартный Swiper autoplay
						swiper.params.autoplay.delay = 3000;
						swiper.autoplay.start();
					}
				}
				
				}
		  });

		  // Добавляем observer для слайдера
		  const swiperObserver = new IntersectionObserver((entries) => {
				entries.forEach(entry => {
					 if (entry.isIntersecting) {
						  // Если слайдер виден, запускаем автоплей
						  swiper.autoplay.start();
					 } else {
						  // Если слайдер не виден, останавливаем автоплей
						  swiper.autoplay.stop();
					 }
				});
		  }, { threshold: 0.5 }); // Порог видимости 50%

		  swiperObserver.observe(swiperContainer);
	 };

	 // Инициализируем Swiper, когда секция становится видимой
	 const observer = new IntersectionObserver((entries) => {
		  entries.forEach(entry => {
				if (entry.isIntersecting) {
					 initSwiper();
					 observer.disconnect(); // Отключаем observer после инициализации
				}
		  });
	 }, { threshold: 0.5 }); // Порог видимости 50%

	 observer.observe(swiperContainer);
});

document.querySelectorAll('.video-wrap').forEach(videoWrap => {
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
				} else {
					 video.pause();
				}
		  }
	 });
});


document.addEventListener('DOMContentLoaded', function () {
	 document.querySelectorAll('.btn-video-mute-toggle').forEach(button => {
		  button.addEventListener('click', function () {
				const video = this.closest('.video-wrap').querySelector('video');

				if (video) {
					 video.muted = !video.muted; // Переключаем состояние звука
					 
					 if (video.muted) {
						  this.classList.add('muted'); // Добавляем класс, если звук выключен
					 } else {
						  this.classList.remove('muted'); // Убираем класс, если звук включен
					 }
				}
		  });
	 });
});









const videoObserver = new IntersectionObserver((entries) => {
	 entries.forEach(entry => {
		  const video = entry.target;
		  const slide = video.closest('.swiper-slide');
		  if (!video || !slide) return;

		  const swiper = document.querySelector('.story-cube--swiper').swiper;
		  if (!swiper) return;

		  const isActiveSlide = slide.classList.contains('swiper-slide-active');

		  if (entry.isIntersecting && isActiveSlide) {
				video.currentTime = 0;
			   
				if (video.paused) {
					 video.play().catch(error => console.error(error));
				}
		  } else {
				video.pause();
		  }
	 });
}, { threshold: 0.6 });

document.querySelectorAll('.story-cube--swiper video').forEach(video => {
	 videoObserver.observe(video);
});


*/





function pauseCubeSlider() {
	// Зупиняємо роботу слайдера куб
	document.querySelector('.story-cube--swiper').swiper.autoplay.stop();
}

function resumeCubeSlider() {
	// Відновлюємо роботу слайдера куб
	document.querySelector('.story-cube--swiper').swiper.autoplay.start();
}


//? scroll-gallery-cars--swiperw
new Swiper('.scroll-gallery-cars--swiper', {
	slidesPerView: 2.2,
	freeMode: true,
	spaceBetween: 20,
	grabCursor: true,
	breakpoints: {
		640: {
		},
		480: {
			slidesPerView: 1.6,
		},
		0: {
			slidesPerView: 1.2,
		}
	},
});

//? scroll-gallery-cars--swiper
new Swiper('.horizontal-scoll-wrapper--scroll-gallery', {
	slidesPerView: 2.2,
	freeMode: true,
	spaceBetween: 20,
	breakpoints: {
		640: {
		},
		480: {
			slidesPerView: 1.6,
		},
		0: {
			slidesPerView: 1.2,
		}
	},
});

//?fancybox

//? data-fancybox="scroll-gallery"
// Перевизначаємо обробники подій FancyBox всередині того самого контексту
Fancybox.bind('[data-fancybox="scroll-gallery"]', {
	on: {
		// Обробник події, коли відкривається FancyBox
		reveal: function (instance, slide) {
			console.log("FancyBox відкрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли закривається FancyBox
		close: function (instance, slide) {
			console.log("FancyBox закрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли перегортаються слайди
		slideChange: function (instance, current) {
			console.log("Змінено слайд");
			// Якщо тип слайду - відео
			if (current.type === 'video') {
				// Зупиняємо всі відео
				pauseAllVideos();
			}
		}
	},
	Toolbar: {
		display: {
			left: [],
			right: ["close"],
		},
	},
	Carousel: {
		Navigation: {
			nextTpl: `<svg><use xlink:href="${iconUrl}#i-arrow-right"></use></svg>`,
			prevTpl: `<svg><use xlink:href="${iconUrl}#i-arrow-right"></use></svg>`,
		},
	},
	contentClick: "iterateZoom",
	Images: {
		Panzoom: {
			maxScale: 3,
		},
	},
	Thumbs: {
		type: "classic",
	},
	caption: (fancybox, slide) => {
		const caption = slide.caption || "";

		return `${slide.index + 1} / ${fancybox.carousel?.slides.length} <br /> ${caption}`;
	},
});

//? gallery-car
Fancybox.bind('[data-fancybox="gallery"]', {
	on: {
		// Обробник події, коли відкривається FancyBox
		reveal: function (instance, slide) {
			console.log("FancyBox відкрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли закривається FancyBox
		close: function (instance, slide) {
			console.log("FancyBox закрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли перегортаються слайди
		slideChange: function (instance, current) {
			console.log("Змінено слайд");
			// Якщо тип слайду - відео
			if (current.type === 'video') {
				// Зупиняємо всі відео
				pauseAllVideos();
			}
		}
	},
	Toolbar: {
		items: {
			carName: {
				tpl: `<div class="h4 font-m mb-0 font-weight-bolder text-white">Hyundai Tucson</div>`,
			}
		},
		display: {
			left: ["carName"],
			right: ["close"],
		},
	},
	Carousel: {
		Navigation: {
			nextTpl: `<svg><use xlink:href="${iconUrl}#i-arrow-right"></use></svg>`,
			prevTpl: `<svg><use xlink:href="${iconUrl}#i-arrow-right"></use></svg>`,
		},
	},
	contentClick: "iterateZoom",
	Images: {
		Panzoom: {
			maxScale: 3,
		},
	},
	Thumbs: false,
	caption: (fancybox, slide) => {
		const caption = slide.caption || "";

		return `${slide.index + 1} / ${fancybox.carousel?.slides.length
			} <br /> ${caption}`;
	},
});

//? [data-fancybox="video"]
/*Fancybox.bind('[data-fancybox="video"]', {
	 // Настройка Fancybox для открытия видео
	 on: {
		  reveal: function () {
				console.log("Видео запущено");
		  }
	 }
});*/

//? [data-fancybox="gallery-scroll"]
Fancybox.bind('[data-fancybox="gallery-scroll"]', {
	on: {
		// Обробник події, коли відкривається FancyBox
		reveal: function (instance, slide) {
			console.log("FancyBox відкрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли закривається FancyBox
		close: function (instance, slide) {
			console.log("FancyBox закрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли перегортаються слайди
		slideChange: function (instance, current) {
			console.log("Змінено слайд");
			// Якщо тип слайду - відео
			if (current.type === 'video') {
				// Зупиняємо всі відео
				pauseAllVideos();
			}
		}
	},
	Toolbar: {
		display: {
			left: [],
			right: ["close"],
		},
	},
	Carousel: {
		Navigation: {
			nextTpl: `<svg><use xlink:href="${iconUrl}#i-arrow-right"></use></svg>`,
			prevTpl: `<svg><use xlink:href="${iconUrl}#i-arrow-right"></use></svg>`,
		},
	},
	contentClick: "iterateZoom",
	Images: {
		Panzoom: {
			maxScale: 3,
		},
	},
	Thumbs: false,
	caption: (fancybox, slide) => {
		const caption = slide.caption || "";

		return `${slide.index + 1} / ${fancybox.carousel?.slides.length
			} <br /> ${caption}`;
	},
});

//? [data-fancybox="specific-player"]
Fancybox.bind('[data-fancybox="specific-player"]', {
	on: {
		// Обробник події, коли відкривається FancyBox
		reveal: function (instance, slide) {
			console.log("FancyBox відкрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли закривається FancyBox
		close: function (instance, slide) {
			console.log("FancyBox закрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли перегортаються слайди
		slideChange: function (instance, current) {
			console.log("Змінено слайд");
			// Якщо тип слайду - відео
			if (current.type === 'video') {
				// Зупиняємо всі відео
				pauseAllVideos();
			}
		}
	},
	Toolbar: {
		display: {
			left: [],
			right: ["close"],
		},
	},
	Thumbs: false,
});

//? [data-fancybox="specific-player-mob"]
Fancybox.bind('[data-fancybox="specific-player-mob"]', {
	on: {
		// Обробник події, коли відкривається FancyBox
		reveal: function (instance, slide) {
			console.log("FancyBox відкрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли закривається FancyBox
		close: function (instance, slide) {
			console.log("FancyBox закрито");
			// Зупиняємо всі відео
			pauseAllVideos();
		},

		// Обробник події, коли перегортаються слайди
		slideChange: function (instance, current) {
			console.log("Змінено слайд");
			// Якщо тип слайду - відео
			if (current.type === 'video') {
				// Зупиняємо всі відео
				pauseAllVideos();
			}
		}
	},
	Toolbar: {
		display: {
			left: [],
			right: ["close"],
		},
	},
	Thumbs: false,
});

//? cube-gallery
Fancybox.bind('[data-fancybox="story-cube-gallery"]', {
	on: {
		// Обробник події, коли відкривається FancyBox
		reveal: function (instance, slide) {
			console.log("FancyBox відкрито");
			// Зупиняємо всі відео
			pauseAllVideos();
			pauseCubeSlider();
		},

		// Обробник події, коли закривається FancyBox
		close: function (instance, slide) {
			console.log("FancyBox закрито");
			// Зупиняємо всі відео
			pauseAllVideos();
			// Відновлюємо роботу слайдера куб
			resumeCubeSlider();
		},

		// Обробник події, коли перегортаються слайди
		slideChange: function (instance, current) {
			console.log("Змінено слайд");
			// Якщо тип слайду - відео
			if (current.type === 'video') {
				// Зупиняємо всі відео
				pauseAllVideos();
			}
		}
	},
	Toolbar: {
		display: {
			left: [],
			right: ["close"],
		},
	},
	Carousel: {
		Navigation: {
			nextTpl: `<svg><use xlink:href="${iconUrl}#i-arrow-right"></use></svg>`,
			prevTpl: `<svg><use xlink:href="${iconUrl}#i-arrow-right"></use></svg>`,
		},
	},
	contentClick: "iterateZoom",
	Images: {
		Panzoom: {
			maxScale: 3,
		},
	},
	Thumbs: {
		type: "classic",
	},
	caption: (fancybox, slide) => {
		const caption = slide.caption || "";

		return `${slide.index + 1} / ${fancybox.carousel?.slides.length
			} <br /> ${caption}`;
	},
});




// Перевірка, чи була взаємодія користувача
let userInteracted = false;

function initScrollTrigger() {
	gsap.registerPlugin(ScrollTrigger);

	function simulatePlayPauseClick() {
		const playPauseButton = document.querySelector('.customer-stories .horizontal-scoll-wrapper .video-wrap--vissible .btn-video-play-pause');
		if (playPauseButton) {
			// TODO:: I have to comment these because of double click on homepage
			// playPauseButton.click();
		}
	}

	ScrollTrigger.create({
		trigger: '.customer-stories',
		start: 'top center',
		onEnter: simulatePlayPauseClick
	});
}

document.addEventListener('click', function () {
	if (!userInteracted) {
		userInteracted = true;
		if (window.innerWidth >= 768) { // Перевірка ширини екрану
			initScrollTrigger();
		}
	}
});
