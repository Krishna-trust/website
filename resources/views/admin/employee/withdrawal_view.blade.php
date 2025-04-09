<div id="withdrawal_data">
    <table class="table table-bordered border-bottom w-100 table-checkable no-footer " id="logs-table">
        <thead>
            <tr role="row">
                <th class="text-uppercase fw-bold">#</th>
                <th class="text-uppercase fw-bold">{{ @trans('portal.amount') }}</th>
                <th class="text-uppercase fw-bold">{{ @trans('portal.date') }}</th>
            </tr>
        </thead>
        <tbody>
            @if ($withdrawals->isEmpty())
                <tr>
                    <td colspan="3" class="text-center text-danger">{{ @trans('messages.no_withdrawal') }}</td>
                </tr>
            @else
                @forelse($withdrawals as $index => $donation)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        {{-- <td>{{ $donation->name ? $donation->name : '-' }}</td> --}}
                        <td>₹{{ $donation->withdrawal_amount ? number_format($donation->withdrawal_amount, 2) : '-' }}
                        </td>
                        <td style="white-space: nowrap;">
                            {{ $donation->withdrawal_date ? date('d-m-Y', strtotime($donation->withdrawal_date)) : '-' }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
{{-- 
<div class="d-md-flex justify-content-center">
    {{ $withdrawals->links('admin.parts.pagination') }}
</div> --}}
