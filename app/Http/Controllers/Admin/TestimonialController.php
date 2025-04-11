<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {

        try {
            $limit = $request->limit ?? 10;
            $query = Testimonial::query();

            // Search functionality
            if ($request->search) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('en_name', 'like', "%{$search}%")
                        ->orWhere('gu_name', 'like', "%{$search}%")
                        ->orWhere('en_post', 'like', "%{$search}%")
                        ->orWhere('gu_post', 'like', "%{$search}%")
                        ->orWhere('en_description', 'like', "%{$search}%")
                        ->orWhere('gu_description', 'like', "%{$search}%");
                });
            }

            // Get paginated results
            $testimonials = $query->latest()->paginate($request->get('per_page', $limit));

            if (request()->ajax()) {
                return view('admin.testimonial.view', compact('testimonials'));
            }

            return view('admin.testimonial.index', compact('testimonials'));
        } catch (\Throwable $th) {
            Log::error('testimonialController@index Error: ' . $th->getMessage());
            return redirect()->route('admin.testimonial.index')
                ->with('error', $th->getMessage());
        }
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        try {

            $rules = [
                'name' => 'required',
                'post' => 'nullable',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|integer',
            ];
            $messages = [
                'name.required' => __('validation.required_name'),
                'post.required' => __('validation.required_post'),
                'description.required' => __('validation.required_description'),
                'image.required' => __('validation.required_image'),
                'image.mimes' => __('validation.image'),
                'image.max' => __('validation.max'),
            ];

            // Create a validator instance
            $validator = Validator::make($request->all(), $rules, $messages);

            // Check if validation fails
            if ($validator->fails()) {
                // Return back with errors and old input
                return redirect()->back()->withErrors($validator)->withInput();
            }

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
        } catch (\Exception $e) {
            Log::error('TestimonialController@store Error: ' . $e->getMessage());
            return redirect()->route('admin.testimonial.index')
                ->with('error', $e->getMessage());
        }
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        try {

            $request->validate([
                'name' => 'required',
                'post' => 'nullable',
                'description' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
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
        } catch (\Throwable $th) {
            Log::error('TestimonialController@update Error: ' . $th->getMessage());
            return redirect()->route('admin.testimonial.index')
                ->with('error', $th->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {

            $testimonialId = $request->input('testimonial_id');

            $testimonial = Testimonial::findOrFail($testimonialId);

            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }

            $testimonial->delete();

            return redirect()->route('admin.testimonial.index')
                ->with('success', __('portal.testimonial_deleted'));
        } catch (\Throwable $th) {
            Log::error('TestimonialController@destroy Error: ' . $th->getMessage());
            return redirect()->route('admin.testimonial.index')
                ->with('error', $th->getMessage());
        }
    }
}
