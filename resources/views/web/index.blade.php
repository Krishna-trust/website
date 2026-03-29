@extends('layouts.web')

@section('title', __('messages.home') . ' - ' . __('messages.trust_name'))

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
<section id="about" class="about-section">
    <div class="container">
        <h2 class="text-center mb-5 section-title" data-reveal="up">
            {{ @trans('messages.about_us') }}
        </h2>
        <div class="row g-4">
            <div class="col-md-6" data-reveal="left">
                <p class="lead">{{ @trans('messages.about_us_desc') }}</p>
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
                        <h5>{{ $service->{app()->getLocale() . '_title'} ?? '' }}</h5>
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
        <div class="row g-3">
            @foreach($contents as $content)
            <div class="col-md-6 col-lg-3" data-reveal="zoom" data-reveal-delay="{{ min($loop->index * 80, 320) }}">
                <div class="gallery-item">
                    <img src="{{ asset('storage/' . $content->image) }}"
                         alt="Impact Image"
                         class="gallery-image"
                         loading="lazy">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

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
                <div class="testimonial-card">
                    <div class="testimonial-image-wrapper">
                        <img src="{{ Storage::url($testimonial->image) }}"
                             alt="{{ $testimonial->{app()->getLocale() . '_name'} ?? 'testimonial' }}"
                             class="testimonial-image"
                             loading="lazy">
                    </div>
                    <p class="testimonial-text">
                        {{ $testimonial->{app()->getLocale() . '_description'} ?? '' }}
                    </p>
                    <p class="testimonial-author">
                        — {{ $testimonial->{app()->getLocale() . '_name'} ?? '' }}
                    </p>
                    <span class="testimonial-post">
                        {{ $testimonial->{app()->getLocale() . '_post'} ?? '' }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
