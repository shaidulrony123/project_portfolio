<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
 
    public function ProjectPage(){
        return view('backend.pages.project-page');
    }
    public function ProjectList(){
        try{
            $projectList= Project::get();
            return response()->json([
                'status' => 'success',
                'rows'=> $projectList
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage()
            ]);
        }
    }
    public function ProjectCreate(Request $request) {
        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$t}-{$file_name}";
        $img_url = "frontend/assets/images/project/{$img_name}";
    
        $img->move(public_path('frontend/assets/images/project'), $img_name);
        
         Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'url' => $request->input('url'),
            'tags' => $request->input('tags'),
            'image' => $img_url,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Project created successfully'
        ]);
    }
    public function ProjectById(Request $request)
    {
        try {
            $projectById = Project::find($request->input('id'));
    
            if ($projectById) {
                return response()->json([
                    'status' => 'success',
                    'project' => $projectById
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
    public function ProjectUpdate(Request $request)
    {
        try {
            $project = Project::find($request->id);
            if (!$project) {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'Project not found'
                ], 404);
            }
    
            $imagePath = $request->existing_image;
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $newImageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = "frontend/assets/images/project/{$newImageName}";
                $image->move(public_path('frontend/assets/images/project'), $newImageName);
    
                // Delete old image if exists
                if ($project->image && file_exists(public_path($project->image))) {
                    unlink(public_path($project->image));
                }
            }
    
            $project->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'url' => $request->input('url'),
                'tags' => $request->input('tags'),
                'image' => $imagePath,
            ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Project updated successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error', 
                'message' => $e->getMessage()], 500);
        }
    }
    public function ProjectDelete(Request $request)
    {
        try {
            // Find the advertisement by ID
            $project = Project::find($request->input('id'));
    
            if ($project) {
                // Get the image path from the advertisement record
                $imagePath = public_path($project->image);
    
                // Delete the image from the server if it exists
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
    
                // Delete the project record
                $project->delete();
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'project deleted'
                ]);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'project not found'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Something went wrong: ' . $e->getMessage()
            ]);
        }
    }
        // project data
        public function GetProjectData()
        {
            try {
                $projectDataList = Project::all(); // Fetch all services
                return response()->json([
                    'status' => 'success',
                    'projectDataList' => $projectDataList,
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ]);
            }
        }
}
