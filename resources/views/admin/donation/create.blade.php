@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Add New Donation</h4>
                        <a href="{{ route('admin.donation.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                @include('admin.module.donation-form')
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentMode = document.getElementById('payment_mode');
    const chequeFields = document.querySelector('.cheque-fields');
    const onlineFields = document.querySelector('.online-fields');

    paymentMode.addEventListener('change', function() {
        // Hide all payment specific fields first
        chequeFields.classList.add('d-none');
        onlineFields.classList.add('d-none');

        // Show relevant fields based on payment mode
        if (this.value === 'cheque') {
            chequeFields.classList.remove('d-none');
        } else if (this.value === 'online' || this.value === 'upi') {
            onlineFields.classList.remove('d-none');
        }
    });

    // Trigger change event on page load to handle initial state
    paymentMode.dispatchEvent(new Event('change'));
});
</script>
@endpush
@endsection
