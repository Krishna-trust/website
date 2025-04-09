<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\GoogleTranslate;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        try {
            Log::info($request->all());
            $limit = $request->limit ?? 10;
            $query = Employee::query();

            // Search functionality
            if ($request->search) {
                $search = $request->search;
                Log::info($search);
                $query->where(function ($q) use ($search) {
                    $q->where('purpose', 'like', "%{$search}%")
                        ->orWhere('comment', 'like', "%{$search}%")
                        ->orWhere('date', 'like', "%{$search}%");
                });
            }

            // Get paginated results
            $employees = $query->latest()->paginate($limit);

            if (request()->ajax()) {
                return view('admin.employee.view', compact('employees'));
            }
            return view('admin.employee.index', compact('employees'));
        } catch (\Throwable $th) {
            Log::error('EmployeeController@index Error: ' . $th->getMessage());
            return redirect()->route('admin.employee.index')
                ->with('error', $th->getMessage());
        }
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        try {
            // Manually create the validator
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
                'mobile_number' => 'required|string|size:10|regex:/^[0-9]+$/',
                'email' => 'nullable',
                // 'password' => 'nullable',
                'status' => 'required',
                'salary' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'name.required' => __('validation.required_name'),
                'address.required' => __('validation.required_address'),
                'mobile_number.required' => __('validation.required_mobile_number'),
                'mobile_number.string' => __('validation.string_mobile_number'),
                'mobile_number.size' => __('validation.size_mobile_number'),
                'mobile_number.regex' => __('validation.regex_mobile_number'),
                // 'email.required' => __('validation.required_email'),
                // 'password.required' => __('validation.required_password'),
                'status.required' => __('validation.required_status'),
                'salary.required' => __('validation.required_salary'),
                'image.required' => __('validation.required_employee_image'),
                'image.mimes' => __('validation.image'),
                'image.max' => __('validation.max'),
            ]);

            // Check if the validation fails
            if ($validator->fails()) {
                // Redirect back with validation errors and old input
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('employee_images', 'public');
            }

            // Save the employee data
            Employee::create([
                'name' => $request->name ?? '',
                'address' => $request->address ?? '',
                'mobile_number' => $request->mobile_number ?? '',
                'email' => $request->email ?? '',
                'password' => '',
                'status' => $request->status ?? '',
                'salary' => $request->salary ?? '',
                'image' => $imagePath,
            ]);

            // Redirect to the employee index page with a success message
            return redirect()->route('admin.employee.index')
                ->with('success', __('portal.employee_created'));
        } catch (\Exception $e) {
            // Log the error message for debugging
            Log::error('employee creation error: ' . $e->getMessage());

            // Optionally, redirect back with an error message
            return redirect()->back()->withInput()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function edit(Employee $employee)
    {
        return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'mobile_number' => 'required|string|size:10|regex:/^[0-9]+$/',
                'email' => 'nullable',
                // 'password' => 'required',
                'status' => 'required',
                'salary' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'name.required' => __('validation.required_name'),
                'address.required' => __('validation.required_address'),
                'mobile_number.required' => __('validation.required_mobile_number'),
                'mobile_number.string' => __('validation.string_mobile_number'),
                'mobile_number.size' => __('validation.size_mobile_number'),
                'mobile_number.regex' => __('validation.regex_mobile_number'),
                // 'email.required' => __('validation.required_email'),
                // 'password.required' => __('validation.required_password'),
                'status.required' => __('validation.required_status'),
                'salary.required' => __('validation.required_salary'),
                'image.required' => __('validation.required_employee_image'),
                'image.mimes' => __('validation.image'),
                'image.max' => __('validation.max'),
            ]);


            $data = [
                'name' => $request->name ?? '',
                'address' => $request->address ?? '',
                'mobile_number' => $request->mobile_number ?? '',
                'email' => $request->email ?? '',
                'status' => $request->status ?? '',
                'salary' => $request->salary ?? '',
            ];

            if ($request->hasFile('image')) {
                // Delete old image
                if ($employee->image) {
                    Storage::disk('public')->delete($employee->image);
                }
                $data['image'] = $request->file('image')->store('employee_images', 'public');
            }

            $employee->update($data);

            Log::info('employee update : ' . $employee->id);
            return redirect()->route('admin.employee.index')
                ->with('success', __('portal.employee_updated'));
        } catch (\Throwable $th) {
            Log::error('EmployeeController@update Error: ' . $th->getMessage());
            return redirect()->route('admin.employee.index')
                ->with('error', $th->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $employeeId = $request->input('employee_id');

            $employee = Employee::findOrFail($employeeId);

            $employee->delete();

            return redirect()->route('admin.employee.index')
                ->with('success', __('portal.employee_deleted'));
        } catch (\Throwable $th) {
            Log::error('EmployeeController@destroy Error: ' . $th->getMessage());
            return redirect()->route('admin.employee.index')
                ->with('error', $th->getMessage());
        }
    }
}
