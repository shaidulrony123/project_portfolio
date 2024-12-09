<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryPage(){
        return view('backend.pages.category-page');
    }
    public function CategoryList(){
        try{
            $categoryList= Category::get();
            return response()->json([
                'status' => 'success',
                'rows'=> $categoryList
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage()
            ]);
        }
    }
    public function CategoryCreate(Request $request) {


         Category::create([
            'name' => $request->input('name')
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully'
        ]);
    }
    public function CategoryById(Request $request)
    {
        try {
            $categoryById = Category::find($request->input('id'));

            if ($categoryById) {
                return response()->json([
                    'status' => 'success',
                    'category' => $categoryById
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
    public function CategoryUpdate(Request $request)
    {
        try {
            $category = Category::find($request->id);
            if (!$category) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Category not found'
                ], 404);
            }
            $category->update([
                'name' => $request->input('name'),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Category updated successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()], 500);
        }
    }
    public function CategoryDelete(Request $request)
    {
        try {
            // Validate the input
            $request->validate([
                'id' => 'required|exists:categories,id',
            ]);

            // Attempt to delete the category
            $categoryDeleted = Category::where('id', $request->input('id'))->delete();

            if ($categoryDeleted) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Category deleted successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Failed to delete the category. Please try again.',
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
