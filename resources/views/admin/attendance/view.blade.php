<table class="table table-bordered border-bottom w-100 table-checkable no-footer " id="logs-table">
    <thead>
        <tr role="row">
            <th class="text-uppercase fw-bold">#
            </th>
            {{-- <th class="text-uppercase fw-bold">{{ @trans('portal.position') }}</th> --}}
            <th class="text-uppercase fw-bold">{{ @trans('portal.name') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.adhar_number') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.mobile_number') }}</th>
            <th class="text-uppercase fw-bold">{{ @trans('portal.attendance') }}</th>
        </tr>
    </thead>
    <tbody>
        @if ($attendences->isEmpty())
            <tr>
                <td colspan="7" class="text-center text-danger">{{ @trans('messages.no_attendence_records') }}</td>
            </tr>
        @else
            @forelse($attendences as $index => $attendence)
                <tr>
                    {{-- <td>{{ $attendences->firstItem() + $index }}</td> --}}
                    {{-- <td>{{ $index + 1 }}</td> --}}
                    <td>{{ $attendence->position ?? '-' }}</td>
                    <td>{{ $attendence->name ? $attendence->name : '-' }}</td>
                    <td>{{ $attendence->adhar_number ? $attendence->adhar_number : '-' }}</td>
                    <td>
                        @if ($attendence->mobile_number)
                            @php
                                $number = $attendence->mobile_number;
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
                        @endif
                    </td>
                    {{-- attendence 3 checkbox buttons with icons --}}
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-primary status" data-status="1" data-labharthi-id="{{ $attendence->id }}"><i class="fa fa-check-circle"></i></button>
                            <button class="btn btn-secondary status" data-status="0" data-labharthi-id="{{ $attendence->id }}"><i class="fa fa-times-circle"></i></button>
                            <button class="btn btn-primary status" data-status="2" data-labharthi-id="{{ $attendence->id }}"> <i class="fa fa-question-circle"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

@if(false)
    <div class="d-md-flex justify-content-center">
        {{ $attendences->links('admin.parts.pagination') }}
    </div>
@endif
