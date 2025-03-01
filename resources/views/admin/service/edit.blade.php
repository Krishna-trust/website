@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">
            {{ @trans('portal.services') .' '. @trans('portal.edit') }}
        </h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ @trans('portal.services') }}</li>
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
                    <form action="{{ route('admin.service.update', $service) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">English Title</label>
                                <input type="text"
                                    class="form-control @error('en_title') is-invalid @enderror"
                                    id="en_title"
                                    name="en_title"
                                    value="{{ old('en_title', $service->en_title) }}"
                                    required>
                                @error('en_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="gu_title" class="form-label">Gujarati Title</label>
                                <input type="text"
                                    class="form-control @error('gu_title') is-invalid @enderror"
                                    id="gu_title"
                                    name="gu_title"
                                    value="{{ old('gu_title', $service->gu_title) }}"
                                    required>
                                @error('gu_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="en_description" class="form-label">English Description<span>*(Max 1000 characters)</span></label>
                                <textarea class="form-control @error('en_description') is-invalid @enderror"
                                    id="en_description"
                                    name="en_description"
                                    rows="3">{{ old('en_description', $service->en_description) }}</textarea>
                                @error('en_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="gu_description" class="form-label">Gujarati Description<span>*(Max 1000 characters)</span></label>
                                <textarea class="form-control @error('gu_description') is-invalid @enderror"
                                    id="gu_description"
                                    name="gu_description"
                                    rows="3">{{ old('gu_description', $service->gu_description) }}</textarea>
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
                                    <option value="1" {{ old('status', $service->status)==1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $service->status)==0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                @if($service->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $service->image) }}"
                                        alt="{{ $service->name }}"
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
