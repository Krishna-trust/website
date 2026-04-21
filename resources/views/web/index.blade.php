@extends('layouts.web')

@section('title', __('messages.home') . ' - ' . __('messages.trust_name'))
@section('canonical', 'https://www.krishnaniswarthsevatrust.com/')
@section('meta_description', 'Krishna Niswarth Seva Trust — Free home-delivered meals to 273+ elderly & disabled beneficiaries in Naranpura, Ahmedabad, Gujarat. Donate online to support our free tiffin service. Krishna Niswarth Seva Trust — 50K+ meals served.')
@section('og_description', 'Krishna Niswarth Seva Trust — Free home-delivered meals to 273+ elderly & disabled beneficiaries in Naranpura, Ahmedabad. Donate to support our free tiffin service.')

@section('schema')
@php $isGu = app()->getLocale() === 'gu'; @endphp
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "{{ $isGu ? 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ શું છે?' : 'What is Krishna Niswarth Seva Trust?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $isGu ? 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ એ ૨૦૧૬ માં સ્થપાયેલ નોંધાયેલ NGO છે, જે નારણપુરા, અમદાવાદ, ગુજરાત, ભારતમાં આધારિત છે. ટ્રસ્ટ ૨૭૩+ એકલા રહેતા વૃદ્ધ અને અપંગ વ્યક્તિઓને દરરોજ ઘરે વિનામૂલ્યે પૌષ્ટિક ભોજન પહોંચાડે છે.' : 'Krishna Niswarth Seva Trust is a registered NGO founded in 2016, based in Naranpura, Ahmedabad, Gujarat, India. The trust provides free home-delivered nutritious meals twice daily to 273+ elderly and disabled individuals who live alone and cannot cook for themselves.' }}"
            }
        },
        {
            "@type": "Question",
            "name": "{{ $isGu ? 'ટ્રસ્ટની સેવાઓ કોના માટે છે?' : 'Who can benefit from the trust\'s meal service?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $isGu ? 'અમારી વિનામૂલ્યે ટિફિન સેવા ૬૦ વર્ષ અને તેથી વધુ ઉંમરના એકલા રહેતા વૃદ્ધ અને અપંગ વ્યક્તિઓ માટે ઉપલબ્ધ છે, જેઓ પોતાના માટે રસોઈ બનાવી શકતા નથી.' : 'Our free tiffin service is available to elderly (60+) and disabled individuals from middle-income backgrounds who live alone and cannot cook for themselves in Naranpura and surrounding areas of Ahmedabad.' }}"
            }
        },
        {
            "@type": "Question",
            "name": "{{ $isGu ? 'ટ્રસ્ટ અત્યાર સુધી કેટલા ભોજન પ્રદાન કર્યા છે?' : 'How many meals has the trust served so far?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $isGu ? '૨૦૧૬ માં સ્થાપના થઈ ત્યારથી ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ ૫,૦૦,૦૦૦ (૫ લાખ) થી વધારે પૌષ્ટિક ભોજન પહોંચાડ્યા છે.' : 'Since our founding in 2016, Krishna Niswarth Seva Trust has delivered over 500,000 (5 lakh) nutritious meals to beneficiaries across Ahmedabad.' }}"
            }
        },
        {
            "@type": "Question",
            "name": "{{ $isGu ? 'ટ્રસ્ટને કેવી રીતે દાન આપવું?' : 'How can I donate to support the trust?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $isGu ? 'તમે અમારી વેબસાઇટ પર UPI QR કોડ દ્વારા ઓનલાઇન દાન આપી શકો છો, અથવા E-7, પ્રેમકુંજ સોસાયટી, મીરામ્બિકા સ્કૂલ સામે, નારણપુરા, અમદાવાદ 380013 ખાતે અમારી ઓફિસ પર આવી શકો છો. ₹500 અને વધારેના તમામ દાન ૮૦G આવકવેરા કપાત માટે લાયક છે.' : 'You can donate online via UPI using the QR code on our contact page, or visit our office at E-7, Premkunj Society, Opp. Mirambika School, Naranpura, Ahmedabad 380013. All donations are eligible for 80G income tax deduction. Please provide PAN card details to receive a tax receipt.' }}"
            }
        },
        {
            "@type": "Question",
            "name": "{{ $isGu ? 'શું ભોજન સેવા સંપૂર્ણ મફત છે?' : 'Is the meal service completely free?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $isGu ? 'હા. ભોજન ડિલિવરી સેવા તમામ નોંધાયેલ લાભાર્થીઓ માટે સંપૂર્ણ વિનામૂલ્યે છે. કોઈ ફી ક્યારેય વસૂલ કરવામાં આવતી નથી.' : 'Yes. The meal delivery service is entirely free of charge for all registered beneficiaries. No fees are charged at any time.' }}"
            }
        },
        {
            "@type": "Question",
            "name": "{{ $isGu ? 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ ૮૦G ટેક્સ મુક્તિ ધરાવે છે?' : 'Does Krishna Niswarth Seva Trust have 80G tax exemption?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $isGu ? 'હા. ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટને કરવામાં આવેલ દાન ભારતના આવકવેરા કાયદા હેઠળ ૮૦G આવકવેરા મુક્તિ માટે પાત્ર છે. ટેક્સ રસીદ મેળવવા દાન કરતી વખતે PAN કાર્ડ વિગતો આપો.' : 'Yes. Donations to Krishna Niswarth Seva Trust are eligible for 80G income tax exemption under the Income Tax Act of India. Please provide your PAN card details when donating to receive a tax receipt.' }}"
            }
        },
        {
            "@type": "Question",
            "name": "{{ $isGu ? 'ટ્રસ્ટ દરરોજ ભોજન પૂરું પાડે છે?' : 'Does the trust operate every day of the year?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $isGu ? 'હા. ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ વર્ષના ૩૬૫ દિવસ, બધા જ તહેવારો સહિત, વિના વિક્ષેપ ભોજન પહોંચાડે છે.' : 'Yes. Krishna Niswarth Seva Trust delivers meals 365 days a year, including all holidays and festivals, without interruption.' }}"
            }
        },
        {
            "@type": "Question",
            "name": "{{ $isGu ? 'ટ્રસ્ટ ક્યાં આવેલ છે?' : 'Where is Krishna Niswarth Seva Trust located?' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $isGu ? 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ E-7, પ્રેમકુંજ સોસાયટી, મીરામ્બિકા સ્કૂલ સામે, નારણપુરા, અમદાવાદ, ગુજરાત – 380013, ભારત ખાતે આવેલ છે.' : 'Krishna Niswarth Seva Trust is located at E-7, Premkunj Society, Opp. Mirambika School, Naranpura, Ahmedabad, Gujarat – 380013, India. You can also find us on Google Maps.' }}"
            }
        }
    ]
}
</script>
@endsection

@section('content')
@php $isGu = app()->getLocale() === 'gu'; @endphp

{{-- ========================
     HERO SECTION
======================== --}}
<section id="home" class="hero-section text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-reveal="left">
                <h1 class="hero-title mb-3">
                    {{ @trans('messages.main_page_tile') }}
                </h1>
                <p class="hero-desc mb-4">
                    {{ @trans('messages.main_page_desc') }}
                </p>
            </div>
            <div class="col-lg-6" data-reveal="right">
                <div class="hero-image-wrapper">
                    <img src="{{ asset('images/IMG-20201204-WA0019.jpg') }}"
                         alt="Founder Of Trust"
                         class="hero-image"
                         loading="eager">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     ABOUT SECTION
======================== --}}
<section id="about" class="about-section" itemscope itemtype="https://schema.org/NGO">
    <meta itemprop="name" content="Krishna Niswarth Seva Trust">
    <meta itemprop="url" content="https://www.krishnaniswarthsevatrust.com/">
    <div class="container">
        <h2 class="text-center mb-5 section-title" data-reveal="up">
            {{ @trans('messages.about_us') }}
        </h2>
        <div class="row g-4">
            <div class="col-md-6" data-reveal="left">
                <p class="lead" itemprop="description">{{ @trans('messages.about_us_desc') }}</p>
            </div>
            <div class="col-md-6" data-reveal="right">
                <p class="lead">{{ @trans('messages.about_us_desc_2') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     YEARLY SERVICES SECTION
======================== --}}
<section id="yearly-services" class="services-section">
    <div class="container">
        <h2 class="text-center mb-5 section-title" data-reveal="up">
            {{ @trans('messages.yearly_services') }}
        </h2>
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-md-4" data-reveal="up" data-reveal-delay="{{ min($loop->index * 100, 300) }}">
                <div class="yearly-services-item">
                    <img src="{{ Storage::url($service->image) }}"
                         alt="{{ $service->{app()->getLocale() . '_title'} ?? 'service' }}"
                         loading="lazy">
                    <div class="yearly-services-caption">
                        <h3>{{ $service->{app()->getLocale() . '_title'} ?? '' }}</h3>
                        <p>{{ $service->{app()->getLocale() . '_description'} ?? '' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================
     GALLERY / IMPACT SECTION
======================== --}}
<section id="gallery" class="gallery-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title" data-reveal="left">{{ @trans('messages.impact') }}</h2>
            <a href="{{ route('impact') }}" class="btn btn-outline-primary btn-sm" data-reveal="right">
                {{ @trans('messages.view_more') }} &rarr;
            </a>
        </div>
        <div class="gallery-grid" id="galleryGrid">
            @foreach($contents as $index => $content)
            <div class="gallery-item" data-reveal="zoom" data-reveal-delay="{{ min($loop->index * 60, 300) }}"
                 data-index="{{ $index }}"
                 data-src="{{ asset('storage/' . $content->image) }}"
                 role="button"
                 tabindex="0"
                 aria-label="View image {{ $index + 1 }}">
                <img src="{{ asset('storage/' . $content->image) }}"
                     alt="Impact Image {{ $index + 1 }}"
                     class="gallery-image"
                     loading="lazy">
                <div class="gallery-overlay">
                    <div class="gallery-zoom-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                            <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================
     LIGHTBOX POPUP
======================== --}}
<div id="galleryLightbox" class="lightbox" role="dialog" aria-modal="true" aria-label="Image viewer" hidden>
    <div class="lightbox-backdrop"></div>
    <button class="lightbox-close" id="lightboxClose" aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
    </button>
    <button class="lightbox-nav lightbox-prev" id="lightboxPrev" aria-label="Previous image">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
        </svg>
    </button>
    <button class="lightbox-nav lightbox-next" id="lightboxNext" aria-label="Next image">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
        </svg>
    </button>
    <div class="lightbox-inner">
        <div class="lightbox-spinner" id="lightboxSpinner"></div>
        <img src="" alt="Gallery image" class="lightbox-img" id="lightboxImg">
    </div>
    <div class="lightbox-counter" id="lightboxCounter"></div>
</div>

{{-- ========================
     TESTIMONIALS SECTION
======================== --}}
<section class="testimonials-section">
    <div class="container">
        <h2 class="text-center section-title mb-5" data-reveal="up">
            {{ @trans('messages.what_people_say') }}
        </h2>
        <div class="row g-4">
            @foreach($testimonials as $testimonial)
            <div class="col-md-4" data-reveal="up" data-reveal-delay="{{ min($loop->index * 120, 360) }}">
                <div class="testimonial-card" itemscope itemtype="https://schema.org/Review">
                    <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/Organization">
                        <meta itemprop="name" content="Krishna Niswarth Seva Trust">
                    </div>
                    <div itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                        <meta itemprop="ratingValue" content="5">
                        <meta itemprop="bestRating" content="5">
                    </div>
                    <div class="testimonial-image-wrapper">
                        <img src="{{ Storage::url($testimonial->image) }}"
                             alt="{{ $testimonial->{app()->getLocale() . '_name'} ?? 'testimonial' }}"
                             class="testimonial-image"
                             loading="lazy">
                    </div>
                    <p class="testimonial-text" itemprop="reviewBody">
                        {{ $testimonial->{app()->getLocale() . '_description'} ?? '' }}
                    </p>
                    <p class="testimonial-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                        — <span itemprop="name">{{ $testimonial->{app()->getLocale() . '_name'} ?? '' }}</span>
                    </p>
                    <span class="testimonial-post" itemprop="position">
                        {{ $testimonial->{app()->getLocale() . '_post'} ?? '' }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================
     FAQ SECTION (SEO + GEO)
======================== --}}
<section class="faq-section section-py" id="faq" itemscope itemtype="https://schema.org/FAQPage">
    <div class="container">
        <h2 class="text-center section-title mb-5" data-reveal="up">
            {{ $isGu ? 'વારંવાર પૂછાતા પ્રશ્નો' : 'Frequently Asked Questions' }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="accordion" id="faqAccordion">

                    @php
                    $faqs = $isGu ? [
                        ['q' => 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ શું છે?',
                         'a' => 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ એ ૨૦૧૬ માં સ્થપાયેલ નોંધાયેલ NGO છે, જે નારણપુરા, અમદાવાદ, ગુજરાત, ભારતમાં આધારિત છે. ટ્રસ્ટ ૨૭૩+ એકલા રહેતા વૃદ્ધ અને અપંગ વ્યક્તિઓને દરરોજ ઘરે વિનામૂલ્યે પૌષ્ટિક ભોજન પહોંચાડે છે.'],
                        ['q' => 'ટ્રસ્ટની સેવાઓ કોના માટે છે?',
                         'a' => 'અમારી વિનામૂલ્યે ટિફિન સેવા ૬૦ વર્ષ અને તેથી વધુ ઉંમરના એકલા રહેતા વૃદ્ધ અને અપંગ વ્યક્તિઓ માટે ઉપલબ્ધ છે, જેઓ પોતાના માટે રસોઈ બનાવી શકતા નથી.'],
                        ['q' => 'ટ્રસ્ટ અત્યાર સુધી કેટલા ભોજન પ્રદાન કર્યા છે?',
                         'a' => '૨૦૧૬ માં સ્થાપના થઈ ત્યારથી ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ ૫,૦૦,૦૦૦ (૫ લાખ) થી વધારે પૌષ્ટિક ભોજન પહોંચાડ્યા છે.'],
                        ['q' => 'ટ્રસ્ટને કેવી રીતે દાન આપવું?',
                         'a' => 'તમે અમારી વેબસાઇટ પર UPI QR કોડ દ્વારા ઓનલાઇન દાન આપી શકો છો, અથવા E-7, પ્રેમકુંજ સોસાયટી, મીરામ્બિકા સ્કૂલ સામે, નારણપુરા, અમદાવાદ 380013 ખાતે અમારી ઓફિસ પર આવી શકો છો. ₹500 અને વધારેના તમામ દાન ૮૦G આવકવેરા કપાત માટે લાયક છે.'],
                        ['q' => 'શું ભોજન સેવા સંપૂર્ણ મફત છે?',
                         'a' => 'હા. ભોજન ડિલિવરી સેવા તમામ નોંધાયેલ લાભાર્થીઓ માટે સંપૂર્ણ વિનામૂલ્યે છે. કોઈ ફી ક્યારેય વસૂલ કરવામાં આવતી નથી.'],
                        ['q' => 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ ૮૦G ટેક્સ મુક્તિ ધરાવે છે?',
                         'a' => 'હા. ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટને કરવામાં આવેલ દાન ભારતના આવકવેરા કાયદા હેઠળ ૮૦G આવકવેરા મુક્તિ માટે પાત્ર છે. ટેક્સ રસીદ મેળવવા દાન કરતી વખતે PAN કાર્ડ વિગતો આપો.'],
                        ['q' => 'ટ્રસ્ટ દરરોજ ભોજન પૂરું પાડે છે?',
                         'a' => 'હા. ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ વર્ષના ૩૬૫ દિવસ, બધા જ તહેવારો સહિત, વિના વિક્ષેપ ભોજન પહોંચાડે છે.'],
                        ['q' => 'ટ્રસ્ટ ક્યાં આવેલ છે?',
                         'a' => 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ E-7, પ્રેમકુંજ સોસાયટી, મીરામ્બિકા સ્કૂલ સામે, નારણપુરા, અમદાવાદ, ગુજરાત – 380013, ભારત ખાતે આવેલ છે.'],
                    ] : [
                        ['q' => 'What is Krishna Niswarth Seva Trust?',
                         'a' => 'Krishna Niswarth Seva Trust is a registered NGO founded in 2016, based in Naranpura, Ahmedabad, Gujarat, India. The trust provides free home-delivered nutritious meals twice daily to 273+ elderly and disabled individuals who live alone and cannot cook for themselves.'],
                        ['q' => 'Who can benefit from the trust\'s meal service?',
                         'a' => 'Our free tiffin service is available to elderly (60+) and disabled individuals from middle-income backgrounds who live alone and cannot cook for themselves in Naranpura and surrounding areas of Ahmedabad.'],
                        ['q' => 'How many meals has the trust served so far?',
                         'a' => 'Since our founding in 2016, Krishna Niswarth Seva Trust has delivered over 500,000 (5 lakh) nutritious meals to beneficiaries across Ahmedabad.'],
                        ['q' => 'How can I donate to support the trust?',
                         'a' => 'You can donate online via UPI using the QR code on our contact page, or visit our office at E-7, Premkunj Society, Opp. Mirambika School, Naranpura, Ahmedabad 380013. All donations are eligible for 80G income tax deduction. Please provide PAN card details to receive a tax receipt.'],
                        ['q' => 'Is the meal service completely free?',
                         'a' => 'Yes. The meal delivery service is entirely free of charge for all registered beneficiaries. No fees are charged at any time.'],
                        ['q' => 'Does Krishna Niswarth Seva Trust have 80G tax exemption?',
                         'a' => 'Yes. Donations to Krishna Niswarth Seva Trust are eligible for 80G income tax exemption under the Income Tax Act of India. Please provide your PAN card details when donating to receive a tax receipt.'],
                        ['q' => 'Does the trust operate every day of the year?',
                         'a' => 'Yes. Krishna Niswarth Seva Trust delivers meals 365 days a year, including all holidays and festivals, without interruption.'],
                        ['q' => 'Where is Krishna Niswarth Seva Trust located?',
                         'a' => 'Krishna Niswarth Seva Trust is located at E-7, Premkunj Society, Opp. Mirambika School, Naranpura, Ahmedabad, Gujarat – 380013, India. You can also find us on Google Maps.'],
                    ];
                    @endphp

                    @foreach($faqs as $i => $faq)
                    <div class="accordion-item faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h3 class="accordion-header" id="faqHead{{ $i }}">
                            <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }} faq-btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapse{{ $i }}"
                                    aria-expanded="{{ $i === 0 ? 'true' : 'false' }}"
                                    aria-controls="faqCollapse{{ $i }}"
                                    itemprop="name">
                                {{ $faq['q'] }}
                            </button>
                        </h3>
                        <div id="faqCollapse{{ $i }}"
                             class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}"
                             aria-labelledby="faqHead{{ $i }}"
                             data-bs-parent="#faqAccordion"
                             itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div class="accordion-body faq-body" itemprop="text">
                                {{ $faq['a'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
