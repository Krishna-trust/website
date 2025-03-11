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
            <th class="text-uppercase fw-bold">#
            </th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.name') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.email') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.mobile') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.subject') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.message') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.date') }}</th>
        </tr>
    </thead>
    <tbody>
        @if ($contacts->isEmpty())
        <tr>
            <td colspan="7" class="text-center text-danger">{{ @trans('messages.no_contact') }}</td>
        </tr>
        @else
        @forelse($contacts as $index => $contact)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->mobile }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->message }}</td>
            <td>{{ date('d-m-Y', strtotime($contact->created_at)) }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<div class="d-md-flex justify-content-center">
    {{ $contacts->links('admin.parts.pagination') }}
</div>
