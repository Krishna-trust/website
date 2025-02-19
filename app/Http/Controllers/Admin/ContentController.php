<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
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
    }

    public function edit(Content $content)
    {
        return view('admin.content.edit', compact('content'));
    }

   public function update(Request $request, Content $content)
   {
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
           ->with('success', 'Content updated successfully');
   }

   public function destroy(Content $content)
   {
       // Delete the image from storage
       if ($content->image) {
           Storage::disk('public')->delete($content->image);
       }
   
       $content->delete();
   
       return redirect()->route('admin.contents.index')
           ->with('success', 'Content deleted successfully');
   }
}
