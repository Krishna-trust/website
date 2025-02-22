<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Donation;
use App\Models\Labharthi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $total_contents = Content::count();
        $total_donations = Donation::count();
        $total_labharthi = Labharthi::count();
        $total_donations_amount = Donation::sum('amount');

        return view('admin.dashboard', compact('total_contents', 'total_donations', 'total_labharthi', 'total_donations_amount'));
    }
}
