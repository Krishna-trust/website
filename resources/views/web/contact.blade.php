@extends('layouts.web')

@section('title', __('messages.contact_us') . ' - ' . __('messages.trust_name'))

@section('content')

<!-- Contact Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3">{{ @trans('messages.contact_us') }}</h1>
                <p class="lead">{{ @trans('messages.contact_us_desc') }}</p>
                <button class="btn btn-light btn-lg rounded-pill me-3 mb-3 text-danger" data-bs-toggle="modal"
                    data-bs-target="#donationModal">
                    {{ @trans('messages.donate_now') }}
                </button>
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
                    <div class="card-body p-lg-5 p-sm-2">
                        <h2 class="text-center section-title mb-4">{{ @trans('messages.send_us_a_message') }}</h2>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            <!-- <form id="contactForm" action="{{ route('contact.store') }}" method="POST"> -->
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ @trans('messages.name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ @trans('messages.email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3" id="mobile">
                                <label for="mobile" class="form-label">{{ @trans('messages.mobile') }}</label>
                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}" maxlength="10">
                                @error('mobile')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">{{ @trans('messages.subject') }}</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}">
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">{{ @trans('messages.message') }}</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">{{ @trans('messages.send_message') }}</button>
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
        <h2 class="text-center section-title mb-5">{{ @trans('messages.get_in_touch') }}</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-geo-alt text-primary fs-1 mb-3"></i>
                        <h3 class="card-title fw-bold mb-3">{{ @trans('messages.addrress') }}</h3>
                        <p class="card-text mx-3">
                            {{ @trans('messages.addrress_desc') }}
                            <!-- Krishna Niswarth Seva Trust,<br>5, 6th Cross, Opp. Old Shivam Gas Agency,<br>Chandlodiya, Ahmedabad, India, 382481 -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-telephone text-primary fs-1 mb-3"></i>
                        <h3 class="card-title fw-bold mb-3">{{ @trans('messages.phone') }}</h3>
                        <p class="card-text">
                            +91 98984 45831,
                            +91 96248 19356
                        </p>
                        <p class="card-text">
                            {{ @trans('messages.mon_sun') }}
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded-lg shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-envelope text-primary fs-1 mb-3"></i>
                        <h3 class="card-title fw-bold mb-3">{{ @trans('messages.email') }}</h3>
                        <p class="card-text">krishnasevatrust@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center section-title mb-5">{{ @trans('messages.find_us') }}</h2>
        <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.043279687615!2d72.54731931530192!3d23.08051769999445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e83556736c135%3A0x7e063934e92372c3!2sKrishna%20Nishwarth%20Seva%20Trust!5e0!3m2!1sen!2sin!4v1680531191000!5m2!1sen!2sin" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<!-- Donation Modal -->
<div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="donationModalLabel">{{ @trans('portal.donation_form') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('donation.store') }}" method="POST" id="donation-form">
                    @csrf
                    <div class="row">
                        <!-- Donor Name -->
                        <input type="hidden" name="is_web" value="1">
                        <div class="col-md-6 mb-3">
                            <label for="full_name" class="form-label">{{ @trans('portal.donor_name') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                id="full_name" name="full_name" value="{{ old('full_name') }}">
                            @error('full_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mobile Number -->
                        <div class="col-md-6 mb-3">
                            <label for="mobile_number" class="form-label">{{ @trans('portal.mobile') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                                id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"
                                title="Please enter 10 digits" maxlength="10">
                            @error('mobile_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Amount -->
                        <div class="col-md-6 mb-3">
                            <label for="amount" class="form-label">{{ @trans('portal.amount') }} (₹)<span
                                    class="text-danger">*</span></label>
                            <input type="number" step="0.01"
                                class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount"
                                value="{{ old('amount') }}" min="0">
                            @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Donation For -->
                        <div class="col-md-6 mb-3">
                            <label for="donation_for" class="form-label">{{ @trans('portal.donation_for') }} <span
                                    class="text-danger">*</span></label>
                            <select name="donation_for" id="donation_for" class="form-select @error('donation_for') is-invalid @enderror">
                                <option value="">{{ @trans('portal.select_donation_for') }}</option>
                                <option value="meals">{{ @trans('portal.meals') }}</option>
                                <option value="medical">{{ @trans('portal.medical') }}</option>
                                <option value="education">{{ @trans('portal.education') }}</option>
                                <option value="rasankit">{{ @trans('portal.rasankit') }}</option>
                                <option value="other">{{ @trans('portal.other') }}</option>
                            </select>
                            @error('donation_for')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- PAN Number -->
                        <div class="col-md-6 mb-3">
                            <label for="pan_number" class="form-label">{{ @trans('portal.pan_number') }} <span class="text-success">*{{ __('messages.pan_card_compulsory') }}</span></label>
                            <input type="text" class="form-control @error('pan_number') is-invalid @enderror"
                                id="pan_number" name="pan_number" value="{{ old('pan_number') }}"
                                pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                                title="Enter valid PAN number (e.g., ABCDE1234F)">
                            @error('pan_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Online Payment Fields -->
                        <div class="row online-fields ">
                            <div class="col-md-6 mb-3">
                                <label for="transaction_id" class="form-label">{{ @trans('portal.transaction_id') }} <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('transaction_id') is-invalid @enderror"
                                    id="transaction_id" name="transaction_id"
                                    value="{{ old('transaction_id') }}">
                                @error('transaction_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="transaction_date" class="form-label">{{ @trans('portal.transaction_date') }} <span class="text-danger">*</span></label>
                                <input type="datetime-local"
                                    class="form-control @error('transaction_date') is-invalid @enderror"
                                    id="transaction_date" name="transaction_date"
                                    value="{{ old('transaction_date') }}">
                                @error('transaction_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row online-fields ">
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">{{ @trans('portal.address') }}</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                    name="address" rows="3">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Comment -->
                            <div class="col-md-6 mb-3">
                                <label for="comment" class="form-label">{{ @trans('portal.comment') }}</label>
                                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment"
                                    name="comment" rows="3">{{ old('comment') }}</textarea>
                                @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('images/scanner.jpg') }}" alt="scanner" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">{{ @trans('portal.save') }}</button>
                        <a href="{{ route('admin.donation.index') }}" class="btn btn-secondary">{{ @trans('portal.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session()->has('success'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
    })
    Toast.fire({
        icon: 'success',
        text: "{{ session('success') }}",
    })
</script>
@endif

@if (session()->has('error'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
    })
    Toast.fire({
        icon: 'error',
        text: "{{ session('error') }}",
    })
</script>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@if ($errors->any())
<script>
    $(document).ready(function() {
        $('#donationModal').modal('show');
    });
</script>
@endif

<script>
    $(document).ready(function() {
        console.log('ready');
        // date formate
        function formatDate(date) {
            let d = new Date(date);
            let day = String(d.getDate()).padStart(2, '0');
            let month = String(d.getMonth() + 1).padStart(2, '0'); // Month is 0-indexed
            let year = d.getFullYear();
            return `${day}/${month}/${year}`;
        }

        // When the date changes, update the formatted display
        $('#date').on('change', function() {
            let selectedDate = $(this).val();
            let formattedDate = formatDate(selectedDate);
            // $('#formattedDate').text(`Selected Date: ${formattedDate}`); // Display formatted date outside the input field
        });

        // Format and display the initial date if pre-filled
        let initialDate = $('#date').val();
        if (initialDate) {
            let formattedInitialDate = formatDate(initialDate);
            // $('#formattedDate').text(`Selected Date: ${formattedInitialDate}`); // Display formatted date on page load
        }
    });
</script>

@endsection
