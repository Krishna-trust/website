<style>
    /* Small image styling */
    .small-image {
        width: 40px;
        border-radius: 4px;
        padding-right: 2px;
        padding-bottom: 4px;
        cursor: pointer;
    }

    /* Eye icon styling */
    .eye-icon {
        cursor: pointer;
        font-size: 18px;
        margin-left: 10px;
    }
</style>

<table class="table table-bordered border-bottom w-100 table-checkable no-footer " id="logs-table">
    <thead>
        <tr role="row">
            <th class="text-uppercase fw-bold">#</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.image') }}</th>
            @if(app()->getLocale() == 'gu')
            <th class="text-uppercase fw-bold">{{ @trans('portal.name') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.post') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.description') }}</th>
            @else
            <th class="text-uppercase fw-bold">{{ @trans('portal.name') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.post') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.description') }}</th>
            @endif
            <th class="text-uppercase fw-bold">{{ @trans('portal.status') }}</th>
            <th class="text-center text-uppercase fw-bold">{{ @trans('portal.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @if ($testimonials->isEmpty())
        <tr>
            <td colspan="8" class="text-center text-danger">{{ @trans('messages.no_testimonial') }}</td>
        </tr>
        @else
        @forelse($testimonials as $index => $testimonial)
        <tr>
            <td>{{ $testimonials->firstItem() + $index }}</td>
            <td>
                @if($testimonial->image)
                <img src="{{ asset('storage/' . $testimonial->image) }}"
                    alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                <span class="eye-icon" id="eyeIcon" data-bs-toggle="modal" data-bs-target="#imageModal">👁️</span>
                @else
                <img src="{{ asset('images/not_found.jpg') }}" alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                @endif
            </td>
            @if(app()->getLocale() == 'gu')
            <td>{{ $testimonial->gu_name ? $testimonial->gu_name : '-' }}</td>
            <td>{{ $testimonial->gu_post ? $testimonial->gu_post : '-' }}</td>
            <td>{{ $testimonial->gu_description ? $testimonial->gu_description : '-' }}</td>
            @else
            <td>{{ $testimonial->en_name ? $testimonial->en_name : '-' }}</td>
            <td>{{ $testimonial->en_post ? $testimonial->en_post : '-' }}</td>
            <td>{{ $testimonial->en_description ? $testimonial->en_description : '-' }}</td>
            @endif
            <td>{{ $testimonial->status ? 'Active' : 'Inactive' }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a class="secondary edit-technician-btn me-2" href="{{ route('admin.testimonial.edit', $testimonial->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="primary user-delete-btn" data-bs-toggle="modal" data-bs-target="#user-delete" data-testimonial-id="{{ $testimonial->id }}">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<div class="d-md-flex justify-content-center">
    {{ $testimonials->links('admin.parts.pagination') }}
</div>
