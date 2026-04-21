@extends('layouts.web')

@section('title', __('messages.impact') . ' - ' . __('messages.trust_name'))
@section('canonical', 'https://www.krishnaniswarthsevatrust.com/impact')
@section('meta_description', 'See the real impact of Krishna Niswarth Seva Trust — 500K+ meals delivered, 273+ elderly & disabled beneficiaries in Naranpura, Ahmedabad. Browse our monthly photo gallery of community service and outreach activities.')
@section('og_description', 'See the real impact of Krishna Niswarth Seva Trust — 500K+ meals delivered, 273+ elderly & disabled beneficiaries in Naranpura, Ahmedabad. Browse our monthly gallery.')

@section('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "https://www.krishnaniswarthsevatrust.com/"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Impact",
            "item": "https://www.krishnaniswarthsevatrust.com/impact"
        }
    ]
}
</script>
@endsection

@section('content')

{{-- ========================
     HERO SECTION
======================== --}}
<section class="hero-section text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-reveal="left">
                <h1 class="hero-title mb-3">{{ @trans('messages.impact') }}</h1>
                <p class="hero-desc">{{ @trans('messages.impact_desc') }}</p>
            </div>
            <div class="col-lg-6" data-reveal="right">
                <div class="hero-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"
                         alt="{{ @trans('messages.impact') }}"
                         class="hero-image"
                         loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     MONTHLY GALLERY
======================== --}}
<section id="monthly-gallery" class="section-py">
    <div class="container">
        <h2 class="text-center section-title mb-5" data-reveal="up">{{ @trans('messages.impact') }}</h2>

        @foreach($groupedContents as $month => $contents)
        <div class="month-section" data-reveal="up">
            <h3>{{ $month }}</h3>
            <div class="row g-3">
                @foreach($contents as $content)
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $content->image) }}"
                             alt="{{ @trans('messages.impact') }}"
                             class="gallery-image w-100"
                             loading="lazy">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

    </div>
</section>

@endsection
