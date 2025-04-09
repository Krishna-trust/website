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
            <th class="text-uppercase fw-bold">{{ @trans('portal.employee_image') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.name') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.address') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.mobile') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.email') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.status') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.salary') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.date') }}</th>
            <th class="text-center text-uppercase fw-bold">{{ @trans('portal.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @if ($employees->isEmpty())
        <tr>
            <td colspan="10" class="text-center text-danger">{{ @trans('messages.no_employee') }}</td>
        </tr>
        @else
        @forelse($employees as $index => $employee)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                @if($employee->image)
                <img src="{{ asset('storage/' . $employee->image) }}"
                    alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                <span class="eye-icon" id="eyeIcon" data-bs-toggle="modal" data-bs-target="#imageModal">👁️</span>
                @else
                <img src="{{ asset('images/not_found.jpg') }}" alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                @endif
            </td>
            <td>{{ $employee->name ? $employee->name : '-' }}</td>
            <td>{{ $employee->address ? $employee->address : '-' }}</td>
            <td>{{ $employee->mobile_number ? $employee->mobile_number : '-' }}</td>
            <td>{{ $employee->email ? $employee->email : '-' }}</td>
            <td>{{ $employee->status ? $employee->status : '-' }}</td>
            <td>{{ $employee->salary ? $employee->salary : '-' }}</td>
            <td style="white-space: nowrap;">{{ $employee->created_at ? date('d-m-Y', strtotime($employee->created_at)) : '-' }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a class="secondary edit-technician-btn me-2" href="{{ route('admin.employee.edit', $employee->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="primary user-delete-btn" data-bs-toggle="modal" data-bs-target="#user-delete" data-employee-id="{{ $employee->id }}">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-danger">{{ @trans('messages.no_employee') }}</td>
        </tr>
        @endforelse
        @endif
    </tbody>
</table>

<div class="d-md-flex justify-content-center">
    {{ $employees->links('admin.parts.pagination') }}
</div>