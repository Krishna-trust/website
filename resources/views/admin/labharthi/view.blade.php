<table class="table table-bordered border-bottom w-100 table-checkable no-footer " id="logs-table">
    <thead>
        <tr role="row">
            <th class="text-uppercase fw-bold">#
            </th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.name') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.mobile') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.tifin_starting_date') }}</th>
            <th class="text-uppercase fw-bold text-center">{{ @trans('portal.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @if ($labharthis->isEmpty())
        <tr>
            <td colspan="5" class="text-center text-danger">{{ @trans('messages.no_labharthi') }}</td>
        </tr>
        @else
        @forelse($labharthis as $index => $labharthi)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $labharthi->name ? $labharthi->name : '-'}}</td>
            <td>@if ($labharthi->mobile_number)
                @php
                    $number = $labharthi->mobile_number;
                    // Remove non-digit characters
                    $digits = preg_replace('/\D/', '', $number);
        
                    // Format the number based on conditions
                    if (strlen($digits) === 10) {
                        $formatted = '+91 ' . $digits;
                    } elseif (preg_match('/^(?:\+91|91)(\d{10})$/', $digits, $matches)) {
                        $formatted = '+91 ' . $matches[1];
                    } else {
                        $formatted = $number; // Fallback if format is incorrect
                    }
                @endphp
                {{ $formatted }}
            @else
                -
            @endif</td>
            <td style="white-space: nowrap;">{{ $labharthi->tifin_starting_date ? date('d/m/Y', strtotime($labharthi->tifin_starting_date)) : '-' }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a class="secondary edit-technician-btn me-2" href="{{ route('admin.labharthi.edit', $labharthi->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="primary user-delete-btn" data-bs-toggle="modal" data-bs-target="#user-delete" data-labharthi-id="{{ $labharthi->id }}">
                        <i class="fa fa-trash-o"></i>
                    </a>
                    <!-- <div>
                        <form action="{{ route('admin.labharthi.destroy', $labharthi->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this labharthi?');">
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
    {{ $labharthis->links('admin.parts.pagination') }}
</div>
