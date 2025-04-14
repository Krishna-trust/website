@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">
                {{ @trans('portal.add') }} {{ @trans('messages.labharthi') }}
            </h1>
        </div>
        <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.labharthi.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ @trans('portal.add') }}
                    {{ @trans('messages.labharthi') }}</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.labharthi.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">{{ @trans('portal.name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="mobile_number" class="form-label">{{ @trans('portal.mobile') }}</label>
                                    <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                                        id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"
                                        maxlength="10">
                                    @error('mobile_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="address" class="form-label">{{ @trans('portal.address') }}</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="cast" class="form-label">{{ @trans('portal.cast') }}</label>
                                    <input type="text" class="form-control @error('cast') is-invalid @enderror"
                                        id="cast" name="cast" value="{{ old('cast') }}">
                                    @error('cast')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sub_cast" class="form-label">{{ @trans('portal.sub_cast') }}</label>
                                    <input type="text" class="form-control @error('sub_cast') is-invalid @enderror"
                                        id="sub_cast" name="sub_cast" value="{{ old('sub_cast') }}">
                                    @error('sub_cast')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="native_place"
                                        class="form-label">{{ @trans('portal.native_place') }}</label>
                                    <input type="text" class="form-control @error('native_place') is-invalid @enderror"
                                        id="native_place" name="native_place" value="{{ old('native_place') }}">
                                    @error('native_place')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="adhar_number"
                                        class="form-label">{{ @trans('portal.adhar_number') }}</label>
                                    <input type="text" class="form-control @error('adhar_number') is-invalid @enderror"
                                        id="adhar_number" name="adhar_number" value="{{ old('adhar_number') }}"
                                        pattern="[0-9]{12}" maxlength="12" title="Please enter 12 digits">
                                    @error('adhar_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label d-block">{{ @trans('portal.category') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category" id="category_vidhva"
                                            value="vidhva" {{ old('category') == 'vidhva' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="category_vidhva">{{ @trans('portal.vidhva') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category" id="category_vidhur"
                                            value="vidhur" {{ old('category') == 'vidhur' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="category_vidhur">{{ @trans('portal.vidhur') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category"
                                            id="category_rejected" value="rejected"
                                            {{ old('category') == 'rejected' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="category_rejected">{{ @trans('portal.rejected') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="category"
                                            id="category_other" value="other"
                                            {{ old('category') == 'other' ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="category_other">{{ @trans('portal.other') }}</label>
                                    </div>
                                    @error('category')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="work" class="form-label">{{ @trans('portal.work') }}</label>
                                    <input type="text" class="form-control @error('work') is-invalid @enderror"
                                        id="work" name="work" value="{{ old('work') }}">
                                    @error('work')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="identification_mark"
                                        class="form-label">{{ @trans('portal.identification_mark') }}</label>
                                    <input type="text"
                                        class="form-control @error('identification_mark') is-invalid @enderror"
                                        id="identification_mark" name="identification_mark"
                                        value="{{ old('identification_mark') }}">
                                    @error('identification_mark')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="income_source"
                                        class="form-label">{{ @trans('portal.income_source') }}</label>
                                    <textarea class="form-control @error('income_source') is-invalid @enderror" id="income_source" name="income_source"
                                        rows="3">{{ old('income_source') }}</textarea>
                                    @error('income_source')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="property" class="form-label">{{ @trans('portal.property') }}</label>
                                    <textarea class="form-control @error('property') is-invalid @enderror" id="property" name="property"
                                        rows="3">{{ old('property') }}</textarea>
                                    @error('property')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label for="relative_info"
                                    class="form-label">{{ @trans('portal.relative_info') }}</label>
                                <textarea class="form-control @error('relative_info') is-invalid @enderror" id="relative_info" name="relative_info"
                                    rows="3">{{ old('relative_info') }}</textarea>
                                @error('relative_info')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="col-md-6 mb-3">
                                    <label for="reasion_for_not_working"
                                        class="form-label">{{ @trans('portal.reasion_for_not_working') }}</label>
                                    <textarea class="form-control @error('reasion_for_not_working') is-invalid @enderror" id="reasion_for_not_working"
                                        name="reasion_for_not_working" rows="3">{{ old('reasion_for_not_working') }}</textarea>
                                    @error('reasion_for_not_working')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="reasion_for_tifin"
                                        class="form-label">{{ @trans('portal.reasion_for_tifin') }}</label>
                                    <textarea class="form-control @error('reasion_for_tifin') is-invalid @enderror" id="reasion_for_tifin"
                                        name="reasion_for_tifin" rows="3">{{ old('reasion_for_tifin') }}</textarea>
                                    @error('reasion_for_tifin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="comment_from_trust"
                                        class="form-label">{{ @trans('portal.comment_from_trust') }}</label>
                                    <textarea class="form-control @error('comment_from_trust') is-invalid @enderror" id="comment_from_trust"
                                        name="comment_from_trust" rows="3">{{ old('comment_from_trust') }}</textarea>
                                    @error('comment_from_trust')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tifin_starting_date"
                                        class="form-label">{{ @trans('portal.tifin_starting_date') }}</label>
                                    <input type="date"
                                        class="form-control @error('tifin_starting_date') is-invalid @enderror"
                                        id="tifin_starting_date" name="tifin_starting_date"
                                        value="{{ old('tifin_starting_date') }}">
                                    @error('tifin_starting_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tifin_ending_date"
                                        class="form-label">{{ @trans('portal.tifin_ending_date') }}</label>
                                    <input type="date"
                                        class="form-control @error('tifin_ending_date') is-invalid @enderror"
                                        id="tifin_ending_date" name="tifin_ending_date"
                                        value="{{ old('tifin_ending_date') }}">
                                    @error('tifin_ending_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="reasion_for_tifin_stop"
                                        class="form-label">{{ @trans('portal.reasion_for_tifin_stop') }}</label>
                                    <input type="text"
                                        class="form-control @error('reasion_for_tifin_stop') is-invalid @enderror"
                                        id="reasion_for_tifin_stop" name="reasion_for_tifin_stop"
                                        value="{{ old('reasion_for_tifin_stop') }}">
                                    @error('reasion_for_tifin_stop')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- get location --}}
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('portal.location') }}</label>
                                
                                    <!-- Table -->
                                    <div id="location-table" class="table-responsive" style="margin-top: 10px;">
                                        <table class="table table-bordered w-100">
                                            <thead>
                                                <tr>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td id="lat-value">{{ old('latitude', $labharthi->latitude ?? '-') }}</td>
                                                    <td id="lon-value">{{ old('longitude', $labharthi->longitude ?? '-') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                
                                    <!-- Hidden Inputs -->
                                    <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude', $labharthi->latitude ?? '') }}">
                                    <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude', $labharthi->longitude ?? '') }}">
                                
                                    <!-- Button -->
                                    <button type="button" id="location-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#locationModal">
                                        <i class="fa fa-map-marker"></i>
                                        {{ (old('latitude', $labharthi->latitude ?? '') && old('longitude', $labharthi->longitude ?? '')) ? __('portal.show_location') : __('portal.get_location') }}
                                    </button>
                                </div>                                
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">{{ @trans('portal.save') }}</button>
                                <a href="{{ route('admin.labharthi.index') }}"
                                    class="btn btn-secondary">{{ @trans('portal.cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.location-map')
@endsection
