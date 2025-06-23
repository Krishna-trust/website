<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Labharthi;
use Carbon\Carbon;
use Illuminate\Support\Collection;
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
    public $dateList = [];

    public function __construct($monthYear)
    {
        $this->monthYear = $monthYear;

        // Build date list for the selected month
        $start = Carbon::parse($this->monthYear . '-01')->startOfMonth();
        $end = $start->copy()->endOfMonth();

        while ($start->lte($end)) {
            $this->dateList[] = $start->format('d-m-Y');
            $start->addDay();
        }
    }

    public function collection()
    {
        $start = Carbon::parse($this->monthYear . '-01')->startOfMonth();
        $end = $start->copy()->endOfMonth();

        $labharthiList = Labharthi::where('status', 1)->orderBy('position', 'asc')->get();

        $attendances = Attendance::whereBetween('attendance_date', [$start, $end])
            ->get()
            ->groupBy(function ($a) {
                return $a->labharthi_id . '_' . Carbon::parse($a->attendance_date)->format('d-m-Y');
            });

        $rows = [];

        foreach ($labharthiList as $labharthi) {
            $row = [
                $labharthi->position,
                $labharthi->name,
                $this->formatMobileNumber($labharthi->mobile_number),
                $labharthi->address,
            ];

            $yesCount = 0;
            $noCount = 0;
            $notVerifiedCount = 0;

            foreach ($this->dateList as $date) {
                $key = $labharthi->id . '_' . $date;
                $attendance = $attendances->get($key)?->first();

                $status = '-';
                if ($attendance) {
                    if ($attendance->attendance == 1) {
                        $status = trans('portal.present');
                        $yesCount++;
                    } elseif ($attendance->attendance == 0) {
                        $status = trans('portal.absent');
                        $noCount++;
                    } elseif ($attendance->attendance == 2) {
                        $status = trans('portal.not_specified');
                        $notVerifiedCount++;
                    }
                }

                $row[] = $status;
            }

            // Add summary columns
            $row[] = $yesCount;
            $row[] = $noCount;
            $row[] = $notVerifiedCount;

            $rows[] = $row;
        }

        return new Collection($rows);
    }

    public function headings(): array
    {
        return array_merge(
            [
                trans('portal.position'),
                trans('portal.name'),
                trans('portal.mobile'),
                trans('portal.address'),
            ],
            $this->dateList,
            [trans('portal.total') .trans('portal.present'), trans('portal.total') . trans('portal.absent'), trans('portal.total') . trans('portal.not_specified')]
        );
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:AK1')->getFont()->setBold(true);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 25,
            'C' => 18,
            'D' => 30,
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
        return '+91' . ' ' . $number;
    }
}
