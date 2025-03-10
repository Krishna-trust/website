@extends('layouts.web')

@section('title', __('messages.labharthi') . ' - ' . __('messages.trust_name'))

@section('content')
<!-- About Us Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-3">{{ @trans('messages.labharthi_list_desc') }}</h1>
                <p class="lead">{{ @trans('messages.labharthi_list_sub_desc') }}</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/list-image.jpg') }}" alt="About us" class="img-fluid rounded-lg shadow-lg hero-image w-100 rounded">
            </div>
        </div>
    </div>
</section>

<!-- Our Labharthi -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center section-title mb-5">{{ @trans('messages.labharthi') }}</h2>
        <!-- Beautiful Bootstrap Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>{{ @trans('messages.name') }}</th>
                        <th>{{ @trans('messages.address') }}</th>
                        <!-- <th>{{ @trans('messages.work') }}</th> -->
                        <!-- <th>{{ @trans('messages.status') }}</th> -->
                    </tr>
                </thead>
                <tbody>
                    @if(!$labharthi)
                    <tr>
                        <td colspan="3">{{ @trans('messages.no_content') }}</td>
                    </tr>
                    @else
                    @foreach($labharthi as $labharthi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $labharthi->name }}</td>
                        <td>{{ $labharthi->address }}</td>
                        <!-- <td>{{ $labharthi->work }}</td> -->
                        <!-- <td><span class="badge bg-primary">{{ $labharthi->status }}</span></td> -->
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
