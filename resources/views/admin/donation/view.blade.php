<table class="table table-bordered border-bottom w-100 table-checkable no-footer " id="logs-table">
    <thead>
        <tr role="row">
            <th class="text-uppercase fw-bold">#</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.receipt_number') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.date') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.donor_name') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.mobile') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.amount') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.payment_mode') }}</th>
            <th class="text-uppercase fw-bold text-center">{{ @trans('portal.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @if ($donations->isEmpty())
        <tr>
            <td colspan="4" class="text-center text-danger">No content Found.</td>
        </tr>
        @else
        @forelse($donations as $index => $donation)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $donation->receipt_number ?? '-' }}</td>
            <td>{{ date('d-m-Y', strtotime($donation->date)) }}</td>
            <td>{{ $donation->full_name ?? '-' }}</td>
            <td>{{ $donation->mobile_number ?? '-' }}</td>
            <td>₹{{ number_format($donation->amount, 2) }}</td>
            <td>{{ ucfirst($donation->payment_mode) }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a class="secondary edit-technician-btn me-2" href="{{ route('admin.donation.edit', $donation->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="primary user-delete-btn" data-bs-toggle="modal" data-bs-target="#user-delete" data-donation-id="{{ $donation->id }}">
                        <i class="fa fa-trash-o"></i>
                    </a>
                    <!-- <div>
                        <form action="{{ route('admin.donation.destroy', $donation->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this donation?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div> -->
                </div>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<div class="d-md-flex justify-content-center">
    {{ $donations->links('admin.parts.pagination') }}
</div>
