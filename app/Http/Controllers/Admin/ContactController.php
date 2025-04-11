<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        try {
            $limit = $request->limit ?? 10;
            $query = Contact::query();

            // Search functionality
            if ($request->search) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('mobile', 'like', "%{$search}%")
                        ->orWhere('subject', 'like', "%{$search}%")
                        ->orWhere('message', 'like', "%{$search}%");
                });
            }

            // Get paginated results
            $contacts = $query->latest()->paginate($request->get('per_page', $limit));

            if (request()->ajax()) {
                return view('admin.contact.view', compact('contacts'));
            }

            return view('admin.contact.index', compact('contacts'));
        } catch (\Throwable $th) {
            Log::error('contactController@index Error: ' . $th->getMessage());
            return redirect()->route('admin.contact.index')
                ->with('error', $th->getMessage());
        }
    }
}
