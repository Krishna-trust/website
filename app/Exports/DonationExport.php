<?php

namespace App\Exports;

use App\Models\Donation;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DonationExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting
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

        return Donation::whereBetween('date', [$start, $end])->get()->map(function ($item) {
            return [
                'receipt_number'   => $item->receipt_number ?? '-',
                'date'             => $item->date ? date('d-m-Y', strtotime($item->date)) : '-',
                'full_name'        => $item->full_name ?? '-',
                'mobile_number'    => $item->mobile_number ? $this->formatMobileNumber($item->mobile_number) : '-',
                'address'          => $item->address ?? '-',
                'amount'           => $item->amount ?? '-',
                'donation_for'     => $item->donation_for ?? '-',
                'comment'          => $item->comment ?? '-',
                'pan_number'       => strtoupper($item->pan_number ?? '-'),
                'payment_mode'     => $item->payment_mode ?? '-',
                'bank_name'        => $item->bank_name ?? '-',
                'cheque_number'    => $item->cheque_number ?? '-',
                'cheque_date'      => $item->cheque_date ?? '-',
                'transaction_id'   => $item->transaction_id ?? '-',
                'transaction_date' => $item->transaction_date ? date('d-m-Y', strtotime($item->transaction_date)) : '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            trans('portal.receipt_number'),
            trans('portal.donation_date'),
            trans('portal.full_name'),
            trans('portal.mobile'),
            trans('portal.address'),
            trans('portal.amount'),
            trans('portal.donation_for'),
            trans('portal.comment'),
            trans('portal.pan_number'),
            trans('portal.payment_mode'),
            trans('portal.bank_name'),
            trans('portal.cheque_number'),
            trans('portal.cheque_date'),
            trans('portal.transaction_id'),
            trans('portal.transaction_date'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
    }

    public function columnFormats(): array
    {
        return [
            // 'F' => '#,##0.00',     // Amount
            'B' => 'DD-MM-YYYY',   // Donation Date
            'M' => 'DD-MM-YYYY',   // Cheque Date
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
