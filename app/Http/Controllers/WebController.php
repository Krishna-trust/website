<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Donation;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $lastDonation = Donation::orderBy('receipt_number', 'desc')->first();
        $nextReceiptNumber = $lastDonation ? (intval($lastDonation->receipt_number) + 1) : 1;

        // contents
        $contents = Content::orderBy('upload_date', 'desc')->take(4)->get();

        return view('web.index', [
            'nextReceiptNumber' => str_pad($nextReceiptNumber, 6, '0', STR_PAD_LEFT),
            'contents' => $contents
        ]);
    }

    public function about()
    {
        return view('web.about');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function services()
    {
        return view('web.services');
    }

    public function impacts()
    {
        $contents = Content::orderBy('upload_date', 'desc')->get();

        // Group contents by month
        $groupedContents = $contents->groupBy(function ($date) {
            return $date->upload_date->format('F Y'); // Format as 'Month Year' (e.g., "January 2025")
        });

        return view('web.impacts', [
            'groupedContents' => $groupedContents
        ]);
    }
}
