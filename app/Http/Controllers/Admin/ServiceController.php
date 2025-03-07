<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $request->validate([
            'en_title' => 'required',
            'gu_title' => 'required',
            'en_description' => 'required',
            'gu_description' => 'required',
            'status' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'en_title.required' => __('validation.required_en_title'),
            'gu_title.required' => __('validation.required_gu_title'),
            'en_description.required' => __('validation.required_en_description'),
            'gu_description.required' => __('validation.required_gu_description'),
            'status.required' => __('validation.required_status'),
            'image.required' => __('validation.required_image'),
            'image.mimes' => __('validation.image'),
            'image.max' => __('validation.max'),
            'image.uploaded' => __('validation.uploaded'),
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('service_images', 'public');
        }

        Service::create([
            'en_title' => $request->en_title,
            'gu_title' => $request->gu_title,
            'en_description' => $request->en_description,
            'gu_description' => $request->gu_description,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.service.index')
            ->with('success', __('portal.service_created'));
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'image.mimes' => __('validation.image'),
            'image.max' => __('validation.max'),
            'image.uploaded' => __('validation.uploaded'),
        ]);

        $data = [
            'en_title' => $request->en_title,
            'gu_title' => $request->gu_title,
            'en_description' => $request->en_description,
            'gu_description' => $request->gu_description,
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

        return redirect()->route('admin.service.index')
            ->with('success', __('portal.service_updated'));
    }

    public function destroy(Request $request)
    {
        $serviceId = $request->input('service_id');

        $service = Service::findOrFail($serviceId);

        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.service.index')
            ->with('success', __('portal.service_deleted'));
    }
}
