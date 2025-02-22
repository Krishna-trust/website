<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Labharthi;
use Illuminate\Http\Request;

class LabharthiController extends Controller
{
    public function index(Request $request)
    {
        $query = Labharthi::query();

        // Search functionality
        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('mobile_number', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
            });
        }

        // Get paginated results
        $labharthis = $query->latest()->paginate($request->get('per_page', 25));

        return view('admin.labharthi.index', compact('labharthis'));
    }

    public function create()
    {
        return view('admin.labharthi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'native_place' => 'nullable|string|max:255',
            'cast' => 'nullable|string|max:255',
            'sub_cast' => 'nullable|string|max:255',
            'adhar_number' => 'nullable|string|size:12|regex:/^[0-9]+$/',
            'mobile_number' => 'nullable|string|size:10|regex:/^[0-9]+$/',
            'category' => 'nullable|in:vidhva,vidhur,rejected',
            'work' => 'nullable|string|max:255',
            'identification_mark' => 'nullable|string|max:255',
            'income_source' => 'nullable|string',
            'property' => 'nullable|string',
            'reasion_for_not_working' => 'nullable|string',
            'reasion_for_tifin' => 'nullable|string',
            'comment_from_trust' => 'nullable|string',
            'tifin_starting_date' => 'nullable|date',
            'tifin_ending_date' => 'nullable|date|after_or_equal:tifin_starting_date',
            'reasion_for_tifin_stop' => 'nullable|string|max:255',
        ]);

        // Sanitize inputs
        $validated = array_map(function ($value) {
            return is_string($value) ? strip_tags($value) : $value;
        }, $validated);

        Labharthi::create($validated);

        return redirect()->route('admin.labharthi.index')
            ->with('success', 'Labharthi added successfully!');
    }

    public function edit(Labharthi $labharthi)
    {
        return view('admin.labharthi.edit', compact('labharthi'));
    }

    public function update(Request $request, Labharthi $labharthi)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'native_place' => 'nullable|string|max:255',
            'cast' => 'nullable|string|max:255',
            'sub_cast' => 'nullable|string|max:255',
            'adhar_number' => 'nullable|string|size:12|regex:/^[0-9]+$/',
            'mobile_number' => 'nullable|string|size:10|regex:/^[0-9]+$/',
            'category' => 'nullable|in:vidhva,vidhur,rejected',
            'work' => 'nullable|string|max:255',
            'identification_mark' => 'nullable|string|max:255',
            'income_source' => 'nullable|string',
            'property' => 'nullable|string',
            'reasion_for_not_working' => 'nullable|string',
            'reasion_for_tifin' => 'nullable|string',
            'comment_from_trust' => 'nullable|string',
            'tifin_starting_date' => 'nullable|date',
            'tifin_ending_date' => 'nullable|date|after_or_equal:tifin_starting_date',
            'reasion_for_tifin_stop' => 'nullable|string|max:255',
        ]);

        // Sanitize inputs
        $validated = array_map(function ($value) {
            return is_string($value) ? strip_tags($value) : $value;
        }, $validated);

        $labharthi->update($validated);

        return redirect()->route('admin.labharthi.index')
            ->with('success', 'Labharthi updated successfully!');
    }

    // public function destroy(Labharthi $labharthi)
    // {
    //     $labharthi->delete();
    //     return redirect()->route('admin.labharthi.index')
    //         ->with('success', 'Labharthi deleted successfully!');
    // }

    public function destroy(Request $request)
    {
        $labharthiId = $request->input('labharthi_id');

        $labharthi = Labharthi::find($labharthiId);
        $labharthi->delete();

        // permenently delete this record
        // $form = Labharthi::withTrashed()->find($id);
        // $form->forceDelete();

        return redirect()->route('admin.labharthi.index')->with('success', 'Labharthi deleted successfully!');
    }
}
