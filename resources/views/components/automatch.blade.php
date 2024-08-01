<section class="tinder py-sm-5 py-md-8 py-lg-13 mb-7 mb-md-10 mb-lg-35">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="inner p-3 p-sm-0">
                    <div class="row">
                        <div class="col">
                            <div class="head font-weight-bolder mb-3 mb-md-6 text-center text-white">{{ $block->title }}</div>
                            <div class="h5 font-m font-weight-bold mb-6 mb-md-9 text-center text-white">{{ $block->description }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-8 mb-3 mb-md-0">
                            <div class="tinder-cards">
                                @forelse($automatches as $match)
                                    <div class="card">
                                        <div class="is-like">LIKE</div>
                                        <div class="card--info">
                                            <div class="name">{{ $match->title ?? '' }}</div>
                                            <div class="w-100">
                                                <div class="price mb-1"><span class="currency">$</span> <span class="value">{{ $match->price ?? '' }}</span> / міс.</div>
                                                <a href="{{ $match->link }}">
                                                <div class="btn-arrow btn btn-block">
                                                    <span class="car-properties-preview">{{ $match->description ?? '' }}</span>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="wrap-img">
                                            @if($match->image)
                                                <img class="bg-down" src="{{ $match->imageUrl }}" alt="{{ $match->title ?? 'automatch_' . $loop->iteration }}">
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                {{-- <div class="card">
                                    <div class="is-like">LIKE</div>
                                    <div class="card--info">
                                        <div class="name">Toyota GR86 | 2023</div>
                                        <div class="w-100">
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <div class="btn-arrow btn btn-block">
                                                <span class="car-properties-preview">Бензин, Автомат, Передній привод</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-img">
                                        <img class="bg-down" src="img/scroll-gallery-car-2.jpeg" alt="img">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="is-like">LIKE</div>
                                    <div class="card--info">
                                        <div class="name">Toyota GR86 | 2023</div>
                                        <div class="w-100">
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <div class="btn-arrow btn btn-block">
                                                <span class="car-properties-preview">Бензин, Автомат, Передній привод</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-img">
                                        <img class="bg-down" src="img/scroll-gallery-car-3.jpeg" alt="img">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="is-like">LIKE</div>
                                    <div class="card--info">
                                        <div class="name">Toyota GR86 | 2023</div>
                                        <div class="w-100">
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <div class="btn-arrow btn btn-block">
                                                <span class="car-properties-preview">Бензин, Автомат, Передній привод</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-img">
                                        <img class="bg-down" src="img/scroll-gallery-car-4.jpeg" alt="img">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="is-like">LIKE</div>
                                    <div class="card--info">
                                        <div class="name">Toyota GR86 | 2023</div>
                                        <div class="w-100">
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <div class="btn-arrow btn btn-block">
                                                <span class="car-properties-preview">Бензин, Автомат, Передній привод</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-img">
                                        <img class="bg-down" src="img/scroll-gallery-car-5.jpeg" alt="img">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="is-like">LIKE</div>
                                    <div class="card--info">
                                        <div class="name">Toyota GR86 | 2023</div>
                                        <div class="w-100">
                                            <div class="price mb-1"><span class="currency">$</span> <span class="value">1 080</span> / міс.</div>
                                            <div class="btn-arrow btn btn-block">
                                                <span class="car-properties-preview">Бензин, Автомат, Передній привод</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-img">
                                        <img class="bg-down" src="img/scroll-gallery-car-6.jpeg" alt="img">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-12 col-md-2 col-lg-4">
                            <div class="icons h-100 d-flex align-items-center justify-content-center justify-content-md-start">
                                <div class="tinder-buttons d-flex flex-md-column flex-lg-row align-items-center">
                                    <button type="button" class="i-dislike">
                                        <svg>
                                            <use xlink:href="img/icons/icons.svg#i-dislike"></use>
                                        </svg>
                                    </button>
                                    <button type="button" class="i-favorite" data-toggle="modal" data-target="#popup-tinder">
                                        <svg>
                                            <use xlink:href="img/icons/icons.svg#i-favorite"></use>
                                        </svg>
                                    </button>
                                    <button type="button" class="i-like">
                                        <svg>
                                            <use xlink:href="img/icons/icons.svg#i-like"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal--custom popup-tinder fade" id="popup-tinder" data-keyboard="false" tabindex="-1" aria-labelledby="popup-tinderLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content py-4 px-2 p-md-5">
                <div class="modal-body p-0">
                    <form class="form-popup-tinder" id="tinderForm" autocomplete="off">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex align-items-start justify-content-between mb-3">
                                    <div class="modal-title font-weight-bolder mb-0">Сподобалось авто? <br><span class="text-main-blue">Кермуй його вже сьогодні!</span></div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <svg>
                                                <use xlink:href="img/icons/icons.svg#i-close"></use>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="field mb-3">
                                    <label class="control-label" for="popup-tinder--name">Ваше ім’я</label>
                                    <input type="text" id="popup-tinder---name" name="name" class="form-control mb-3" placeholder="Введіть ім’я" autocomplete="no-autofill-please">
                                    {{-- <div class="field--help-info small-txt text-red mb-2" id="name-error">Введіть Ваше ім’я українськими літерами (кирилицею)</div> --}}
                                </div>
                                <div class="field--help-info small-txt text-red mb-2" id="name_error"></div>
                            </div>
                            <div class="col-12">
                                <div class="field mb-3">
                                    <label class="control-label" for="popup-tinder--phone">Номер телефону</label>
                                    <input type="tel" id="popup-tinder--phone" name="phone" class="form-control mb-3" placeholder="+38 000 0000000" autocomplete="no-autofill-please">
                                    <div class="field--help-info small-txt text-red mb-2" id="phone-error">Введіть Ваш номер телефону</div>
                                </div>
                                <div class="field--help-info small-txt text-red mb-2" id="phone_error"></div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-checkbox position-relative mb-5">
                                    <input type="checkbox" class="custom-control-input" id="check-form-popup-tinder" name="approve">
                                    <label class="custom-control-label" for="check-form-popup-tinder">
                                        <span class="custom-checkbox--info">Я даю згоду на збір, обробку, зберігання та використання своїх <a href="##">персональних даних</a>.</span>
                                    </label>
                                </div>
                                <div class="field--help-info small-txt text-red mb-2" id="approve_error"></div>
                            </div>
                            <input type="hidden" name="page" value="Головна сторінка">
                            <div class="col-12 col-md-auto">
                                <button type="submit" class="btn-modal-close btn-default btn-default-orange btn btn-block btn-orange btn-default text-uppercase">Відправити</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</section>
