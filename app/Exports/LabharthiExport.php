<?php

namespace App\Exports;

use App\Models\Labharthi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class LabharthiExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting
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

        $labharthis = Labharthi::whereBetween('created_at', [$start, $end])->get();

        Log::info('Labharthi record count: ' . $labharthis->count());

        return $labharthis->map(function ($item) {
            return [
                'name' => $item->name ?? '-',
                'mobile_number' => $item->mobile_number ? $this->formatMobileNumber($item->mobile_number) : '-',
                'address' => $item->address ?? '-',
                'native_place' => $item->native_place ?? '-',
                'cast' => $item->cast ?? '-',
                'sub_cast' => $item->sub_cast ?? '-',
                'adhar_number' => $this->formatAadharNumber($item->adhar_number) ?? '-',
                'work' => $item->work ?? '-',
                'identification_mark' => $item->identification_mark ?? '-',
                'income_source' => $item->income_source ?? '-',
                'property' => $item->property ?? '-',
                'reasion_for_not_working' => $item->reasion_for_not_working ?? '-',
                'reasion_for_tifin' => $item->reasion_for_tifin ?? '-',
                'comment_from_trust' => $item->comment_from_trust ?? '-',
                'tifin_starting_date' => $item->tifin_starting_date ? date('d-m-Y', strtotime($item->tifin_starting_date)) : '-',
                'tifin_ending_date' => $item->tifin_ending_date ? date('d-m-Y', strtotime($item->tifin_ending_date)) : '-',
                'reasion_for_tifin_stop' => $item->reasion_for_tifin_stop ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            @trans('portal.name'),
            @trans('portal.mobile'),
            @trans('portal.address'),
            @trans('portal.native_place'),
            @trans('portal.cast'),
            @trans('portal.sub_cast'),
            @trans('portal.adhar_number'),
            @trans('portal.work'),
            @trans('portal.identification_mark'),
            @trans('portal.income_source'),
            @trans('portal.property'),
            @trans('portal.reasion_for_not_working'),
            @trans('portal.reasion_for_tifin'),
            @trans('portal.comment_from_trust'),
            @trans('portal.tifin_starting_date'),
            @trans('portal.tifin_ending_date'),
            @trans('portal.reasion_for_tifin_stop'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:Q1')->getFont()->setBold(true);
    }

    public function columnFormats(): array
    {
        return [
            // 'D' => NumberFormat::FORMAT_TEXT,
            'B' => '###0', //mobile number
            'G' => '@',  //Adhar Number
        ];
    }

    private function formatAadharNumber($adharNumber)
    {
        if (empty($adharNumber)) {
            return '-';
        }

        // Remove any non-numeric characters (e.g., spaces, dashes)
        $adharNumber = preg_replace('/\D/', '', $adharNumber);

        // Format Aadhar number as XXXX XXXX XXXX
        return substr($adharNumber, 0, 4) . ' ' . substr($adharNumber, 4, 4) . ' ' . substr($adharNumber, 8, 4);
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
