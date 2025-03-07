@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">
            {{ @trans('portal.add') }} {{ @trans('messages.donation') }}
        </h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.contents.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ @trans('portal.add') }} {{ @trans('messages.donation') }}</li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif -->
                    @include('admin.module.donation-form')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        console.log('ready');
        const $paymentMode = $('#payment_mode');
        const $chequeFields = $('.cheque-fields');
        const $onlineFields = $('.online-fields');

        console.log($paymentMode);

        // When the payment mode changes
        $paymentMode.change(function() {
            // Hide all payment specific fields first
            $chequeFields.addClass('d-none');
            $onlineFields.addClass('d-none');

            // Show relevant fields based on payment mode
            if ($paymentMode.val() === 'cheque') {
                $chequeFields.removeClass('d-none');
            } else if ($paymentMode.val() === 'online') {
                $onlineFields.removeClass('d-none'); // Show both transaction ID and date fields for online
            }
        });

        // Trigger the change event on page load to handle initial state
        $paymentMode.trigger('change');
    });
</script>
@endsection
