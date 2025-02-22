@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">
            Add Donation
        </h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.contents.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Donation</li>
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
