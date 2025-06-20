<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Labharthi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Labharthi  $labharthi
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            // $limit = $request->limit ?? 10;
            $query = Labharthi::where('status', 1);

            // Search functionality
            if ($request->search) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('position', 'like', "%{$search}%")
                        ->orWhere('mobile_number', 'like', "%{$search}%")
                        ->orWhere('adhar_number', 'like', "%{$search}%");
                });
            }

            $query->orderBy('position', 'asc');

            // $attendences = $query->paginate($limit);
            $attendences = $query->get();

            if (request()->ajax()) {
                return view('admin.attendance.view', compact('attendences'));
            }

            return view('admin.attendance.index', compact('attendences'));
        } catch (\Throwable $th) {
            Log::error('attendanceController@index Error: ' . $th->getMessage());
            return redirect()->route('admin.attendance.index')
                ->with('error', $th->getMessage());
        }

        // // Get today's date
        // $today = Carbon::today()->toDateString();

        // // Check if attendance for today already exists
        // $todaysAttendance = Attendance::where('labharthi_id', $labharthi->id)
        //                             ->whereDate('attendance_date', $today)
        //                             ->first();

        // // Get all attendance records for this labharthi for display (optional)
        // $allAttendance = Attendance::where('labharthi_id', $labharthi->id)
        //                         ->orderBy('attendance_date', 'desc')
        //                         ->paginate(10); // Or however many you want per page

        // return view('admin.attendance.index', compact('labharthi', 'todaysAttendance', 'allAttendance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Labharthi  $labharthi
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Labharthi $labharthi)
    {
        try {

            // dd($request->all());
            $request->validate([
                'status' => 'required|integer|in:0,1,2', // 0: not present, 1: present, 2: not specified
                'date' => 'required|date_format:Y-m-d',
                'labharthi_id' => 'required|integer',
            ]);


            // Check if attendance for this labharthi on this date already exists
            $existingAttendance = Attendance::where('labharthi_id', $request->labharthi_id)->where('attendance_date', $request->date)->first();

            if ($existingAttendance) {
                // Update existing attendance
                $existingAttendance->update(['attendance' => $request->status]);
                $message = 'Attendance updated successfully.';
            } else {
                // Create new attendance record
                Attendance::create([
                    'labharthi_id' => $request->labharthi_id,
                    'attendance' => $request->status,
                    'attendance_date' => $request->date,
                ]);
                $message = 'Attendance created successfully.';
            }

            return response()->json(['status' => 200, 'message' => $message]);
        } catch (\Throwable $th) {
            Log::error('AttendanceController@store Error: ' . $th->getMessage());
            return response()->json(['status' => 500, 'message' => $th->getMessage()]);
        }
    }

    // export
    // public function export(Request $request)
    // {
    //     try {
    //         $monthYear = $request->input('month_year');
    //         $formatted = Carbon::parse($monthYear . '-01')->format('F-Y');

    //         return Excel::download(new AttendanceExport($monthYear), $formatted . '-Attendance-List.xlsx');
    //     } catch (\Throwable $th) {
    //         Log::error('ReportController@attendanceReport Error: ' . $th->getMessage());
    //     }
    // }
}
