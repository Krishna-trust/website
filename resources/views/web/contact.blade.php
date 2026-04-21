@extends('layouts.web')

@section('title', __('messages.contact_us') . ' - ' . __('messages.trust_name'))
@section('canonical', 'https://www.krishnaniswarthsevatrust.com/contact')
@section('meta_description', 'Contact Krishna Niswarth Seva Trust in Naranpura, Ahmedabad. Call +91 98984 45831 / +91 81284 45831 or email krishnasevatrust@gmail.com. Donate online to support free meals for elderly individuals. Find us on Google Maps.')
@section('og_description', 'Contact Krishna Niswarth Seva Trust — Call +91 98984 45831 or +91 81284 45831 or email krishnasevatrust@gmail.com. Donate online to support free meals for elderly individuals in Ahmedabad.')

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
            "name": "Contact Us",
            "item": "https://www.krishnaniswarthsevatrust.com/contact"
        }
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Contact Krishna Niswarth Seva Trust",
    "url": "https://www.krishnaniswarthsevatrust.com/contact",
    "description": "Contact Krishna Niswarth Seva Trust for donations, beneficiary registration, or general enquiries. Located in Naranpura, Ahmedabad, Gujarat.",
    "contactPoint": [
        {
            "@type": "ContactPoint",
            "telephone": "+91-98984-45831",
            "contactType": "customer service",
            "areaServed": "IN",
            "availableLanguage": ["English", "Gujarati"],
            "hoursAvailable": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
                "opens": "07:00",
                "closes": "20:00"
            }
        },
        {
            "@type": "ContactPoint",
            "telephone": "+91-96248-19356",
            "contactType": "customer service",
            "areaServed": "IN",
            "availableLanguage": ["English", "Gujarati"]
        },
        {
            "@type": "ContactPoint",
            "telephone": "+91-81284-45831",
            "contactType": "customer service",
            "areaServed": "IN",
            "availableLanguage": ["English", "Gujarati"]
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
                <span class="contact-hero-badge">{{ __('messages.trust_name') }}</span>
                <h1 class="hero-title mt-3 mb-3">{{ @trans('messages.contact_us') }}</h1>
                <p class="hero-desc mb-4">{{ @trans('messages.contact_us_desc') }}</p>
                <div class="d-flex flex-wrap gap-3">
                    <button class="btn btn-light btn-lg rounded-pill px-4 fw-semibold text-primary"
                        data-bs-toggle="modal" data-bs-target="#donationModal">
                        <i class="bi bi-heart-fill me-2 text-danger"></i>{{ @trans('messages.donate_now') }}
                    </button>
                    <a href="tel:+919898445831" class="btn btn-outline-light btn-lg rounded-pill px-4">
                        <i class="bi bi-telephone me-2"></i>+91 98984 45831
                    </a>
                    <a href="tel:+918128445831" class="btn btn-outline-light btn-lg rounded-pill px-4">
                        <i class="bi bi-telephone me-2"></i>+91 81284 45831
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-reveal="right">
                <div class="hero-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1174&q=80"
                         alt="{{ @trans('messages.contact_us') }}"
                         class="hero-image"
                         loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     CONTACT INFO CARDS
======================== --}}
<section class="section-py">
    <div class="container">
        <div class="text-center mb-5" data-reveal="up">
            <h2 class="section-title">{{ @trans('messages.get_in_touch') }}</h2>
            <p class="section-subtitle">{{ @trans('messages.contact_us_desc') }}</p>
        </div>
        <div class="row g-4">

            {{-- Address --}}
            <div class="col-md-6 col-lg-3" data-reveal="up" data-reveal-delay="0">
                <div class="contact-info-card card h-100">
                    <div class="contact-info-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h3 class="fw-bold mb-2" style="font-size:1.05rem;">{{ @trans('messages.addrress') }}</h3>
                    <p style="color: var(--text-body); font-size: 0.88rem; margin: 0; line-height: 1.7;">
                        {{ @trans('messages.addrress_desc') }}
                    </p>
                </div>
            </div>

            {{-- Phone --}}
            <div class="col-md-6 col-lg-3" data-reveal="up" data-reveal-delay="100">
                <div class="contact-info-card card h-100">
                    <div class="contact-info-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h3 class="fw-bold mb-2" style="font-size:1.05rem;">{{ @trans('messages.phone') }}</h3>
                    <p style="color: var(--text-body); font-size: 0.88rem; margin-bottom: 0.35rem;">
                        <a href="tel:+919898445831" style="color: var(--primary); font-weight:600;">+91 98984 45831</a><br>
                        <a href="tel:+919624819356" style="color: var(--primary); font-weight:600;">+91 96248 19356</a><br>
                        <a href="tel:+918128445831" style="color: var(--primary); font-weight:600;">+91 81284 45831</a>
                    </p>
                    <p style="color: var(--text-muted); font-size: 0.8rem; margin: 0;">
                        {{ @trans('messages.mon_sun') }}
                    </p>
                </div>
            </div>

            {{-- Email --}}
            <div class="col-md-6 col-lg-3" data-reveal="up" data-reveal-delay="200">
                <div class="contact-info-card card h-100">
                    <div class="contact-info-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h3 class="fw-bold mb-2" style="font-size:1.05rem;">{{ @trans('messages.email') }}</h3>
                    <p style="color: var(--text-body); font-size: 0.88rem; margin: 0;">
                        <a href="mailto:krishnasevatrust@gmail.com"
                           style="color: var(--primary); font-weight: 600; word-break: break-word;">
                            krishnasevatrust@gmail.com
                        </a>
                    </p>
                </div>
            </div>

            {{-- Follow Us --}}
            <div class="col-md-6 col-lg-3" data-reveal="up" data-reveal-delay="300">
                <div class="contact-info-card card h-100">
                    <div class="contact-info-icon">
                        <i class="bi bi-share-fill"></i>
                    </div>
                    <h3 class="fw-bold mb-2" style="font-size:1.05rem;">{{ @trans('messages.follow_us') }}</h3>
                    <div class="d-flex justify-content-center gap-3 mt-1">
                        <a href="https://chat.whatsapp.com/IKoFgfff0o64XjKEtutY4P" target="_blank" rel="noopener"
                           class="contact-social-icon" aria-label="WhatsApp" style="color:#25d366;">
                            <i class="bi bi-whatsapp fs-4"></i>
                        </a>
                        <a href="https://www.facebook.com/people/Krishna-Niswarth-Seva-Trust/pfbid02JJW4F82dQP3szekEKW7R3cfHeGLG8jAK8USN19vivRu8dVQJUVwBmzfUZz6Y7FMyl/" target="_blank" rel="noopener"
                           class="contact-social-icon" aria-label="Facebook" style="color:#1877f2;">
                            <i class="bi bi-facebook fs-4"></i>
                        </a>
                        <a href="https://www.youtube.com/@krishnaniswarthsevatrust" target="_blank" rel="noopener"
                           class="contact-social-icon" aria-label="YouTube" style="color:#ff0000;">
                            <i class="bi bi-youtube fs-4"></i>
                        </a>
                        <a href="https://www.instagram.com/krishnaniswarth/" target="_blank" rel="noopener"
                           class="contact-social-icon" aria-label="Instagram" style="color:#e1306c;">
                            <i class="bi bi-instagram fs-4"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ========================
     DONATE CTA BANNER
======================== --}}
<section class="contact-donate-banner">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7" data-reveal="left">
                <h2 class="contact-donate-title">{{ @trans('messages.donate_now') }}</h2>
                <p class="contact-donate-desc">{{ @trans('messages.donate_now_desc') }}</p>
            </div>
            <div class="col-lg-5 text-lg-end" data-reveal="right">
                <button class="btn btn-light btn-lg rounded-pill px-5 fw-bold contact-donate-btn"
                    data-bs-toggle="modal" data-bs-target="#donationModal">
                    <i class="bi bi-heart-fill me-2 text-danger"></i>{{ @trans('messages.donate_now') }}
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     MAP SECTION
======================== --}}
<section class="section-py" style="background: var(--bg-light);">
    <div class="container">
        <div class="text-center mb-5" data-reveal="up">
            <h2 class="section-title">{{ @trans('messages.find_us') }}</h2>
            <p class="section-subtitle">{{ @trans('messages.addrress_desc') }}</p>
        </div>
        <div class="contact-map-wrapper" data-reveal="up">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.043279687615!2d72.54731931530192!3d23.08051769999445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e83556736c135%3A0x7e063934e92372c3!2sKrishna%20Nishwarth%20Seva%20Trust!5e0!3m2!1sen!2sin!4v1680531191000!5m2!1sen!2sin"
                width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" title="Krishna Niswarth Seva Trust Location">
            </iframe>
        </div>
    </div>
</section>

{{-- ========================
     DONATION MODAL
======================== --}}
<div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content donation-modal-content">

            {{-- Gradient Header --}}
            <div class="donation-modal-header">
                <div class="donation-modal-header-icon">
                    <i class="bi bi-heart-fill"></i>
                </div>
                <div>
                    <h5 class="donation-modal-title" id="donationModalLabel">{{ @trans('portal.donation_form') }}</h5>
                    <p class="donation-modal-subtitle">{{ __('messages.trust_name') }}</p>
                </div>
                <button type="button" class="donation-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <div class="modal-body p-0">
                <form action="{{ route('donation.store') }}" method="POST" id="donation-form">
                    @csrf
                    <input type="hidden" name="is_web" value="1">

                    <div class="row g-0">

                        {{-- LEFT: Form Fields --}}
                        <div class="col-lg-7 donation-form-left">

                            <div class="donation-section-label">
                                <i class="bi bi-person-fill"></i> {{ __('portal.donor_name') }} & {{ __('portal.mobile') }}
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <div class="donation-input-group">
                                        <span class="donation-input-icon"><i class="bi bi-person"></i></span>
                                        <div class="flex-grow-1">
                                            <label for="full_name" class="donation-label">{{ @trans('portal.donor_name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="donation-input @error('full_name') is-invalid @enderror"
                                                id="full_name" name="full_name" value="{{ old('full_name') }}"
                                                placeholder="{{ __('portal.donor_name') }}">
                                            @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="donation-input-group">
                                        <span class="donation-input-icon"><i class="bi bi-phone"></i></span>
                                        <div class="flex-grow-1">
                                            <label for="mobile_number" class="donation-label">{{ @trans('portal.mobile') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="donation-input @error('mobile_number') is-invalid @enderror"
                                                id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"
                                                maxlength="10" placeholder="10-digit number">
                                            @error('mobile_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="donation-section-label">
                                <i class="bi bi-currency-rupee"></i> {{ __('portal.amount') }} & {{ __('portal.donation_for') }}
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <div class="donation-input-group">
                                        <span class="donation-input-icon"><i class="bi bi-currency-rupee"></i></span>
                                        <div class="flex-grow-1">
                                            <label for="amount" class="donation-label">{{ @trans('portal.amount') }} (₹) <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01"
                                                class="donation-input @error('amount') is-invalid @enderror"
                                                id="amount" name="amount" value="{{ old('amount') }}" min="0"
                                                placeholder="0.00">
                                            @error('amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="donation-input-group">
                                        <span class="donation-input-icon"><i class="bi bi-tag"></i></span>
                                        <div class="flex-grow-1">
                                            <label for="donation_for" class="donation-label">{{ @trans('portal.donation_for') }} <span class="text-danger">*</span></label>
                                            <select name="donation_for" id="donation_for"
                                                class="donation-input @error('donation_for') is-invalid @enderror">
                                                <option value="">{{ @trans('portal.select_donation_for') }}</option>
                                                <option value="meals">{{ @trans('portal.meals') }}</option>
                                                <option value="medical">{{ @trans('portal.medical') }}</option>
                                                <option value="education">{{ @trans('portal.education') }}</option>
                                                <option value="rasankit">{{ @trans('portal.rasankit') }}</option>
                                                <option value="other">{{ @trans('portal.other') }}</option>
                                            </select>
                                            @error('donation_for')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="donation-section-label">
                                <i class="bi bi-card-text"></i> {{ __('portal.pan_number') }}
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="donation-input-group">
                                        <span class="donation-input-icon"><i class="bi bi-credit-card"></i></span>
                                        <div class="flex-grow-1">
                                            <label for="pan_number" class="donation-label">{{ @trans('portal.pan_number') }}</label>
                                            <input type="text" class="donation-input @error('pan_number') is-invalid @enderror"
                                                id="pan_number" name="pan_number" value="{{ old('pan_number') }}"
                                                pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                                                title="Enter valid PAN (e.g. ABCDE1234F)"
                                                placeholder="ABCDE1234F">
                                            @error('pan_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <p class="donation-pan-note">
                                        <i class="bi bi-info-circle me-1"></i>{{ __('messages.pan_card_compulsory') }}
                                    </p>
                                </div>
                            </div>

                            <div class="donation-section-label">
                                <i class="bi bi-receipt"></i> {{ __('portal.transaction_id') }} & {{ __('portal.transaction_date') }}
                            </div>
                            <div class="row g-3 mb-3 online-fields">
                                <div class="col-sm-6">
                                    <div class="donation-input-group">
                                        <span class="donation-input-icon"><i class="bi bi-hash"></i></span>
                                        <div class="flex-grow-1">
                                            <label for="transaction_id" class="donation-label">{{ @trans('portal.transaction_id') }} <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="donation-input @error('transaction_id') is-invalid @enderror"
                                                id="transaction_id" name="transaction_id" value="{{ old('transaction_id') }}"
                                                placeholder="UTR / Ref. No.">
                                            @error('transaction_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="donation-input-group">
                                        <span class="donation-input-icon"><i class="bi bi-calendar3"></i></span>
                                        <div class="flex-grow-1">
                                            <label for="transaction_date" class="donation-label">{{ @trans('portal.transaction_date') }} <span class="text-danger">*</span></label>
                                            <input type="datetime-local"
                                                class="donation-input @error('transaction_date') is-invalid @enderror"
                                                id="transaction_date" name="transaction_date" value="{{ old('transaction_date') }}">
                                            @error('transaction_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 online-fields">
                                <div class="col-sm-6">
                                    <div class="donation-input-group donation-input-group--textarea">
                                        <span class="donation-input-icon"><i class="bi bi-geo-alt"></i></span>
                                        <div class="flex-grow-1">
                                            <label for="address" class="donation-label">{{ @trans('portal.address') }}</label>
                                            <textarea class="donation-input @error('address') is-invalid @enderror"
                                                id="address" name="address" rows="3"
                                                placeholder="{{ __('portal.address') }}">{{ old('address') }}</textarea>
                                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="donation-input-group donation-input-group--textarea">
                                        <span class="donation-input-icon"><i class="bi bi-chat-left-text"></i></span>
                                        <div class="flex-grow-1">
                                            <label for="comment" class="donation-label">{{ @trans('portal.comment') }}</label>
                                            <textarea class="donation-input @error('comment') is-invalid @enderror"
                                                id="comment" name="comment" rows="3"
                                                placeholder="{{ __('portal.comment') }}">{{ old('comment') }}</textarea>
                                            @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="donation-form-actions">
                                <button type="submit" class="btn-donation-submit">
                                    <i class="bi bi-heart-fill me-2"></i>{{ @trans('portal.save') }}
                                </button>
                                <button type="button" class="btn-donation-cancel" data-bs-dismiss="modal">
                                    {{ @trans('portal.cancel') }}
                                </button>
                            </div>

                        </div>

                        {{-- RIGHT: Scanner + Trust Info --}}
                        <div class="col-lg-5 donation-scanner-panel">
                            <div class="donation-scanner-inner">
                                <p class="donation-scanner-label">
                                    <i class="bi bi-qr-code me-2"></i>Scan &amp; Pay
                                </p>
                                <div class="donation-scanner-card">
                                    <img src="{{ asset('images/scanner.jpg') }}" alt="Payment QR Scanner"
                                         class="donation-scanner-img">
                                </div>
                                <p class="donation-scanner-hint">
                                    Scan the QR code using any UPI app to make your donation securely.
                                </p>

                                <div class="donation-trust-info">
                                    <div class="donation-trust-info-row">
                                        <i class="bi bi-building"></i>
                                        <span>{{ __('messages.trust_name') }}</span>
                                    </div>
                                    <div class="donation-trust-info-row">
                                        <i class="bi bi-telephone"></i>
                                        <span>+91 98984 45831 | +91 81284 45831</span>
                                    </div>
                                    <div class="donation-trust-info-row">
                                        <i class="bi bi-envelope"></i>
                                        <span>krishnasevatrust@gmail.com</span>
                                    </div>
                                    <div class="donation-trust-info-row">
                                        <i class="bi bi-shield-check"></i>
                                        <span>80G Tax Exemption Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session()->has('success'))
<script>
    Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000 })
        .fire({ icon: 'success', text: "{{ session('success') }}" });
</script>
@endif

@if (session()->has('error'))
<script>
    Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000 })
        .fire({ icon: 'error', text: "{{ session('error') }}" });
</script>
@endif

@if ($errors->any())
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () { $('#donationModal').modal('show'); });
</script>
@endif

@endsection
