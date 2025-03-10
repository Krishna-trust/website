<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;

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
            'name' => 'required',
            'post' => 'nullable',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|integer',
        ],[
            'name.required' => __('validation.required_name'),
            'post.required' => __('validation.required_post'),
            'description.required' => __('validation.required_description'),
            'image.required' => __('validation.required_image'),
            'image.mimes' => __('validation.image'),
            'image.max' => __('validation.max'),
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonial_images', 'public');
        }

        // translate to english
        $tr = new GoogleTranslate('en');
        $en_name =  $tr->translate($request->name);
        $en_post = $tr->translate($request->post);
        $en_description = $tr->translate($request->description);

        Testimonial::create([
            'gu_name' => $request->name,
            'en_name' => $en_name,
            'gu_post' => $request->post,
            'en_post' => $en_post,
            'gu_description' => $request->description,
            'en_description' => $en_description,
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
            'name' => 'required',
            'post' => 'nullable',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'name.required' => __('validation.required_name'),
            'post.required' => __('validation.required_post'),
            'description.required' => __('validation.required_description'),
            'image.mimes' => __('validation.image'),
            'image.max' => __('validation.max'),
            'image.uploaded' => __('validation.uploaded'),
        ]);

        $tr = new GoogleTranslate('en');
        $en_post = $tr->translate($request->post);
        $en_description = $tr->translate($request->description);
        $en_name = $tr->translate($request->name);

        $data = [
            'gu_name' => $request->name,
            'en_name' => $en_name,
            'gu_post' => $request->post,
            'en_post' => $en_post,
            'gu_description' => $request->description,
            'en_description' => $en_description,
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
