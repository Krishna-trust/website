<?php

namespace App\Exports;

use App\Models\Contact;
use App\Models\Donation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ContactExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting
{
    public $monthYear;

    public function __construct($monthYear)
    {
        $this->monthYear = $monthYear;
    }

    public function collection()
    {
        $start = Carbon::parse($this->monthYear . '-01')->startOfMonth();
        $end = Carbon::parse($this->monthYear . '-01')->endOfMonth();

        Log::info('Export Start Date: ' . $start);
        Log::info('Export End Date: ' . $end);

        $contacts = Contact::whereBetween('created_at', [$start, $end])->get();

        Log::info('Labharthi record count: ' . $contacts->count());

        return $contacts->map(function ($item) {
            return [
                'name'   => $item->name ?? '-',
                'email'  => $item->email ?? '-',
                'mobile' => $item->mobile ? $this->formatMobileNumber($item->mobile) : '-',
                'subject' => $item->subject ?? '-',
                'message' => $item->message ?? '-',
                'date'   => $item->created_at ? date('d-m-Y', strtotime($item->created_at)) : '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            trans('portal.name'),
            trans('portal.email'),
            trans('portal.mobile'),
            trans('portal.subject'),
            trans('portal.message'),
            trans('portal.date'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
    }

    public function columnFormats(): array
    {
        return [
            // 'F' => '#,##0.00',     // Amount
            // 'B' => 'DD-MM-YYYY',   // Donation Date
            // 'M' => 'DD-MM-YYYY',   // Cheque Date
        ];
    }

    private function formatMobileNumber($number)
    {
        if (empty($number)) {
            return '-';
        }

        $number = preg_replace('/\D/', '', $number);

        // Ensure it's 10 digits (remove country code if present)
        if (strlen($number) === 12 && substr($number, 0, 2) === '91') {
            $number = substr($number, 2); // remove country code
        } elseif (strlen($number) === 11 && $number[0] === '0') {
            $number = substr($number, 1); // remove leading 0
        }

        // Validate final length
        if (strlen($number) !== 10) {
            return $number; // return as-is if not valid 10-digit
        }

        // Format: +91 XXXXX-XXXXX
        return '+91 ' . substr($number, 0, 5) . ' ' . substr($number, 5);
    }
}
