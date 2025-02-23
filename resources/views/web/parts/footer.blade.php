<!-- Footer -->
<footer class="bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="fw-bold mb-4">{{ @trans('messages.trust_name') }}</h5>
                <p class="mb-4">
                    {{ @trans('messages.about_us_desc') }}
                </p>
                <div class="social-links">
                    <a href="https://chat.whatsapp.com/IKoFgfff0o64XjKEtutY4P" class="text-white me-3"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.facebook.com/people/Krishna-Niswarth-Seva-Trust/pfbid02JJW4F82dQP3szekEKW7R3cfHeGLG8jAK8USN19vivRu8dVQJUVwBmzfUZz6Y7FMyl/" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.youtube.com/@krishnaniswarthsevatrust" class="text-white me-3"><i class="bi bi-youtube"></i></a>
                    <a href="https://www.instagram.com/krishnaniswarth/?utm_source=qr&igsh=OGpwNnp5YWFqaHg0#" class="text-white"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h6 class="fw-bold mb-4">{{ @trans('messages.quick_links') }}</h6>
                <ul class="list-unstyled">
                    <!-- <li class="mb-2"><a href="index.html" class="text-white text-decoration-none">{{ @trans('messages.home') }}</a></li> -->
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-white text-decoration-none">{{ @trans('messages.about_us') }}</a></li>
                    <!-- <li class="mb-2"><a href="services.html" class="text-white text-decoration-none">{{ @trans('messages.services') }}</a> -->
                    <li class="mb-2"><a href="{{ route('impact') }}" class="text-white text-decoration-none">{{ @trans('messages.impact') }}</a></li>
                    </li>
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-white text-decoration-none">{{ @trans('messages.contact_us') }}</a></li>
                    <li class="mb-2"><a href="{{ route('login') }}" class="text-white text-decoration-none">{{ @trans('messages.only_for_trust') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h6 class="fw-bold mb-4">{{ @trans('messages.contact_info') }}</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>{{ @trans('messages.addrress_desc') }}</li>
                    <li class="mb-2"><i class="bi bi-telephone me-2"></i>{{ @trans('messages.phone_desc') }}</li>
                    <li class="mb-2"><i class="bi bi-envelope me-2"></i>{{ @trans('messages.email_desc') }}</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4">{{ @trans('messages.join_whatsapp') }}</h6>
                <p class="mb-4">{{ @trans('messages.join_whatsapp_desc') }}</p>
                <form id="subscribeForm" class="mb-3 ">
                    <div class="input-group">
                        <input type="tel" id="phone" class="form-control" placeholder="{{ @trans('messages.phone') }}" required maxlength="10">
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">{{ @trans('messages.join') }}</button>
                </form>
            </div>
        </div>
        <hr class="my-4">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p class="mb-0">&copy; {{ date('Y') }} {{ @trans('messages.trust_name') }}. {{ @trans('messages.all_rights_reserved') }}</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="#" class="text-white text-decoration-none me-3">{{ @trans('messages.privacy_policy') }}</a>
                <a href="#" class="text-white text-decoration-none">{{ @trans('messages.terms_of_service') }}</a>
            </div>
        </div>
    </div>
</footer>
