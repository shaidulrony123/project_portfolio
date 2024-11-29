<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function PricingPage(){
        return view('backend.pages.pricing-page');
    }
    public function PricingList(){
        try{
            $pricingList= Pricing::get();
            return response()->json([
                'status' => 'success',
                'rows'=> $pricingList
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage()
            ]);
        }
    }
    public function PricingCreate(Request $request) {
       
        
         Pricing::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Pricing created successfully'
        ]);
    }
    public function PricingById(Request $request)
    {
        try {
            $pricingById = Pricing::find($request->input('id'));
    
            if ($pricingById) {
                return response()->json([
                    'status' => 'success',
                    'pricing' => $pricingById
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Pricing not found'
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
    public function PricingUpdate(Request $request)
    {
        try {
            $pricing = Pricing::find($request->id);
            if (!$pricing) {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'Pricing not found'
                ], 404);
            }
            $pricing->update([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
            ]);
            return response()->json([
                'status' => 'success',
             'message' => 'Pricing updated successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error', 
                'message' => $e->getMessage()], 500);
        }
    }
    public function PricingDelete(Request $request)
    {
        try {
            // Validate the input
            $request->validate([
                'id' => 'required|exists:pricings,id',
            ]);
    
            // Attempt to delete the category
            $pricingDeleted = Pricing::where('id', $request->input('id'))->delete();
    
            if ($pricingDeleted) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Pricing deleted successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Failed to delete the pricing. Please try again.',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => 'An error occurred: ' . $e->getMessage(),
            ]);
        }
    }
}
