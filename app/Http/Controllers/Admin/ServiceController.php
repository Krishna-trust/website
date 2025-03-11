<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        try {
            // Manually create the validator
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
                'status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'title.required' => __('validation.required_title'),
                'description.required' => __('validation.required_description'),
                'status.required' => __('validation.required_status'),
                'image.required' => __('validation.required_image'),
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

            // Check if the image exists in the request
            if ($request->hasFile('image')) {
                // Store the image in the "public" storage under "service_images"
                $imagePath = $request->file('image')->store('service_images', 'public');
            }

            // Translate title and description to English (if needed)
            $tr = new GoogleTranslate('en');
            $en_title = $tr->translate($request->title);
            $en_description = $tr->translate($request->description);

            // Save the service data
            Service::create([
                'gu_title' => $request->title,
                'en_title' => $en_title,
                'gu_description' => $request->description,
                'en_description' => $en_description,
                'image' => $imagePath,
                'status' => $request->status,
            ]);

            // Redirect to the service index page with a success message
            return redirect()->route('admin.service.index')
                ->with('success', __('portal.service_created'));
        } catch (\Exception $e) {
            // Log the error message for debugging
            Log::error('Service creation error: ' . $e->getMessage());

            // Optionally, redirect back with an error message
            return redirect()->back()->withInput()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'title.required' => __('validation.required_title'),
                'description.required' => __('validation.required_description'),
                'image.mimes' => __('validation.image'),
                'image.max' => __('validation.max'),
                'image.uploaded' => __('validation.uploaded'),
            ]);

            // translate to english
            $tr = new GoogleTranslate('en');
            $en_title =  $tr->translate($request->title);
            $en_description = $tr->translate($request->description);

            $data = [
                'gu_title' => $request->title,
                'en_title' => $en_title,
                'gu_description' => $request->description,
                'en_description' => $en_description,
                'status' => $request->status,
            ];

            if ($request->hasFile('image')) {
                // Delete old image
                if ($service->image) {
                    Storage::disk('public')->delete($service->image);
                }
                $data['image'] = $request->file('image')->store('service_images', 'public');
            }

            $service->update($data);

            Log::info('service update : ' . $service->id);
            return redirect()->route('admin.service.index')
                ->with('success', __('portal.service_updated'));
        } catch (\Throwable $th) {
            Log::error('ServiceController@update Error: ' . $th->getMessage());
            return redirect()->route('admin.service.index')
                ->with('error', $th->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $serviceId = $request->input('service_id');

            $service = Service::findOrFail($serviceId);

            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            $service->delete();

            return redirect()->route('admin.service.index')
                ->with('success', __('portal.service_deleted'));
        } catch (\Throwable $th) {
            Log::error('ServiceController@destroy Error: ' . $th->getMessage());
            return redirect()->route('admin.service.index')
                ->with('error', $th->getMessage());
        }
    }
}
