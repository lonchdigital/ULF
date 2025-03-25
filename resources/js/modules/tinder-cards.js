const TinderCards = document.body.querySelector('.tinder-cards');

if (TinderCards) {
	const automatchButton = document.getElementById("automatch-send-button");
	var originalButtonText = automatchButton.textContent;
	let favorites = [];

	// Get all the cards
	const cards = TinderCards.querySelectorAll('.card');

	// Set zIndexCounter to the total number of cards
	let zIndexCounter = cards.length;

	if (zIndexCounter > 0) {

		// Loop through each card and assign zIndex dynamically
		cards.forEach(card => {
			card.style.zIndex = zIndexCounter;
			zIndexCounter--;
		});

		let current = TinderCards.querySelector('.card:first-child') // Select the first card instead of the last
		let likeText = current.children[0]
		let startX = 0, startY = 0, moveX = 0, moveY = 0
		let cardsEnded = false; // Variable to track if cards are ended
		initCard(current)

		let isAnimationInProgress = false;

		let lastZIndex = zIndexCounter;

		document.querySelector('.tinder .i-like').onclick = () => {
			// const nameElement = current.querySelector('.name');
			// const carComment = current.querySelector('.name');
			// const carCommentValue = carComment ? carComment.textContent : null;

            // if (favorites.length == 2) {
            //     favorites.push(carCommentValue);
            //     const button = document.querySelector('.i-favorite');

            //     if (button) {
            //         button.click();
            //     }
            // }

			// if (carCommentValue && favorites.length < 2) {
			// 	favorites.push(carCommentValue);
			// }

            const carComment = current.querySelector('.name');
            const carCommentValue = carComment ? carComment.textContent : null;

            if (carCommentValue) {
                favorites.push(carCommentValue);
            }

			if (!isAnimationInProgress) { // Перевіряємо, чи не триває анімація
				isAnimationInProgress = true; // Позначаємо, що розпочата анімація
				moveX = 1;
				moveY = 0;
				complete();
			}
		}

		document.querySelector('.tinder .i-dislike').onclick = () => {
			if (!isAnimationInProgress) { // Перевіряємо, чи не триває анімація
				isAnimationInProgress = true; // Позначаємо, що розпочата анімація
				moveX = -1;
				moveY = 0;
				complete();
			}
		}

		document.querySelector('.tinder .i-favorite').onclick = () => {
			const carComment = current.querySelector('.name');
			const carCommentValue = carComment ? carComment.textContent : null;

			if (carCommentValue && !favorites.includes(carCommentValue)) {
				favorites.push(carCommentValue);
			}

			if (!isAnimationInProgress) {
				isAnimationInProgress = true;
				current.classList.add('favorite'); // Додати клас "favorite" поточній картці
				moveX = 1;
				moveY = 0;
				complete();
			}
		}

		function initCard(card) {
			card.addEventListener('pointerdown', onPointerDown)
		}

		function setTransform(x, y, deg, duration) {
			current.style.transform = `translate3d(${x}px, ${y}px, 0) rotate(${deg}deg)`
			likeText.style.opacity = Math.abs((x / innerWidth * 2.1))
			likeText.className = `is-like ${x > 0 ? 'like' : 'nope'}`
			if (duration) current.style.transition = `transform ${duration}ms`
		}

		function onPointerDown({ clientX, clientY }) {
			startX = clientX;
			startY = clientY;
			lastZIndex = parseInt(current.style.zIndex); // Зберігаємо поточне значення z-index
			current.addEventListener('pointermove', onPointerMove);
			current.addEventListener('pointerup', onPointerUp);
			current.addEventListener('pointerleave', onPointerUp);
		}

		function onPointerMove({ clientX, clientY }) {
			moveX = clientX - startX
			moveY = clientY - startY
			setTransform(moveX, moveY, moveX / innerWidth * 50)
		}

		function onPointerUp() {
			current.style.zIndex = lastZIndex;

			current.removeEventListener('pointermove', onPointerMove)
			current.removeEventListener('pointerup', onPointerUp)
			current.removeEventListener('pointerleave', onPointerUp)
			if (Math.abs(moveX) > TinderCards.clientWidth / 2) {
				current.removeEventListener('pointerdown', onPointerDown)
				complete()
			} else cancel()
		}

		// Після анімації встановлюємо isAnimationInProgress назад в false
		function complete() {
			const flyX = (Math.abs(moveX) / moveX) * innerWidth * 1.3;
			const flyY = (moveY / moveX) * flyX;
			setTransform(flyX, flyY, flyX / innerWidth * 50, innerWidth);

			const prev = current;
			const next = current.nextElementSibling;

//             const carComment = current.querySelector('.car-comment');
//             const carCommentValue = carComment ? carComment.textContent : null;
//             console.log(favorites);
//             console.log(favorites.lenght);
// console.log((favorites.lenght + 1) % 3);
//             if ((favorites.lenght + 1) % 3 === 0) {
//                 console.log(123);
//                 const button = document.querySelector('.i-favorite');

//                 if (button) {
//                     button.click();
//                 }
//             } else {
//                 console.log(321);
//                 favorites.push(carCommentValue);
//             }

            ///////

            // console.log(favorites);

			if (next) {
				initCard(next);
				current = next;
				likeText = current.children[0];
				setTimeout(() => {
					if (prev && prev.parentNode === TinderCards) {
						TinderCards.removeChild(prev);
					}
					isAnimationInProgress = false;
				}, 300);
			} else if (!cardsEnded) {
				const endCard = document.createElement('div');
				endCard.classList.add('card', 'end');
				const endText = document.createElement('div');
				endText.classList.add('card-text');
				endText.textContent = "Автомобілі за підпискою - мінімум забов'язань, максимум свободи";
				endCard.appendChild(endText);
				TinderCards.appendChild(endCard);

                const button = document.querySelector('.i-favorite');

                if (button) {
                    button.click();
                }

				// Заборонити всім кнопкам реагувати на події натискання миші
				const buttons = document.querySelectorAll('.tinder button');
				buttons.forEach(button => {
					if (!button.classList.contains('btn-modal-close')) {
						button.style.pointerEvents = 'none';
					}
				});

				setTimeout(() => {
					if (TinderCards.contains(prev)) {
						TinderCards.removeChild(prev);
					}
					isAnimationInProgress = false;
				}, 300);

				current.removeEventListener('pointerdown', onPointerDown);
				cardsEnded = true;
			}
		}


		function cancel() {
			setTransform(0, 0, 0, 100)
			setTimeout(() => current.style.transition = '', 100)
		}

		document.addEventListener("DOMContentLoaded", function () {
			document.getElementById("tinderForm").addEventListener("submit", function (event) {
				event.preventDefault();

				const form = document.getElementById('tinderForm');
				const formData = new FormData(form);

				formData.append('favorite_cars', favorites.join(' | '));
				const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

				// console.log(formData);

				fetch('/favorite-cars', {
					method: 'POST',
					body: formData,
					headers: {
						'X-CSRF-TOKEN': csrfToken
					},
				})
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = data.redirect_url;
                    } else {
                        automatchButton.classList.remove('active');
                        automatchButton.textContent = originalButtonText;

                        var errors = data.errors;

                        document.querySelectorAll('.field--help-info').forEach(function (errorElement) {
                            errorElement.textContent = '';
                        });

                        for (var field in errors) {
                            var fieldElement = $('#' + field + '_error');

                            var existingError = fieldElement.next('.field--help-info');

                            if (existingError.length) {
                                existingError.text(errors[field][0]);
                            } else {
                                fieldElement.after('<div class="field--help-info small-txt text-red mb-2">' +
                                    errors[field][0] + '</div>');
                            }
                        }
                    }
                })
                .catch(response => {
                });
			});
		});
	}
}

const selectButton = document.getElementById("select-send-button");
var originalText = selectButton.textContent;

document.getElementById("form-сar-selection").addEventListener("submit", function (event) {
	event.preventDefault();

	const form = document.getElementById('form-сar-selection');
	const formData = new FormData(form);
	const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

	fetch('/select-cars', {
		method: 'POST',
		body: formData,
		headers: {
			'X-CSRF-TOKEN': csrfToken
		},
	})
		.then(response => response.json())
		.then(data => {
			if (data.success) {
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({ event: "submit_form_select_car" });


				window.location.href = data.redirect_url;
			} else {
				selectButton.classList.remove('active');
				selectButton.textContent = originalText;

				var errors = data.errors;

				document.querySelectorAll('.field--help-info').forEach(function (errorElement) {
					errorElement.textContent = '';
				});

				for (var field in errors) {
					var fieldElement = $('#' + field + '_error_select');

					var existingError = fieldElement.next('.field--help-info');

					if (existingError.length) {
						existingError.text(errors[field][0]);
					} else {
						fieldElement.after('<div class="field--help-info small-txt text-red mb-2">' +
							errors[field][0] + '</div>');
					}
				}
			}
		})
		.catch(response => {
		});
});
// else {
// 	// Якщо елемент не знайдено, виведіть повідомлення або виконайте альтернативні дії
// 	console.error("Елемент з класом .tinder-cards не знайдено на сторінці.");
// }
