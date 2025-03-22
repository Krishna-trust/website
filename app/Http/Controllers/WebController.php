<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Content;
use App\Models\Donation;
use App\Models\Labharthi;
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
        $services = Service::orderByDesc('status')->orderBy('created_at', 'desc')->take(4)->get();
        $testimonials = Testimonial::orderByDesc('status')->orderBy('created_at', 'desc')->take(4)->get();

        return view('web.index', [
            'nextReceiptNumber' => str_pad($nextReceiptNumber, 6, '0', STR_PAD_LEFT),
            'contents' => $contents,
            'services' => $services,
            'testimonials' => $testimonials
        ]);
    }

    public function about()
    {
        $labharthi = Labharthi::count();
        return view('web.about', [
            'labharthi' => $labharthi
        ]);
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function services()
    {
        return view('web.services');
    }

    public function privacyPolicy()
    {
        return view('module.'. app()->getLocale() .'-privacy-policy');
    }

    public function termsAndConditions()
    {
        return view('module.'. app()->getLocale() .'-terms-and-conditions');
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

    public function donationStore(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'nullable|string|size:10|regex:/^[0-9]+$/',
            'address' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'donation_for' => 'required|string|max:255',
            'comment' => 'nullable|string',
            'pan_number' => 'nullable|string|max:10|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
            'transaction_id' => 'required|string|max:100',
            'transaction_date' => 'required|date',
        ], [
            'full_name.required' => __('validation.required_full_name'),
            'full_name.string' => __('validation.size_full_name'),
            // 'mobile_number.required' => __('validation.required_mobile_number'),
            'mobile_number.size' => __('validation.size_mobile_number'),
            'mobile_number.regex' => __('validation.regex_mobile_number'),
            'address.string' => __('validation.string_address'),
            'amount.required' => __('validation.required_amount'),
            'amount.numeric' => __('validation.numeric_amount'),
            'amount.min' => __('validation.min_amount'),
            'donation_for.required' => __('validation.required_donation_for'),
            'donation_for.string' => __('validation.string_donation_for'),
            'comment.string' => __('validation.string_comment'),
            'pan_number.regex' => __('validation.regex_pan_number'),
            'transaction_id.required' => __('validation.required_transaction_id'),
            'transaction_date.required' => __('validation.required_transaction_date'),
            'transaction_id.string' => __('validation.string_transaction_id'),
            'transaction_date.date' => __('validation.date_transaction_date'),
        ]);

        $validated['date'] = date('Y-m-d');
        // Sanitize inputs
        $validated = array_map(function ($value) {
            return is_string($value) ? strip_tags($value) : $value;
        }, $validated);

        Donation::create($validated);

        return redirect()->route('contact')
            ->with('success', __('portal.donation_receipt_created'));
    }
}
