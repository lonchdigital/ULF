<section class="subscription-features-content bg-main-blue pb-7 pb-md-10">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="h1 font-weight-bolder text-white text-center pt-7 pt-md-10 pb-2 pb-md-7 mb-0">{{ trans('web.subscribe_benefits') }}</div>
                <div class="subscription-features mb-5">
                    @foreach($subscribeBenefits as $subscribeBenefit)
                        <div class="subscription-features--item">
                            <div class="inner">{!! $subscribeBenefit->title !!}</div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn-more btn-default btn-default-white btn btn-block btn-outline-white text-center text-uppercase mt-2">{{ trans('web.show_more') }}</button>
            </div>
        </div>
    </div>
</section>
