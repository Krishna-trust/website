@extends('layouts.web')

@section('title', 'Home - Krishna Niswarth Seva Trust') <!-- Optional: Overriding the title -->

@section('content')
<!-- Hero Section -->
<section id="home" class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3" id="heading">Feeding Hope, One Meal at a Time</h1>
                <p class="lead mb-4" id="heading">Join us in our mission to provide nutritious meals to those in
                    need and make a difference in our community.</p>
                <button class="btn btn-light btn-lg rounded-pill me-3 mb-3" data-bs-toggle="modal"
                    data-bs-target="#donationModal">Donate Now</button>

            </div>
            <div class="col-lg-6">
                <img src="images/IMG-20201204-WA0019.jpg" alt="Founder Of Trust" height="200px"
                    class="img-fluid rounded-5g shadow-5g hero-image w-100">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 section-title">About FoodHope Charity</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <p class="lead">FoodHope Charity is dedicated to alleviating hunger and promoting nutrition in our
                    community. We believe that no one should go to bed hungry, and we work tirelessly to make this
                    vision a reality.</p>
            </div>
            <div class="col-md-6 mb-3">
                <p class="lead">Through the generous support of our donors and the hard work of our volunteers, we
                    serve thousands of meals each month to those in need, including homeless individuals, low-income
                    families, and elderly citizens.</p>
            </div>
        </div>
    </div>
</section>

<!-- yearly services Section -->
<section id="yearly-services" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5 section-title">Our yearly services</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="yearly-services-item">
                    <img src="images/kit-vitaran.jpg" alt="Volunteers serve food to needy people
                    " class="img-fluid rounded">
                    <div class="yearly-services-caption">
                        <h5>Kit Distribution
                        </h5>
                        <p>
                            Our volunteers serve food with love
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="yearly-services-item">
                    <img src="images/korona-seva.jpg" alt="Community kitchen
                    " class="img-fluid rounded">
                    <div class="yearly-services-caption">
                        <h5>Corona Service
                        </h5>
                        <p>Meals prepared and distributed fresh daily.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="yearly-services-item">
                    <img src="images/sv.jpg" alt="Food package
                    " class="img-fluid rounded">
                    <div class="yearly-services-caption">
                        <h5>Food package distribution
                        </h5>
                        <p>Annual grocery delivery to needy people.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 section-title">Our Impact</h2>
        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                <img src="images/content1.jpg" alt="Serving meals"
                    class="img-fluid rounded-lg shadow gallery-image w-100">
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <img src="images/content2.jpg" alt="Food preparation"
                    class="img-fluid rounded-lg shadow gallery-image w-100">
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <img src="images/content3.jpg" alt="Community dinner"
                    class="img-fluid rounded-lg shadow gallery-image w-100">
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <img src="images/content4.jpg" alt="Grocery distribution"
                    class="img-fluid rounded-lg shadow gallery-image w-100">
            </div>
            <!-- <div class="col-6 col-md-4 col-lg-3">
                    <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Volunteer team" class="img-fluid rounded-lg shadow gallery-image w-100">
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="https://images.unsplash.com/photo-1564844536311-de546a28c87d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Cooking class" class="img-fluid rounded-lg shadow gallery-image w-100">
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Food donation" class="img-fluid rounded-lg shadow gallery-image w-100">
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="https://images.unsplash.com/photo-1578357078586-491adf1aa5ba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="Happy recipients" class="img-fluid rounded-lg shadow gallery-image w-100">
                </div> -->
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5">
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
</section>

<!-- Contact Section -->
<section id="contact" class="py-5 bg-light">
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
</section>

<!-- Donation Modal -->
<div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="donationModalLabel">Make a Donation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Receipt Number -->
                        <div class="col-md-6 mb-3">
                            <label for="receipt_number" class="form-label">Receipt Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('receipt_number') is-invalid @enderror"
                                id="receipt_number" name="receipt_number"
                                value="{{ old('receipt_number', $nextReceiptNumber) }}" readonly>
                            @error('receipt_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date -->
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                name="date" value="{{ old('date', date('Y-m-d')) }}" required>
                            @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Donor Name -->
                        <div class="col-md-6 mb-3">
                            <label for="full_name" class="form-label">Donor Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                            @error('full_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mobile Number -->
                        <div class="col-md-6 mb-3">
                            <label for="mobile_number" class="form-label">Mobile Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                                id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"
                                pattern="[0-9]{10}" title="Please enter 10 digits" required>
                            @error('mobile_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="col-md-12 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" rows="3">{{ old('address') }}</textarea>
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Amount -->
                        <div class="col-md-6 mb-3">
                            <label for="amount" class="form-label">Amount (₹) <span
                                    class="text-danger">*</span></label>
                            <input type="number" step="0.01"
                                class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount"
                                value="{{ old('amount') }}" required min="0">
                            @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Donation For -->
                        <div class="col-md-6 mb-3">
                            <label for="donation_for" class="form-label">Donation For <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('donation_for') is-invalid @enderror"
                                id="donation_for" name="donation_for" value="{{ old('donation_for') }}" required>
                            @error('donation_for')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- PAN Number -->
                        <div class="col-md-6 mb-3">
                            <label for="pan_number" class="form-label">PAN Number</label>
                            <input type="text" class="form-control @error('pan_number') is-invalid @enderror"
                                id="pan_number" name="pan_number" value="{{ old('pan_number') }}"
                                pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                                title="Enter valid PAN number (e.g., ABCDE1234F)">
                            @error('pan_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Payment Mode -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Payment Mode <span class="text-danger">*</span></label>
                            <select class="form-select @error('payment_mode') is-invalid @enderror"
                                id="payment_mode" name="payment_mode" required>
                                <option value="">Select Payment Mode</option>
                                <option value="cash" {{ old('payment_mode')=='cash' ? 'selected' : '' }}>Cash
                                </option>
                                <option value="cheque" {{ old('payment_mode')=='cheque' ? 'selected' : '' }}>Cheque
                                </option>
                                    <option value="online" {{ old('payment_mode')=='online' ? 'selected' : '' }}>Online
                                        Transfer</option>
                            </select>
                            @error('payment_mode')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Payment Details (Conditional) -->
                        <div id="payment_details">
                            <!-- Cheque Fields -->
                            <div class="row cheque-fields d-none">
                                <div class="col-md-4 mb-3">
                                    <label for="cheque_number" class="form-label">Cheque
                                        Number</label>
                                    <input type="text"
                                        class="form-control @error('cheque_number') is-invalid @enderror"
                                        id="cheque_number" name="cheque_number" value="{{ old('cheque_number') }}">
                                    @error('cheque_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" class="form-control @error('bank_name') is-invalid @enderror"
                                        id="bank_name" name="bank_name" value="{{ old('bank_name') }}">
                                    @error('bank_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="cheque_date" class="form-label">Cheque Date</label>
                                    <input type="date"
                                        class="form-control @error('cheque_date') is-invalid @enderror"
                                        id="cheque_date" name="cheque_date" value="{{ old('cheque_date') }}">
                                    @error('cheque_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Online Payment Fields -->
                            <div class="row online-fields d-none">
                                <div class="col-md-6 mb-3">
                                    <label for="transaction_id" class="form-label">Transaction
                                        ID</label>
                                    <input type="text"
                                        class="form-control @error('transaction_id') is-invalid @enderror"
                                        id="transaction_id" name="transaction_id"
                                        value="{{ old('transaction_id') }}">
                                    @error('transaction_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="transaction_date" class="form-label">Transaction
                                        Date</label>
                                    <input type="datetime-local"
                                        class="form-control @error('transaction_date') is-invalid @enderror"
                                        id="transaction_date" name="transaction_date"
                                        value="{{ old('transaction_date') }}">
                                    @error('transaction_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Comment -->
                        <div class="col-md-12 mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment"
                                name="comment" rows="3">{{ old('comment') }}</textarea>
                            @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Create Donation</button>
                        <a href="{{ route('admin.donation.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
