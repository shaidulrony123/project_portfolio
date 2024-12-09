<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductPage(){
        return view('backend.pages.product-page');
    }
    public function ProductList(){
        try{
            $productList= Product::get();
            return response()->json([
                'status' => 'success',
                'rows'=> $productList
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage()
            ]);
        }
    }
    public function ProductCreate(Request $request) {
        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$t}-{$file_name}";
        $img_url = "frontend/assets/images/product/{$img_name}";
    
        $img->move(public_path('frontend/assets/images/product'), $img_name);
        
         Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'url' => $request->input('url'),
            'image' => $img_url,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully'
        ]);
    }
    public function ProductById(Request $request)
    {
        try {
            $productById = Product::find($request->input('id'));
    
            if ($productById) {
                return response()->json([
                    'status' => 'success',
                    'product' => $productById
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
    public function ProductUpdate(Request $request)
    {
        try {
            $product = Product::find($request->id);
            if (!$product) {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'product not found'
                ], 404);
            }
    
            $imagePath = $request->existing_image;
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = "frontend/assets/images/product/{$newImageName}";
                $image->move(public_path('frontend/assets/images/product'), $newImageName);
    
                // Delete old image if exists
                if ($product->image && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }
            }
    
            $product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'url' => $request->input('url'),
                'image' => $imagePath,
            ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error', 
                'message' => $e->getMessage()], 500);
        }
    }
    public function ProductDelete(Request $request)
    {
        try {
            // Find the advertisement by ID
            $product = Product::find($request->input('id'));
    
            if ($product) {
                // Get the image path from the advertisement record
                $imagePath = public_path($product->image);
    
                // Delete the image from the server if it exists
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
    
                // Delete the advertisement record
                $product->delete();
    
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
    public function GetProductData()
    {
        try {
            $productDataList = Product::all(); // Fetch all services
            return response()->json([
                'status' => 'success',
                'productDataList' => $productDataList,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
