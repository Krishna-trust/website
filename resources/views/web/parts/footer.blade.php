<footer class="site-footer">
    <div class="container">
        <div class="row g-4">

            {{-- Trust Info --}}
            <div class="col-lg-4 col-md-6">
                <h5>{{ @trans('messages.trust_name') }}</h5>
                <p class="mb-4">{{ @trans('messages.about_us_desc') }}</p>
                <div class="social-links">
                    <a href="https://chat.whatsapp.com/IKoFgfff0o64XjKEtutY4P" aria-label="WhatsApp" target="_blank" rel="noopener">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="https://www.facebook.com/people/Krishna-Niswarth-Seva-Trust/pfbid02JJW4F82dQP3szekEKW7R3cfHeGLG8jAK8USN19vivRu8dVQJUVwBmzfUZz6Y7FMyl/" aria-label="Facebook" target="_blank" rel="noopener">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.youtube.com/@krishnaniswarthsevatrust" aria-label="YouTube" target="_blank" rel="noopener">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="https://www.instagram.com/krishnaniswarth/?utm_source=qr&igsh=OGpwNnp5YWFqaHg0#" aria-label="Instagram" target="_blank" rel="noopener">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2 col-md-6 col-5">
                <h6>{{ @trans('messages.quick_links') }}</h6>
                <ul class="list-unstyled quick-links">
                    <li><a href="{{ route('about') }}">{{ @trans('messages.about_us') }}</a></li>
                    <li><a href="{{ route('impact') }}">{{ @trans('messages.impact') }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ @trans('messages.contact_us') }}</a></li>
                    <li><a href="{{ route('login') }}">{{ @trans('messages.only_for_trust') }}</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="col-lg-3 col-md-6 col-6">
                <h6>{{ @trans('messages.contact_info') }}</h6>
                <ul class="list-unstyled">
                    <li class="mb-2 d-flex gap-2">
                        <i class="bi bi-geo-alt-fill mt-1 flex-shrink-0" style="color: rgba(255,255,255,0.5);"></i>
                        <span>{{ @trans('messages.addrress_desc') }}</span>
                    </li>
                    <li class="mb-2 d-flex gap-2 align-items-start">
                        <i class="bi bi-telephone-fill mt-1 flex-shrink-0" style="color: rgba(255,255,255,0.5);"></i>
                        <span>{{ @trans('messages.phone_desc') }}</span>
                    </li>
                    <li class="d-flex gap-2 align-items-start">
                        <i class="bi bi-envelope-fill mt-1 flex-shrink-0" style="color: rgba(255,255,255,0.5);"></i>
                        <span>{{ @trans('messages.email_desc') }}</span>
                    </li>
                </ul>
            </div>

            {{-- WhatsApp Subscribe --}}
            <div class="col-lg-3 col-md-6">
                <h6>{{ @trans('messages.join_whatsapp') }}</h6>
                <p class="mb-3">{{ @trans('messages.join_whatsapp_desc') }}</p>

                <div id="successMessage" style="display:none; margin-top: 16px;">
                    <p style="color: rgba(255,255,255,0.9); font-size:0.9rem;">&#128079; {{ @trans('messages.thank_you_message') }}</p>
                </div>

                <form id="subscribeForm" class="subscribe-form">
                    <input type="tel" id="phone" class="form-control"
                        placeholder="{{ @trans('messages.phone') }}"
                        required maxlength="10">
                    <button type="submit" class="btn-subscribe">
                        <i class="bi bi-whatsapp me-2"></i>{{ @trans('messages.join') }}
                    </button>
                </form>
            </div>

        </div>

        <hr class="footer-divider">
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p>&copy; {{ date('Y') }} {{ @trans('messages.trust_name') }}. {{ @trans('messages.all_rights_reserved') }}</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="{{ route('privacy-policy') }}" class="me-3">{{ @trans('messages.privacy_policy') }}</a>
                    <a href="{{ route('terms-and-conditions') }}">{{ @trans('messages.terms_of_service') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
