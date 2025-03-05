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
            <th class="text-uppercase fw-bold">Image</th>
            <th class="text-uppercase fw-bold">English Tital</th>
            <th class="text-uppercase fw-bold">Gujarati Tital</th>
            <th class="text-uppercase fw-bold">English Description</th>
            <th class="text-uppercase fw-bold">Gujarati Description</th>
            <th class="text-uppercase fw-bold">Status</th>
            <th class="text-center text-uppercase fw-bold">
                Actions </th>
        </tr>
    </thead>
    <tbody>
        @if ($services->isEmpty())
        <tr>
            <td colspan="8" class="text-center text-danger">No content Found.</td>
        </tr>
        @else
        @forelse($services as $index => $service)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}"
                    alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                <span class="eye-icon" id="eyeIcon" data-bs-toggle="modal" data-bs-target="#imageModal">👁️</span>
                @else
                <img src="{{ asset('images/not_found.jpg') }}" alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                @endif
            </td>
            <td>{{ $service->en_title ?? '-' }}</td>
            <td>{{ $service->gu_title ?? '-' }}</td>
            <td>{{ $service->en_description ?? '-' }}</td>
            <td>{{ $service->gu_description ?? '-' }}</td>
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
