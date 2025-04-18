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
            <th class="text-uppercase fw-bold">{{ @trans('portal.title') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.description') }}</th>
            @else
            <th class="text-uppercase fw-bold">{{ @trans('portal.title') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.description') }}</th>
            @endif
            <th class="text-uppercase fw-bold">{{ @trans('portal.status') }}</th>
            <th class="text-center text-uppercase fw-bold">{{ @trans('portal.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @if ($services->isEmpty())
        <tr>
            <td colspan="8" class="text-center text-danger">{{ @trans('messages.no_service') }}</td>
        </tr>
        @else
        @forelse($services as $index => $service)
        <tr>
            <td>{{ $services->firstItem() + $index }}</td>
            <td>
                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}"
                    alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                <span class="eye-icon" id="eyeIcon" data-bs-toggle="modal" data-bs-target="#imageModal">👁️</span>
                @else
                <img src="{{ asset('images/not_found.jpg') }}" alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                @endif
            </td>
            @if(app()->getLocale() == 'gu')
            <td>{{ $service->gu_title ? $service->gu_title : '-' }}</td>
            <td>{{ $service->gu_description ? $service->gu_description : '-' }}</td>
            @else
            <td>{{ $service->en_title ? $service->en_title : '-' }}</td>
            <td>{{ $service->en_description ? $service->en_description : '-' }}</td>
            @endif
            <td>{{ $service->status ? 'Active' : 'Inactive' }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a class="secondary edit-technician-btn me-2" href="{{ route('admin.service.edit', $service->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="primary user-delete-btn" data-bs-toggle="modal" data-bs-target="#user-delete" data-service-id="{{ $service->id }}">
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
    {{ $services->links('admin.parts.pagination') }}
</div>
