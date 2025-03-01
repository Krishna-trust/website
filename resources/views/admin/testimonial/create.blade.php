@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">
            {{ @trans('portal.testimonials') .' '. @trans('portal.add') }}
        </h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.testimonial.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ @trans('portal.testimonials') }}</li>
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

                    <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="en_name" class="form-label">User Name in English </label>
                                <input type="text"
                                    class="form-control @error('en_name') is-invalid @enderror"
                                    id="en_name"
                                    name="en_name"
                                    value="{{ old('en_name') }}">
                                @error('en_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="gu_name" class="form-label">User Name in Gujarati</label>
                                <input type="text"
                                    class="form-control @error('gu_name') is-invalid @enderror"
                                    id="gu_name"
                                    name="gu_name"
                                    value="{{ old('gu_name') }}">
                                @error('gu_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="en_description" class="form-label">English Description<span>*(Max 1000 characters)</span></label>
                                <textarea class="form-control @error('en_description') is-invalid @enderror"
                                    id="en_description"
                                    name="en_description"
                                    rows="3">{{ old('en_description') }}</textarea>
                                @error('en_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="gu_description" class="form-label">Gujarati Description<span>*(Max 1000 characters)</span></label>
                                <textarea class="form-control @error('gu_description') is-invalid @enderror"
                                    id="gu_description"
                                    name="gu_description"
                                    rows="3">{{ old('gu_description') }}</textarea>
                                @error('gu_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file"
                                    class="form-control @error('image') is-invalid @enderror"
                                    id="image"
                                    name="image"
                                    accept="image/*">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Accepted formats: JPEG, PNG, JPG, GIF. Max size: 2MB
                                </small>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror"
                                    id="status"
                                    name="status"
                                    required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary">
                                    <i class="fa fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
