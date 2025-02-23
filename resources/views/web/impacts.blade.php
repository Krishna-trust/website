@extends('layouts.web')

@section('title', 'Services - Krishna Niswarth Seva Trust') <!-- Optional: Overriding the title -->

@section('content')
<!-- Services Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3">Our Impact</h1>
                <p class="lead">Thanks to the incredible contributions of our supporters, we’ve highlighted their commitment to our cause.</p>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Grocery distribution" class="img-fluid rounded-lg shadow-lg hero-image w-100">
            </div>
        </div>
    </div>
</section>


<section id="monthly-gallery" class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="section-title">Monthly Impact</h2>
            <a href="#more" class="btn btn-link text-muted">More &rarr;</a>
        </div>

        @foreach($groupedContents as $month => $contents)
        <div class="month-section mb-5">
            <h3>{{ $month }}</h3>
            <div class="row g-4">
                @foreach($contents as $content)
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="{{ asset('storage/' . $content->image) }}" alt="Image" class="img-fluid rounded-lg shadow gallery-image w-100">
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
