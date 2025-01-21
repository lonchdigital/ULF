@if(count($car->faqs) > 0)
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
        @foreach($car->faqs as $faq)
            {
                "@type": "Question",
                "name": "{{ $faq->question }}",
                "acceptedAnswer": {
                "@type": "Answer",
                "text": "<p>{{ $faq->answer }}</p>"
                }
            },
        @endforeach
        ]
    }
    </script>
@endif
<section class="asked-questions pb-7 pb-md-10 pb-lg-13">
    <div class="container">
        <div class="row mb-6">
            <div class="col">
                <div class="head font-weight-bolder mb-3 mb-md-6 text-center">{{ trans('web.faqs') }}</div>
                <div class="accordion" id="accordion-asked-questions">
                    @if(count($car->faqs) > 0)
                        @foreach($car->faqs as $faq)
                            <div class="card">
                                <div class="card-header p-0" id="heading-accordion-question-{{ $faq->id }}">
                                    <div class="h4 mb-0">
                                        <div class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-accordion-question-{{ $faq->id }}" aria-expanded="false" aria-controls="collapse-accordion-question-{{ $faq->id }}" role="button">{{ $faq->question }}</div>
                                    </div>
                                </div>
                                <div id="collapse-accordion-question-{{ $faq->id }}" class="collapse" aria-labelledby="heading-accordion-question-{{ $faq->id }}" data-parent="#accordion-asked-questions">
                                    <div class="card-body">{!! $faq->answer !!}</div>
                                </div>
                            </div>
                        @endforeach
                    @elseif(count($commonFaqs) > 0)
                        @foreach($commonFaqs as $faq)
                            <div class="card">
                                <div class="card-header p-0" id="heading-accordion-question-{{ $faq->id }}">
                                    <div class="h4 mb-0">
                                        <div class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-accordion-question-{{ $faq->id }}" aria-expanded="false" aria-controls="collapse-accordion-question-{{ $faq->id }}" role="button">{{ $faq->question }}</div>
                                    </div>
                                </div>
                                <div id="collapse-accordion-question-{{ $faq->id }}" class="collapse" aria-labelledby="heading-accordion-question-{{ $faq->id }}" data-parent="#accordion-asked-questions">
                                    <div class="card-body">{!! $faq->answer !!}</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

{{--                <button type="button" class="btn-more btn btn-block btn-outline-main-blue text-uppercase mt-3 mt-md-6 col-12 col-md-6 col-lg-4 mx-auto">Більше Відповідей</button>--}}

            </div>
        </div>
    </div>
</section>
