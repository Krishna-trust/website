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
            @trans('Portal.receipt_number'),
            @trans('Portal.date'),
            @trans('Portal.full_name'),
            @trans('Portal.mobile'),
            @trans('Portal.address'),
            @trans('Portal.amount'),
            @trans('Portal.donation_for'),
            @trans('Portal.comment'),
            @trans('Portal.pan_number'),
            @trans('Portal.payment_mode'),
            @trans('Portal.bank_name'),
            @trans('Portal.cheque_number'),
            @trans('Portal.cheque_date'),
            @trans('Portal.transaction_id'),
            @trans('Portal.transaction_date')
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
