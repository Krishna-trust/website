<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DonationExport;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        try {

            // Log::info(json_encode($request->all()));
            $query = Donation::query();

            // Search functionality
            if ($request->search) {
                $search = $request->search;
                Log::info($search);
                // Log::info($search);
                // $formattedDate = \DateTime::createFromFormat('d/m/Y', $search);
                // if ($formattedDate) {
                //     // Convert to the format YYYY-MM-DD
                //     $search = $formattedDate->format('Y-m-d');
                // }

                $query->where(function ($q) use ($search) {
                    $q->where('receipt_number', 'like', "%{$search}%")
                        ->orWhere('full_name', 'like', "%{$search}%")
                        ->orWhere('mobile_number', 'like', "%{$search}%");
                });
            }

            // Get paginated results
            $donations = $query->latest()->paginate($request->get('per_page', 10));

            if (request()->ajax()) {
                Log::info('sdf');
                return view('admin.donation.view', compact('donations'));
            }

            return view('admin.donation.index', compact('donations'));
        } catch (\Throwable $th) {
            Log::error('DonationController@index Error: ' . $th->getMessage());
            return redirect()->route('admin.donation.index')
                ->with('error', $th->getMessage());
        }
    }

    public function create()
    {
        // Get the last receipt number and increment it
        // $lastDonation = Donation::orderBy('receipt_number', 'desc')->first();
        // $nextReceiptNumber = $lastDonation ? (intval($lastDonation->receipt_number) + 1) : 1;

        // return view('admin.donation.create', [
        //     'nextReceiptNumber' => str_pad($nextReceiptNumber, 6, '0', STR_PAD_LEFT)
        // ]);
        return view('admin.donation.create');
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                // 'receipt_number' => 'required|string|unique:donations',
                'receipt_number' => 'nullable|string',
                'date' => 'required|date',
                'full_name' => 'required|string|max:255',
                'mobile_number' => 'nullable|string|size:10|regex:/^[0-9]+$/',
                'address' => 'nullable|string',
                'amount' => 'required|numeric|min:0',
                'donation_for' => 'required|string|max:255',
                'comment' => 'nullable|string',
                'pan_number' => 'nullable|string|max:10|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
                'payment_mode' => 'required|in:cash,cheque,online',
                // 'bank_name' => 'nullable|required_if:payment_mode,cheque|string|max:255',
                // 'cheque_number' => 'nullable|required_if:payment_mode,cheque|string|max:50',
                // 'cheque_date' => 'nullable|required_if:payment_mode,cheque|date',
                // 'transaction_id' => 'nullable|required_if:payment_mode,online|string|max:100',
                // 'transaction_date' => 'nullable|required_if:payment_mode,online|date',
            ];
            $messages = [
                // 'receipt_number.required' => __('validation.required_receipt_number'),
                'receipt_number.string' => __('validation.string_receipt_number'),
                'date.required' => __('validation.required_date'),
                'date.date' => __('validation.date_date'),
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
                'payment_mode.required' => __('validation.required_payment_mode'),
                'payment_mode.in' => __('validation.in_payment_mode'),
                'bank_name.string' => __('validation.string_bank_name'),
                'cheque_number.string' => __('validation.string_cheque_number'),
                'cheque_date.date' => __('validation.date_cheque_date'),
                'transaction_id.string' => __('validation.string_transaction_id'),
                'transaction_date.date' => __('validation.date_transaction_date'),
            ];

            // Create a validator instance
            $validator = Validator::make($request->all(), $rules, $messages);

            // Check if validation fails
            if ($validator->fails()) {
                // Return back with errors and old input
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $validated = $validator->validated();

            // Format the mobile number
            $mobileNumber = $validated['mobile_number'];

            if (preg_match('/^\d{10}$/', $mobileNumber)) {
                $validated['mobile_number'] = '+91' . $mobileNumber;
            }

            $validated = array_map(function ($value) {
                return is_string($value) ? strip_tags($value) : $value;
            }, $validated);

            Donation::create($validated);

            return redirect()->route('admin.donation.index')
                ->with('success', __('portal.donation_receipt_created'));
        } catch (\Throwable $th) {
            Log::error('DonationController@store Error: ' . $th->getMessage());
            return redirect()->route('admin.donation.index')
                ->with('error', $th->getMessage());
        }
    }

    public function show(Donation $donation)
    {
        return view('admin.donation.show', compact('donation'));
    }

    public function edit(Donation $donation)
    {
        $mobile = preg_replace('/\+91/', '', $donation->mobile_number);
        $donation->mobile_number = $mobile;

        return view('admin.donation.edit', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {
        try {
            $rules = [
                // 'receipt_number' => 'required|string|unique:donations',
                'receipt_number' => 'nullable|string',
                'date' => 'required|date',
                'full_name' => 'required|string|max:255',
                'mobile_number' => 'nullable|string|size:10|regex:/^[0-9]+$/',
                'address' => 'nullable|string',
                'amount' => 'required|numeric|min:0',
                'donation_for' => 'required|string|max:255',
                'comment' => 'nullable|string',
                'pan_number' => 'nullable|string|max:10|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
                // 'payment_mode' => 'required|in:cash,cheque,online',
                // 'bank_name' => 'nullable|required_if:payment_mode,cheque|string|max:255',
                // 'cheque_number' => 'nullable|required_if:payment_mode,cheque|string|max:50',
                // 'cheque_date' => 'nullable|required_if:payment_mode,cheque|date',
                // 'transaction_id' => 'nullable|required_if:payment_mode,online|string|max:100',
                // 'transaction_date' => 'nullable|required_if:payment_mode,online|date',
            ];
            $messages = [
                // 'receipt_number.required' => __('validation.required_receipt_number'),
                'receipt_number.string' => __('validation.string_receipt_number'),
                'date.required' => __('validation.required_date'),
                'date.date' => __('validation.date_date'),
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
                // 'payment_mode.required' => __('validation.required_payment_mode'),
                // 'payment_mode.in' => __('validation.in_payment_mode'),
                // 'bank_name.string' => __('validation.string_bank_name'),
                // 'cheque_number.string' => __('validation.string_cheque_number'),
                // 'cheque_date.date' => __('validation.date_cheque_date'),
                // 'transaction_id.string' => __('validation.string_transaction_id'),
                // 'transaction_date.date' => __('validation.date_transaction_date'),
            ];

            // Create a validator instance
            $validator = Validator::make($request->all(), $rules, $messages);

            // Check if validation fails
            if ($validator->fails()) {
                // Return back with errors and old input
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $validated = $validator->validated();

            // Format the mobile number
            $mobileNumber = $validated['mobile_number'];

            if (preg_match('/^\d{10}$/', $mobileNumber)) {
                $validated['mobile_number'] = '+91' . $mobileNumber;
            }

            $validated = array_map(function ($value) {
                return is_string($value) ? strip_tags($value) : $value;
            }, $validated);

            $donation->update($validated);

            return redirect()->route('admin.donation.index')
                ->with('success', __('portal.donation_receipt_updated'));
        } catch (\Throwable $th) {
            Log::error('DonationController@update Error: ' . $th->getMessage());
            return redirect()->route('admin.donation.index')
                ->with('error', $th->getMessage());
        }
    }

    // public function destroy(Donation $donation)
    // {
    //     $donation->delete();

    //     return redirect()->route('admin.donation.index')
    //         ->with('success', 'Donation receipt deleted successfully!');
    // }

    public function destroy(Request $request)
    {
        try {
            $donationId = $request->input('donation_id');

            $donation = Donation::find($donationId);
            $donation->delete();

            // permenently delete this record
            // $form = Donation::withTrashed()->find($donationId);
            // $form->forceDelete();

            return redirect()->route('admin.donation.index')->with('success', __('portal.donation_receipt_deleted'));
        } catch (\Throwable $th) {
            Log::error('DonationController@destroy Error: ' . $th->getMessage());
            return redirect()->route('admin.donation.index')
                ->with('error', $th->getMessage());
        }
    }

    public function export()
    {
        try {
            return Excel::download(new DonationExport, 'all_Donation_List.xlsx');
        } catch (\Throwable $th) {
            Log::error('DonationController@export Error: ' . $th->getMessage());
        }
    }
}
