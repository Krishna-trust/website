@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">
            {{ @trans('portal.testimonials') .' '. @trans('portal.edit') }}
        </h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.testimonial.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ @trans('portal.testimonials') }}</li>
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
                    <form action="{{ route('admin.testimonial.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">User Name in English</label>
                                <input type="text"
                                    class="form-control @error('en_name') is-invalid @enderror"
                                    id="en_name"
                                    name="en_name"
                                    value="{{ old('en_name', $testimonial->en_name) }}"
                                    required>
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
                                    value="{{ old('gu_name', $testimonial->gu_name) }}"
                                    required>
                                @error('gu_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="en_post" class="form-label">Post in English <span>*</span></label>
                                <input type="text"
                                    class="form-control @error('en_post') is-invalid @enderror"
                                    id="en_post"
                                    name="en_post"
                                    value="{{ old('en_post', $testimonial->en_post) }}"
                                    required>
                                @error('en_post')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="gu_post" class="form-label">Post in Gujarati <span>*</span></label>
                                <input type="text"
                                    class="form-control @error('gu_post') is-invalid @enderror"
                                    id="gu_post"
                                    name="gu_post"
                                    value="{{ old('gu_post', $testimonial->gu_post) }}"
                                    required>
                                @error('gu_post')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="en_description" class="form-label">English Description <span>*(Max 1000 characters)</span></label>
                                <textarea class="form-control @error('en_description') is-invalid @enderror"
                                    id="en_description"
                                    name="en_description"
                                    rows="3">{{ old('en_description', $testimonial->en_description) }}</textarea>
                                @error('en_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="gu_description" class="form-label">Gujarati Description<span>*(Max 1000 characters)</span></label>
                                <textarea class="form-control @error('gu_description') is-invalid @enderror"
                                    id="gu_description"
                                    name="gu_description"
                                    rows="3">{{ old('gu_description', $testimonial->gu_description) }}</textarea>
                                @error('gu_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror"
                                    id="status"
                                    name="status"
                                    required>
                                    <option value="1" {{ old('status', isset($testimonial) ? $testimonial->status : 1)==1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', isset($testimonial) ? $testimonial->status : 1)==0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                @if($testimonial->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $testimonial->image) }}"
                                        alt="{{ $testimonial->name }}"
                                        class="img-thumbnail"
                                        style="max-width: 200px;">
                                </div>
                                @endif
                                <input type="file"
                                    class="form-control @error('image') is-invalid @enderror"
                                    id="image"
                                    name="image"
                                    accept="image/*">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Leave empty to keep the current image. Accepted formats: JPEG, PNG, JPG, GIF. Max size: 2MB
                                </small>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
