<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function ServicePage(){
        return view('backend.pages.service-page');
    }
    public function ServiceList(){
        try{
            $serviceList= Service::get();
            $serviceList = $serviceList->map(function ($service) {
                $service->images = json_decode($service->images); // Convert the images JSON string to an array
                return $service;
            });
            return response()->json([
                'status' => 'success',
                'rows'=> $serviceList
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage()
            ]);
        }
    }
    public function ServiceCreate(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'required|array|min:1', // Ensure at least one image is provided
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validate each image file
        ]);
    
        $imageUrls = []; // Initialize an array to store image URLs
    
        if ($request->hasFile('images')) {
            $images = $request->file('images'); // Get the uploaded files
    
            // Loop through each uploaded image and store it
            foreach ($images as $img) {
                $t = time();
                $fileName = $img->getClientOriginalName();
                $imgName = "{$t}-{$fileName}"; // Generate unique name
                $imgUrl = "frontend/assets/images/service/{$imgName}"; // The image URL path
    
                // Move the image to the desired directory
                $img->move(public_path('frontend/assets/images/service'), $imgName);
    
                // Store each image URL in the array
                $imageUrls[] = $imgUrl;
            }
        }
    
        // Create a new service record in the database
        $service = Service::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'images' => json_encode($imageUrls), // Store images as JSON in the database
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully',
            'data' => $service,
        ]);
    }
    
    
    public function ServiceById(Request $request)
    {
        try {
            $serviceById = Service::find($request->input('id'));
    
            if ($serviceById) {
                return response()->json([
                    'status' => 'success',
                    'service' => $serviceById
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Top service not found'
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
public function ServiceUpdate(Request $request)
{
    try {
        $service = Service::find($request->id);
        if (!$service) {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found'
            ], 404);
        }

        // Get the existing images from the request (if any)
        $existingImages = $request->input('existing_images') ? json_decode($request->input('existing_images')) : [];

        // Delete the existing images from the server
        foreach ($existingImages as $existingImage) {
            $imagePath = public_path($existingImage);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image from the server
            }
        }

        // Handle new uploaded images
        $newImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $newImageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('frontend/assets/images/service'), $newImageName);
                $newImages[] = "frontend/assets/images/service/{$newImageName}";
            }
        }
             // If no new images were uploaded, retain the existing ones
             $allImages = $newImages;

        // Delete the existing images from the folder
        foreach ($existingImages as $existingImage) {
            $imagePath = public_path($existingImage);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image from the server
            }
        }

        // Delete the existing images from the database
        

   
        // Update the service with the new images and other fields
        $service->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'images' => json_encode($allImages), // Store the images as a JSON array
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Service updated successfully'
        ]);
    } catch (Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Error: ' . $e->getMessage()
        ], 500);
    }
}

    
    public function ServiceDelete(Request $request)
    {
        try {
            // Retrieve the service by ID
            $service = Service::find($request->input('id'));
    
            if ($service) {
                // Get the array of image paths from the request
                $imagePaths = $request->input('images'); // Array of image paths
    
                // Loop through each image and delete it from the server
                foreach ($imagePaths as $imagePath) {
                    $fullImagePath = public_path($imagePath);
                    if (file_exists($fullImagePath)) {
                        unlink($fullImagePath); // Delete the image
                    }
                }
    
                // Delete the service record from the database
                $service->delete();
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'Service deleted successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Service not found'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Something went wrong: ' . $e->getMessage()
            ]);
        }
    }
    
    // service data
    public function GetServiceData()
{
    $serviceDataList = Service::all(); // Fetch all services

    // Assuming the images are stored as relative paths in the database (e.g., 'images/service1.jpg')
    foreach ($serviceDataList as $service) {
        $service->images = json_decode($service->images); // Decoding if images are stored as JSON array in the DB
        $service->images = array_map(function($image) {
            return url($image); // Ensure the URL is absolute
        }, $service->images);
    }
    
    return response()->json([
        'status' => 'success',
        'serviceDataList' => $serviceDataList,
    ]);
    
}

}
