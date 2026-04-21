@extends('layouts.web')

@section('title', __('messages.about_us') . ' - ' . __('messages.trust_name'))
@section('canonical', 'https://www.krishnaniswarthsevatrust.com/about')
@section('meta_description', 'About Krishna Niswarth Seva Trust — Our mission is to serve elderly & disabled individuals with free daily home-delivered meals in Naranpura, Ahmedabad. 500K+ meals served and 273+ beneficiaries helped. Learn about our team and vision.')
@section('og_description', 'About Krishna Niswarth Seva Trust — Our mission is to serve elderly & disabled individuals with free daily home-delivered meals in Naranpura, Ahmedabad. 500K+ meals served and 273+ beneficiaries helped.')

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
            "name": "About Us",
            "item": "https://www.krishnaniswarthsevatrust.com/about"
        }
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AboutPage",
    "name": "About Krishna Niswarth Seva Trust",
    "url": "https://www.krishnaniswarthsevatrust.com/about",
    "description": "Krishna Niswarth Seva Trust was founded in 2016 by Chandrakantbhai Patel (Chandukaka) with a mission to provide free home-delivered nutritious meals to elderly and disabled individuals living alone in Naranpura, Ahmedabad.",
    "about": {
        "@type": "NGO",
        "name": "Krishna Niswarth Seva Trust",
        "foundingDate": "2016",
        "founder": {
            "@type": "Person",
            "name": "Chandrakantbhai Patel",
            "alternateName": "Chandukaka",
            "jobTitle": "Founder & Trustee"
        }
    },
    "mainEntity": {
        "@type": "NGO",
        "name": "Krishna Niswarth Seva Trust",
        "member": [
            {
                "@type": "OrganizationRole",
                "member": {
                    "@type": "Person",
                    "name": "Chandrakantbhai Patel",
                    "alternateName": "Chandukaka"
                },
                "roleName": "Founder"
            }
        ]
    }
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
                <h1 class="hero-title mb-3">{{ @trans('messages.about_us') }}</h1>
                <p class="hero-desc">{{ @trans('messages.about_us_sub_desc') }}</p>
            </div>
            <div class="col-lg-6" data-reveal="right">
                <div class="hero-image-wrapper">
                    <img src="{{ asset('images/chandukaka.jpg') }}"
                         alt="{{ @trans('messages.about_us') }}"
                         class="hero-image">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     MISSION & VISION
======================== --}}
<section class="section-py">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-6" data-reveal="left">
                <h2 class="section-title mb-4">{{ @trans('messages.mission') }}</h2>
                <p class="lead" style="color: var(--text-body); font-size: 0.98rem; line-height: 1.9;">
                    {{ @trans('messages.mission_desc') }}
                </p>
            </div>
            <div class="col-md-6" data-reveal="right">
                <h2 class="section-title mb-4">{{ @trans('messages.vision') }}</h2>
                <p class="lead" style="color: var(--text-body); font-size: 0.98rem; line-height: 1.9;">
                    {{ @trans('messages.vision_desc') }}
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     OUR IMPACT STATS
======================== --}}
<section style="background: var(--bg-light); padding: 5rem 0;">
    <div class="container">
        <h2 class="text-center section-title mb-5" data-reveal="up">
            {{ @trans('messages.our_impact') }}
        </h2>
        <div class="row g-4 text-center">
            <div class="col-md-4" data-reveal="up" data-reveal-delay="0">
                <div class="stats-card">
                    <span class="stat-number">500K+</span>
                    <p>{{ @trans('messages.meal_served') }}</p>
                </div>
            </div>
            <div class="col-md-4" data-reveal="up" data-reveal-delay="150">
                <div class="stats-card">
                    {{-- <span class="stat-number">{{ $labharthi }}</span> --}}
                    <span class="stat-number">273+</span>
                    <p>{{ @trans('messages.labharthi') }}</p>
                </div>
            </div>
            <div class="col-md-4" data-reveal="up" data-reveal-delay="300">
                <div class="stats-card">
                    <span class="stat-number">50+</span>
                    <p>{{ @trans('messages.medical_cloth_kit') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     TEAM SECTION
======================== --}}
<section class="section-py">
    <div class="container">
        <h2 class="text-center section-title mb-5" data-reveal="up">
            {{ @trans('messages.our_team') }}
        </h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4" data-reveal="up" data-reveal-delay="0">
                <div class="card team-card h-100">
                    <img src="{{ asset('images/trusty6.png') }}"
                         alt="{{ @trans('messages.chandukaka_name') }}"
                         class="team-img">
                    <div class="card-body">
                        <h3 class="card-title">{{ @trans('messages.chandukaka_name') }}</h3>
                        <p class="card-text">{{ @trans('messages.trust_founder') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4" data-reveal="up" data-reveal-delay="150">
                <div class="card team-card h-100">
                    <img src="{{ asset('images/trusty5.png') }}"
                         alt="{{ @trans('messages.vinukaKa_name') }}"
                         class="team-img">
                    <div class="card-body">
                        <h3 class="card-title">{{ @trans('messages.vinukaKa_name') }}</h3>
                        <p class="card-text">{{ @trans('messages.trust_trustees') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4" data-reveal="up" data-reveal-delay="300">
                <div class="card team-card h-100">
                    <img src="{{ asset('images/dhruv_img.png') }}"
                         alt="{{ @trans('messages.dhruv_name') }}"
                         class="team-img">
                    <div class="card-body">
                        <h3 class="card-title">{{ @trans('messages.dhruv_name') }}</h3>
                        <p class="card-text">{{ @trans('messages.trust_it_supporter') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
