@extends('layouts.web')

@section('title', __('messages.about_us') . ' - ' . __('messages.trust_name'))

@section('content')
<!-- About Us Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3">{{ @trans('messages.about_us') }}</h1>
                <p class="lead">{{ @trans('messages.about_us_sub_desc') }}</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/chandukaka.jpg') }}" alt="About us" class="img-fluid rounded-lg shadow-lg hero-image w-100">
            </div>
        </div>
    </div>
</section>

<!-- Mission and Vision -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <h2 class="section-title mb-4">{{ @trans('messages.mission') }}</h2>
                <p class="lead">
                    {{ @trans('messages.mission_desc') }}
                    <!-- To alleviate hunger and promote nutrition in our community by providing meals and resources to those in need. -->
                </p>
            </div>
            <div class="col-md-6 mb-4">
                <h2 class="section-title mb-4">
                    <!-- Our Vision -->
                    {{ @trans('messages.vision') }}
                </h2>
                <p class="lead">
                    <!-- A world where no one goes to bed hungry, and every individual has access to nutritious food. -->
                    {{ @trans('messages.vision_desc') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Our Impact -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center section-title mb-5">{{ @trans('messages.our_impact') }}</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-primary">500K+</h3>
                        <p class="lead">{{ @trans('messages.meal_served') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-primary">10K+</h3>
                        <p class="lead">{{ @trans('messages.kit_distributed') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <h3 class="display-4 fw-bold text-primary">50+</h3>
                        <p class="lead">{{ @trans('messages.medical_cloth_kit') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center section-title mb-5">{{ @trans('messages.our_team') }}</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <img src="{{ asset('images/chandukaka-image.jpg') }}" alt="Chandrakantbhai Patel" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ @trans('messages.chandukaka_name') }}</h5>
                        <p class="card-text">{{ @trans('messages.trust_founder') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <img src="{{ asset('images/vinukaka_image.jpg') }}" alt="Vinodbhai Mistri" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ @trans('messages.vinukaKa_name') }}</h5>
                        <p class="card-text">{{ @trans('messages.trust_trustees') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <img src="{{ asset('images/dhruv-image.png') }}" alt="Dhruv Patel" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ @trans('messages.dhruv_name') }}</h5>
                        <p class="card-text">{{ @trans('messages.trust_it_supporter') }}</p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3 mb-4">
                    <div class="card h-100 rounded-lg shadow">
                        <img src="" alt="Kathan Patel" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ @trans('messages.kathan_name') }}</h5>
                            <p class="card-text">{{ @trans('messages.trust_technical_supporter') }}</p>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
</section>

@endsection
