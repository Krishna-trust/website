@extends('layouts.web')

@section('title', __('messages.home') . ' - ' . __('messages.trust_name'))
@section('canonical', 'https://www.krishnaniswarthsevatrust.com/')
@section('meta_description', 'Krishna Niswarth Seva Trust — Free home-delivered meals to 273+ elderly & disabled beneficiaries in Naranpura, Ahmedabad, Gujarat. Donate online to support our free tiffin service. Krishna Niswarth Seva Trust — 50K+ meals served.')
@section('og_description', 'Krishna Niswarth Seva Trust — Free home-delivered meals to 273+ elderly & disabled beneficiaries in Naranpura, Ahmedabad. Donate to support our free tiffin service.')

@section('content')

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

@endsection
