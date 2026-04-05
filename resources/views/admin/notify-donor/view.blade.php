@php
    if (!function_exists('getWhatsAppUrl')) {
        function getWhatsAppUrl($donation) {
            $name = $donation->full_name;
            $amount = $donation->amount;
            // Use translation for donation purpose if available, else use DB value
            $purpose = $donation->donation_for;
            $date = date('d-m-Y', strtotime($donation->date));
            
            // Build the message using Laravel's built-in placeholder replacement
            $message = trans('messages.whatsapp_message', [
                'name' => $name,
                'amount' => $amount,
                'purpose' => $purpose,
                'date' => $date
            ]);
            
            $mobile = preg_replace('/\+91/', '', $donation->mobile_number);
            // Ensure no spaces or other chars
            $mobile = preg_replace('/[^0-9]/', '', $mobile);
            
            return "https://wa.me/91" . $mobile . "?text=" . urlencode($message);
        }
    }
@endphp

<div class="table-responsive mb-3">
    <table class="table table-bordered border-bottom w-100 table-checkable no-footer " id="logs-table">
        <thead>
            <tr role="row">
                <th class="text-uppercase fw-bold">#</th>
                <th class="text-uppercase fw-bold text-center">{{ @trans('portal.donor_name') }}</th>
                <th class="text-uppercase fw-bold text-center">{{ @trans('portal.date') }}</th>
                <th class="text-uppercase fw-bold text-center">{{ @trans('portal.amount') }}</th>
                <th class="text-uppercase fw-bold text-center">{{ @trans('portal.donation_for') }}</th>
                <th class="text-uppercase fw-bold text-center">{{ @trans('portal.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @if ($donations->isEmpty())
            <tr>
                <td colspan="6" class="text-center text-danger">{{ @trans('messages.no_donation') }}</td>
            </tr>
            @else
            @foreach($donations as $index => $donation)
            <tr id="donation-row-{{ $donation->id }}">
                <td>{{ ($donations->currentPage() - 1) * $donations->perPage() + $index + 1 }}</td>
                <td class="text-center">{{ $donation->full_name ? $donation->full_name : '-' }}</td>
                <td class="text-center" style="white-space: nowrap;">{{ $donation->date ? date('d-m-Y', strtotime($donation->date)) : '-' }}</td>
                <td class="text-center">₹ {{ $donation->amount ? number_format($donation->amount, 2) : '-' }}</td>
                <td class="text-center">{{ $donation->donation_for ? $donation->donation_for : '-' }}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="{{ getWhatsAppUrl($donation) }}" 
                           target="_blank" 
                           class="btn btn-success btn-sm me-2 d-flex align-items-center"
                           title="Send Whatsapp Message">
                            <i class="fa fa-whatsapp me-1"></i> Send
                        </a>
                        <button class="btn btn-primary btn-sm mark-done-btn d-flex align-items-center" 
                                data-id="{{ $donation->id }}"
                                title="Mark as Notified">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="d-md-flex justify-content-center">
    {{ $donations->links('admin.parts.pagination') }}
</div>
