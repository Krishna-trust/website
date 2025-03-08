<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en_name' => 'required',
            'gu_name' => 'required',
            'en_post' => 'nullable',
            'gu_post' => 'nullable',
            'en_description' => 'required',
            'gu_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|mએax:2048',
            'status' => 'required|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonial_images', 'public');
        }

        Testimonial::create([
            'en_name' => $request->en_name,
            'gu_name' => $request->gu_name,
            'en_post' => $request->en_post,
            'gu_post' => $request->gu_post,
            'en_description' => $request->en_description,
            'gu_description' => $request->gu_description,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.testimonial.index')
            ->with('success', __('portal.testimonial_created'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'en_name' => $request->en_name,
            'gu_name' => $request->gu_name,
            'en_post' => $request->en_post,
            'gu_post' => $request->gu_post,
            'en_description' => $request->en_description,
            'gu_description' => $request->gu_description,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $data['image'] = $request->file('image')->store('testimonial_images', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonial.index')
            ->with('success', __('portal.testimonial_updated'));
    }

    public function destroy(Request $request)
    {
        $testimonialId = $request->input('testimonial_id');

        $testimonial = Testimonial::findOrFail($testimonialId);

        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonial.index')
            ->with('success', __('portal.testimonial_deleted'));
    }
}
