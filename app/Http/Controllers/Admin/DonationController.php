<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::latest('date')
            ->paginate(25);

        return view('admin.donation.index', compact('donations'));
    }

    public function create()
    {
        // Get the last receipt number and increment it
        $lastDonation = Donation::orderBy('receipt_number', 'desc')->first();
        $nextReceiptNumber = $lastDonation ? (intval($lastDonation->receipt_number) + 1) : 1;

        return view('admin.donation.create', [
            'nextReceiptNumber' => str_pad($nextReceiptNumber, 6, '0', STR_PAD_LEFT)
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receipt_number' => 'required|string|unique:donations',
            'date' => 'required|date',
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|size:10|regex:/^[0-9]+$/',
            'address' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'donation_for' => 'required|string|max:255',
            'comment' => 'nullable|string',
            'pan_number' => 'nullable|string|max:10|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
            'payment_mode' => 'required|in:cash,cheque,online,upi',
            'bank_name' => 'nullable|required_if:payment_mode,cheque|string|max:255',
            'cheque_number' => 'nullable|required_if:payment_mode,cheque|string|max:50',
            'cheque_date' => 'nullable|required_if:payment_mode,cheque|date',
            'transaction_id' => 'nullable|required_if:payment_mode,online,upi|string|max:100',
            'transaction_date' => 'nullable|required_if:payment_mode,online,upi|date',
        ]);

        // Sanitize inputs
        $validated = array_map(function ($value) {
            return is_string($value) ? strip_tags($value) : $value;
        }, $validated);

        Donation::create($validated);

        return redirect()->route('admin.donation.index')
            ->with('success', 'Donation receipt created successfully!');
    }

    public function show(Donation $donation)
    {
        return view('admin.donation.show', compact('donation'));
    }

    public function edit(Donation $donation)
    {
        return view('admin.donation.edit', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|size:10|regex:/^[0-9]+$/',
            'address' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'donation_for' => 'required|string|max:255',
            'comment' => 'nullable|string',
            'pan_number' => 'nullable|string|max:10|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
            'payment_mode' => 'required|in:cash,cheque,online,upi',
            'bank_name' => 'nullable|required_if:payment_mode,cheque|string|max:255',
            'cheque_number' => 'nullable|required_if:payment_mode,cheque|string|max:50',
            'cheque_date' => 'nullable|required_if:payment_mode,cheque|date',
            'transaction_id' => 'nullable|required_if:payment_mode,online,upi|string|max:100',
            'transaction_date' => 'nullable|required_if:payment_mode,online,upi|date',
        ]);

        // Sanitize inputs
        $validated = array_map(function ($value) {
            return is_string($value) ? strip_tags($value) : $value;
        }, $validated);

        $donation->update($validated);

        return redirect()->route('admin.donation.index')
            ->with('success', 'Donation receipt updated successfully!');
    }

    // public function destroy(Donation $donation)
    // {
    //     $donation->delete();

    //     return redirect()->route('admin.donation.index')
    //         ->with('success', 'Donation receipt deleted successfully!');
    // }

    public function destroy(Request $request)
    {
        $donationId = $request->input('donation_id');

        $donation = Donation::find($donationId);
        $donation->delete();

         // permenently delete this record
        // $form = Donation::withTrashed()->find($donationId);
        // $form->forceDelete();

        return redirect()->route('admin.donation.index')->with('success', 'Donation receipt deleted successfully!');
    }
}
