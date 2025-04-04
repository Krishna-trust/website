<?php

namespace App\Exports;

use App\Models\Labharthi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\Font;

class LabharthiExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Labharthi::all()->map(function ($item) {
            return [
                'name' => $item->name ?? '-',
                'mobile_number' => (string) $item->mobile_number ?? '-',
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

    /**
     * Return the headings for the export file.
     *
     * @return array
     */

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

    public function styles($sheet)
    {
        // Apply bold to the first row (header row)
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
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

    public function columnFormats(): array
    {
        return [
            'B' => '###0', //mobile number
            'G' => '@',  //Adhar Number
        ];
    }
}
