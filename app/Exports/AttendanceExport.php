<?php

namespace App\Exports;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AttendanceExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting, WithColumnWidths
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

        Log::info('Attendance Export Start Date: ' . $start);
        Log::info('Attendance Export End Date: ' . $end);

        $Attendances = Attendance::join('labharthi_form', 'labharthi_form.id', '=', 'attendances.labharthi_id')
            ->whereBetween('attendance_date', [$start, $end])
            ->orderBy('labharthi_form.position', 'asc')
            ->get();

        Log::info('Attendance record count: ' . $Attendances->count());

        return $Attendances->map(function ($item) {
            Log::info('Attendance record: ' . json_encode($item));
            $status = $item->attendance;
            if ($status == 1) {
                $status = trans('portal.present');
            } elseif ($status == 0) {
                $status = trans('portal.absent');
            } elseif ($status == 2) {
                $status = trans('portal.not_specified');
            } else {
                $status = '-';
            }

            return [
                'position'   => $item->labharthi->position ?? '-',
                'name'   => $item->labharthi->name ?? '-',
                'mobile_number'   => $this->formatMobileNumber($item->labharthi->mobile_number) ?? '-',
                // 'adhar_number'   => $item->labharthi->adhar_number ?? '-',
                'attendance'   => $status,
                'date'   => $item->attendance_date ? date('d-m-Y', strtotime($item->attendance_date)) : '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            trans('portal.position'),
            trans('portal.name'),
            trans('portal.mobile'),
            // trans('portal.adhar_number'),
            trans('portal.attendance'),
            trans('portal.date'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
    }

    public function columnWidths(): array
    {
        return [
            'B' => 30, 
            'C' => 20, 
            'E' => 15, 
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_TEXT, // Mobile number column as text
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

        // Format: +91 XXXXX XXXXX
        // return '+91 ' . substr($number, 0, 5) . ' ' . substr($number, 5);
        // Format: +91XXXXXXXXXX
        return '+91'. ' ' . $number;
    }
}
