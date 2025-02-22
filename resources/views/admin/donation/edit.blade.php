@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">
            Edit Donation
        </h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.donation.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Donation</li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('admin.donation.update', $donation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="receipt_number" class="form-label">Receipt Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('receipt_number') is-invalid @enderror"
                                    id="receipt_number" name="receipt_number" value="{{ old('receipt_number', $donation->receipt_number) }}">
                                @error('receipt_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    id="date" name="date" value="{{ old('date', $donation->date) }}" required>
                                @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="full_name" class="form-label">Donor Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                    id="full_name" name="full_name" value="{{ old('full_name', $donation->full_name) }}" required>
                                @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="mobile_number" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                                    id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $donation->mobile_number) }}"
                                    pattern="[0-9]{10}" maxlength="10" title="Please enter 10 digits" required>
                                @error('mobile_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" rows="3">{{ old('address', $donation->address) }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="amount" class="form-label">Amount (₹) <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror"
                                    id="amount" name="amount" value="{{ old('amount', $donation->amount) }}" required min="0">
                                @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="donation_for" class="form-label">Donation For <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('donation_for') is-invalid @enderror"
                                    id="donation_for" name="donation_for" value="{{ old('donation_for', $donation->donation_for) }}" required>
                                @error('donation_for')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="pan_number" class="form-label">PAN Number</label>
                                <input type="text" class="form-control @error('pan_number') is-invalid @enderror"
                                    id="pan_number" name="pan_number" value="{{ old('pan_number', $donation->pan_number) }}"
                                    pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" maxlength="10" title="Enter valid PAN number (e.g., ABCDE1234F)">
                                @error('pan_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Payment Mode <span class="text-danger">*</span></label>
                                <select class="form-select @error('payment_mode') is-invalid @enderror"
                                    id="payment_mode"
                                    name="payment_mode"
                                    required>
                                    <option value="">Select Payment Mode</option>
                                    <option value="cash" {{ old('payment_mode', $donation->payment_mode) == 'cash' ? 'selected' : '' }}>Cash</option>
                                    <option value="cheque" {{ old('payment_mode', $donation->payment_mode) == 'cheque' ? 'selected' : '' }}>Cheque</option>
                                    <option value="online" {{ old('payment_mode', $donation->payment_mode) == 'online' ? 'selected' : '' }}>Online Transfer</option>
                                </select>
                                @error('payment_mode')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Payment Details (Conditional) -->
                            <div id="payment_details">
                                <div class="row cheque-fields d-none">
                                    <div class="col-md-4 mb-3">
                                        <label for="cheque_number" class="form-label">Cheque Number</label>
                                        <input type="text" class="form-control @error('cheque_number') is-invalid @enderror"
                                            id="cheque_number" name="cheque_number" value="{{ old('cheque_number', $donation->cheque_number) }}">
                                        @error('cheque_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control @error('bank_name') is-invalid @enderror"
                                            id="bank_name" name="bank_name" value="{{ old('bank_name', $donation->bank_name) }}">
                                        @error('bank_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="cheque_date" class="form-label">Cheque Date</label>
                                        <input type="date" class="form-control @error('cheque_date') is-invalid @enderror"
                                            id="cheque_date" name="cheque_date" value="{{ old('cheque_date', $donation->cheque_date) }}">
                                        @error('cheque_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row online-fields d-none">
                                    <div class="col-md-6 mb-3">
                                        <label for="transaction_id" class="form-label">Transaction ID</label>
                                        <input type="text"
                                            class="form-control @error('transaction_id') is-invalid @enderror"
                                            id="transaction_id" name="transaction_id"
                                            value="{{ old('transaction_id', $donation->transaction_id) }}">
                                        @error('transaction_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="transaction_date" class="form-label">Transaction Date</label>
                                        <input type="date"
                                            class="form-control @error('transaction_date') is-invalid @enderror"
                                            id="transaction_date" name="transaction_date"
                                            value="{{ old('transaction_date', $donation->transaction_date) }}">
                                        @error('transaction_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control @error('comment') is-invalid @enderror"
                                    id="comment" name="comment" rows="3">{{ old('comment', $donation->comment) }}</textarea>
                                @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update Donation</button>
                            <a href="{{ route('admin.donation.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        console.log('Document is ready'); // Debugging log

        const $paymentMode = $('#payment_mode');
        const $chequeFields = $('.cheque-fields');
        const $onlineFields = $('.online-fields');

        console.log('Selected Payment Mode: ', $paymentMode.val());
        // Ensure the initial payment mode selection is respected
        if ($paymentMode.val()) {
            handlePaymentModeChange($paymentMode.val());
        }

        // When the payment mode changes
        $paymentMode.change(function() {
            const selectedMode = $(this).val();
            handlePaymentModeChange(selectedMode);
        });

        // Function to handle the visibility of payment mode fields
        function handlePaymentModeChange(mode) {
            // Hide both payment-specific fields first
            $chequeFields.addClass('d-none');
            $onlineFields.addClass('d-none');

            // Show relevant fields based on payment mode
            if (mode === 'cheque') {
                $chequeFields.removeClass('d-none');
            } else if (mode === 'online') {
                $onlineFields.removeClass('d-none'); // Show both transaction ID and date fields for online
            }
        }
    });
</script>

@endsection
