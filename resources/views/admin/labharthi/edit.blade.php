@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">
            {{ @trans('portal.edit') }} {{ @trans('messages.labharthi') }}
        </h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.labharthi.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ @trans('portal.edit') }} {{ @trans('messages.labharthi') }}</li>
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
                    <form action="{{ route('admin.labharthi.update', $labharthi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">{{ @trans('portal.name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $labharthi->name) }}">
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="mobile_number">{{ @trans('portal.mobile') }}</label>
                                    <input type="text" name="mobile_number" id="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ old('mobile_number', $labharthi->mobile_number) }}" maxlength="10">
                                    @error('mobile_number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">{{ @trans('portal.address') }}</label>
                            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address', $labharthi->address) }}</textarea>
                            @error('address')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="native_place">{{ @trans('portal.native_place') }}</label>
                                    <input type="text" name="native_place" id="native_place" class="form-control @error('native_place') is-invalid @enderror" value="{{ old('native_place', $labharthi->native_place) }}">
                                    @error('native_place')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="cast">{{ @trans('portal.cast') }}</label>
                                    <input type="text" name="cast" id="cast" class="form-control @error('cast') is-invalid @enderror" value="{{ old('cast', $labharthi->cast) }}">
                                    @error('cast')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="sub_cast">{{ @trans('portal.sub_cast') }}</label>
                                    <input type="text" name="sub_cast" id="sub_cast" class="form-control @error('sub_cast') is-invalid @enderror" value="{{ old('sub_cast', $labharthi->sub_cast) }}">
                                    @error('sub_cast')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="adhar_number">{{ @trans('portal.adhar_number') }}</label>
                                    <input type="text" name="adhar_number" id="adhar_number" class="form-control @error('adhar_number') is-invalid @enderror" value="{{ old('adhar_number', $labharthi->adhar_number) }}" maxlength="12">
                                    @error('adhar_number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category">{{ @trans('portal.category') }}</label>
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        <option value="vidhva" {{ old('category', $labharthi->category) == 'vidhva' ? 'selected' : '' }}>{{ @trans('portal.vidhva') }}</option>
                                        <option value="vidhur" {{ old('category', $labharthi->category) == 'vidhur' ? 'selected' : '' }}>{{ @trans('portal.vidhur') }}</option>
                                        <option value="rejected" {{ old('category', $labharthi->category) == 'rejected' ? 'selected' : '' }}>{{ @trans('portal.rejected') }}</option>
                                        <option value="other" {{ old('category', $labharthi->category) == 'other' ? 'selected' : '' }}>{{ @trans('portal.other') }}</option>
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="work">{{ @trans('portal.work') }}</label>
                                    <input type="text" name="work" id="work" class="form-control @error('work') is-invalid @enderror" value="{{ old('work', $labharthi->work) }}">
                                    @error('work')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="identification_mark">{{ @trans('portal.identification_mark') }}</label>
                                    <input type="text" name="identification_mark" id="identification_mark" class="form-control @error('identification_mark') is-invalid @enderror" value="{{ old('identification_mark', $labharthi->identification_mark) }}">
                                    @error('identification_mark')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="income_source">{{ @trans('portal.income_source') }}</label>
                                    <textarea name="income_source" id="income_source" class="form-control @error('income_source') is-invalid @enderror" rows="2">{{ old('income_source', $labharthi->income_source) }}</textarea>
                                    @error('income_source')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="property">{{ @trans('portal.property') }}</label>
                                    <textarea name="property" id="property" class="form-control @error('property') is-invalid @enderror" rows="2">{{ old('property', $labharthi->property) }}</textarea>
                                    @error('property')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="reasion_for_not_working">{{ @trans('portal.reasion_for_not_working') }}</label>
                            <textarea name="reasion_for_not_working" id="reasion_for_not_working" class="form-control @error('reasion_for_not_working') is-invalid @enderror" rows="2">{{ old('reasion_for_not_working', $labharthi->reasion_for_not_working) }}</textarea>
                            @error('reasion_for_not_working')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="reasion_for_tifin">{{ @trans('portal.reasion_for_tifin') }}</label>
                            <textarea name="reasion_for_tifin" id="reasion_for_tifin" class="form-control @error('reasion_for_tifin') is-invalid @enderror" rows="2">{{ old('reasion_for_tifin', $labharthi->reasion_for_tifin) }}</textarea>
                            @error('reasion_for_tifin')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="comment_from_trust">{{ @trans('portal.comment_from_trust') }}</label>
                            <textarea name="comment_from_trust" id="comment_from_trust" class="form-control @error('comment_from_trust') is-invalid @enderror" rows="2">{{ old('comment_from_trust', $labharthi->comment_from_trust) }}</textarea>
                            @error('comment_from_trust')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tifin_starting_date">{{ @trans('portal.tifin_starting_date') }}</label>
                                    <input type="date" name="tifin_starting_date" id="tifin_starting_date"
                                        class="form-control @error('tifin_starting_date') is-invalid @enderror"
                                        value="{{ isset($labharthi->tifin_starting_date) ? \Carbon\Carbon::parse($labharthi->tifin_starting_date)->format('Y-m-d') : old('tifin_starting_date') }}">
                                    @error('tifin_starting_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tifin_ending_date">{{ @trans('portal.tifin_ending_date') }}</label>
                                    <input type="date" name="tifin_ending_date" id="tifin_ending_date" class="form-control @error('tifin_ending_date') is-invalid @enderror" value="{{ isset($labharthi->tifin_ending_date) ? \Carbon\Carbon::parse($labharthi->tifin_ending_date)->format('Y-m-d') : old('tifin_ending_date') }}">
                                    @error('tifin_ending_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="reasion_for_tifin_stop">{{ @trans('portal.reasion_for_tifin_stop') }}</label>
                                    <input type="text" name="reasion_for_tifin_stop" id="reasion_for_tifin_stop" class="form-control @error('reasion_for_tifin_stop') is-invalid @enderror" value="{{ old('reasion_for_tifin_stop', $labharthi->reasion_for_tifin_stop) }}">
                                    @error('reasion_for_tifin_stop')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> {{ @trans('portal.update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endsection
