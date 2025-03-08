<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LabharthiExport;
use App\Http\Controllers\Controller;
use App\Models\Labharthi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'native_place' => 'required|string',
            'cast' => 'required|string|',
            'sub_cast' => 'nullable|string|',
            'adhar_number' => 'required|string|size:12|regex:/^[0-9]+$/',
            'mobile_number' => 'required|string|size:10|regex:/^[0-9]+$/',
            'category' => 'required|in:vidhva,vidhur,rejected',
            'work' => 'required|string',
            'identification_mark' => 'nullable|string',
            'income_source' => 'required|string',
            'property' => 'nullable|string',
            'reasion_for_not_working' => 'nullable|string',
            'reasion_for_tifin' => 'required|string',
            'comment_from_trust' => 'nullable|string',
            'tifin_starting_date' => 'required|date',
            'tifin_ending_date' => 'nullable|date|after_or_equal:tifin_starting_date',
            'reasion_for_tifin_stop' => 'nullable|string',
        ], [
            'name.required' => __('validation.required_name'),
            'name.string' => __('validation.string_name'),
            'name.max' => __('validation.max_name'),
            'address.required' => __('validation.required_address'),
            'address.string' => __('validation.string_address'),
            'native_place.required' => __('validation.required_native_place'),
            'native_place.string' => __('validation.string_native_place'),
            'native_place.max' => __('validation.max_native_place'),
            'cast.required' => __('validation.required_cast'),
            'cast.string' => __('validation.string_cast'),
            'cast.max' => __('validation.max_cast'),
            'sub_cast.string' => __('validation.string_sub_cast'),
            'sub_cast.max' => __('validation.max_sub_cast'),
            'adhar_number.required' => __('validation.required_adhar_number'),
            'adhar_number.string' => __('validation.string_adhar_number'),
            'adhar_number.size' => __('validation.size_adhar_number'),
            'adhar_number.regex' => __('validation.regex_adhar_number'),
            'mobile_number.required' => __('validation.required_mobile_number'),
            'mobile_number.string' => __('validation.string_mobile_number'),
            'mobile_number.size' => __('validation.size_mobile_number'),
            'mobile_number.regex' => __('validation.regex_mobile_number'),
            'category.required' => __('validation.required_category'),
            'work.required' => __('validation.required_work'),
            'work.string' => __('validation.string_work'),
            'work.max' => __('validation.max_work'),
            'identification_mark.string' => __('validation.string_identification_mark'),
            'identification_mark.max' => __('validation.max_identification_mark'),
            'income_source.required' => __('validation.required_income_source'),
            'income_source.string' => __('validation.string_income_source'),
            'property.string' => __('validation.string_property'),
            'reasion_for_not_working.required' => __('validation.required_reasion_for_not_working'),
            'reasion_for_not_working.string' => __('validation.string_reasion_for_not_working'),
            'reasion_for_tifin.required' => __('validation.required_reasion_for_tifin'),
            'reasion_for_tifin.string' => __('validation.string_reasion_for_tifin'),
            'comment_from_trust.string' => __('validation.string_comment_from_trust'),
            'tifin_starting_date.required' => __('validation.required_tifin_starting_date'),
            'tifin_starting_date.date' => __('validation.date_tifin_starting_date'),
            'tifin_ending_date.date' => __('validation.date_tifin_ending_date'),
            'reasion_for_tifin_stop.string' => __('validation.string_reasion_for_tifin_stop'),
        ]);

        // Sanitize inputs
        $validated = array_map(function ($value) {
            return is_string($value) ? strip_tags($value) : $value;
        }, $validated);

        Labharthi::create($validated);

        return redirect()->route('admin.labharthi.index')
            ->with('success', __('portal.labharthi_created'));
    }

    public function edit(Labharthi $labharthi)
    {
        return view('admin.labharthi.edit', compact('labharthi'));
    }

    public function update(Request $request, Labharthi $labharthi)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'native_place' => 'required|string|max:255',
            'cast' => 'required|string|max:255',
            'sub_cast' => 'required|string|max:255',
            'adhar_number' => 'required|string|size:12|regex:/^[0-9]+$/',
            'mobile_number' => 'required|string|size:10|regex:/^[0-9]+$/',
            'category' => 'required|in:vidhva,vidhur,rejected',
            'work' => 'required|string|max:255',
            'identification_mark' => 'required|string|max:255',
            'income_source' => 'nullable|string',
            'property' => 'nullable|string',
            'reasion_for_not_working' => 'nullable|string',
            'reasion_for_tifin' => 'nullable|string',
            'comment_from_trust' => 'nullable|string',
            'tifin_starting_date' => 'required|date',
            'tifin_ending_date' => 'nullable|date|after_or_equal:tifin_starting_date',
            'reasion_for_tifin_stop' => 'nullable|string|max:255',
        ], [
            'name.required' => __('validation.required_name'),
            'name.string' => __('validation.string_name'),
            'name.max' => __('validation.max_name'),
            'address.required' => __('validation.'),
            'address.string' => __('validation.string_address'),
            'native_place.string' => __('validation.string_native_place'),
            'native_place.max' => __('validation.max_native_place'),
            'cast.string' => __('validation.string_cast'),
            'cast.max' => __('validation.max_cast'),
            'sub_cast.string' => __('validation.string_sub_cast'),
            'sub_cast.max' => __('validation.max_sub_cast'),
            'adhar_number.string' => __('validation.string_adhar_number'),
            'adhar_number.size' => __('validation.size_adhar_number'),
            'adhar_number.regex' => __('validation.regex_adhar_number'),
            'mobile_number.string' => __('validation.string_mobile_number'),
            'mobile_number.size' => __('validation.size_mobile_number'),
            'mobile_number.regex' => __('validation.regex_mobile_number'),
            'work.string' => __('validation.string_work'),
            'work.max' => __('validation.max_work'),
            'identification_mark.string' => __('validation.string_identification_mark'),
            'identification_mark.max' => __('validation.max_identification_mark'),
            'income_source.string' => __('validation.string_income_source'),
            'property.string' => __('validation.string_property'),
            'reasion_for_not_working.string' => __('validation.string_reasion_for_not_working'),
            'reasion_for_tifin.string' => __('validation.string_reasion_for_tifin'),
            'comment_from_trust.string' => __('validation.string_comment_from_trust'),
            'tifin_starting_date.required' => __('validation.required_tifin_starting_date'),
            'tifin_starting_date.date' => __('validation.date_tifin_starting_date'),
            'tifin_ending_date.date' => __('validation.date_tifin_ending_date'),
            'reasion_for_tifin_stop.string' => __('validation.string_reasion_for_tifin_stop'),
        ]);

        // Sanitize inputs
        $validated = array_map(function ($value) {
            return is_string($value) ? strip_tags($value) : $value;
        }, $validated);

        $labharthi->update($validated);

        return redirect()->route('admin.labharthi.index')
            ->with('success', __('portal.labharthi_updated'));
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

        return redirect()->route('admin.labharthi.index')->with('success', __('portal.labharthi_deleted'));
    }

    public function export()
    {
        return Excel::download(new LabharthiExport, 'all_Labharthi_List.xlsx');
    }
}
