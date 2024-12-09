<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;  // Use File if needed


class ContactController extends Controller
{
    public function ContactPage(){
        return view('backend.pages.contact-page');
    }
    public function ContactList(){
        try{
            $contactList= Contact::with('category')->get();
            return response()->json([
                'status' => 'success',
                'rows'=> $contactList
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage()
            ]);
        }
    }
    // Fetch categories
    public function getCategories()
    {
        try {
            // Fetch all categories
            $categories = Category::all();
            return response()->json($categories, 200);
        } catch (Exception $e) {
            // Log the error
            Log::error('Error fetching categories: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to fetch categories.'], 500);
        }
    }
    
    public function ContactCreate(Request $request)
    {
        Log::info('Received form data: ', $request->all()); // Log request data
        
        try {
            // Validate the form input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'nullable|string',
                'message' => 'nullable|string',
                'documentation' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
                'category_id' => 'required|exists:categories,id',
            ]);
            
            // Handle file upload
            if ($request->hasFile('documentation')) {
                // Define the directory where the file will be saved
                $directory = public_path('frontend/assets/images/documentation');
                
                // Ensure the directory exists, if not, create it
                if (!File::exists($directory)) {
                    File::makeDirectory($directory, 0775, true);
                }
                
                // Get the file and generate a new filename
                $file = $request->file('documentation');
                $fileName = time() . '_' . $file->getClientOriginalName();
                
                // Move the file to the desired directory
                $file->move($directory, $fileName);
                
                // Get the path to the file
                $filePath = 'frontend/assets/images/documentation/' . $fileName;
            } else {
                throw new Exception('Documentation file is required');
            }
        
            // Create the contact
            Contact::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'message' => $request->input('message'),
                'documentation' => $filePath, // Store the relative path to the file
                'category_id' => $request->input('category_id'),
            ]);
        
            return response()->json(['status' => 'success', 'message' => 'Contact created successfully.'], 200);
        } catch (Exception $e) {
            Log::error('Error creating contact: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to create contact.'], 500);
        }
    }
     // Function to download the documentation file
     public function downloadDocumentation($filename)
     {
         // Check if the file exists in the public storage folder
         $filePath = 'uploads/' . $filename; // This is where your files are stored
 
         if (Storage::disk('public')->exists($filePath)) {
             // Serve the file as a download
             return Storage::disk('public')->download($filePath);
         } else {
             // If file doesn't exist, return a message
             return response()->json(['error' => 'File not found'], 404);
         }
     }
}
