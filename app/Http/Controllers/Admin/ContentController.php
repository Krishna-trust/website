<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::latest()->paginate(25);
        return view('admin.content.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'upload_date' => 'required|date'
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('content_images', 'public');
            }

            Content::create([
                'image' => $imagePath,
                'upload_date' => $request->upload_date
            ]);

            return redirect()->route('admin.contents.index')
                ->with('success', 'Content added successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.contents.index')
                ->with('error', 'Content not added');
        }
    }

    public function edit(Content $content)
    {
        return view('admin.content.edit', compact('content'));
    }

    public function update(Request $request, Content $content)
    {
        try {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'upload_date' => 'required|date'
            ]);

            $data = [
                'upload_date' => $request->upload_date
            ];

            if ($request->hasFile('image')) {
                // Delete old image
                if ($content->image) {
                    Storage::disk('public')->delete($content->image);
                }
                $data['image'] = $request->file('image')->store('content_images', 'public');
            }

            $content->update($data);

            return redirect()->route('admin.contents.index')
                ->with('success', __('portal.content_updated'));
        } catch (\Throwable $th) {
            Log::error('ContentController@update Error: ' . $th->getMessage());
            return redirect()->route('admin.contents.index')
                ->with('error', $th->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $contentId = $request->input('content_id');

            $content = Content::findOrFail($contentId);

            if ($content->image) {
                Storage::disk('public')->delete($content->image);
            }

            $content->delete();

            return redirect()->route('admin.contents.index')
                ->with('success', __('portal.content_deleted'));
        } catch (\Throwable $th) {
            Log::error('ContentController@destroy Error: ' . $th->getMessage());
            return redirect()->route('admin.contents.index')
                ->with('error', $th->getMessage());
        }
    }
}
