<?php

namespace App\Exports;

use App\Models\Donation;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\Font;

class DonationExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Donation::all()->map(function ($item) {
            return [
                'receipt_number' => $item->receipt_number ?? '-',
                'date' => $item->date ? date('d-m-Y', strtotime($item->date)) : '-',
                'full_name' => $item->full_name ?? '-',
                'mobile_number' => $item->mobile_number ?? '-',
                'address' => $item->address ?? '-',
                'amount' => $item->amount ?? '-',
                'donation_for' => $item->donation_for ?? '-',
                'comment' => $item->comment ?? '-',
                'pan_number' => strtoupper($item->pan_number ?? '-'),
                'payment_mode' => $item->payment_mode ?? '-',
                'bank_name' => $item->bank_name ?? '-',
                'cheque_number' => $item->cheque_number ?? '-',
                'cheque_date' => $item->cheque_date ?? '-',
                'transaction_id' => $item->transaction_id ?? '-',
                'transaction_date' => $item->transaction_date ?? '-',
            ];
        });
    }

    /**
     * Return the headings for the export file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            __('Portal.receipt_number'),
            __('Portal.date'),
            __('Portal.full_name'),
            __('Portal.mobile'),
            __('Portal.address'),
            __('Portal.amount'),
            __('Portal.donation_for'),
            __('Portal.comment'),
            __('Portal.pan_number'),
            __('Portal.payment_mode'),
            __('Portal.bank_name'),
            __('Portal.cheque_number'),
            __('Portal.cheque_date'),
            __('Portal.transaction_id'),
            __('Portal.transaction_date')

            // 'Receipt Number',
            // 'Donation Date',
            // 'Full Name',
            // 'Mobile Number',
            // 'Address',
            // 'Amount',
            // 'Donation For',
            // 'Comment',
            // 'Pan Number',
            // 'Payment Mode',
            // 'Bank Name',
            // 'Cheque Number',
            // 'Cheque Date',
            // 'Transaction Id',
            // 'Transaction Date',
        ];
    }

    public function styles($sheet)
    {
        // Apply bold to the first row (header row)
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
    }

    public function columnFormats(): array
    {
        return [
            'F' => '#,##0.00',
            'I' => '[$-IN]General',          // Format for PAN Number (General text format)
            'B' => 'DD-MM-YYYY',
            'M' => 'DD-MM-YYYY',

        ];
    }
}
