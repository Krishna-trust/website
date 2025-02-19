@extends('layouts.web')

@section('title', 'Contact - Krishna Niswarth Seva Trust') <!-- Optional: Overriding the title -->

@section('content')

<!-- Contact Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3">Contact Us</h1>
                <p class="lead">Get in touch with us for any questions, concerns, or to learn more about how you can help.</p>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1174&q=80" alt="Contact Us" class="img-fluid rounded-lg shadow-lg hero-image w-100">
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card rounded-lg shadow">
                    <div class="card-body p-5">
                        <h2 class="text-center section-title mb-4">Send Us a Message</h2>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center section-title mb-5">Get in Touch</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-geo-alt text-primary fs-1 mb-3"></i>
                        <h3 class="card-title fw-bold mb-3">Address</h3>
                        <p class="card-text">123 Charity St, Cityville,<br>State 12345, USA</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-telephone text-primary fs-1 mb-3"></i>
                        <h3 class="card-title fw-bold mb-3">Phone</h3>
                        <p class="card-text">+1 (123) 456-7890</p>
                        <p class="card-text">Mon-Fri, 9am-5pm EST</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-envelope text-primary fs-1 mb-3"></i>
                        <h3 class="card-title fw-bold mb-3">Email</h3>
                        <p class="card-text">info@foodhope.org</p>
                        <p class="card-text">support@foodhope.org</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center section-title mb-5">Find Us</h2>
        <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2176767606325!2d-73.98823492396789!3d40.748440537932896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1685123456789!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
@endsection
