<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Sidebar;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function HomeSidebarPage(){
        return view('backend.pages.homeSidebar-page');
    }
    public function HomeSidebarList()
    {
        try {
           
            $homeSidebarList = Sidebar::get();
            // Success response with fetched data
            return response()->json([
                'status' => 'success',
                'rows' => $homeSidebarList,
            ], 200);
    
        } catch (Exception $e) {
            // Catch any errors and return an error response
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function HomeSidebarById(Request $request)
    {
        try {
            $homeSidebarById = Sidebar::find($request->input('id'));
    
            if ($homeSidebarById) {
                return response()->json([
                    'status' => 'success',
                    'homeSidebar' => $homeSidebarById
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Top Header not found'
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
    public function HomeSidebarUpdate(Request $request)
    {
        try {
            $sidebar = Sidebar::find($request->id);
            if (!$sidebar) {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'Sidebar not found'
                ], 404);
            }
    
            $imagePath = $request->existing_image;
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = "frontend/assets/images/sidebar/{$newImageName}";
                $image->move(public_path('frontend/assets/images/sidebar'), $newImageName);
    
                // Delete old image if exists
                if ($sidebar->image && file_exists(public_path($sidebar->image))) {
                    unlink(public_path($sidebar->image));
                }
            }
    
            $sidebar->update([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'github_link' => $request->input('github_link'),
                'twitter_link' => $request->input('twitter_link'),
                'linkedin_link' => $request->input('linkedin_link'),
                'facebook_link' => $request->input('facebook_link'),
                'image' => $imagePath,
            ]);
    
            return response()->json([
                'status' => 'success',
             'message' => 'Sidebar updated successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error', 
            'message' => $e->getMessage()], 500);
        }
    }
    
}
