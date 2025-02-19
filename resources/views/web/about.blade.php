@extends('layouts.web')

@section('title', 'About - Krishna Niswarth Seva Trust') <!-- Optional: Overriding the title -->

@section('content')
    <!-- About Us Hero Section -->
    <section class="bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-3">Our Story</h1>
                    <p class="lead">Learn about FoodHope Charity's journey and the impact we've made in our community.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Food donation" class="img-fluid rounded-lg shadow-lg hero-image w-100">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission and Vision -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h2 class="section-title mb-4">Our Mission</h2>
                    <p class="lead">To alleviate hunger and promote nutrition in our community by providing meals and resources to those in need.</p>
                </div>
                <div class="col-md-6 mb-4">
                    <h2 class="section-title mb-4">Our Vision</h2>
                    <p class="lead">A world where no one goes to bed hungry, and every individual has access to nutritious food.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Impact -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center section-title mb-5">Our Impact</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 rounded-lg shadow">
                        <div class="card-body">
                            <h3 class="display-4 fw-bold text-primary">500K+</h3>
                            <p class="lead">Meals Served</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 rounded-lg shadow">
                        <div class="card-body">
                            <h3 class="display-4 fw-bold text-primary">10K+</h3>
                            <p class="lead">Volunteers</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 rounded-lg shadow">
                        <div class="card-body">
                            <h3 class="display-4 fw-bold text-primary">50+</h3>
                            <p class="lead">Community Partners</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center section-title mb-5">Our Team</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 rounded-lg shadow">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Jane Doe" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Jane Doe</h5>
                            <p class="card-text">Executive Director</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 rounded-lg shadow">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="John Smith" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">John Smith</h5>
                            <p class="card-text">Operations Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 rounded-lg shadow">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80" alt="Emily Brown" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Emily Brown</h5>
                            <p class="card-text">Volunteer Coordinator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
