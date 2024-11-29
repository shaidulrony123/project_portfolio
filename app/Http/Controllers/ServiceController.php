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
    public function ServiceCreate(Request $request) {
        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$t}-{$file_name}";
        $img_url = "frontend/assets/images/service/{$img_name}";
    
        $img->move(public_path('frontend/assets/images/service'), $img_name);
        
         Service::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $img_url,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully'
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
    
            $imagePath = $request->existing_image;
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = "frontend/assets/images/service/{$newImageName}";
                $image->move(public_path('frontend/assets/images/service'), $newImageName);
    
                // Delete old image if exists
                if ($service->image && file_exists(public_path($service->image))) {
                    unlink(public_path($service->image));
                }
            }
    
            $service->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $imagePath,
            ]);
    
            return response()->json([
                'status' => 'success',
             'message' => 'Service updated successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error', 
                'message' => $e->getMessage()], 500);
        }
    }
    public function ServiceDelete(Request $request)
    {
        try {
            // Find the advertisement by ID
            $service = Service::find($request->input('id'));
    
            if ($service) {
                // Get the image path from the advertisement record
                $imagePath = public_path($service->image);
    
                // Delete the image from the server if it exists
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
    
                // Delete the advertisement record
                $service->delete();
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'advertisement deleted'
                ]);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'advertisement not found'
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
    try {
        $serviceDataList = Service::all(); // Fetch all services
        return response()->json([
            'status' => 'success',
            'serviceDataList' => $serviceDataList,
        ]);
    } catch (Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ]);
    }
}

}
