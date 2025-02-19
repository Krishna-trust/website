@extends('layouts.web')

@section('title', 'Services - Krishna Niswarth Seva Trust') <!-- Optional: Overriding the title -->

@section('content')
<!-- Services Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3">Our Services</h1>
                <p class="lead">Discover how FoodHope Charity is making a difference in our community.</p>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Grocery distribution" class="img-fluid rounded-lg shadow-lg hero-image w-100">
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-3"><i class="bi bi-cart3 text-primary me-2"></i>Food Distribution</h3>
                        <p class="card-text">We distribute nutritious meals and groceries to individuals and families in need. Our mobile food pantries reach underserved areas in our community.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Weekly grocery packages</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Fresh produce distribution</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Emergency food assistance</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-3"><i class="bi bi-house-door text-primary me-2"></i>Soup Kitchens</h3>
                        <p class="card-text">Our soup kitchens provide hot meals in a welcoming and dignified environment. We serve breakfast and dinner daily to those in need.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Daily hot meals</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Safe and welcoming environment</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Community dining experience</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-3"><i class="bi bi-book text-primary me-2"></i>Nutrition Education</h3>
                        <p class="card-text">We offer workshops on healthy eating and cooking on a budget. Our classes empower individuals to make nutritious choices for themselves and their families.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Cooking classes</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Nutrition workshops</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Meal planning assistance</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-3"><i class="bi bi-people text-primary me-2"></i>Community Outreach</h3>
                        <p class="card-text">We engage with the community through various outreach programs, connecting people with resources and support beyond food assistance.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Resource referrals</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Community events</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Partnerships with local organizations</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center section-title mb-5">What People Say</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <p class="card-text">"FoodHope Charity has been a lifesaver for my family. Their support during tough times meant we never had to worry about our next meal."</p>
                        <p class="fw-bold mb-0">- Sarah J.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <p class="card-text">"The nutrition classes have taught me so much about healthy eating on a budget. It's made a real difference in my life."</p>
                        <p class="fw-bold mb-0">- Michael T.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <p class="card-text">"Volunteering at FoodHope's soup kitchen has opened my eyes to the challenges many face. It's an honor to serve alongside such dedicated individuals."</p>
                        <p class="fw-bold mb-0">- David L.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
