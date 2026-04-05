<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class NotifyDonorController extends Controller
{
    public function index(Request $request)
    {
        try {
            $month = $request->month ?? date('m');
            $limit = $request->limit ?? 10;
            $currentYear = date('Y');
            $years = [$currentYear - 1, $currentYear - 2];

            // Subquery to get the latest donation ID for each unique donor (mobile_number)
            $sub = Donation::select(DB::raw('MAX(id) as id'))
                ->whereMonth('date', $month)
                ->whereIn(DB::raw('YEAR(date)'), $years)
                ->where('whatsapp_notify', 0)
                ->whereNotNull('mobile_number')
                ->whereNotIn('mobile_number', function ($q) use ($currentYear) {
                    $q->select('mobile_number')
                        ->from('donations')
                        ->whereYear('date', $currentYear)
                        ->whereNotNull('mobile_number');
                })
                ->groupBy('mobile_number');

            $donations = Donation::whereIn('id', $sub)
                ->orderBy('date', 'desc')
                ->paginate($limit);

            if (request()->ajax()) {
                return view('admin.notify-donor.view', compact('donations'));
            }

            return view('admin.notify-donor.index', compact('donations', 'month'));
        } catch (\Throwable $th) {
            Log::error('NotifyDonorController@index Error: ' . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function markAsDone(Request $request)
    {
        try {
            $donationId = $request->donation_id;
            $donation = Donation::findOrFail($donationId);
            
            // Mark as notified
            $donation->whatsapp_notify = 1;
            $donation->save();

            return response()->json(['success' => true, 'message' => 'Donor marked as notified successfully!']);
        } catch (\Throwable $th) {
            Log::error('NotifyDonorController@markAsDone Error: ' . $th->getMessage());
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }
}
