@extends('layouts.web')

@section('title', __('messages.home') . ' - ' . __('messages.trust_name'))

@section('content')
<!-- Hero Section -->
<section id="home" class="bg-primary text-white py-5">
    <div class="container animate__animated animate__zoomInDown">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3" id="heading">
                    <!-- Feeding Hope, One Meal at a Time -->
                    {{ @trans('messages.main_page_tile') }}
                </h1>
                <p class="lead mb-4" id="heading">
                    <!-- Join us in our mission to provide nutritious meals to those in
                    need and make a difference in our community. -->
                    {{ @trans('messages.main_page_desc') }}
                </p>

            </div>
            <div class="col-lg-6">
                <img src="images/IMG-20201204-WA0019.jpg" alt="Founder Of Trust" height="200px"
                    class="img-fluid rounded-5g shadow-5g hero-image w-100">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 animate__animated animate__bounce ">
    <div class="container">
        <h2 class="text-center mb-5 section-title">{{ @trans('messages.about_us') }}</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <p class="lead">
                    <!-- FoodHope Charity is dedicated to alleviating hunger and promoting nutrition in our
                    community. We believe that no one should go to bed hungry, and we work tirelessly to make this
                    vision a reality. -->
                    {{ @trans('messages.about_us_desc') }}
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <p class="lead">
                    <!-- Through the generous support of our donors and the hard work of our volunteers, we
                    serve thousands of meals each month to those in need, including homeless individuals, low-income
                    families, and elderly citizens. -->
                    {{ @trans('messages.about_us_desc_2') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- yearly services Section -->
<section id="yearly-services" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5 section-title">{{ @trans('messages.yearly_services') }}</h2>
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-md-4 mb-4 animate__animated animate__flipInX">
                <div class="yearly-services-item">
                    <img src="{{ Storage::url($service->image) }}" alt="service" class="img-fluid rounded">
                    <div class="yearly-services-caption">
                        <h5>
                            {{ $service->{app()->getLocale() . '_title'} ?? '' }}
                        </h5>
                        <p>
                            {{ $service->{app()->getLocale() . '_description'} ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- <div class="col-md-4">
                <div class="yearly-services-item">
                    <img src="images/manav-mandir.jpg" alt="Community kitchen" class="img-fluid rounded">
                    <div class="yearly-services-caption">
                        <h5>
                            {{ @trans('messages.manav_mandir_distribution') }}
                        </h5>
                        <p>
                            {{ @trans('messages.manav_mandir_distribution_desc') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="yearly-services-item">
                    <img src="images/kit-vitaran.jpg" alt="Volunteers serve food to needy people
                    " class="img-fluid rounded">
                    <div class="yearly-services-caption">
                        <h5>{{ @trans('messages.kit_distribution') }}
                        </h5>
                        <p>
                            {{ @trans('messages.kit_distribution_desc') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="yearly-services-item">
                    <img src="images/korona-seva.jpg" alt="Community kitchen
                    " class="img-fluid rounded">
                    <div class="yearly-services-caption">
                        <h5>
                            {{ @trans('messages.corona_service') }}
                        </h5>
                        {{ @trans('messages.corona_service_desc') }}
                        </p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 ">
            <h2 class="section-title">{{ @trans('messages.impact') }}</h2>
            <a href="{{ route('impact') }}" class="btn btn-link text-muted">{{ @trans('messages.view_more') }} &rarr;</a>
        </div>
        <div class="row g-4">
            @foreach($contents as $content)
            <div class="col-md-6 col-lg-3 animate__animated animate__rotateIn">
                <img src="{{ asset('storage/' . $content->image) }}" alt="Image" class="img-fluid rounded-lg shadow gallery-image object-fit-sm-contain px-3">
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section bg-light py-5">
    <div class="container">
        <h2 class="text-center section-title mb-5">{{ @trans('messages.what_people_say') }}</h2>
        <div class="row">
            @foreach($testimonials as $testimonial)
            <div class="col-md-4 mb-4 animate__animated animate__jackInTheBox">
                <div class="card h-100 rounded-lg shadow">
                    <div class="testimonial-image-wrapper mb-0">
                        <img src="{{ Storage::url($testimonial->image) }}" alt="testimonial" class="testimonial-image img-fluid  shadow-lg">
                    </div>
                    <div class="card-body">
                        <p class="testimonial-text">{{ $testimonial->{app()->getLocale() . '_description'} ?? '' }}</p>
                        <p class="fw-bold mb-2 text-center">- {{ $testimonial->{app()->getLocale() . '_name'} ?? '' }}</p>
                        <span class="d-flex align-items-center justify-content-center">{{ $testimonial->{app()->getLocale() . '_post'} ?? '' }}</span>
                        <!-- <span class="d-flex align-items-center justify-content-center">proejct</span> -->
                    </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <p class="card-text">{{ @trans('messages.testimonial_1') }}</p>
                        <p class="fw-bold mb-0">- સમીર મોર્ર્વાડિયા</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <p class="card-text">{{ @trans('messages.testimonial_2') }}</p>
                        <p class="fw-bold mb-0">- ધ્રુવ પટેલ</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body">
                        <p class="card-text">{{ @trans('messages.testimonial_3') }}</p>
                        <p class="fw-bold mb-0">- વિનોદભાઈ મિસ્ત્રી</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- Services Section -->
<!-- <section id="services" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">અમારી સેવાઓ</h2>
        <div class="row g-4">
    <div class="col-md-4">
                <div class="card h-100 text-center p-4">
                    <div class="card-body">
                        <div class="services-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h5 class="card-title">દૈનિક ભોજન</h5>
                        <p class="card-text">જરૂરિયાતમંદોને દરરોજ તાજું, પૌષ્ટિક ભોજન પૂરું પાડવું.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-4">
                    <div class="card-body">
                        <div class="services-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h5 class="card-title">સામુદાયિક સહાય</h5>
                        <p class="card-text">ખોરાક સહાય કાર્યક્રમો દ્વારા મજબૂત સમુદાયોનું નિર્માણ.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-4">
                    <div class="card-body">
                        <div class="services-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h5 class="card-title">ખોરાક વિતરણ</h5>
                        <p class="card-text">વૃદ્ધ અને દિવ્યાંગ વ્યક્તિઓને ભોજન પહોંચાડવું.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Contact Section -->
<!-- <section id="contact" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center section-title mb-5">Contact Us</h2>
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card rounded-lg shadow h-100">
                    <div class="card-body p-4">
                        <h3 class="card-title fw-bold mb-4">Send Us a Message</h3>
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
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card rounded-lg shadow h-100">
                    <div class="card-body p-4">
                        <h3 class="card-title fw-bold mb-4">Get in Touch</h3>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                krishna Niswarth Seva Trust 5,6 C/O Gurukrupa Dairy, Sonal Nagar, Opp Old Shivam Gas
                                Agency, chandlodiya,Ahmedaba,<br>Pin - 382481

                            </li>
                            <li class="mb-3">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                +91 9898445831 <br>
                                <i class="bi bi-telephone text-primary me-2"></i>
                                +91 9624819356
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-envelope text-primary me-2"></i>
                                krishnasevatrust@gmail.com
                            </li>
                        </ul>
                        <h4 class="fw-bold mb-3">Follow Us</h4>
                        <div class="d-flex">
                            <a href="https://www.facebook.com/p/Krishna-Niswarth-Seva-Trust-100089656815190/
                                " class="text-primary me-3 fs-4"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.youtube.com/@krishnaniswarthsevatrust
                                " class="text-primary me-3 fs-4"><i class="bi bi-youtube"></i>
                                <a href="https://www.instagram.com/krishnaniswarth
                                " class="text-primary me-3 fs-4"><i class="bi bi-instagram"></i></a>
                                <a href="https://chat.whatsapp.com/IKoFgfff0o64XjKEtutY4P
                                " class="text-primary me-3 fs-4"><i class="bi bi-whatsapp"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->


@endsection
