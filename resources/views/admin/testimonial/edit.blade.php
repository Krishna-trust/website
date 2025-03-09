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
                    <!-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif -->
                    <form action="{{ route('admin.testimonial.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">{{ @trans('portal.name') }}<span>*</span></label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $testimonial->gu_name) }}"
                                    required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="post" class="form-label">Post <span>*</span></label>
                                <input type="text"
                                    class="form-control @error('post') is-invalid @enderror"
                                    id="post"
                                    name="post"
                                    value="{{ old('post', $testimonial->gu_post) }}"
                                    required>
                                @error('post')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="description" class="form-label">{{ @trans('portal.description') }} <span>*(Max 1000 characters)</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description"
                                    name="description"
                                    rows="3">{{ old('description', $testimonial->gu_description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="status" class="form-label">{{ @trans('portal.status') }}</label>
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

                            <div class="mb-3 col-md-6">
                                <label for="image" class="form-label">{{ @trans('portal.image') }}</label>
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
                                    {{ @trans('portal.accepted_formats') }}
                                </small>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> {{ @trans('portal.update') }}
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
