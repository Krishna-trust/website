<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Content;
use App\Models\Donation;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $lastDonation = Donation::orderBy('receipt_number', 'desc')->first();
        $nextReceiptNumber = $lastDonation ? (intval($lastDonation->receipt_number) + 1) : 1;

        // contents
        $contents = Content::orderBy('upload_date', 'desc')->take(4)->get();
        $services = Service::orderBy('created_at', 'desc')->take(4)->get();
        $testimonials = Testimonial::orderBy('created_at', 'desc')->take(4)->get();

        return view('web.index', [
            'nextReceiptNumber' => str_pad($nextReceiptNumber, 6, '0', STR_PAD_LEFT),
            'contents' => $contents,
            'services' => $services,
            'testimonials' => $testimonials
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

    public function contactPost(Request $request)
    {
        // Validate the incoming form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ],[
            'name.required' => __('validation.required_name'),
            'name.string' => __('validation.string_name'),
            'name.max' => __('validation.max_name'),
            'email.required' => __('validation.required_email'),
            'email.string' => __('validation.string_email'),
            'mobile.required' => __('validation.required_mobile_number'),
            'mobile.size' => __('validation.size_mobile_number'),
            'mobile.regex' => __('validation.regex_mobile_number'),
            'address.required' => __('validation.required_address'),
            'address.string' => __('validation.string_address'),
            'phone.required' => __('validation.required_phone'),
            'phone.string' => __('validation.string_phone'),
            'message.required' => __('validation.required_message'),
            'message.string' => __('validation.string_message'),
            'subject.required' => __('validation.required_subject'),
            'subject.string' => __('validation.string_subject'),
        ]);

        Contact::create($validated);

        // Redirect or return a response
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
