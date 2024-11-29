<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function BlogPage(){
        return view('backend.pages.blog-page');
    }
    public function BlogList(){
        try{
            $blogList= Blog::with('category')->get();
            return response()->json([
                'status' => 'success',
                'rows'=> $blogList
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage()
            ]);
        }
    }
    public function getCategories()
    {
        try {
            $categories = Category::select('id', 'name')->get();
            return response()->json([
                'status' => 'success',
                'categories' => $categories,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage(),
            ]);
        }
    }

    // Create a new blog
    public function BlogCreate(Request $request)
    {
        try {
            $validated = $request->validate([
                'category_id' => 'required|exists:categories,id',
                'title' => 'required|string|max:255',
                'date' => 'required|date',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $imgUrl = "assets/images/default.jpg"; // Default image
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $imgName = time() . '-' . $img->getClientOriginalName();
                $img->move(public_path('frontend/assets/images/blog'), $imgName);
                $imgUrl = "frontend/assets/images/blog/{$imgName}";
            }

            Blog::create([
                'category_id' => $validated['category_id'],
                'title' => $validated['title'],
                'description' => $validated['description'],
                'date' => $validated['date'],
                'status' => 'active',
                'image' => $imgUrl,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Blog created successfully.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage(),
            ]);
        }
    }
    public function BlogById(Request $request)
    {
        try {
            $blogById = Blog::find($request->input('id'));
    
            if ($blogById) {
                return response()->json([
                    'status' => 'success',
                    'blog' => $blogById
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Top category not found'
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
    public function BlogUpdate(Request $request)
{
    $request->validate([
        'id' => 'required|exists:blogs,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'status' => 'required|in:active,inactive',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    try {
        $blog = Blog::findOrFail($request->id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists and is not the default
            if ($blog->image && $blog->image !== 'images/default.png' && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            // Save the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/assets/images/blog'), $imageName);
            $blog->image = 'frontend/assets/images/blog/' . $imageName;
        } elseif ($request->filled('existing_image')) {
            // Retain existing image
            $blog->image = $request->existing_image;
        }

        // Update other fields
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->date = $request->date;
        $blog->status = $request->status;
        $blog->category_id = $request->category_id;

        $blog->save();

        return response()->json(['status' => 'success', 'message' => 'Blog updated successfully.']);
    } catch (Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
    }
}

public function BlogDelete(Request $request)
{
    try {
        // Find the advertisement by ID
        $blog = Blog::find($request->input('id'));

        if ($blog) {
            // Get the image path from the advertisement record
            $imagePath = public_path($blog->image);

            // Delete the image from the server if it exists
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Delete the blog record
            $blog->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'blog deleted'
            ]);
        } else {
            return response()->json([
                'status' => 'fail',
                'message' => 'blog not found'
            ]);
        }
    } catch (Exception $e) {
        return response()->json([
            'status' => 'fail',
            'message' => 'Something went wrong: ' . $e->getMessage()
        ]);
    }
}
    
}